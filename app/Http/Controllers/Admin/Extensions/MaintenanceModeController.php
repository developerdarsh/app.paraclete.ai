<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;


class MaintenanceModeController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.maintenance.setting', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeValues(request('maintenance_header'), 'maintenance_header');
        $this->storeValues(request('maintenance_message'), 'maintenance_message');
        $this->storeValues(request('maintenance_footer'), 'maintenance_footer');
        $this->storeCheckbox(request('maintenance_feature'), 'maintenance_feature');

        if (request()->has('banner')) {
            
            $image = request()->file('banner');

            $name = Str::random(20);
            
            $folder = '/uploads/maintenance/';
            
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

            $imageTypes = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
            if (!in_array(Str::lower($image->getClientOriginalExtension()), $imageTypes)) {
                toastr()->error(__('Avatar image must be in png, jpeg, webp or svg formats'));
                return redirect()->back();
            } else {
                $this->uploadImage($image, $folder, 'public', $name);

                $this->storeValues($filePath, 'maintenance_banner');
            }
            
        }

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


    public function uploadImage(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $image = $file->storeAs($folder, $name .'.'. $file->getClientOriginalExtension(), $disk);

        return $image;
    }


}


