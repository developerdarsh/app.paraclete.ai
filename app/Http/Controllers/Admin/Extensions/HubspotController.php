<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;
use App\Models\User;
use HubSpot\Factory;
use GuzzleHttp\Client;
use Exception;


class HubspotController extends Controller
{
    private $hubspot;

    public function __construct()
    {
        $extension = ExtensionSetting::first();

        $this->hubspot = Factory::createWithAccessToken($extension->hubspot_access_token);
    }


    public function index()
    {
        $extension = ExtensionSetting::first();        

        return view('admin.davinci.configuration.extension.hubspot.index', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeValues(request('hubspot_access_token'), 'hubspot_access_token');

        if (request('users') == 'on') {
            $this->createUsers('user');
        }

        if (request('subscribers') == 'on') {
            $this->createUsers('subscriber');
        }

        toastr()->success(__('Settings have been saved successfully'));
        return redirect()->back();         
    }


    public function createUsers($group)
    {
        $users = User::where('group', $group)->get();

        if ($users) {
            foreach ($users as $user) {
                $name = explode(' ', $user->name);

                $contactData = [
                    'properties' => [
                        'firstname' => $name[0] ?? '',
                        'lastname' => $name[1] ?? '',
                        'email' => $user->email,                        
                        'phone' => $user->phone_number
                    ]
                ];
        
                try {

                    $response = $this->hubspot->crm()->contacts()->basicApi()->create($contactData);

                    \Log::info($response);

                } catch (Exception $e) {
                    \Log::info($e->getMessage());
                    toastr()->error($e->getMessage());
                    return redirect()->back();  
                }
            }
        }
       
    }


    private function storeValues($value, $field_name)
    {
        $settings = ExtensionSetting::first();
        $settings->update([
            $field_name => $value
        ]);
    }


}


