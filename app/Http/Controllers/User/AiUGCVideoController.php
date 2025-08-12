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
 
        $apiKey = config('settings.topview.api_key');
        $topviewUid = config('settings.topview.uid');

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/product_avatar/public_avatar/query?ethnicityIds=&gender=&sortingType=&categoryIds=&pageNo=&pageSize=',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $apiKey,
            'Topview-Uid: ' . $topviewUid,
            ),
        ));

        $product_avatar_temp1 = curl_exec($curl);
        $product_avatar_temp = json_decode($product_avatar_temp1, true);
        curl_close($curl);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/product_anyShoot/template/list?categoryIds=&style=&pageNo&pageSize',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
            'Topview-Uid: 7QNjCZNYupL0K16uus9v'
        ),
        ));

        $product_anyShoot_template1 = curl_exec($curl);
        $product_anyShoot_template = json_decode($product_anyShoot_template1, true);
        curl_close($curl);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/aiavatar/query?pageNo=&pageSize=&gender=&ethnicityIdList&sortField&sortType&isCustom=',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Topview-Uid: 7QNjCZNYupL0K16uus9v',
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY'
        ),
        ));

        $video_avatars = json_decode(curl_exec($curl) , true);
        
        return view('user.topview.index',compact('product_avatar_temp','product_anyShoot_template','video_avatars'));
        
    }

    public function create()
    {
        return view('user.topview.create'); // Make sure this Blade file exists
    }

    public function avatar_video_creation()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.topview.ai/v1/voice/query'); // <-- double-check this URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $headers = array();
        $headers[] = 'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY';
        $headers[] = 'Topview-Uid: 7QNjCZNYupL0K16uus9v';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
            $voices = [];
        } else {
            $voices = json_decode($response, true);
            $voices = $voices['result']['data'] ?? []; // GET only the voices array
        }
        curl_close($ch);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/aiavatar/query?pageNo=&pageSize=&gender=&ethnicityIdList&sortField&sortType&isCustom=',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Topview-Uid: 7QNjCZNYupL0K16uus9v',
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY'
        ),
        ));

        $avatars = json_decode(curl_exec($curl) , true);

        curl_close($curl);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/caption/list',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Topview-Uid: 7QNjCZNYupL0K16uus9v',
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY'
        ),
        ));

        $captions = json_decode(curl_exec($curl) , true);
        curl_close($curl);
        return view('user.topview.avatar-video-creation',compact('voices' , 'avatars' ,'captions')); // Make sure this Blade file exists
    }

    public function getPaginatedAvatars(Request $request)
    {
        $pageNo = $request->input('pageNo', 1);
        $pageSize = $request->input('pageSize', 20);

        $url = "https://api.topview.ai/v1/aiavatar/query?pageNo=$pageNo&pageSize=$pageSize";

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
                'Topview-Uid: 7QNjCZNYupL0K16uus9v',
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        return response($response, 200)
                ->header('Content-Type', 'application/json');
    }

    public function generateAvatarVideo(Request $request)
    {
        $aiAvatarId = $request->input('aiAvatarId');
        $voiceoverId = $request->input('voiceoverId');
        $ttsText = $request->input('ttsText');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.topview.ai/v1/video_avatar/task/submit',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                "avatarSourceFrom" => 1,
                "aiAvatarId" =>  $aiAvatarId,
                "audioSourceFrom" => 1,
                "ttsText" => $ttsText,
                "voiceoverId" => $voiceoverId,
                // "avatarSourceFrom" => 0, // 0 = public avatar
                // "aiAvatarId" => $aiAvatarId,
                // "audioSourceFrom" => 0, // 1 = TTS
            ]),
            CURLOPT_HTTPHEADER => array(
                'Topview-Uid: 7QNjCZNYupL0K16uus9v',
                'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            return response()->json(['error' => curl_error($curl)], 500);
        }

        curl_close($curl);

        return response()->json(json_decode($response, true));
    }

    public function all_product_template()
    {
        $pageSize = 20;
        $pageNo = 1;

        // First page data
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.topview.ai/v1/product_avatar/public_avatar/query?ethnicityIds=&gender=&sortingType=&categoryIds=&pageNo=' . $pageNo . '&pageSize=' . $pageSize,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
                'Topview-Uid: 7QNjCZNYupL0K16uus9v'
            ),
        ));

        $product_avatar_temp = json_decode(curl_exec($curl), true);
        curl_close($curl);
        // Get categories
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/product_avatar/category/list',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Topview-Uid: 7QNjCZNYupL0K16uus9v',
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY'
        ),
        ));

        $categories = json_decode(curl_exec($curl), true);
        curl_close($curl);

        return view('user.topview.all-product-template',compact('product_avatar_temp','categories')); // Make sure this Blade file exists
    }

    public function getProductsByCategory($categoryId = '', $pageNo = 1){   
        $pageSize = 10; // or whatever number of products you want per page
        $categoryIdParam = ($categoryId && $categoryId !== 'all') ? $categoryId : '';
        // dd($categoryIdParam);
        $url = 'https://api.topview.ai/v1/product_avatar/public_avatar/query?ethnicityIds=&gender=&sortingType=&categoryIds=' . $categoryIdParam . '&pageNo=' . $pageNo . '&pageSize=' . $pageSize;

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
            'Topview-Uid: 7QNjCZNYupL0K16uus9v'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return response()->json(json_decode($response, true));
        
    }

    public function generateAvatarTemplate(Request $request)
    {
       $request->validate([
            'avatarId' => 'required|string',
            'productImageFileId' => 'required|string', // URL of the product image
            'imageEditPrompt' => 'nullable|string'
        ]);

        $avatarId = $request->avatarId;
        $imageEditPrompt = $request->imageEditPrompt;
        $imageUrl = $request->productImageFileId;

        // Step 1: Get Upload URL (pre-signed URL) from API
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/upload/credential?format=png',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Topview-Uid: 7QNjCZNYupL0K16uus9v',
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY'
        ),
        ));
        $response = curl_exec($curl);
        dd($response);

        curl_close($curl);
        $decodedResponse = json_decode($response, true);
        $uploadUrl = $decodedResponse['result']['uploadUrl'] ?? null;
        $fileId = $decodedResponse['result']['fileId'] ?? null;
        if (!$uploadUrl || !$fileId) {
            return response()->json(['error' => 'Failed to get upload URL from API'], 500);
        }

       // Step 2: Download the remote image to a temporary local file
        // $tempFile = tempnam(sys_get_temp_dir(), 'img_');
        // $imageContents = @file_get_contents($imageUrl);

        // // Debug without halting
        // \Log::info("Temporary file path: " . $tempFile);

        // if ($imageContents === false) {
        //     return response()->json([
        //         'error' => 'Failed to download image from provided URL'
        //     ], 400);
        // }

        // // Save the downloaded image to the temporary file
        // file_put_contents($tempFile, $imageContents);
        // $fileSize = filesize($tempFile);

        // // Step 3: Upload the local temp file to S3 via pre-signed URL
        // $ch = curl_init($uploadUrl);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        // curl_setopt($ch, CURLOPT_INFILE, fopen($tempFile, 'r'));
        // curl_setopt($ch, CURLOPT_INFILESIZE, $fileSize);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, [
        //     'Content-Type: image/png',
        //     'Content-Length: ' . $fileSize // Avoid MissingContentLength error
        // ]);

        // $uploadResponse = curl_exec($ch);

        // // Check for cURL errors
        // if (curl_errno($ch)) {
        //     \Log::error("S3 Upload cURL Error: " . curl_error($ch));
        // } else {
        //     \Log::info("S3 Upload Response: " . $uploadResponse);
        // }

        // curl_close($ch);

        // Delete the temp file after upload
        // unlink($tempFile);

        // return response()->json([
        //     'message' => 'Image uploaded successfully',
        //     's3_response' => $uploadResponse
        // ]);

        // dd($uploadResponse);

        // if (curl_errno($ch)) {
        //     $error = curl_error($ch);
        //     curl_close($ch);
        //     unlink($tempFile); // Clean up
        //     return response()->json(['error' => 'Upload failed', 'details' => $error], 500);
        // }

        // curl_close($ch);
        // unlink($tempFile); // Clean up the temp file after upload

        // return response()->json([
        //     'status' => 'success',
        //     'fileId' => $fileId,
        //     'uploadUrl' => $uploadUrl,
        //     'uploadResponse' => $uploadResponse,
        // ]);
        
        // Now call Topview API
        
        $payload = [
            'avatarId' => $avatarId,
            'productImageFileId' => $fileId, // <-- or pass the S3 file URL if required
            'imageEditPrompt' => $imageEditPrompt,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/product_avatar/task/image_replace/submit',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
            'Topview-Uid: 7QNjCZNYupL0K16uus9v',
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            return response()->json(['error' => curl_error($curl)], 500);
        }

        curl_close($curl);

        return response()->json(json_decode($response, true));
       
    }

    public function uploadProductImg(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('product_images', 'public');
            $url = asset('/' . $path);
            return response()->json(['fileId' => $url], 200);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function checkVideoStatus($taskId)
    {
        $url = "https://api.topview.ai/v1/video_avatar/task/query?taskId={$taskId}&needCloudFrontUrl=true";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
            'Topview-Uid: 7QNjCZNYupL0K16uus9v'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
        // dd($response);
        return response()->json(json_decode($response, true));
    }

    public function all_anyshoot_templete()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/product_anyShoot/template/category/list',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
            'Topview-Uid: 7QNjCZNYupL0K16uus9v'
        ),
        ));

        $categories = json_decode(curl_exec($curl), true);

        curl_close($curl);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.topview.ai/v1/product_anyShoot/template/list?categoryIds=&style=&pageNo&pageSize',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
            'Topview-Uid: 7QNjCZNYupL0K16uus9v'
        ),
        ));

        $template_list = json_decode(curl_exec($curl), true);
        curl_close($curl);
      
        return view('user.topview.all-anyshoot-template',compact('categories','template_list')); // Make sure this Blade file exists
    }
    
    public function loadMoreAnyshootTemplates(Request $request)
    {
        $page = $request->input('page', 1);
        $categoryId = $request->input('category_id', '');

        $apiUrl = "https://api.topview.ai/v1/product_anyShoot/template/list?categoryIds={$categoryId}&style=&pageNo={$page}&pageSize=10";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
                'Topview-Uid: 7QNjCZNYupL0K16uus9v'
            ]
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);
        
        return response()->json([
            'templates' => $data['result']['data'] ?? []
        ]);
    }

    public function generateMarketingVideo(Request $request)
    {
        $avatarSourceFrom = $request->avatarSourceFrom;
        $videoFileId = $request->videoFileId;
        $aiAvatarId = $request->aiAvatarId;

        $audioSourceFrom = $request->audioSourceFrom;
        $audioFileId = $request->audioFileId;
        $ttsText = $request->ttsText;
        $voiceoverId = $request->voiceoverId;

        $payload = [
            'avatarSourceFrom' => $avatarSourceFrom,
            'audioSourceFrom' => $audioSourceFrom,
        ];

        if ($avatarSourceFrom == 0) {
            $payload['videoFileId'] = $videoFileId;
        } else {
            $payload['aiAvatarId'] = $aiAvatarId;
        }

        if ($audioSourceFrom == 0) {
            $payload['audioFileId'] = $audioFileId;
        } else {
            $payload['ttsText'] = $ttsText;
            if ($avatarSourceFrom == 0) {
                $payload['voiceoverId'] = $voiceoverId;
            } else {
                $payload['voiceoverId'] = null; // use default tone
            }
        }

        $response = Http::withHeaders([
            'Topview-Uid' => '7QNjCZNYupL0K16uus9v', // Store in .env
            'Authorization' => 'Bearer sk-LD3a3Aa2JekwxJwt6ovuJLhe-HrY-jdYIVJ6ih6tcHY',
            'Content-Type' => 'application/json',
        ])->post('https://api.topview.ai/v1/video_avatar/task/submit', $payload);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json([
                'error' => true,
                'message' => $response->json()['message'] ?? 'Failed to generate video',
            ], $response->status());
        }
    }

    public function allProject()
    {
        return view('user.topview.all-project'); // Make sure this Blade file exists
    }
}   