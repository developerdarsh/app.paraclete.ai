<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\LicenseController;
use App\Models\Category;
use App\Models\Videos;
use App\Models\SubscriptionPlan;
use App\Models\PrepaidPlan;
use App\Services\Statistics\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Http;
use App\Models\Subscriber;
use Carbon\Carbon;
use Log;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Payment;
use GuzzleHttp\Client;
use App\Models\MainSetting;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMessage;
use Exception;

class TrainingVideoController extends Controller
{
	private $api;
	private $user;

	public function __construct()
	{
		$this->api = new LicenseController();
		$this->user = new UserService();
	}

	/** 
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$media_category = $request->media_category ? $request->media_category : '';
		$category = Category::all();
		$video_link = $request->video_link;
		$formats=[];
		$title = "";
		if($video_link)
		{
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_link, $match);
			if(!empty($match)){
				$video_id =  $match[1];
				$video = json_decode($this->getVideoInfo($video_id));
				$formats = $video->streamingData->formats;
				$adaptiveFormats = $video->streamingData->adaptiveFormats;
				$thumbnails = $video->videoDetails->thumbnail->thumbnails;
				$title = $video->videoDetails->title;
				$short_description = $video->videoDetails->shortDescription;
				$thumbnail = end($thumbnails)->url;
			}
		}
		// $videos = Videos::join("categories as c", "videos.category", "=", "c.id")
		// 	->select("videos.*", "c.name as category_name");
		// if(!empty($media_category) && $media_category != "all"){
		// 	$videos->where("videos.category",$media_category);
		// }
		// $videos->get();

		$videos = Videos::join("categories as c", "videos.category", "=", "c.id")
			->select("videos.*", "c.name as category_name");

		if (!empty($media_category) && $media_category != "all") {
			$videos->where("videos.category", $media_category);
		}

		$videos = $videos->get()->map(function ($video) {
			
			$video->files = $this->getUrlExtension($video->file_link);
			return $video;
		});
		
		$template = 'user.training_video.video_list';
		if (auth()->user()->hasRole('admin')) {
			$template = 'user.training_video.index';
		}
		return view($template, compact('videos','formats','title','category'));
	}

	function getVideoInfo($video_id){

		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, 'https://www.youtube.com/youtubei/v1/player?key=AIzaSyD6-y8R386qxUfVY8fpHJC04XWfW-rb0s4');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{  "context": {    "client": {      "hl": "en",      "clientName": "WEB",      "clientVersion": "2.20210721.00.00",      "clientFormFactor": "UNKNOWN_FORM_FACTOR",   "clientScreen": "WATCH",      "mainAppWebInfo": {        "graftUrl": "/watch?v='.$video_id.'",           }    },    "user": {      "lockedSafetyMode": false    },    "request": {      "useSsl": true,      "internalExperimentFlags": [],      "consistencyTokenJars": []    }  },  "videoId": "'.$video_id.'",  "playbackContext": {    "contentPlaybackContext": {        "vis": 0,      "splay": false,      "autoCaptionsDefaultOn": false,      "autonavState": "STATE_NONE",      "html5Preference": "HTML5_PREF_WANTS",      "lactMilliseconds": "-1"    }  },  "racyCheckOk": false,  "contentCheckOk": false}');
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
	
		$headers = array();
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		return $result;

	}

	public function list(Request $request)
	{
		$cateogry_ids = [];

		if(!empty($request->category)){
			$cateogry_ids = $request->category;
		}
		
		if ($request->ajax()) {
			$videos_data = Videos::join("categories as c", "videos.category", "=", "c.id")
				->select("videos.*", "c.name as category_name");
			if(!empty($cateogry_ids)){
				$videos_data->whereIn('videos.category', $cateogry_ids);
			}
			$videos = $videos_data->get();

			return DataTables::of($videos)
				->addIndexColumn()
				->addColumn('actions', function ($row) {
					$actionBtn = '<div>
					<a class="deleteResultButton" id="' . $row["id"] . '" href="/app/user/videos/edit/' . $row['id'] . '"><i class="fa-solid fa-edit table-action-buttons delete-action-button" title="Delete Image"></i></a> 
                                            <a class="deleteResultButton" id="' . $row["id"] . '" href="/app/user/videos/delete/' . $row['id'] . '"><i class="fa-solid fa-trash-xmark table-action-buttons delete-action-button" title="Delete Image"></i></a>
                                        </div>';
					return $actionBtn;
				})
				->addColumn('url', function ($row) {
					if($row['section'] == '0'){
						$url = $row['embadded_url'];
					}else{
						$url = $row['file_link'];
					}
					return $url;
				})
				->addColumn('created_at', function ($row) {
					$created_on = '<span class="font-weight-bold">' . date_format($row["created_at"], 'd M Y') . '</span><br><span>' . date_format($row["created_at"], 'H:i A') . '</span>';
					return $created_on;
				})
				->rawColumns(['actions', 'created_at'])
				->make(true);
		}
	}

	/**
	 *
	 * Save changes
	 * @param - file id in DB
	 * @return - confirmation
	 *
	 */
	public function save(Request $request)
	{
		$request->validate([
			"title" => "required",
			"section" => "required",
			"category" => "required",
			"embadded_url" => [
				function ($attribute, $value, $fail) use ($request) {
					$is_video = $request->input('section');
		
					// check if the is_video field is true
					if ($is_video == 0) {
						if (strpos($value, 'youtube.com/watch?v=') === false && strpos($value, 'youtube.com/embed/') === false) {
							$fail('The :attribute must be a valid YouTube video watch or embed link.');
						}

						// Check if the URL already exists
						$videoid = $this->getVideoIdFromUrl($value);
						$videoid = "https://www.youtube.com/embed/".$videoid;
						$video = Videos::where('embadded_url', $videoid);
						// dd($video);
						if ($video->exists()) {
							if ($request->input('id') != $video->first()->id) {
								$fail('The video url has already been taken.');
							}
						}
					}
				},
				
			],
			"file_link" => "required_if:section,1",
		]);

		$youtube_id = $this->getVideoIdFromUrl($request->embadded_url);
		$youtubelink = "https://www.youtube.com/embed/".$youtube_id;

		$video = new Videos;
		$video->title = $request->title;
		$video->section = $request->section;
		$video->category = $request->category;
		$video->embadded_url = $youtubelink;
		$video->file_link = $request->file_link;

		$video->save();
		toastr()->success(__('Video successfully created'));
		return redirect()->route('user.videos');
	}


