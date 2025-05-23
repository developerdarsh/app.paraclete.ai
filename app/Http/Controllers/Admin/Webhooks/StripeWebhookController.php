<?php

namespace App\Http\Controllers\Admin\Webhooks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\PaymentProcessed;
use App\Events\PaymentReferrerBonus;
use App\Models\Subscriber;
use App\Models\SubscriptionPlan;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;


class StripeWebhookController extends Controller
{
    /**
     * Stripe Webhook processing, unless you are familiar with 
     * Stripe's PHP API, we recommend not to modify it
     */
    public function handleStripe(Request $request)
    {

        $endpoint_secret = config('services.stripe.webhook_secret');

       
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;


        try {

            $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);

        } catch(\UnexpectedValueException $e) {
            
            exit();

        } catch(\Stripe\Exception\SignatureVerificationException $e) {

            exit();

        }


        switch ($event->type) {
            case 'customer.subscription.deleted':                 
                $subscription = Subscriber::where('subscription_id', $event->data->object->subscription)->firstOrFail();
                $subscription->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                
                $user = User::where('id', $subscription->user_id)->firstOrFail();
                $group = ($user->hasRole('admin'))? 'admin' : 'user';
                if ($group == 'user') {
                    $user->syncRoles($group);    
                    $user->group = $group;
                    $user->plan_id = null;
                    $user->member_limit = null;
                    $user->save();
                } else {
                    $user->syncRoles($group);    
                    $user->group = $group;
                    $user->plan_id = null;
                    $user->save();
                }
           
                break;

            case 'invoice.payment_failed':             
                $subscription = Subscriber::where('subscription_id', $event->data->object->subscription)->firstOrFail();
                $subscription->update(['status'=>'Expired', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                
                $user = User::where('id', $subscription->user_id)->firstOrFail();
                $group = ($user->hasRole('admin'))? 'admin' : 'user';
                if ($group == 'user') {
                    $user->syncRoles($group);    
                    $user->group = $group;
                    $user->plan_id = null;
                    $user->member_limit = null;
                    $user->save();
                } else {
                    $user->syncRoles($group);    
                    $user->group = $group;
                    $user->plan_id = null;
                    $user->save();
                }
          
                break;

            case 'invoice.paid':

                $subscription = Subscriber::where('subscription_id', $event->data->object->subscription)->firstOrFail();

                if ($subscription) {
                    $plan = SubscriptionPlan::where('id', $subscription->plan_id)->firstOrFail();
                    $duration = ($plan->payment_frequency == 'monthly') ? 30 : 365;

                    $subscription->update(['status'=>'Active', 'active_until' => Carbon::now()->addDays($duration)]);
                    
                    $user = User::where('id', $subscription->user_id)->firstOrFail();

                    $tax_value = (config('payment.payment_tax') > 0) ? $plan->price * config('payment.payment_tax') / 100 : 0;
                    $total_price = $tax_value + $plan->price;

                    if (config('payment.referral.enabled') == 'on') {
                        if (config('payment.referral.payment.policy') == 'first') {
                            if (Payment::where('user_id', $user->id)->where('status', 'completed')->exists()) {
                                /** User already has at least 1 payment */
                            } else {
                                event(new PaymentReferrerBonus($user, $event->data->object->id, $total_price, 'Stripe'));
                            }
                        } else {
                            event(new PaymentReferrerBonus($user, $event->data->object->id, $total_price, 'Stripe'));
                        }
                    }

                    $payment = Payment::where('order_id', $event->data->object->id)->first();

                    if (!$payment) {
                        $record_payment = new Payment();
                        $record_payment->user_id = $user->id;
                        $record_payment->plan_id = $plan->id;
                        $record_payment->order_id = $event->data->object->id;
                        $record_payment->plan_name = $plan->plan_name;
                        $record_payment->price = $total_price;
                        $record_payment->currency = $plan->currency;
                        $record_payment->gateway = 'Stripe';
                        $record_payment->frequency = $plan->payment_frequency;
                        $record_payment->status = 'completed';
                        $record_payment->tokens = $plan->token_credits;
                        $record_payment->characters = $plan->characters;
                        $record_payment->minutes = $plan->minutes;
                        $record_payment->images = $plan->image_credits;
                        $record_payment->save();
    
                        $group = ($user->hasRole('admin')) ? 'admin' : 'subscriber';
    
                        $user->syncRoles($group);    
                        $user->group = $group;
                        $user->plan_id = $plan->id;
                        $user->tokens = $plan->token_credits;
                        $user->characters = $plan->characters;
                        $user->minutes = $plan->minutes;
                        $user->images = $plan->image_credits;
                        $user->member_limit = $plan->team_members;
                        $user->save();       
    
                        event(new PaymentProcessed($user));
                    }
 
                }

                header("Status: 200 All rosy");
                
                break;

        }
    }
}
