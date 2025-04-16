<?php

namespace App\Services;

use XeroAPI\XeroPHP\Configuration;
use XeroAPI\XeroPHP\Api\AccountingApi;
use GuzzleHttp\Client;
use League\OAuth2\Client\Provider\GenericProvider;
use App\Models\ExtensionSetting;
use App\Services\HelperService;
use App\Models\XeroToken;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class XeroService
{
    private $provider;
    private $accountingApi;
    private $config;

    public function __construct()
    {
        $extension = ExtensionSetting::first();

        $this->provider = new GenericProvider([
            'clientId' => $extension->xero_client_id,
            'clientSecret' => $extension->xero_client_secret,
            'redirectUri' => config('app.url') . '/app/callback/xero',
            'urlAuthorize' => 'https://login.xero.com/identity/connect/authorize',
            'urlAccessToken' => 'https://identity.xero.com/connect/token',
            'urlResourceOwnerDetails' => 'https://api.xero.com/api.xro/2.0/Organisation'
        ]);

        $this->config = Configuration::getDefaultConfiguration();
    }


    public function getAuthorizationUrl()
    {
        $options = [
            'scope' => ['openid email profile offline_access accounting.settings accounting.transactions accounting.contacts accounting.attachments']
        ];

        return $this->provider->getAuthorizationUrl($options);
    }


    public function handleCallback($authCode)
    {
        try {
            $accessToken = $this->provider->getAccessToken('authorization_code', [
                'code' => $authCode
            ]);

             // Get the list of tenants (organizations) the user has authorized
            $response = $this->provider->getAuthenticatedRequest(
                'GET',
                'https://api.xero.com/connections',
                $accessToken
            );

            $connections = $this->provider->getParsedResponse($response);

            // Usually you'll want to store the first tenant ID
            // If the user has multiple organizations, you might want to let them choose
            $tenantId = $connections[0]->tenantId ?? $connections[0]['tenantId'];

            // Store tokens in session or database
            $tokenRecord = XeroToken::first();

            if ($tokenRecord) {
                $tokenRecord->update([
                    'access_token' => $accessToken->getToken(),
                    'refresh_token' => $accessToken->getRefreshToken(),
                    'expires_at' => Carbon::createFromTimestamp($accessToken->getExpires()),
                    'tenant_id' => $tokenRecord->tenant_id // Preserve existing tenant_id
                ]);
            } else {
                XeroToken::create([
                    'access_token' => $accessToken->getToken(),
                    'refresh_token' => $accessToken->getRefreshToken(),
                    'expires_at' => Carbon::createFromTimestamp($accessToken->getExpires()),
                    'tenant_id' => $tenantId
                ]);            
            }

            // Store tenant ID in session if needed for immediate use
            session(['xero_tenant_id' => $tenantId]);

            return true;
        } catch (\Exception $e) {
            Log::error('Xero callback error: ' . $e->getMessage());
            return false;
        }
    }


    private function getValidAccessToken()
    {
        $tokenRecord = XeroToken::first();

        if (!$tokenRecord) {
            // No token exists, need to perform initial authentication
            throw new \Exception('Xero not authenticated');
        }

        if (Carbon::parse($tokenRecord->expires_at)->subMinutes(5)->isPast()) {
            try {
                $newAccessToken = $this->provider->getAccessToken('refresh_token', [
                    'refresh_token' => $tokenRecord->refresh_token
                ]);

                // Update token in database
                $tokenRecord->update([
                    'access_token' => $newAccessToken->getToken(),
                    'refresh_token' => $newAccessToken->getRefreshToken(),
                    'expires_at' => Carbon::createFromTimestamp($newAccessToken->getExpires()),
                    'tenant_id' => $tokenRecord->tenant_id // Preserve existing tenant_id
                ]);

                return $newAccessToken->getToken();
            } catch (\Exception $e) {
                Log::error('Token refresh error: ' . $e->getMessage());
                throw new \Exception('Failed to refresh Xero token');
            }
        }

        return $tokenRecord->access_token;
    }


    private function getAccountingApi()
    {
        $accessToken = $this->getValidAccessToken();
        if (!$accessToken) {
            throw new \Exception('No valid access token available');
        }

        $this->config->setAccessToken($accessToken);
        return new AccountingApi(
            new Client(),
            $this->config
        );
    }


    public function getContacts()
    {
        $tokenRecord = XeroToken::first();

        try {
            $xero = $this->getAccountingApi();
            $result = $xero->getContacts($tokenRecord->tenant_id);
            return $result->getContacts();
        } catch (\Exception $e) {
            Log::error('Get contacts error: ' . $e->getMessage());
            return null;
        }
    }


    public function createContact()
    {
        $tokenRecord = XeroToken::first();
        try {
            $xero = $this->getAccountingApi();

            $contact = [
                "Name" => auth()->user()->name,
                "EmailAddress" => auth()->user()->email,
                "Phones" => [
                    [
                        "PhoneType" => "DEFAULT",
                        "PhoneNumber" => auth()->user()->phone_number
                    ]
                ]
            ];

            $result = $xero->createContacts(
                $tokenRecord->tenant_id,
                ['Contacts' => [$contact]]
            );

            return $result->getContacts()[0];
        } catch (\Exception $e) {
            Log::error('Create contact error: ' . $e->getMessage());
            return null;
        }
    }


    public function findContact($email)
    {
        try {
            $xero = $this->getAccountingApi();
            $tokenRecord = XeroToken::first();
            
            // Search for contact by email
            $result = $xero->getContacts(
                $tokenRecord->tenant_id,
                null, // if_modified_since
                "EmailAddress==\"{$email}\"", // where
                null, // order
                null, // ids
                null, // page
                null  // include_archived
            );

            $contacts = $result->getContacts();
            
            if (!empty($contacts)) {
                return $contacts[0]; // Returns the first matching contact
            }
            
            return null;
        } catch (\Exception $e) {
            Log::error('Find contact error: ' . $e->getMessage());
            return null;
        }
    }


    public function createInvoice($data)
    {
        $tokenRecord = XeroToken::first();

        try {
            $xero = $this->getAccountingApi();
            $invoice = [
                "Type" => "ACCREC",
                "Contact" => [
                    "ContactID" => $data['contact_id']
                ],
                "LineItems" => $data['line_items'],
                "Date" => date('Y-m-d'),
                "DueDate" => $data['due_date'] ?? date('Y-m-d', strtotime('+30 days')),
                "Reference" => $data['reference'] ?? null
            ];

            $result = $xero->createInvoices(
                $tokenRecord->tenant_id,
                ['Invoices' => [$invoice]]
            );
            return $result->getInvoices()[0];
        } catch (\Exception $e) {
            Log::error('Create invoice error: ' . $e->getMessage());
            return null;
        }
    }


    public static function xeroInvoice($invoiceData)
    {
        try {
            $instance = new self();  
            // First, try to find if contact exists
            $contact = $instance->findContact(auth()->user()->email);
            
            // If contact doesn't exist, create new one
            if (!$contact) {
                $contact = $instance->createContact();
                if (!$contact) {
                    throw new \Exception('Failed to create contact');
                }
            }

            // Get the ContactID
            $contactId = $contact->getContactId();

            $result = $instance->createInvoice([
                'contact_id' => $contactId,
                'line_items' => $invoiceData['line_items'],
                'reference' => $invoiceData['reference'] ?? null
            ]);

            return [
                'contact' => $contact,
                'invoice' => $result
            ];

        } catch (\Exception $e) {
            Log::error('Create contact and invoice error: ' . $e->getMessage());
            return null;
        }
    }
}