	/**
	 *
	 * Process media file
	 * @param - file id in DB
	 * @return - confirmation
	 *
	 */
	public function view(Request $request)
	{

	}


	/**
	 *
	 * Delete File
	 * @param - file id in DB
	 * @return - confirmation
	 *
	 */
	public function delete($id)
	{
		$video = Videos::FindOrFail($id);
		if (!empty($video)) {
			$video->delete();
		}
		toastr()->success(__('Video successfully deleted'));
		return redirect()->route('user.videos');
	}

	public function create()
	{
		$category = Category::all();
		return view('user.training_video.create', compact('category'));
	}

	public function edit($id)
	{
		$video = Videos::FindOrFail($id);
		$category = Category::all();
		return view('user.training_video.edit', compact('video', 'category'));
	}

	public function update(Request $request, $id)
	{
		$video = Videos::FindOrFail($id);

		$request->validate([
			"title" => "required",
			"section" => "required",
			"category" => "required",
			"embadded_url" => [
				function ($attribute, $value, $fail) use ($request, $id) {
					$is_video = $request->input('section');
		
					// check if the is_video field is true
					if ($is_video == 0) {
						if (strpos($value, 'youtube.com/watch?v=') === false && strpos($value, 'youtube.com/embed/') === false) {
							$fail('The :attribute must be a valid YouTube video watch or embed link.');
						}
						
						// Check if the URL already exists
						$videoid = $this->getVideoIdFromUrl($value);
						$videoid = "https://www.youtube.com/embed/".$videoid;
						$video = Videos::where('embadded_url', $videoid)->where('id' ,'!=', $id);
						if ($video->exists()) {
							if ($request->input('id') != $video->first()->id) {
								$fail('The video url has already been taken.');
							}
						}
					}
				},
				
			],
			"file_link" => "required_if:section,1",
		]);

		$youtube_id = $this->getVideoIdFromUrl($request->embadded_url);
		$youtubelink = "https://www.youtube.com/embed/".$youtube_id;

		$video->title = $request->title;
		$video->section = $request->section;
		$video->category = $request->category;
		$video->embadded_url = $youtubelink;
		$video->file_link = $request->file_link;

		$video->save();
		toastr()->success(__('Video successfully updated.'));
		return redirect()->route('user.videos');
	}

