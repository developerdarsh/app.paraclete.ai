<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use App\Models\AzureModel;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;


class AzureOpenaiController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();
        $models = AzureModel::get();

        return view('admin.davinci.configuration.extension.azure-openai.index', compact('extension', 'models'));
    }


    public function store(Request $request)
    {
        $this->storeCheckbox(request('azure_openai_activate'), 'azure_openai_activate');
        $this->storeValues(request('azure_openai_endpoint'), 'azure_openai_endpoint');
        $this->storeValues(request('azure_openai_key'), 'azure_openai_key');

        $this->fillModel(request('gpt-4'), request('gpt-4-value'));
        $this->fillModel(request('gpt-4o'), request('gpt-4o-value'));
        $this->fillModel(request('gpt-4o-mini'), request('gpt-4o-mini-value'));
        $this->fillModel(request('gpt-4-0125-preview'), request('gpt-4-0125-preview-value'));
        $this->fillModel(request('o1'), request('o1-value'));
        $this->fillModel(request('o1-mini'), request('o1-mini-value'));
        $this->fillModel(request('o3-mini'), request('o3-mini-value'));

        toastr()->success(__('Settings have been saved successfully'));
        return redirect()->back();         
    }


    public function fillModel($model, $value)
    {
        $target = AzureModel::where('model', $model)->first();
        if ($target) {
            $target->deployment_name = $value;
            $target->save(); 
        }        
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


