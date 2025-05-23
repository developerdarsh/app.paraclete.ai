<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\LicenseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\VideoOperation;

class AiUGCVideoController extends Controller
{

    private $api;

    public function __construct()
    {
        $this->api = new LicenseController();
    }

    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $apiKey = config('services.caption.key');
        // Fetch all video operations for the logged-in user
        $videoOperations = VideoOperation::where('user_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->paginate(5); 
        $allOperations = VideoOperation::where('user_id', Auth::id())
            ->whereNotNull('url')
            ->get();        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.captions.ai/api/creator/list');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = "x-api-key: $apiKey";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $resultArray = json_decode($result, true);

        if (curl_errno($ch)) {
            return view('user.UCGVideos.index')->withErrors('Error: ' . curl_error($ch));
        }
        curl_close($ch);

        $creators = $resultArray['supportedCreators'];

        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.captions.ai/api/translate/supported-languages');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = "X-Api-Key: $apiKey";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $support_lang = curl_exec($ch);
        $supportLangArray = json_decode($support_lang, true);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return view('user.UCGVideos.index', compact('creators','videoOperations','allOperations','supportLangArray'));
    }

    public function generate(Request $request)
    {
        $apiKey = config('services.caption.key');
        $data = $request->only(['creatorName', 'script']);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.captions.ai/api/creator/submit");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "x-api-key: $apiKey"
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $responseArray = json_decode($response, true);

        $videoOperation = VideoOperation::create([
            'title' => $request['title'],
            'user_id' => Auth::id(),
            'creator' => $request['creatorName'],
            'script'  => $request['script'],
            'operation_id' => $responseArray['operationId'],
        ]);
        
        curl_close($ch);
        $responseArray['video_operation_id'] = $videoOperation->id;
        $responseArray['creator'] = $videoOperation->creator;
        $responseArray['title'] = $videoOperation->title;
        return response()->json($responseArray);
    }

    public function poll(Request $request)
    {
        $apiKey = config('services.caption.key');
        $operationId = $request->input('operationId');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.captions.ai/api/creator/poll');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            "x-api-key: $apiKey",
            "X-Operation-Id: $operationId"
        ]);

        $resultSet = curl_exec($ch);
        $resultSetArray = json_decode($resultSet, true);
        curl_close($ch);

        $videoOperation = VideoOperation::where('operation_id', $operationId)->first();

        if (isset($resultSetArray['url']) && $resultSetArray['url'] != null) {
            // Update the operation as 'done' and save the URL
            $videoOperation->update([
                'status' => 'DONE',
                'url' => $resultSetArray['url']
            ]);
            return response()->json([
                'status' => 'DONE',
                'videoUrl' => $resultSetArray['url'],
                'video_operation_id' => $videoOperation->id
            ]);
        } else {
            $status = $resultSetArray['state'] ?? null; // Default to 'null' if no state is provided
            $videoOperation->update(['status' => $status]);
            return response()->json([
                'status' => $status,
                'video_operation_id' => $videoOperation->id
            ]);
        }
        
        
    }
}   