	public function videoDownload(Request $request)
	{
		$video_link = urldecode($request->link);
		$video_title = urldecode($request->title);
		$video_id = $this->getYouTubeVideoId($video_link);
		$video_link = "https://www.youtube.com/watch?v=".$video_id;
		$formats=[];
		$title = "";
		if($video_link)
		{
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_link, $match);
			if(!empty($match)){
				$video_id =  $match[1];
				$video = json_decode($this->getVideoInfo($video_id));
				$formats = $video->streamingData->formats;
				$adaptiveFormats = $video->streamingData->adaptiveFormats;
				$thumbnails = $video->videoDetails->thumbnail->thumbnails;
				$title = $video->videoDetails->title;
				$short_description = $video->videoDetails->shortDescription;
				$thumbnail = end($thumbnails)->url;
			}
		}

		if(@$formats[0]->url == ""){
			$signature = "https://example.com?".$formats[0]->signatureCipher;
			parse_str( parse_url( $signature, PHP_URL_QUERY ), $parse_signature );
			$url = $parse_signature['url']."&sig=".$parse_signature['s'];
		}else{
			$url = $formats[0]->url;
		}

		$downloadURL = urldecode($url);
		$type = ".mp4";
		$fileName = $video_title.$type;


		if (!empty($downloadURL) && substr($downloadURL, 0, 8) === 'https://') {
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment;filename=\"$fileName\"");
			header("Content-Transfer-Encoding: binary");

			readfile($downloadURL);
		}

	}

	public function pdfDownload(Request $request)
	{
		$downloadURL = urldecode($request->link);
		$type = urldecode($request->type);
		$title = urldecode($request->title);
		$fileName = $title.'.'.$type;
		if (!empty($downloadURL) && substr($downloadURL, 0, 8) === 'https://') {
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment;filename=\"$fileName\"");
			header("Content-Transfer-Encoding: binary");

			readfile($downloadURL);

		}
	}

function getUrlExtension($url) {
    $path = parse_url($url, PHP_URL_PATH);
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    return $ext;
}

function getYouTubeVideoId($url) {
    $pattern = '#^https?://(?:www\.)?youtube\.com/embed/([\w\-]+)#';
    preg_match($pattern, $url, $matches);
    return $matches[1] ?? null;
}

function getVideoIdFromUrl($url)
{
    $video_id = false;
    $url_components = parse_url($url);
    if (isset($url_components['query'])) {
        parse_str($url_components['query'], $query_params);
        if (isset($query_params['v'])) {
            $video_id = $query_params['v'];
        }
    } else if (preg_match('/\/embed\/([^\/]+)/', $url, $matches)) {
        $video_id = $matches[1];
    } else if (preg_match('/\/v\/([^\/]+)/', $url, $matches)) {
        $video_id = $matches[1];
    } else if (preg_match('/\/watch\/([^\/]+)/', $url, $matches)) {
        $video_id = $matches[1];
    } else if (preg_match('/\/watch\?([^\/]+)/', $url, $matches)) {
        parse_str($matches[1], $query_params);
        if (isset($query_params['v'])) {
            $video_id = $query_params['v'];
        }
    }
    return $video_id;
}
public function mediaEditor(Request $request)
{
	return view('user.training_video.media-editor');
}

public function rssFeed(Request $request)
{
	$apikey = config('services.feed.key');
    $apiSecret = config('services.feed.secret');
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://api.rss.app/v1/bundles?limit=10',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer ' .$apikey. ':' . $apiSecret
		),
	));

	$response 	= curl_exec($curl);
	$result 	= json_decode($response, true);
	$dataSet  	= $result['data'];
	
	curl_close($curl);
    return view('user.training_video.rss-feed' , compact('dataSet'));

}

