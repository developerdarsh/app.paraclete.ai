<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;


class OpenRouterController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.open-router.index', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeCheckbox(request('open_router_activate'), 'open_router_activate');
        $this->storeValues(request('open_router_key'), 'open_router_key');

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


