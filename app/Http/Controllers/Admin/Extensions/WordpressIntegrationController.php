<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;


class WordpressIntegrationController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.wordpress.setting', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeCheckbox(request('integration_wordpress_feature'), 'integration_wordpress_feature');
        $this->storeCheckbox(request('integration_wordpress_free_tier'), 'integration_wordpress_free_tier');
        $this->storeCheckbox(request('integration_wordpress_auto_post'), 'integration_wordpress_auto_post');

        $this->storeValues(request('integration_wordpress_website_numbers'), 'integration_wordpress_website_numbers');
        $this->storeValues(request('integration_wordpress_post_numbers'), 'integration_wordpress_post_numbers');


        toastr()->success(__('Settings have been saved successfully'));
        return redirect()->back();         
    }


    private function storeCheckbox($checkbox, $field_name)
    {
        if ($checkbox == 'on') {
            $status = true; 
        } else {
            $status = false;
        }

        $settings = ExtensionSetting::first();
        $settings->update([
            $field_name => $status
        ]);
    }


    private function storeValues($value, $field_name)
    {
        $settings = ExtensionSetting::first();
        $settings->update([
            $field_name => $value
        ]);
    }


}


