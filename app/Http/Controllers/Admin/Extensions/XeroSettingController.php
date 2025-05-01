<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;
use App\Services\XeroService;


class XeroSettingController extends Controller
{
    protected $xeroService;

    public function __construct(XeroService $xeroService)
    {
        $this->xeroService = $xeroService;
    }

    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.xero.setting', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeValues(request('xero_client_id'), 'xero_client_id');
        $this->storeValues(request('xero_client_secret'), 'xero_client_secret');

        $authUrl = $this->connect();

        return redirect($authUrl);

        toastr()->success(__('Settings have been saved successfully'));
        return redirect()->back();         
    }


    public function connect()
    {
        try {

            $authUrl = $this->xeroService->getAuthorizationUrl();

            return $authUrl;
        } catch (\Exception $e) {
            \Log::error('Xero connection error: ' . $e->getMessage());
            toastr()->error(__('Failed to connect to Xero'));            
            return redirect()->back();
        }
    }

    
    public function callback(Request $request)
    {
        try {
            if ($request->has('code')) {
                $result = $this->xeroService->handleCallback($request->code);
                if ($result) {
                    toastr()->success(__('Your Xero account was successfully connected'));
                    return redirect()->route('admin.davinci.configs.xero');
                }
            }

            toastr()->error(__('Failed to connect to Xero'));
            return redirect()->route('admin.davinci.configs.xero');
        } catch (\Exception $e) {
            \Log::error('Xero callback error: ' . $e->getMessage());
            toastr()->error(__('Failed to process Xero callback'));
            return redirect()->route('admin.settings.xero');
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


