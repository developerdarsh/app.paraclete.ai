<?php

namespace App\Http\Controllers\Admin\Webhooks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\PaymentProcessed;
use App\Events\PaymentReferrerBonus;
use App\Models\Subscriber;
use App\Models\SubscriptionPlan;
use App\Models\PrepaidPlan;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;
use YooKassa\Model\PaymentStatus;
use YooKassa\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccess;
use App\Mail\NewPaymentNotification;
use Exception;


class YookassaWebhookController extends Controller
{

    public function handleYookassa(Request $request)
    {
            
        $client = new Client();
        $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.secret_key'));
        
        if ($request->event == 'payment.succeeded') {

            $order_id = $request->object['id'];

            $payment = Payment::where('order_id', $order_id)->firstOrFail();
            $payment->status = 'completed'; 
            $payment->save();

            if ($payment->frequency != 'prepaid') {
                $subscriber = Subscriber::where('subscription_id', $order_id)->firstOrFail(); 
                $subscriber->status = 'Active';
                $subscriber->save();
            }
           
            if ($payment) {

                if ($payment->frequency != 'prepaid') {
                    $plan = SubscriptionPlan::where('id', $payment->plan_id)->firstOrFail(); 
                } else {
                    $plan = PrepaidPlan::where('id', $payment->plan_id)->firstOrFail(); 
                }               

                $user = User::where('id', $payment->user_id)->firstOrFail();

                $tax_value = (config('payment.payment_tax') > 0) ? $plan->price * config('payment.payment_tax') / 100 : 0;
                $total_price = $tax_value + $plan->price;

                if (config('payment.referral.enabled') == 'on') {
                    if (config('payment.referral.payment.policy') == 'first') {
                        if (Payment::where('user_id', $user->id)->where('status', 'completed')->exists()) {
                            /** User already has at least 1 payment */
                        } else {
                            event(new PaymentReferrerBonus($user, $payment->plan_id, $total_price, 'Yookassa'));
                        }
                    } else {
                        event(new PaymentReferrerBonus($user, $payment->plan_id, $total_price, 'Yookassa'));
                    }
                }   
                
                if ($payment->frequency == 'prepaid') {
                    $user->tokens_prepaid = $user->tokens_prepaid + $plan->tokens;
                    $user->images_prepaid = $user->images_prepaid + $plan->images;
                    $user->characters_prepaid = $user->characters_prepaid + $plan->characters;
                    $user->minutes_prepaid = $user->minutes_prepaid + $plan->minutes;
                } else {
                    $group = ($user->hasRole('admin'))? 'admin' : 'subscriber';
                    $user->syncRoles($group);    
                    $user->group = $group;
                    $user->plan_id = $plan->id;
                    $user->tokens = $plan->token_credits;
                    $user->characters = $plan->characters;
                    $user->minutes = $plan->minutes;
                    $user->images = $plan->image_credits;
                    $user->member_limit = $plan->team_members;
                   
                }
    
                $user->save();

                event(new PaymentProcessed($user));

                try {
                    $admin = User::where('group', 'admin')->first();
                    
                    Mail::to($admin)->send(new NewPaymentNotification($payment));
                    Mail::to($user)->send(new PaymentSuccess($payment));
                } catch (Exception $e) {
                    \Log::info('SMTP settings are not setup to send payment notifications via email');
                }

            }
        
        } elseif ($request->event == 'payment.canceled') {

            $order_id = $request->object['id'];

            $payment = Payment::where('order_id', $order_id)->firstOrFail();
            $payment->status = 'cancelled'; 
            $payment->save();

            if ($payment->frequency != 'prepaid') {
                $subscriber = Subscriber::where('subscription_id', $order_id)->firstOrFail(); 
                $subscriber->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
            }

            $user = User::where('id', $payment->user_id)->firstOrFail();
            $group = ($user->hasRole('admin'))? 'admin' : 'user';

            $user->syncRoles($group);    
            $user->group = $group;
            $user->plan_id = null;
            $user->member_limit = null;
            $user->save();

        
        } elseif ($request->event == 'payment.waiting_for_capture') {
            
            $order_id = $request->object['id'];

        
        } elseif ($request->event == 'refund.succeeded') {

            $order_id = $request->object['id'];

            $payment = Payment::where('order_id', $order_id)->firstOrFail();
            $payment->status = 'cancelled'; 
            $payment->save();

            if ($payment->frequency != 'prepaid') {
                $subscriber = Subscriber::where('subscription_id', $order_id)->firstOrFail(); 
                $subscriber->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
            }

            $user = User::where('id', $payment->user_id)->firstOrFail();

            if ($user) {
                $group = ($user->hasRole('admin'))? 'admin' : 'user';

                $user->syncRoles($group);    
                $user->group = $group;
                $user->plan_id = null;
                $user->member_limit = null;
                $user->save();
            }
            

        }

    }
}
