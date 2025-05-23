<?php

namespace App\Http\Controllers\User;

require_once(base_path('libraries/mpdf/vendor/autoload.php'));


use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\LicenseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SubscriptionPlan;
use App\Models\ApiKey;
use App\Models\User;
use Exception;
use App\Models\EmployeeJob;
use Orhanerday\OpenAi\OpenAi;
use App\Models\ResumeUser;
use App\Models\ResumeUserEmployment;
use App\Models\ResumeUserEducation;
use App\Models\ResumeUserLanguage;
use App\Models\ResumeUserSkill;
use App\Models\ResumeUserSocialLink;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;



class AiResumeController extends Controller
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
        return view('user.resume.index');
    } 

    public function getJobTitles(Request $request)
    {
        $query = $request->input('query');

        // Fetch job titles from the database based on the input query
        $jobTitles = EmployeeJob::where('title', 'like', '%' . $query . '%')->pluck('title');

        return response()->json($jobTitles);
    }

    public function complete(Request $request)
    {
        $open_ai = new OpenAi(auth()->user()->personal_openai_key);   
        $jobTitle = $request->job_title;
       	$prompt = 'As a '.$jobTitle.', please generate some resume objecte and each new object start with ##';
        $prompt1 = 'display List of skills title for a '.$jobTitle.' resume and each new object start with ##';
        $complete = $open_ai->chat([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        "role" => "system",
                        "content" => $prompt,
                    ],
                    [
                        "role" => "user",
                        "content" => "",
                    ],
                ],
                'temperature' => 1,
                'max_tokens' => 3500,
            ]);

        $complete1 = $open_ai->chat([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        "role" => "system",
                        "content" => $prompt1,
                    ],
                    [
                        "role" => "user",
                        "content" => "",
                    ],
                ],
                'temperature' => 1,
                'max_tokens' => 3500,
            ]);    

        $response = json_decode($complete , true);
        $response1 = json_decode($complete1 , true);
        // Access the generated text from the response
        if ((isset($response['choices']) && !empty($response['choices'])) && (isset($response1['choices']) && !empty($response1['choices']))) {
            $generatedText = $response['choices'][0]['message']['content'];
            $skills =  $response1['choices'][0]['message']['content'];
        } else {
            dd('No response or error occurred');
        }
        return response()->json(['objective' => $generatedText , 'skills' => $skills]);
    }  
    public function storeResume(Request $request){
        
        $validatedData = $request->validate([
            'template_image' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

        ], [
            'template_image.required' => 'Please choose a template image.',
            'photo.image' => 'Please upload a valid image file.',
            'photo.mimes' => 'Supported image formats are jpeg, png, jpg, and gif.',
            'photo.max' => 'The image size must not exceed 2MB.',
        ]);

        // Get the job title ID based on the job title name 
        $jobTitleName = $request->input('jobTitleInput');
        $jobTitle = EmployeeJob::where('title', $jobTitleName)->first();

        $base64URL = '';

        if($request->has('photo')){
            $uploadedFile = $request->file('photo');
            $fileContents = file_get_contents($uploadedFile->path());
            $base64Encoded = base64_encode($fileContents);
            $base64URL = 'data:' . $uploadedFile->getClientMimeType() . ';base64,' . $base64Encoded;
        }

        $data=$request->all();

        if($request->input('template_image') == 1){
            $file = 'user.resume.template1';
        }else if($request->input('template_image') == 2){
            $file = 'user.resume.template2';
        }else if($request->input('template_image') == 3){
            $file = 'user.resume.template3';
        }else if($request->input('template_image') == 4){
            $file = 'user.resume.template4';
        }else{
            $file = 'user.resume.template5';
        }
        $view = view($file,compact('data','base64URL'))->render();

        $filename = 'resume-' . time() . '.pdf';
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4' , 'margin_top' => 0 , 'margin_left' => 0 , 'margin_right' => 0]);
        $mpdf->WriteHTML($view);
        $mpdf->Output($filename, 'D');
            
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml($view);
        // $dompdf->setPaper('A4', 'portrait');
        // $dompdf->render();
        // $dompdf->stream();
        // $dompdf->SetFont('Arial');

        // Store basic details
        // $resumeUser = ResumeUser::create([
        //     'job_title_id' => $jobTitle->id,
        //     'first_name' => $request->input('first_name'),
        //     'last_name' => $request->input('last_name'),
        //     'email' => $request->input('email'),
        //     'photo' => $request->input('photo'),
        //     'phone' => $request->input('phone'),
        //     'country' => $request->input('country'),
        //     'city' => $request->input('city'),
        //     'address' => $request->input('address'),
        //     'postal_code' => $request->input('postal_code'),
        //     'linkedin' => $request->input('linkedIn'),
        //     'professional_summary' => $request->input('professional_summary'),
        // ]);

        // Store employment history
        // $employmentHistoryData = $request->only(['emp_job_title', 'emp_employer', 'emp_start_date', 'emp_end_date', 'emp_city', 'emp_description']);
        // $numEmployments = count($employmentHistoryData['emp_job_title']);
        // for ($i = 0; $i < $numEmployments; $i++) {
        //     $employment = new ResumeUserEmployment();
        //     $employment->resume_user_id = $resumeUser->id;
        //     $employment->job_title = $employmentHistoryData['emp_job_title'][$i];
        //     $employment->employer = $employmentHistoryData['emp_employer'][$i];
        //     $employment->start_date = Carbon::parse($employmentHistoryData['emp_start_date'][$i]);
        //     $employment->end_date = Carbon::parse($employmentHistoryData['emp_end_date'][$i]);
        //     $employment->city = $employmentHistoryData['emp_city'][$i];
        //     $employment->description = $employmentHistoryData['emp_description'][$i];
        //     $employment->save();
        // }

        // Create and save education history for the user
        // $educationHistoryData = $request->only(['edu_school', 'edu_degree', 'edu_start_date', 'edu_end_date', 'edu_city', 'edu_description']);
        // $numEducations = count($educationHistoryData['edu_school']);
        // for ($i = 0; $i < $numEducations; $i++) {
        //     $education = new ResumeUserEducation();
        //     $education->resume_user_id = $resumeUser->id;
        //     $education->school = $educationHistoryData['edu_school'][$i];
        //     $education->degree = $educationHistoryData['edu_degree'][$i];
        //     $education->start_date = Carbon::parse($educationHistoryData['edu_start_date'][$i]);
        //     $education->end_date = Carbon::parse($educationHistoryData['edu_end_date'][$i]);
        //     $education->city = $educationHistoryData['edu_city'][$i];
        //     $education->description = $educationHistoryData['edu_description'][$i];
        //     $education->save();
        // }

        // Create and save social links for the user
        // $socialLinkData = $request->only(['link_label', 'link_link']);
        // $numLinks = count($socialLinkData['link_label']);
        // for ($i = 0; $i < $numLinks; $i++) {
        //     $education = new ResumeUserSocialLink();
        //     $education->resume_user_id = $resumeUser->id;
        //     $education->label = $socialLinkData['link_label'][$i];
        //     $education->link = $socialLinkData['link_link'][$i];
        //     $education->save();
        // }

        // $request->input('skill_title');
        // $request->input('skill_level');

        // $request->input('lang_name');
        // $request->input('lang_level');
    }
}
