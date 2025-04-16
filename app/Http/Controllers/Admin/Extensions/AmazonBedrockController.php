<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;


class AmazonBedrockController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.bedrock.setting', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeValues(request('amazon_bedrock_access_key'), 'amazon_bedrock_access_key');
        $this->storeValues(request('amazon_bedrock_secret_key'), 'amazon_bedrock_secret_key');
        $this->storeValues(request('amazon_bedrock_region'), 'amazon_bedrock_region');

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


}


