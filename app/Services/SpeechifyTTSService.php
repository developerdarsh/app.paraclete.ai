<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\ExtensionSetting;
use App\Models\Voice;
use Exception;

class SpeechifyTTSService 
{
    private $apiKey;
    private $baseUrl = 'https://api.sws.speechify.com';
    
    public function __construct()
    {
        $setting = ExtensionSetting::first();
        $this->apiKey = $setting->speechify_tts_api ?? null;        
    }

    /**
     * Synthesize text via Speechify text to speech API
     */
    public function synthesizeSpeech(Voice $voice, $text, $format, $file_name)
    {  
        
        $payload = [
            'input' => $text,
            'voice_id' => $voice->voice_id,
            'audio_format' => $format,
            'model' => 'simba-multilingual',
        ];

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://api.sws.speechify.com/v1/audio/speech', [
            'json' => $payload,
            'headers' => [
                'Authorization' => 'Bearer '. $this->apiKey,
            ],
        ]);

        $result = json_decode($response->getBody(), true);

        Storage::disk('audio')->put($file_name, base64_decode($result['audio_data'])); 

        $data['result_url'] = Storage::url($file_name); 
        $data['name'] = $file_name;
        
        return $data;
    }


}