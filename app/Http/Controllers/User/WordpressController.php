<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\ExtensionSetting;
use Illuminate\Http\Request;
use App\Models\UserIntegration;
use App\Models\Integration;
use App\Models\SubscriptionPlan;
use App\Models\WordpressPost;
use App\Models\Content;
use Carbon\Carbon;
use Exception;
use Yajra\DataTables\DataTables;

class WordpressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = WordpressPost::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $actionBtn = '<div>
                                            <a href="'. route("user.integration.wordpress.post.show", $row["id"] ). '"><i class="fa-solid fa-file-lines table-action-buttons edit-action-button" title="'. __('View Post') .'"></i></a>
                                            <a class="deleteResultButton" id="'. $row["id"] .'" href="#"><i class="fa-solid fa-trash-xmark table-action-buttons delete-action-button" title="'. __('Delete Post') .'"></i></a> 
                                        </div>';
                        return $actionBtn;
                    })
                    ->addColumn('created-on', function($row){
                        $created_on = '<span class="font-weight-bold">'.date_format($row["created_at"], 'd/m/Y').'</span><br><span class="text-muted">'.date_format($row["created_at"], 'H:i A').'</span>';
                        return $created_on;
                    })
                    ->addColumn('publish', function($row){
                        $created_on = '<span class="font-weight-bold">'.date_format(Carbon::createFromFormat('d/m/Y H:i', $row["scheduled_at"]), 'd/m/Y').'</span><br><span class="text-muted">'.date_format(Carbon::createFromFormat('d/m/Y H:i', $row["scheduled_at"]), 'H:i A').'</span>';
                        return $created_on;
                    })
                    ->addColumn('custom-post-status', function($row){                        
                        return ucfirst($row['post_status']);
                    })
                    ->addColumn('custom-status', function($row){                        
                        return ucfirst($row['status']);
                    })
                    ->rawColumns(['actions', 'created-on', 'publish', 'custom-status', 'custom-post-status'])
                    ->make(true);
                    
        }

        $websites = UserIntegration::where('app', 'wordpress')->where('user_id', auth()->user()->id)->get();
        $wordpress = ($websites) ? true : false;

        $setting = ExtensionSetting::first();

        if (is_null(auth()->user()->plan_id)) {
            $website_number = $setting->integration_wordpress_website_numbers;
        } else {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->wordpress_website_number)) {
                $website_number = $plan->wordpress_website_number;
            } else {
                $website_number = $setting->integration_wordpress_website_numbers;
            }
        }

        if (is_null(auth()->user()->plan_id)) {
            $post_number = $setting->integration_wordpress_post_numbers;
        } else {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->wordpress_post_number)) {
                $post_number = $plan->wordpress_post_number;
            } else {
                $post_number = $setting->integration_wordpress_post_numberss;
            }
        }

        return view('user.integration.wordpress.index', compact('wordpress', 'websites', 'website_number', 'post_number'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createWebsite()
    {
        $wordpress = Integration::where('app', 'wordpress')->first();
        $fields = json_decode($wordpress->fields, true);

        $setting = ExtensionSetting::first();
        $current = UserIntegration::where('app', 'wordpress')->where('user_id', auth()->user()->id)->count();
        $status = false;

        if (is_null(auth()->user()->plan_id)) {
            $status = ($current < $setting->integration_wordpress_website_numbers) ? true : false;
        } else {
            $plan = SubscriptionPlan::where('id', auth()->user()->plan_id)->first();
            if (!is_null($plan->wordpress_website_number)) {
                $status = ($current < $plan->wordpress_website_number) ? true : false;
            } else {
                $status = ($current < $setting->integration_wordpress_website_numbers) ? true : false;
            }
        }

        if ($status) {
            return view('user.integration.wordpress.create', compact('fields'));
        } else {
            toastr()->warning(__('You have reached your WP website limit, edit or delete current ones'));
            return redirect()->route('user.integration.wordpress');
        }

        
    }


    public function storeWebsite(Request $request)
    {   
        $credentials = [];
        $token = '';
        $status = (request('status') == 'on') ? true : false;
        $wordpress = Integration::where('app', 'wordpress')->first();
        $fields = json_decode($wordpress->fields);

        if ($status) {
            $verify = $this->checkWordpress($request->url, $request->username, $request->password);
            if(isset($verify['status'])) {
                if ($verify['status'] == 'error') {
                    toastr()->error(__($verify['error_description']));
                    return redirect()->back();
                }
            }
            
            if(isset($verify['jwt_token'])) {
                $token = $verify['jwt_token'];
            } else {
                toastr()->error(__('Incorrect WP credentials provided, please recheck them'));
                return redirect()->back();
            }
           
        }

        foreach ($fields as $field) {
            $credentials[$field->name] = request($field->name);
        }

        if ($status) {
            $credentials['jwt_token'] = $token;
        }  

        $credentials = json_encode($credentials);

        $website = new UserIntegration([
            'user_id' => auth()->user()->id,
            'app' => 'wordpress',
            'credentials' => $credentials,
            'status' => $status, 
        ]); 
        
        $website->save(); 

        toastr()->success(__('Wordpress website successfully added'));
        return redirect()->route('user.integration.wordpress');
        

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editWebsite($id)
    {
        $wordpress = Integration::where('app', 'wordpress')->first();
        $fields = json_decode($wordpress->fields, true);

        $current = UserIntegration::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($current) {
            $credentials = json_decode($current->credentials, true);
        } else {
            return redirect()->back();
        }

        return view('user.integration.wordpress.edit', compact('id', 'fields', 'credentials', 'current'));
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateWebsite(Request $request, UserIntegration $id)
    {   
        $credentials = [];
        $token = '';
        $status = (request('status') == 'on') ? true : false;
        $wordpress = Integration::where('app', 'wordpress')->first(); 
        $fields = json_decode($wordpress->fields);

        if ($status) {
            $verify = $this->checkWordpress($request->url, $request->username, $request->password);
            if(isset($verify['status'])) {
                if ($verify['status'] == 'error') {
                    toastr()->error(__($verify['error_description']));
                    return redirect()->back();
                }
            }
            
            if(isset($verify['jwt_token'])) {
                $token = $verify['jwt_token'];
            } else {
                toastr()->error(__('Incorrect WP credentials provided, please recheck them'));
                return redirect()->back();
            }
        }

        foreach ($fields as $field) {
            $credentials[$field->name] = request($field->name);
        }

        if ($status) {
            $credentials['jwt_token'] = $token;
        }  

        $credentials = json_encode($credentials);

        $current = UserIntegration::where('id', $id->id)->where('user_id', auth()->user()->id)->first();
        
        if ($current) {

            $current->update([
                'credentials' => $credentials,
                'status' => $status
            ]); 

            toastr()->success(__('Website credentials were successfully updated'));
            return redirect()->route('user.integration.wordpress');

        } 

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteWebsite($id)
    {
        $website = UserIntegration::where('id', $id)->where('user_id', auth()->user()->id)->first();

        if ($website) {
            $website->delete();
            toastr()->success(__('Website successfully deleted'));
            return redirect()->route('user.integration.wordpress');
        } else {
            return redirect()->route('user.integration.wordpress');
        }

    }


    public function checkWordpress($domain, $username, $password)
    {

        $process = curl_init($domain . '/wp-json/api/v1/token');

        $data = array('username' => $username, 'password' => $password);
        $data_string = json_encode($data);

        curl_setopt($process, CURLOPT_TIMEOUT, 60);
        curl_setopt($process, CURLOPT_POST, 1);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($process, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );

        $return = curl_exec($process);
        $result = json_decode($return, true);
        curl_close($process);

        return $result;
    }


    /**
     * Create a complete WordPress post with all available options
     * 
     * @param string $title Post title
     * @param string $content Post content
     * @param string $excerpt Post excerpt
     * @param string $slug Post slug (URL)
     * @param array $categories Array of category IDs or names
     * @param array $tags Array of tag names
     * @param string $featured_image_path Path to featured image file
     * @param string $status Post status (publish, draft, pending, private)
     * @param array $custom_fields Array of custom fields (meta data)
     * @return array Response with status and message
     */
    public static function createWordpressPost($title, $content, $excerpt = '', $slug = '', $categories = [], $tags = [], $featured_image_path = null, $status = 'publish', $custom_fields = [], $filename = null, $filetype = null)
    {
        $current = UserIntegration::where('app', 'wordpress')->where('user_id', auth()->user()->id)->first();

        if (!$current) {
            return [
                'status' => 'error',
                'message' => __('Make sure to setup your WordPress credentials first and enable this integration')
            ];
        }

        if (!$current->status) {
            return [
                'status' => 'error',
                'message' => __('You have deactivated WordPress integration, make sure to enable it first')
            ];
        }

        try {
            $credentials = json_decode($current->credentials);
            
            // Generate slug from title if not provided
            if (empty($slug)) {
                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
            }
            
            // Prepare post data
            $postData = [
                'title' => $title,
                'content' => $content,
                'slug' => $slug,
                'status' => $status
            ];
            
            // Add excerpt if provided
            if (!empty($excerpt)) {
                $postData['excerpt'] = $excerpt;
            }
            
            // Add categories if provided - check if we need to create new categories
            if (!empty($categories)) {
                // First, get existing categories to check if we need to create new ones
                $existingCategories = self::getCategories($credentials);
                $categoryIds = [];
                
                foreach ($categories as $category) {
                    if (is_numeric($category)) {
                        // If it's already an ID, just add it
                        $categoryIds[] = (int)$category;
                    } else {
                        // Check if this category name exists
                        $found = false;
                        foreach ($existingCategories as $existingCat) {
                            if (strtolower($existingCat['name']) === strtolower($category)) {
                                $categoryIds[] = (int)$existingCat['id'];
                                $found = true;
                                break;
                            }
                        }
                        
                        // If not found and we should create it
                        if (!$found) {
                            $newCatId = self::createCategory($credentials, $category);
                            if ($newCatId) {
                                $categoryIds[] = $newCatId;
                            }
                        }
                    }
                }
                
                if (!empty($categoryIds)) {
                    $postData['categories'] = $categoryIds;
                }
            }
            
            // Add tags if provided
            if (!empty($tags)) {
                // For tags, WordPress will automatically create new ones if they don't exist
                // We just need to make sure they're properly formatted
                $tagIds = [];
                $tagNames = [];
                
                foreach ($tags as $tag) {
                    if (is_numeric($tag)) {
                        $tagIds[] = (int)$tag;
                    } else {
                        $tagNames[] = $tag;
                    }
                }
                
                // If we have tag IDs, use those
                if (!empty($tagIds)) {
                    $postData['tags'] = $tagIds;
                }
                
                // If we have tag names, create them first
                if (!empty($tagNames)) {
                    $createdTagIds = self::createTags($credentials, $tagNames);
                    if (!empty($createdTagIds)) {
                        if (isset($postData['tags'])) {
                            $postData['tags'] = array_merge($postData['tags'], $createdTagIds);
                        } else {
                            $postData['tags'] = $createdTagIds;
                        }
                    }
                }
            }
            
            // Add custom fields if provided
            if (!empty($custom_fields)) {
                $postData['meta'] = $custom_fields;
            }
            
            // Create the post
            $postResponse = self::createUserPost($credentials, $postData);

            // If post creation failed, return the error
            if ($postResponse['status'] === 'error') {
                return $postResponse;
            }


            // If featured image is provided, upload and set it
            if (!is_null($featured_image_path) && isset($postResponse['post_id'])) {

                $imageResponse = self::uploadFeaturedImage($credentials, $featured_image_path, $postResponse['post_id'], $filename, $filetype);

                if ($imageResponse['status'] === 'error') {
                    // Post was created but image upload failed
                    return [
                        'status' => 'partial',
                        'message' => __('Post created successfully but featured image upload failed: ') . $imageResponse['message'],
                        'post_id' => $postResponse['post_id'],
                        'post_url' => $postResponse['post_url'] ?? null
                    ];
                }
            }
            
            return [
                'status' => 'success',
                'message' => __('Post created successfully'),
                'post_id' => $postResponse['post_id'],
                'post_url' => $postResponse['post_url'] ?? null
            ];
            
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => __('Error creating WordPress post: ') . $e->getMessage()
            ];
        }
    }

    /**
     * Create a post on WordPress
     * 
     * @param object $credentials WordPress credentials
     * @param array $postData Post data
     * @return array Response with status and message
     */
    private static function createUserPost($credentials, $postData)
    {
        try {
            $process = curl_init($credentials->url . '/wp-json/wp/v2/posts');
            
            $data_string = json_encode($postData);
            
            curl_setopt($process, CURLOPT_TIMEOUT, 60);
            curl_setopt($process, CURLOPT_POST, 1);
            curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($process, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($process, CURLOPT_HTTPHEADER, [                                                                         
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string),
                'Authorization: Bearer ' . $credentials->jwt_token,   
            ]);
            
            $return = curl_exec($process);
            $httpCode = curl_getinfo($process, CURLINFO_HTTP_CODE);
            $result = json_decode($return, true);
            curl_close($process);
            
            if ($httpCode >= 200 && $httpCode < 300) {
                return [
                    'status' => 'success',
                    'post_id' => $result['id'],
                    'post_url' => $result['link'] ?? null,
                    'message' => $result
                ];
            } else {
                $errorMessage = isset($result['message']) ? $result['message'] : 'Unknown error';
                return [
                    'status' => 'error',
                    'message' => $errorMessage,
                    'http_code' => $httpCode
                ];
            }
            
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Upload and set featured image for a post
     * 
     * @param object $credentials WordPress credentials
     * @param string $imagePath Path to image file
     * @param int $postId WordPress post ID
     * @return array Response with status and message
     */
    private static function uploadFeaturedImage($credentials, $imagePath, $postId, $filename, $fileType)
    {
        try {

            $fileData = file_get_contents($imagePath);

            $process = curl_init($credentials->url . '/wp-json/wp/v2/media');
           
            curl_setopt($process, CURLOPT_TIMEOUT, 60);
            curl_setopt($process, CURLOPT_POST, 1);
            curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($process, CURLOPT_POSTFIELDS, $fileData);
            curl_setopt($process, CURLOPT_VERBOSE, true);
            curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($process, CURLOPT_HTTPHEADER, [                                                                         
                'Content-Type: ' . $fileType,
                'Content-Disposition: attachment; filename=' . $filename,
                'Authorization: Bearer ' . $credentials->jwt_token,     
            ]);
            
            $return = curl_exec($process);
            $httpCode = curl_getinfo($process, CURLINFO_HTTP_CODE);
            $result = json_decode($return, true);
            curl_close($process);
            \Log::info($result);
            if ($httpCode < 200 || $httpCode >= 300) {
                $errorMessage = isset($result['message']) ? $result['message'] : 'Unknown error uploading media';
                return [
                    'status' => 'error',
                    'message' => $errorMessage,
                    'http_code' => $httpCode
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }

        try {
            
            $mediaId = $result['id'];
            
            // 2. Set the uploaded media as featured image for the post
            $process = curl_init($credentials->url . '/wp-json/wp/v2/posts/' . $postId);
            
            $data = ['featured_media' => $mediaId];
            $data_string = json_encode($data);
            
            curl_setopt($process, CURLOPT_TIMEOUT, 60);
            curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($process, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($process, CURLOPT_HTTPHEADER, [                                                                         
                'Content-Type: application/json',                                                                                
                'Content-Length: ' . strlen($data_string),
                'Authorization: Bearer ' . $credentials->jwt_token,   
            ]);
            
            $return = curl_exec($process);
            $httpCode = curl_getinfo($process, CURLINFO_HTTP_CODE);
            $result = json_decode($return, true);
            curl_close($process);
            
            if ($httpCode >= 200 && $httpCode < 300) {
                return [
                    'status' => 'success',
                    'media_id' => $mediaId,
                    'message' => 'Featured image set successfully'
                ];
            } else {
                $errorMessage = isset($result['message']) ? $result['message'] : 'Unknown error setting featured image';
                return [
                    'status' => 'error',
                    'message' => $errorMessage,
                    'http_code' => $httpCode
                ];
            }
            
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }


    /**
     * Show the form for creating a new WordPress post
     * 
     * @return \Illuminate\Http\Response
     */
    public function createPost($id)
    {
        $content = Content::where('id', $id)->first();

        $websites = UserIntegration::where('app', 'wordpress')
            ->where('user_id', auth()->user()->id)
            ->where('status', true)
            ->get();
            
        if ($websites->isEmpty()) {
            toastr()->warning(__('You need to set up and enable a WordPress website first'));
            return redirect()->route('user.integration.wordpress');
        }
        
        return view('user.integration.wordpress.create-post', compact('websites', 'content'));
    }


    /**
     * Show the form for creating a new WordPress post
     * 
     * @return \Illuminate\Http\Response
     */
    public function showPost($id)
    {
        $post = WordpressPost::where('id', $id)->where('user_id', auth()->user()->id)->first();

        $websites = UserIntegration::where('app', 'wordpress')
            ->where('user_id', auth()->user()->id)
            ->where('status', true)
            ->get();
            
        if ($websites->isEmpty()) {
            toastr()->warning(__('You need to set up and enable a WordPress website first'));
            return redirect()->route('user.integration.wordpress');
        }
        
        return view('user.integration.wordpress.show-post', compact('websites', 'post'));
    }


    /**
     * Store a new WordPress post
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(Request $request)
    {
  
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120', // 5MB max
        ]);
        
        // Check if user owns this website
        $website = UserIntegration::where('id', $request->website_id)
            ->where('user_id', auth()->user()->id)
            ->where('app', 'wordpress')
            ->first();
            
        if (!$website) {
            toastr()->warning(__('Invalid WordPress website selected'));
            return redirect()->back();
        }
        
        // Handle featured image
        $featuredImagePath = null;
        $filename = null;
        $fileType = null;

        if ($request->hasFile('featured_image')) {

            $target_image_path = request()->file('featured_image')->getRealPath();
            $target_image_extension = request()->file('featured_image')->getClientOriginalExtension();

            $target_name = 'wordpress-' . Str::random(10) . '.' . $target_image_extension;
            Storage::disk('audio')->put('wordpress/' . $target_name, file_get_contents($target_image_path));
            $featuredImagePath = $target_image_path;

            $filename = $target_name;
            $fileType = self::get_mime_type_from_url($target_image_extension);
        }

        // Prepare custom fields
        $customFields = [];
        
        // Add SEO fields if provided
        if ($request->has('custom_fields')) {
            foreach ($request->custom_fields as $key => $value) {
                if (!empty($value)) {
                    $customFields[$key] = $value;
                }
            }
        }

        $categories = ($request->categories) ? explode(',', $request->categories) : [];
        $tags = ($request->tags) ? explode(',', $request->tags) : [];
        $domain = json_decode($website->credentials, true);

        

        if ($request->publish_option == 'immediately') {
            // Create the post
            try {
                $response = self::createWordpressPost(
                    $request->title,
                    $request->content,
                    $request->excerpt,
                    $request->slug,
                    $categories,
                    $tags,
                    $featuredImagePath,
                    $request->status,
                    $customFields,
                    $filename,
                    $fileType
                );
            } catch (Exception $e) {
                \Log::info('ERROR during post: ' . $e->getMessage());
                toastr()->error(__('There was an error during posting content, please contact support'));
                return redirect()->back();
            }
           
            
        } else {
             // Create the scheduled post
            $scheduledPost = new WordpressPost([
                'user_id' => auth()->id(),
                'website_id' => $request->website_id,
                'website_name' => $domain['domain'],
                'platform' => 'wordpress',
                'title' => $request->title,
                'content' => $request->content,
                'excerpt' => $request->excerpt,
                'slug' => $request->slug,
                'categories' => !empty($categories) ? json_encode($categories) : null,
                'tags' => !empty($tags) ? json_encode($tags) : null,
                'featured_image' => $featuredImagePath,
                'post_status' => $request->status,
                'status' => 'scheduled',
                'scheduled_at' => $request->schedule_date,
                'custom_fields' => !empty($customFields) ? json_encode($customFields) : null
            ]);
            
            $scheduledPost->save();

            toastr()->success(__('Post has been successfully scheduled'));
            return redirect()->route('user.integration.wordpress');
        }
        
        
        // Clean up the temporary image file if it exists
        if ($featuredImagePath && file_exists($featuredImagePath)) {
            unlink($featuredImagePath);
        }
        
        if ($response['status'] === 'success') {
            // Create the scheduled post
            $scheduledPost = new WordpressPost([
                'user_id' => auth()->id(),
                'website_id' => $request->website_id,
                'website_name' => $domain['domain'],
                'platform' => 'wordpress',
                'title' => $request->title,
                'content' => $request->content,
                'excerpt' => $request->excerpt,
                'slug' => $request->slug,
                'categories' => !empty($categories) ? json_encode($categories) : null,
                'tags' => !empty($tags) ? json_encode($tags) : null,
                'featured_image' => $featuredImagePath,
                'post_status' => $request->status,
                'status' => 'published',
                'scheduled_at' => date_format(now(), 'd/m/Y H:i'),
                'custom_fields' => !empty($customFields) ? json_encode($customFields) : null
            ]);
            
            $scheduledPost->save();

            toastr()->success(__('Post successfully published to WordPress!'));
            return redirect()->route('user.integration.wordpress');
               
                    
        } elseif ($response['status'] === 'partial') {
            toastr()->success($response['message']);
            return redirect()->route('user.integration.wordpress');
        } else {
            toastr()->error($response['message']);
            return redirect()->back();
        }
    }


    /**
     * Create a new category in WordPress
     * 
     * @param object $credentials WordPress credentials
     * @param string $categoryName Category name
     * @return int|null Category ID or null on failure
     */
    private static function createCategory($credentials, $categoryName)
    {
        try {
            $process = curl_init($credentials->url . '/wp-json/wp/v2/categories');
            
            $data = ['name' => $categoryName];
            $data_string = json_encode($data);
            
            curl_setopt($process, CURLOPT_TIMEOUT, 120);
            curl_setopt($process, CURLOPT_POST, 1);
            curl_setopt($process, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($process, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string),
                'Authorization: Bearer ' . $credentials->jwt_token
            ]);
            
            $return = curl_exec($process);
            $httpCode = curl_getinfo($process, CURLINFO_HTTP_CODE);
            curl_close($process);
            
            if ($httpCode >= 200 && $httpCode < 300) {
                $result = json_decode($return, true);
                return $result['id'] ?? null;
            }
            
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }


    /**
     * Get categories from WordPress
     * 
     * @param object $credentials WordPress credentials
     * @return array Categories
     */
    private static function getCategories($credentials)
    {
        try {
            $process = curl_init($credentials->url . '/wp-json/wp/v2/categories?per_page=100');
            
            curl_setopt($process, CURLOPT_TIMEOUT, 30);
            curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($process, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $credentials->jwt_token
            ]);
            
            $return = curl_exec($process);
            $httpCode = curl_getinfo($process, CURLINFO_HTTP_CODE);
            curl_close($process);
            
            if ($httpCode >= 200 && $httpCode < 300) {
                return json_decode($return, true) ?: [];
            }
            
            return [];
        } catch (\Exception $e) {
            return [];
        }
    }


    /**
     * Create new tags in WordPress
     * 
     * @param object $credentials WordPress credentials
     * @param array $tagNames Array of tag names
     * @return array Array of tag IDs
     */
    private static function createTags($credentials, $tagNames)
    {
        $tagIds = [];
        
        foreach ($tagNames as $tagName) {
            try {
                $process = curl_init($credentials->url . '/wp-json/wp/v2/tags');
                
                $data = ['name' => $tagName];
                $data_string = json_encode($data);
                
                curl_setopt($process, CURLOPT_TIMEOUT, 30);
                curl_setopt($process, CURLOPT_POST, 1);
                curl_setopt($process, CURLOPT_POSTFIELDS, $data_string);
                curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($process, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string),
                    'Authorization: Bearer ' . $credentials->jwt_token
                ]);
                
                $return = curl_exec($process);
                $httpCode = curl_getinfo($process, CURLINFO_HTTP_CODE);
                curl_close($process);
                
                if ($httpCode >= 200 && $httpCode < 300) {
                    $result = json_decode($return, true);
                    if (isset($result['id'])) {
                        $tagIds[] = (int)$result['id'];
                    }
                }
            } catch (\Exception $e) {
                // Just continue with the next tag
                continue;
            }
        }
        
        return $tagIds;
    }


    /**
	*
	* Delete post
	* @param - file id in DB
	* @return - confirmation
	*
	*/
	public function deletePost(Request $request) 
    {
        if ($request->ajax()) {

            $post = WordpressPost::where('id', request('id'))->where('user_id', auth()->user()->id)->first(); 

            if ($post) {
                $post->delete();
                return 'success';                  
            } else {
                return 'error';
            }
              
        }
	}


    public static function get_mime_type_from_url($extension) {
        $mimeTypes = [
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'zip' => 'application/zip',
            'mp3' => 'audio/mpeg',
            'mp4' => 'video/mp4',
            'txt' => 'text/plain',
            'html' => 'text/html',
            'css' => 'text/css',
            'js' => 'application/javascript',
            'json' => 'application/json',
            'xml' => 'application/xml',
        ];
        
        return isset($mimeTypes[$extension]) ? $mimeTypes[$extension] : 'application/octet-stream';
    }


}
