<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;


class WatsonController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.watson.setting', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeCheckbox(request('ibm_watson_feature'), 'ibm_watson_feature');
        $this->storeValues(request('ibm_watson_api'), 'ibm_watson_api');
        $this->storeValues(request('ibm_watson_endpoint_url'), 'ibm_watson_endpoint_url');

        toastr()->success(__('Settings have been saved successfully'));
        return redirect()->back();         
    }


    private function storeValues($value, $field_name)
    {
        $settings = ExtensionSetting::first();
        $settings->update([
            $field_name => $value
        ]);
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


}


