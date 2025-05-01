<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;


class PerplexityController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.perplexity.setting', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeValues(request('perplexity_api'), 'perplexity_api');
        $this->storeValues(request('perplexity_realtime_model'), 'perplexity_realtime_model');

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


