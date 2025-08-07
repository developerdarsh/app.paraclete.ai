<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;
use App\Models\Vendor;
use DB;


class SpeechifyTextController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.speechify.text.setting', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeCheckbox(request('speechify_tts_feature'), 'speechify_tts_feature');
        $this->storeValues(request('speechify_tts_api'), 'speechify_tts_api');

        if (request('speechify_tts_feature') == 'on') {
            $gcp_nrl = Vendor::where('vendor_id', 'speechify_nrl')->first();
            $gcp_nrl->enabled = 1;
            $gcp_nrl->save();

        } else {
            $gcp_nrl = Vendor::where('vendor_id', 'speechify_nrl')->first();
            $gcp_nrl->enabled = 0;
            $gcp_nrl->save();
        }


        if (request('speechify_tts_feature') == 'on') {
            DB::table('voices')->where('vendor_id', 'speechify_nrl')->update(array('status' => 'active'));
    
        } else {
            DB::table('voices')->where('vendor_id', 'speechify_nrl')->update(array('status' => 'deactive'));
        }

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


