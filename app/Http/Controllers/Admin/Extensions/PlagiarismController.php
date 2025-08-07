<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;


class PlagiarismController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.plagiarism.index', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeValues(request('plagiarism_api'), 'plagiarism_api');

        $this->storeCheckbox(request('plagiarism_feature'), 'plagiarism_feature');
        $this->storeCheckbox(request('plagiarism_free_tier'), 'plagiarism_free_tier');

        $this->storeCheckbox(request('detector_feature'), 'detector_feature');
        $this->storeCheckbox(request('detector_free_tier'), 'detector_free_tier');

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


