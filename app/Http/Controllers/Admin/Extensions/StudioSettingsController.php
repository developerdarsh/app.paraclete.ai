<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Studio;
use App\Models\Result;
use App\Models\User;
use App\Models\Music;
use App\Models\ExtensionSetting;
use Yajra\DataTables\DataTables;
use DB;

class StudioSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.sound-studio.setting', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeCheckbox(request('sound_studio_feature'), 'sound_studio_feature');
        $this->storeCheckbox(request('sound_studio_free_tier'), 'sound_studio_free_tier');

        $this->storeValues(request('sound_studio_max_merge_files'), 'sound_studio_max_merge_files');
        $this->storeValues(request('sound_studio_max_audio_size'), 'sound_studio_max_audio_size');

        $this->storeConfiguration('DAVINCI_SETTINGS_WINDOWS_FFMPEG_PATH', request('windows-ffmpeg-path'));

        toastr()->success(__('Settings have been saved successfully'));
        return redirect()->back();         
    }


    public function audio(Request $request)
    {
        return view('admin.davinci.configuration.extension.sound-studio.audio');
    }


    public function listAudio(Request $request) 
    {
        # Today's TTS Results for Datatable
        if ($request->ajax()) {
            $data = Music::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $actionBtn = '<div>                                       
                                        <a class="makePublicButton" id="'. $row["id"] .'" href="#"><i class="fa-solid fa-check table-action-buttons view-action-button" title="'. __('Make Public') .'"></i></a> 
                                        <a class="makePrivateButton" id="'. $row["id"] .'" href="#"><i class="fa-solid fa-ban table-action-buttons delete-action-button" title="'. __('Make Private') .'"></i></a> 
                                        <a class="deleteMusicButton" id="'. $row["id"] .'" href="#"><i class="fa-solid fa-trash-xmark table-action-buttons delete-action-button" title="'. __('Delete Audio File') .'"></i></a> 
                                    </div>';
                        return $actionBtn;
                    })
                    ->addColumn('created-on', function($row){
                        $created_on = '<span>'.date_format($row["created_at"], 'Y-m-d H:i:s').'</span>';
                        return $created_on;
                    })
                    ->addColumn('custom-size', function($row){
                        $size = $this->formatBytes((int)$row['size']);
                        return $size;
                    })
                    ->addColumn('download', function($row){
                        $url = URL::asset($row['url']);
                        $result = '<a class="" href="' . $url . '" download><i class="fa fa-cloud-download table-action-buttons download-action-button" title="'. __('Download Result') .'"></i></a>';
                        return $result;
                    })
                    ->addColumn('play', function($row){
                        $type = ($row['type'] == 'mp3') ? 'audio/mpeg' : 'audio/ogg';
                        $url = URL::asset($row['url']);
                        $result = '<button type="button" class="result-play" onclick="resultPlay(this)" src="' . $url . '" type="'. $type.'" id="'. $row['id'] .'"><i class="fa fa-play table-action-buttons edit-action-button"></i></button>';
                        return $result;
                    })
                    ->addColumn('status', function($row){
                        if ($row['public']) {
                            $status = '<span><i class="fa-solid fa-check voice-action-buttons text-success" title="'. __('Public Background Audio File') .'"></i></span>';
                        } else {
                            $status = '<span><i class="fa-solid fa-ban voice-action-buttons text-danger" title="'. __('Private Background Audio File') .'"></i></span>';
                        }                        
                        return $status;
                    })
                    ->addColumn('username', function($row){
                        $username = '<span>'.User::find($row["user_id"])->name.'</span>';
                        return $username;
                    })
                    ->rawColumns(['actions', 'created-on', 'download', 'play', 'custom-size', 'status', 'username'])
                    ->make(true);
                    
        }
    }


    /**
     * Upload background music file.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $status = false;

        if (request()->hasFile('audiofile')) {
                
            $file = request()->file('audiofile');

            $fileTypes = ['mp3', 'wav', 'ogg'];
            if (!in_array(Str::lower($file->getClientOriginalExtension()), $fileTypes)) {
                toastr()->error(__('Background audio must in mp3 | wav | ogg formats'));
                return redirect()->back();
            }

            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $size = $file->getSize();

            $audio_length = gmdate("H:i:s", request('audiolength'));

            $folder = '/uploads/music/';
            $file_name = Str::random(10) . '.' . $extension;
            $url = $folder . $file_name;

            $file->storeAs($folder, $file_name, 'public');

            $result = new Music([
                'user_id' => Auth::user()->id,
                'url' => $url,
                'type' => $extension,
                'size' => $size,
                'duration' => $audio_length,
                'name' => $name,
                'public' => true,
            ]); 

            $result->save();

            $status = true;
        }

        if ($request->ajax()) {
            $data = ($status) ? true : false;
            return $data;
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteResult(Request $request)
    {
        if ($request->ajax()) {

            $result = Studio::where('id', request('id'))->firstOrFail();  

            if ($result){

                $result->delete();

                return response()->json('success');    
    
            } else{
                return response()->json('error');
            } 
        }              
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMusic(Request $request)
    {
        if ($request->ajax()) {

            $result = Music::where('id', request('id'))->firstOrFail(); 

            if ($result){

                Storage::disk('public')->delete($result->url);

                $result->delete();

                return response()->json('success');    
    
            } else{
                return response()->json('error');
            } 
        }               
    }


    /**
     * Set background music as public.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function public(Request $request)
    {
        if ($request->ajax()) {

            $result = Music::where('id', request('id'))->firstOrFail();  

            if ($result->user_id == Auth::user()->id){

                if ($result->public == true) {
                    return response()->json('error');
                } else {
                    $result->public = true;
                    $result->save();

                    return response()->json('success');  
                }  
    
            } else{
                return response()->json('error');
            } 
        }              
    }


    /**
     * Set background music as private.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function private(Request $request)
    {
        if ($request->ajax()) {

            $result = Music::where('id', request('id'))->firstOrFail();  

            if ($result->user_id == Auth::user()->id){

                if ($result->public == false) {
                    return response()->json('error');
                } else {
                    $result->public = false;
                    $result->save();

                    return response()->json('success');
                }
                    
            } else{
                return response()->json('error');
            } 
        }              
    }


    private function formatBytes($bytes, $precision = 2) { 
        $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
    
        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 
        
        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow]; 
    }


     /**
     * Record in .env file
     */
    private function storeConfiguration($key, $value)
    {
        $path = base_path('.env');

        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
            ));

        }
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
