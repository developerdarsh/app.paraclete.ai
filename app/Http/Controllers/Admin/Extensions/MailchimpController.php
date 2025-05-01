<?php

namespace App\Http\Controllers\Admin\Extensions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtensionSetting;
use App\Models\User;
use DrewM\MailChimp\MailChimp;
use DrewM\MailChimp\Batch;
use Exception;


class MailchimpController extends Controller
{
    public function index()
    {
        $extension = ExtensionSetting::first();

        return view('admin.davinci.configuration.extension.mailchimp.index', compact('extension'));
    }


    public function store(Request $request)
    {
        $this->storeValues(request('mailchimp_api'), 'mailchimp_api');
        $this->storeValues(request('mailchimp_list_id'), 'mailchimp_list_id');

        if (request('users') == 'on') {
            $this->createUsers('user');
        }

        if (request('subscribers') == 'on') {
            $this->createUsers('subscriber');
        }

        toastr()->success(__('Settings have been saved successfully'));
        return redirect()->back();         
    }


    public function createUsers($group)
    {
        $extension = ExtensionSetting::first();

        $mailchimp = new MailChimp($extension->mailchimp_api);
        $batch = $mailchimp->new_batch();
        $list_id = $extension->mailchimp_list_id;

        $users = User::where('group', $group)->get();

        if ($users) {
            foreach ($users as $user) {
                $batch->post("user" . $user->id, "lists/$list_id/members", [
                    'email_address' => $user->email,
                    'status'        => 'subscribed',
                ]);        
            }

            try {

                $result = $batch->execute();

            } catch (Exception $e) {
                \Log::info($e->getMessage());
                toastr()->error($e->getMessage());
                return redirect()->back();  
            }
        }
       
    }


    private function storeValues($value, $field_name)
    {
        $settings = ExtensionSetting::first();
        $settings->update([
            $field_name => $value
        ]);
    }


}