public function searchFeeds(Request $request){
    $query = $request->input('query');
	$results = '';
    $feedUrls = array();
    $apikey = config('services.feed.key');
    $apiSecret = config('services.feed.secret');

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.rss.app/v1/feeds?limit=100',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' .$apikey. ':' . $apiSecret
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $data = json_decode($response, true);
	
    if (is_array($data) && isset($data['data']) && is_array($data['data'])) {
        foreach ($data['data'] as $feed) {
            if (isset($feed['rss_feed_url'])) {
                $feedUrls[] = $feed['rss_feed_url'];
            }
        }
    }
    
    foreach ($feedUrls as $feedUrl) {
        $response = Http::get($feedUrl);
        if ($response->successful()) {
            $rssContent = $response->body();
            $rss = simplexml_load_string($rssContent);
            foreach ($rss->channel->item as $item) {
                if (stripos($item->title, $query) !== false || stripos($item->description, $query) !== false) {
                    $results .= '<h2>' . $item->title . '</h2>';
                    $results .= '<p>' . $item->description . '</p>';
                    $results	 .= '<a href="' . $item->link . '" target="_blank">Read more</a>';
                }
            }
        }
    }

    if (!empty($results)) {
        return response()->json(['results' => $results]);
    } else {
        return response()->json(['results' => 'No results found for your query.']);
    }

}

	public function viewSmartAds(Request $request){
		
		if(auth()->user()->plan_id != null){
			$plan_id = auth()->user()->plan_id;
			$plans = SubscriptionPlan::where('status', 'active')->where('smart_ads_feature', 1)->get();
			$planIdAvailable = $plans->contains('id', $plan_id);
			if ($planIdAvailable) {
				return view('user.training_video.smart-ad');
			} else {

				if (auth()->user()->hidden_plan) {
					$monthly = SubscriptionPlan::where('payment_frequency', 'monthly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->count();
					$yearly = SubscriptionPlan::where('payment_frequency', 'yearly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->count();
					$lifetime = SubscriptionPlan::where('payment_frequency', 'lifetime')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->count();
				} else {
					$monthly = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'monthly')->where('smart_ads_feature', 1)->count();
					$yearly = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'yearly')->where('smart_ads_feature', 1)->count();
					$lifetime = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'lifetime')->where('smart_ads_feature', 1)->count();
				}
					
				$prepaid = PrepaidPlan::where('status', 'active')->count();

				if (auth()->user()->hidden_plan) {
					$monthly_subscriptions = SubscriptionPlan::where('payment_frequency', 'monthly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->get();
					$yearly_subscriptions = SubscriptionPlan::where('payment_frequency', 'yearly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->get();
					$lifetime_subscriptions = SubscriptionPlan::where('payment_frequency', 'lifetime')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->get();
				} else {
					$monthly_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'monthly')->where('smart_ads_feature', 1)->get();
					$yearly_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'yearly')->where('smart_ads_feature', 1)->get();
					$lifetime_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'lifetime')->where('smart_ads_feature', 1)->get();
				}
				
				$prepaids = PrepaidPlan::where('status', 'active')->get();

				if (!is_null(auth()->user()->plan_id)) {
					$plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
				} else {
					$plan = null;
				}

				$subscriber = Subscriber::where('user_id', auth()->user()->id)->where('status', 'Active')->first();
				if ($subscriber) {
					$date = Carbon::createFromFormat('Y-m-d H:i:s', $subscriber->active_until)->format('M d');
					$time = Carbon::createFromFormat('Y-m-d H:i:s', $subscriber->active_until)->format('H:i A');
				} else {
					$date = null;
					$time = null;
				}
				return view('user.plans.index', compact('monthly', 'yearly', 'monthly_subscriptions', 'yearly_subscriptions', 'prepaids', 'prepaid', 'lifetime', 'lifetime_subscriptions', 'plan', 'date', 'time', 'subscriber'));
			}	
		}
		else{

			if (auth()->user()->hidden_plan) {
				$monthly = SubscriptionPlan::where('payment_frequency', 'monthly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->count();
				$yearly = SubscriptionPlan::where('payment_frequency', 'yearly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->count();
				$lifetime = SubscriptionPlan::where('payment_frequency', 'lifetime')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->count();
			} else {
				$monthly = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'monthly')->where('smart_ads_feature', 1)->count();
				$yearly = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'yearly')->where('smart_ads_feature', 1)->count();
				$lifetime = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'lifetime')->where('smart_ads_feature', 1)->count();
			}
					
			$prepaid = PrepaidPlan::where('status', 'active')->count();

			if (auth()->user()->hidden_plan) {
				$monthly_subscriptions = SubscriptionPlan::where('payment_frequency', 'monthly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->get();
				$yearly_subscriptions = SubscriptionPlan::where('payment_frequency', 'yearly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->get();
				$lifetime_subscriptions = SubscriptionPlan::where('payment_frequency', 'lifetime')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('smart_ads_feature', 1)->get();
			} else {
				$monthly_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'monthly')->where('smart_ads_feature', 1)->get();
				$yearly_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'yearly')->where('smart_ads_feature', 1)->get();
				$lifetime_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'lifetime')->where('smart_ads_feature', 1)->get();
			}
				
			$prepaids = PrepaidPlan::where('status', 'active')->get();

			if (!is_null(auth()->user()->plan_id)) {
				$plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
			} else {
				$plan = null;
			}

			$subscriber = Subscriber::where('user_id', auth()->user()->id)->where('status', 'Active')->first();
			if ($subscriber) {
				$date = Carbon::createFromFormat('Y-m-d H:i:s', $subscriber->active_until)->format('M d');
				$time = Carbon::createFromFormat('Y-m-d H:i:s', $subscriber->active_until)->format('H:i A');
			} else {
				$date = null;
				$time = null;
			}
			return view('user.plans.index', compact('monthly', 'yearly', 'monthly_subscriptions', 'yearly_subscriptions', 'prepaids', 'prepaid', 'lifetime', 'lifetime_subscriptions', 'plan', 'date', 'time', 'subscriber'));
		}      

		
	}

	public function viewElementor(Request $request){
		return view('user.training_video.elementor');

	}

	public function automation(Request $request){
		$client = new Client();
		$response = $client->post('https://api.anthropic.com/v1/messages', [
                'headers' => [
                    'Authorization' => 'Bearer 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',
                    'Content-Type'  => 'application/json',
                    'anthropic-version' => '2023-06-01'
                ],
                'json' => [
                    'model' => 'claude-2',
                    'max_tokens' => 100,
                    'messages' => [
                        ['role' => 'user', 'content' => 'what is php']
                    ]
                ]
            ]);
		dd($response);
        if(auth()->user()->plan_id != null){
			$plan_id = auth()->user()->plan_id;
			$plans = SubscriptionPlan::where('status', 'active')->where('automation_feature', 1)->get();

			$planIdAvailable = $plans->contains('id', $plan_id);

			if ($planIdAvailable) {
				return view('user.training_video.automation');
			} else {
				if (auth()->user()->hidden_plan) {
					$monthly = SubscriptionPlan::where('payment_frequency', 'monthly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->count();
					$yearly = SubscriptionPlan::where('payment_frequency', 'yearly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->count();
					$lifetime = SubscriptionPlan::where('payment_frequency', 'lifetime')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->count();
				} else {
					$monthly = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'monthly')->where('automation_feature', 1)->count();
					$yearly = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'yearly')->where('automation_feature', 1)->count();
					$lifetime = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'lifetime')->where('automation_feature', 1)->count();
				}
					
				$prepaid = PrepaidPlan::where('status', 'active')->count();

				if (auth()->user()->hidden_plan) {
					$monthly_subscriptions = SubscriptionPlan::where('payment_frequency', 'monthly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->get();
					$yearly_subscriptions = SubscriptionPlan::where('payment_frequency', 'yearly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->get();
					$lifetime_subscriptions = SubscriptionPlan::where('payment_frequency', 'lifetime')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->get();
				} else {
					$monthly_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'monthly')->where('automation_feature', 1)->get();
					$yearly_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'yearly')->where('automation_feature', 1)->get();
					$lifetime_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'lifetime')->where('automation_feature', 1)->get();
				}
				
				$prepaids = PrepaidPlan::where('status', 'active')->get();

				if (!is_null(auth()->user()->plan_id)) {
					$plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
				} else {
					$plan = null;
				}

				$subscriber = Subscriber::where('user_id', auth()->user()->id)->where('status', 'Active')->first();
				if ($subscriber) {
					$date = Carbon::createFromFormat('Y-m-d H:i:s', $subscriber->active_until)->format('M d');
					$time = Carbon::createFromFormat('Y-m-d H:i:s', $subscriber->active_until)->format('H:i A');
				} else {
					$date = null;
					$time = null;
				}
				return view('user.plans.index', compact('monthly', 'yearly', 'monthly_subscriptions', 'yearly_subscriptions', 'prepaids', 'prepaid', 'lifetime', 'lifetime_subscriptions', 'plan', 'date', 'time', 'subscriber'));
			}
		}
		else{

			if (auth()->user()->hidden_plan) {
				$monthly = SubscriptionPlan::where('payment_frequency', 'monthly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->count();
				$yearly = SubscriptionPlan::where('payment_frequency', 'yearly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->count();
				$lifetime = SubscriptionPlan::where('payment_frequency', 'lifetime')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->count();
			} else {
				$monthly = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'monthly')->where('automation_feature', 1)->count();
				$yearly = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'yearly')->where('automation_feature', 1)->count();
				$lifetime = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'lifetime')->where('automation_feature', 1)->count();
			}
					
			$prepaid = PrepaidPlan::where('status', 'active')->count();

			if (auth()->user()->hidden_plan) {
				$monthly_subscriptions = SubscriptionPlan::where('payment_frequency', 'monthly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->get();
				$yearly_subscriptions = SubscriptionPlan::where('payment_frequency', 'yearly')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->get();
				$lifetime_subscriptions = SubscriptionPlan::where('payment_frequency', 'lifetime')->where(function ($q) { $q->where('status', 'active')->orWhere('status', 'hidden'); })->where('automation_feature', 1)->get();
			} else {
				$monthly_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'monthly')->where('automation_feature', 1)->get();
				$yearly_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'yearly')->where('automation_feature', 1)->get();
				$lifetime_subscriptions = SubscriptionPlan::where('status', 'active')->where('payment_frequency', 'lifetime')->where('automation_feature', 1)->get();
			}
				
			$prepaids = PrepaidPlan::where('status', 'active')->get();

			if (!is_null(auth()->user()->plan_id)) {
				$plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
			} else {
				$plan = null;
			}

			$subscriber = Subscriber::where('user_id', auth()->user()->id)->where('status', 'Active')->first();
			if ($subscriber) {
				$date = Carbon::createFromFormat('Y-m-d H:i:s', $subscriber->active_until)->format('M d');
				$time = Carbon::createFromFormat('Y-m-d H:i:s', $subscriber->active_until)->format('H:i A');
			} else {
				$date = null;
				$time = null;
			}
			return view('user.plans.index', compact('monthly', 'yearly', 'monthly_subscriptions', 'yearly_subscriptions', 'prepaids', 'prepaid', 'lifetime', 'lifetime_subscriptions', 'plan', 'date', 'time', 'subscriber'));
		}      
	}
	public function pabblyConnect(Request $request){

        return view('user.training_video.zap');
	}

	public function flow_Track_webhook(Request $request) {
        $payload   = $request->all();
    }

	public function handleGHLSignup(Request $request)
    {
		\Log::info($request);

		$user = User::create([
			'name' => $request['full_name'], // Full name from the request array
			'email' => $request['email'], // Email from the request array
			'password' => Hash::make('password'), // Fixed the syntax issue here by removing the extra comma
			'country' => $request['country'], // Country from the request array
		]);

		$product_id = $request['order']['line_item_global_product_ids'][0] ?? null;

		$plan = SubscriptionPlan::where('stripe_gateway_plan_id', $product_id)->first();

		if ($plan) {
			$plan_id = $plan->id; // Retrieve the plan ID
		} else {
			$plan_id = null; // Handle the case where no matching plan is found
		}
		$settings = MainSetting::first();

		$email_opt_in = true; // Assuming they always opt-in
		$referral_code = ($request->hasCookie('referral')) ? $request->cookie('referral') : ''; 
		$referrer = ($referral_code != '') ? User::where('referral_id', $referral_code)->firstOrFail() : null; // Updated to null to avoid errors if not found
		$referrer_id = ($referrer != null) ? $referrer->id : null; // Assign null if no referrer is found

		$status = (config('settings.email_verification') == 'disabled') ? 'active' : 'pending';

        $user->assignRole(config('settings.default_user'));
		$user->status = $status;
        $user->group = config('settings.default_user');
		$user->images = $settings->image_credits;
		$user->tokens = $settings->token_credits;
		$user->characters = config('settings.voiceover_welcome_chars');
		$user->minutes = config('settings.whisper_welcome_minutes');
        $user->default_voiceover_language = config('settings.voiceover_default_language');
        $user->default_voiceover_voice = config('settings.voiceover_default_voice');
        $user->default_template_language = config('settings.default_language');
        $user->default_model_template = config('settings.default_model_user_template');
        $user->default_model_chat = config('settings.default_model_user_bot');
        $user->job_role = 'Happy Person';
        $user->referral_id = strtoupper(Str::random(15));
        $user->referred_by = $referrer_id;
        $user->email_opt_in = $email_opt_in;
		$user->plan_id = $plan_id;
		$user->plan_type = 'paid';
        // $this->addToGetResponse($request->name, $request->email);
        $user->save();   

		// $record_payment = new Payment();
        // $record_payment->user_id = $user->id;
        // $record_payment->plan_id = $plan->id;
        // $record_payment->order_id = $subscriptionID;
        // $record_payment->plan_name = $plan->plan_name;
        // $record_payment->frequency = $plan->payment_frequency;
        // $record_payment->price = $total_price;
        // $record_payment->currency = $plan->currency;
        // $record_payment->gateway = $gateway;
        // $record_payment->status = 'completed';
        // $record_payment->gpt_3_turbo_credits = $plan->gpt_3_turbo_credits;
        // $record_payment->gpt_4_turbo_credits = $plan->gpt_4_turbo_credits;
        // $record_payment->gpt_4_credits = $plan->gpt_4_credits;
        // $record_payment->claude_3_opus_credits = $plan->claude_3_opus_credits;
        // $record_payment->claude_3_sonnet_credits = $plan->claude_3_sonnet_credits;
        // $record_payment->claude_3_haiku_credits = $plan->claude_3_haiku_credits;
        // $record_payment->gemini_pro_credits = $plan->gemini_pro_credits;
        // $record_payment->fine_tune_credits = $plan->fine_tune_credits;
        // $record_payment->dalle_images = $plan->dalle_images;
        // $record_payment->sd_images = $plan->sd_images;
        // $record_payment->characters = $plan->characters;
        // $record_payment->minutes = $plan->minutes;
        // if (session()->has('billing_first_name')) {
        //     $record_payment->billing_first_name = session()->get('billing_first_name');
        // }
        // if (session()->has('billing_last_name')) {
        //     $record_payment->billing_last_name = session()->get('billing_last_name');
        // }
        // if (session()->has('billing_email')) {
        //     $record_payment->billing_email = session()->get('billing_email');
        // }
        // if (session()->has('billing_phone')) {
        //     $record_payment->billing_phone = session()->get('billing_phone');
        // }
        // if (session()->has('billing_city')) {
        //     $record_payment->billing_city = session()->get('billing_city');
        // }
        // if (session()->has('billing_postal_code')) {
        //     $record_payment->billing_postal_code = session()->get('billing_postal_code');
        // }
        // if (session()->has('billing_country')) {
        //     $record_payment->billing_country = session()->get('billing_country');
        // }
        // if (session()->has('billing_address')) {
        //     $record_payment->billing_address = session()->get('billing_address');
        // }
        // if (session()->has('billing_vat_number')) {
        //     $record_payment->billing_vat_number = session()->get('billing_vat_number');
        // }
        // $record_payment->save(); 

		try {
			Mail::to($user)->send(new WelcomeMessage());
		} catch (Exception $e) {
			Log::error('Mail sending failed: ' . $e->getMessage());
		}
  

	}	

}