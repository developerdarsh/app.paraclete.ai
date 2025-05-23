<?php

namespace App\Http\Controllers\User;

use App\Traits\InvoiceGeneratorTrait;
use App\Http\Controllers\Controller;
use App\Events\PaymentReferrerBonus;
use App\Services\PaymentPlatformResolverService;
use App\Events\PaymentProcessed;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PaymentPlatform;
use App\Models\Payment;
use App\Models\Subscriber;
use App\Models\SubscriptionPlan;
use App\Models\PrepaidPlan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccess;
use App\Mail\NewPaymentNotification;
use Exception;

use KingFlamez\Rave\Facades\Rave as Flutterwave;


class PaymentController extends Controller
{   
    use InvoiceGeneratorTrait;

    protected $paymentPlatformResolver;

    
    public function __construct(PaymentPlatformResolverService $paymentPlatformResolver)
    {
        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request, SubscriptionPlan $id)
    {
        if ($id->free) {

            $order_id = $this->registerFreeSubscription($id, $request);
            $plan = SubscriptionPlan::where('id', $id->id)->first();

            if (auth()->user()->subscription_required) {
                $target_user = User::where('id', auth()->user()->id)->first();
                $target_user->subscription_required = false;
                $target_user->save();
                    
                return view('auth.subscribe-success');
            } else {
                return view('user.plans.user_plan_success', compact('plan', 'order_id'));
            } 

        } else {

            $rules = [
                'payment_platform' => ['required', 'exists:payment_platforms,id'],
            ];

            $request->validate($rules);

            $paymentPlatform = $this->paymentPlatformResolver->resolveService($request->payment_platform);

            session()->put('subscriptionPlatformID', $request->payment_platform);
            session()->put('gatewayID', $request->payment_platform);
            session()->put('billing_first_name', $request->name);
            session()->put('billing_last_name', $request->lastname);
            session()->put('billing_email', $request->email);
            session()->put('billing_phone', $request->phone_number);
            session()->put('billing_city', $request->city);
            session()->put('billing_postal_code', $request->postal_code);
            session()->put('billing_country', $request->country);
            session()->put('billing_address', $request->address);
            session()->put('billing_vat_number', $request->vat);
            
            return $paymentPlatform->handlePaymentSubscription($request, $id);
        }
    }


    /**
     * Process prepaid plan request
     */
    public function payPrePaid(Request $request)
    {
        if ($request->type == 'lifetime') {
            $id = SubscriptionPlan::where('id', $request->id)->first();
            $type = 'lifetime';
        } else {
            $id = PrepaidPlan::where('id', $request->id)->first();
            $type = 'prepaid';
        }

        if ($request->value < 1) {
            if ($type == 'lifetime') {
                $plan = SubscriptionPlan::where('id', $request->id)->first();
                $order_id = $this->registerFreeSubscription($plan, $request);

                return view('user.plans.user_plan_success', compact('plan', 'order_id'));

            } else {
                $plan = PrepaidPlan::where('id', $request->id)->first();                
                auth()->user()->tokens_prepaid = auth()->user()->tokens_prepaid + $plan->tokens;
                auth()->user()->image_prepaid = auth()->user()->image_prepaid + $plan->images;
                auth()->user()->characters_prepaid = auth()->user()->characters_prepaid + $plan->characters;
                auth()->user()->minutes_prepaid = auth()->user()->minutes_prepaid + $plan->minutes;
                auth()->user()->save();   
                $order_id = Str::random(10);
                return view('user.plans.user_plan_success', compact('plan', 'order_id'));
            }
            
        }
        
        $rules = [
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ];

        $request->validate($rules);

        $paymentPlatform = $this->paymentPlatformResolver->resolveService($request->payment_platform);           

        session()->put('paymentPlatformID', $request->payment_platform);
    
        return $paymentPlatform->handlePaymentPrePaid($request, $id->id, $type);       
    }

    /**
     * Process approved prepaid plan requests
     */
    public function approved(Request $request)
    {   
        if (session()->has('paymentPlatformID')) {
            $paymentPlatform = $this->paymentPlatformResolver->resolveService(session()->get('paymentPlatformID'));

            return $paymentPlatform->handleApproval($request);
        }

        toastr()->error(__('There was an error while retrieving payment gateway. Please try again'));
        return redirect()->back();
    }


    /**
     * Process approved prepaid plan request for Midtrans
     */
    public function midtransSuccess(Request $request)
    {   
        if (session()->has('paymentPlatformID')) {
            $paymentPlatform = $this->paymentPlatformResolver->resolveService(session()->get('paymentPlatformID'));

            return $paymentPlatform->handleApproval($request);
        }

        toastr()->error(__('There was an error while retrieving payment gateway. Please try again'));
        return redirect()->back();
    }


    /**
     * Process approved prepaid plan request for Iyzico
     */
    public function iyzicoSuccess(Request $request)
    {   
        if (session()->has('paymentPlatformID')) {
            $paymentPlatform = $this->paymentPlatformResolver->resolveService(session()->get('paymentPlatformID'));

            return $paymentPlatform->handleApproval($request);
        }

        toastr()->error(__('There was an error while retrieving payment gateway. Please try again'));
        return redirect()->back();
    }


    /**
     * Process approved prepaid plan request for Razorpay
     */
    public function approvedRazorpayPrepaid(Request $request)
    {   
        if (session()->has('paymentPlatformID')) {
            $paymentPlatform = $this->paymentPlatformResolver->resolveService(session()->get('paymentPlatformID'));

            return $paymentPlatform->handleApproval($request);
        }

        toastr()->error(__('There was an error while retrieving payment gateway. Please try again'));
        return redirect()->back();
    }


    /**
     * Process approved prepaid plan request for Braintree
     */
    public function braintreeSuccess(Request $request)
    {
        $plan = PrepaidPlan::where('id', $request->plan)->first();
        $order_id = request('amp;order');
        
        return view('user.plans.user_plan_success', compact('plan', 'order_id'));
    }


    public function paddleSuccess() 
    {
        $plan = session()->get('plan_id');
        $order_id = 'random';  

        return view('user.plans.user_plan_success', compact('plan', 'order_id'));
    }


    /**
     * Process cancelled prepaid plan requests
     */
    public function cancelled()
    {
        toastr()->warning(__('You cancelled the payment process. Would like to try again?'));
        return redirect()->route('user.plans');
    }


    /**
     * Process approved subscription plan requests
     */
    public function approvedSubscription(Request $request)
    {   
        if (session()->has('subscriptionPlatformID')) {
            $paymentPlatform = $this->paymentPlatformResolver->resolveService(session()->get('subscriptionPlatformID'));

            if (session()->has('subscriptionID')) {
                $subscriptionID = session()->get('subscriptionID');
            }

            if ($paymentPlatform->validateSubscriptions($request)) {

                $plan = SubscriptionPlan::where('id', $request->plan_id)->firstOrFail();
                $user = $request->user();

                $gateway_id = session()->get('gatewayID');
                $gateway = PaymentPlatform::where('id', $gateway_id)->firstOrFail();
                $duration = $plan->payment_frequency;
                $days = ($duration == 'monthly') ? 30 : 365;

                $current_subscription = Subscriber::where('user_id', $user->id)->where('status', 'Active')->first();

                if ($current_subscription) {
                    $this->stopPreviousSubscription($current_subscription->id);
                }

                $subscription = Subscriber::create([
                    'user_id' => $user->id,
                    'plan_id' => $plan->id,
                    'status' => 'Active',
                    'created_at' => now(),
                    'gateway' => $gateway->name,
                    'frequency' => $plan->payment_frequency,
                    'plan_name' => $plan->plan_name,                    
                    'tokens' => $plan->token_credits,
                    'images' => $plan->image_credits,
                    'characters' => $plan->characters,
                    'minutes' => $plan->minutes,
                    'subscription_id' => $subscriptionID,
                    'active_until' => Carbon::now()->addDays($days),
                ]);       

                // Only for Paystack
                if ($gateway_id == 4) {
                    $reference = $paymentPlatform->addPaystackFields($request->reference, $subscription->id);
                }

                session()->forget('gatewayID');

                $this->registerSubscriptionPayment($plan, $user, $subscriptionID, $gateway->name);               
                $order_id = $subscriptionID;

                if (auth()->user()->subscription_required) {
                    $target_user = User::where('id', auth()->user()->id)->first();
                    $target_user->subscription_required = false;
                    $target_user->save();
                        
                    return view('auth.subscribe-success');
                } else {
                    return view('user.plans.user_plan_success', compact('plan', 'order_id'));
                }
                
            }
        }

        toastr()->error(__('There was an error while checking your subscription. Please try again'));
        return redirect()->back();
    }


    /**
     * Process approved subscription plan requests
     */
    public function approvedStripeSubscription(Request $request)
    {  
        if (session()->has('subscriptionPlatformID')) {
            $paymentPlatform = $this->paymentPlatformResolver->resolveService(session()->get('subscriptionPlatformID'));

            if (session()->has('subscriptionID')) {
                $subscriptionID = session()->get('subscriptionID');
            }
            
            $stripe = new \Stripe\StripeClient(config('services.stripe.api_secret'));
            $session = $stripe->checkout->sessions->retrieve(
              $subscriptionID,
              []
            );

            $stripe_subscription = (!is_null($session->subscription)) ? $session->subscription : $session->id;
            $stripe_invoice = (!is_null($session->invoice)) ? $session->invoice : $session->id;

            $plan = SubscriptionPlan::where('id', $request->plan_id)->firstOrFail();
            $user = $request->user();
            $gateway_id = session()->get('gatewayID');
            $gateway = PaymentPlatform::where('id', $gateway_id)->firstOrFail();
            $duration = $plan->payment_frequency;
            $days = ($duration == 'monthly') ? 30 : 365;

            $current_subscription = Subscriber::where('user_id', $user->id)->where('status', 'Active')->first();

            if ($current_subscription) {
                $this->stopPreviousSubscription($current_subscription->id);
            }

            $subscription = Subscriber::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'status' => 'Active',
                'created_at' => now(),
                'gateway' => $gateway->name,
                'frequency' => $plan->payment_frequency,
                'plan_name' => $plan->plan_name,
                'tokens' => $plan->token_credits,
                'images' => $plan->image_credits,
                'characters' => $plan->characters,
                'minutes' => $plan->minutes,
                'subscription_id' => $stripe_subscription,
                'active_until' => Carbon::now()->addDays($days),
            ]);       

            session()->forget('gatewayID');

            $this->registerSubscriptionPayment($plan, auth()->user(), $stripe_invoice, $gateway->name);     
              
            $order_id = $stripe_invoice;
            
            if (auth()->user()->subscription_required) {
                $target_user = User::where('id', auth()->user()->id)->first();
                $target_user->subscription_required = false;
                $target_user->save();
                    
                return view('auth.subscribe-success');
            } else {
                return view('user.plans.user_plan_success', compact('plan', 'order_id'));
            }
            
        }

        toastr()->error(__('There was an error while checking your subscription. Please try again'));
        return redirect()->back();
    }


    /**
     * Process approved razorpay subscription plan requests
     */
    public function approvedRazorpaySubscription(Request $request)
    {   
        if (session()->has('subscriptionPlatformID')) {
            $paymentPlatform = $this->paymentPlatformResolver->resolveService(session()->get('subscriptionPlatformID'));

            if (session()->has('subscriptionID')) {
                $subscriptionID = session()->get('subscriptionID');
            }

            if ($paymentPlatform->validateSubscriptions($request)) {

                $plan = SubscriptionPlan::where('id', $request->plan_id)->firstOrFail();

                $gateway_id = session()->get('gatewayID');
                $gateway = PaymentPlatform::where('id', $gateway_id)->firstOrFail();
                $duration = $plan->payment_frequency;
                $days = ($duration == 'monthly') ? 30 : 365;

                $current_subscription = Subscriber::where('user_id', auth()->user()->id)->where('status', 'Active')->first();

                if ($current_subscription) {
                    $this->stopPreviousSubscription($current_subscription->id);
                }

                $subscription = Subscriber::create([
                    'user_id' => auth()->user()->id,
                    'plan_id' => $plan->id,
                    'status' => 'Active',
                    'created_at' => now(),
                    'gateway' => $gateway->name,
                    'frequency' => $plan->payment_frequency,
                    'plan_name' => $plan->plan_name,
                    'tokens' => $plan->token_credits,
                    'images' => $plan->image_credits,
                    'characters' => $plan->characters,
                    'minutes' => $plan->minutes,
                    'subscription_id' => $subscriptionID,
                    'active_until' => Carbon::now()->addDays($days),
                ]);       

                session()->forget('gatewayID');

                $this->registerSubscriptionPayment($plan, auth()->user(), $subscriptionID, $gateway->name);               
                $order_id = $subscriptionID;

                if (auth()->user()->subscription_required) {
                    $target_user = User::where('id', auth()->user()->id)->first();
                    $target_user->subscription_required = false;
                    $target_user->save();
                        
                    return view('auth.subscribe-success');
                } else {
                    return view('user.plans.user_plan_success', compact('plan', 'order_id'));
                }
            }
        }

        toastr()->error(__('There was an error with payment verification. Please try again or contact support'));
        return redirect()->route('user.plans');
    }


    /**
     * Process approved flutterwave subscription plan requests
     */
    public function approvedFlutterwaveSubscription(Request $request)
    {   
        $status = request()->status;

        if ($status ==  'successful') {
    
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);
            $order_id = $data['data']['tx_ref'];
            $subscriptionID = $data['data']['id'];

            $plan = session()->get('plan_id');

            $duration = $plan->payment_frequency;
            $days = ($duration == 'monthly') ? 30 : 365;

            $current_subscription = Subscriber::where('user_id', auth()->user()->id)->where('status', 'Active')->first();

            if ($current_subscription) {
                $this->stopPreviousSubscription($current_subscription->id);
            }

            $subscription = Subscriber::create([
                'user_id' => auth()->user()->id,
                'plan_id' => $plan->id,
                'status' => 'Active',
                'created_at' => now(),
                'gateway' => 'Flutterwave',
                'frequency' => $plan->payment_frequency,
                'plan_name' => $plan->plan_name,
               'tokens' => $plan->token_credits,
                'images' => $plan->image_credits,
                'characters' => $plan->characters,
                'minutes' => $plan->minutes,
                'subscription_id' => $subscriptionID,
                'active_until' => Carbon::now()->addDays($days),
            ]);       

            session()->forget('gatewayID');
            session()->forget('plan_id');

            $this->registerSubscriptionPayment($plan, auth()->user(), $subscriptionID, 'Flutterwave');               
            $order_id = $subscriptionID;

            if (auth()->user()->subscription_required) {
                $target_user = User::where('id', auth()->user()->id)->first();
                $target_user->subscription_required = false;
                $target_user->save();
                    
                return view('auth.subscribe-success');
            } else {
                return view('user.plans.user_plan_success', compact('plan', 'order_id'));
            }

        } elseif ($status == 'cancelled'){
            toastr()->error(__('Payment has been cancelled'));
            return redirect()->back();
        } else{
            toastr()->error(__('Payment was not successful, please try again'));
            return redirect()->back();
        }
         

    }


    /**
     * Process cancelled subscription plan requests
     */
    public function cancelledSubscription()
    {   
        toastr()->warning(__('You cancelled the payment process. Would like to try again?'));
        return redirect()->route('user.plans');
    }


    /**
     * Register subscription payment in DB
     */
    private function registerSubscriptionPayment(SubscriptionPlan $plan, User $user, $subscriptionID, $gateway)
    {
        $tax_value = (config('payment.payment_tax') > 0) ? $plan->price * config('payment.payment_tax') / 100 : 0;
        $total_price = $tax_value + $plan->price;

        if (config('payment.referral.enabled') == 'on') {
            if (config('payment.referral.payment.policy') == 'first') {
                if (Payment::where('user_id', $user->id)->where('status', 'completed')->exists()) {
                    /** User already has at least 1 payment */
                } else {
                    event(new PaymentReferrerBonus(auth()->user(), $subscriptionID, $total_price, $gateway));
                }
            } else {
                event(new PaymentReferrerBonus(auth()->user(), $subscriptionID, $total_price, $gateway));
            }
        }

        $record_payment = new Payment();
        $record_payment->user_id = $user->id;
        $record_payment->plan_id = $plan->id;
        $record_payment->order_id = $subscriptionID;
        $record_payment->plan_name = $plan->plan_name;
        $record_payment->frequency = $plan->payment_frequency;
        $record_payment->price = $total_price;
        $record_payment->currency = $plan->currency;
        $record_payment->gateway = $gateway;
        $record_payment->status = 'completed';
        $record_payment->tokens = $plan->token_credits;
        $record_payment->characters = $plan->characters;
        $record_payment->minutes = $plan->minutes;
        $record_payment->images = $plan->image_credits;
        if (session()->has('billing_first_name')) {
            $record_payment->billing_first_name = session()->get('billing_first_name');
        }
        if (session()->has('billing_last_name')) {
            $record_payment->billing_last_name = session()->get('billing_last_name');
        }
        if (session()->has('billing_email')) {
            $record_payment->billing_email = session()->get('billing_email');
        }
        if (session()->has('billing_phone')) {
            $record_payment->billing_phone = session()->get('billing_phone');
        }
        if (session()->has('billing_city')) {
            $record_payment->billing_city = session()->get('billing_city');
        }
        if (session()->has('billing_postal_code')) {
            $record_payment->billing_postal_code = session()->get('billing_postal_code');
        }
        if (session()->has('billing_country')) {
            $record_payment->billing_country = session()->get('billing_country');
        }
        if (session()->has('billing_address')) {
            $record_payment->billing_address = session()->get('billing_address');
        }
        if (session()->has('billing_vat_number')) {
            $record_payment->billing_vat_number = session()->get('billing_vat_number');
        }
        $record_payment->save(); 
        
        $group = ($user->hasRole('admin'))? 'admin' : 'subscriber';

        $user = User::where('id', $user->id)->first();
        $user->syncRoles($group);    
        $user->group = $group;
        $user->plan_id = $plan->id;
        $user->tokens = $plan->token_credits;
        $user->characters = $plan->characters;
        $user->minutes = $plan->minutes;
        $user->images = $plan->image_credits;
        $user->member_limit = $plan->team_members;
        $user->save();       

        event(new PaymentProcessed(auth()->user()));

        try {
            $admin = User::where('group', 'admin')->first();

            Mail::to($admin)->send(new NewPaymentNotification($record_payment));
            Mail::to($user)->send(new PaymentSuccess($record_payment));
        } catch (Exception $e) {
            \Log::info('SMTP settings are not setup to send payment notifications via email');
        }
   
    }   
    
    
    /**
     * Generate Invoice after payment
     */
    public function generatePaymentInvoice($order_id)
    {              
        $this->generateInvoice($order_id);
    }


    /**
     * Bank Transfer Invoice
     */
    public function bankTransferPaymentInvoice($order_id)
    {
        $this->bankTransferInvoice($order_id);
    }


    /**
     * Show invoice for past payments
     */
    public function showPaymentInvoice(Payment $id)
    {   
        if ($id->gateway == 'BankTransfer' && $id->status != 'completed') {
            $this->bankTransferInvoice($id->order_id);
        } else {          
            $this->showInvoice($id);
        }
    }


    /**
     * Cancel active subscription
     */
    public function stopSubscription(Request $request)
    {   
        if ($request->ajax()) {
            
            $id = Subscriber::where('id', $request->id)->first();

            if ($id->status == 'Cancelled') {
                $data['status'] = 200;
                $data['message'] = __('This subscription was already cancelled before');
                return $data;
            } elseif ($id->status == 'Suspended') {
                $data['status'] = 400;
                $data['message'] = __('Subscription has been suspended due to failed renewal payment');
                return $data;
            } elseif ($id->status == 'Expired') {
                $data['status'] = 400;
                $data['message'] = __('Subscription has been expired, please create a new one');
                return $data;
            }

            if ($id->frequency == 'lifetime') {
                $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                $user = User::where('id', $id->user_id)->firstOrFail();
                $user->plan_id = null;
                $user->group = 'user';
                $user->member_limit = null;
                $user->save();

                $data['status'] = 200;
                $data['message'] = __('Subscription has been successfully cancelled');
                return $data;

            } else {

                switch ($id->gateway) {
                    case 'PayPal':
                        $platformID = 1;
                        break;
                    case 'Stripe':
                        $platformID = 2;
                        break;
                    case 'BankTransfer':
                        $platformID = 3;
                        break;
                    case 'Paystack':
                        $platformID = 4;
                        break;
                    case 'Razorpay':
                        $platformID = 5;
                        break;
                    case 'Mollie':
                        $platformID = 7;
                        break;
                    case 'Flutterwave':
                        $platformID = 10;
                        break;
                    case 'Yookassa':
                        $platformID = 11;
                        break;
                    case 'Paddle':
                        $platformID = 12;
                        break;
                    case 'Manual':
                    case 'FREE':
                        $platformID = 99;
                        break;
                    default:
                        $platformID = 1;
                        break;
                }
                

                if ($id->gateway == 'PayPal' || $id->gateway == 'Stripe' || $id->gateway == 'Paystack' || $id->gateway == 'Razorpay' || $id->gateway == 'Mollie' || $id->gateway == 'Flutterwave' || $id->gateway == 'Yookassa' || $id->gateway == 'Paddle') {
                    $paymentPlatform = $this->paymentPlatformResolver->resolveService($platformID);

                    $status = $paymentPlatform->stopSubscription($id->subscription_id);

                    if ($platformID == 2) {
                        if ($status) {
                            $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                            $user = User::where('id', $id->user_id)->firstOrFail();
                            $user->plan_id = null;
                            $user->group = 'user';
                            $user->member_limit = null;
                            $user->save();
                        }
                    } elseif ($platformID == 4) {
                        if ($status->status) {
                            $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                            $user = User::where('id', $id->user_id)->firstOrFail();
                            $group = ($user->hasRole('admin'))? 'admin' : 'user';
                            $user->syncRoles($group); 
                            $user->plan_id = null;
                            $user->group = $group;
                            $user->member_limit = null;
                            $user->save();
                        }
                    } elseif ($platformID == 5) {
                        if ($status->status == 'cancelled') {
                            $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                            $user = User::where('id', $id->user_id)->firstOrFail();
                            $group = ($user->hasRole('admin'))? 'admin' : 'user';
                            $user->syncRoles($group); 
                            $user->plan_id = null;
                            $user->group = $group;
                            $user->member_limit = null;
                            $user->save();
                        }
                    } elseif ($platformID == 7) {
                        if ($status->status == 'Cancelled') {
                            $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                            $user = User::where('id', $id->user_id)->firstOrFail();
                            $group = ($user->hasRole('admin'))? 'admin' : 'user';
                            $user->syncRoles($group); 
                            $user->plan_id = null;
                            $user->group = $group;
                            $user->member_limit = null;
                            $user->save();
                        }
                    } elseif ($platformID == 10) {
                        if ($status == 'cancelled') {
                            $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                            $user = User::where('id', $id->user_id)->firstOrFail();
                            $group = ($user->hasRole('admin'))? 'admin' : 'user';
                            $user->syncRoles($group); 
                            $user->plan_id = null;
                            $user->group = $group;
                            $user->member_limit = null;
                            $user->save();
                        }
                    } elseif ($platformID == 11) {
                        if ($status == 'cancelled') {
                            $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                            $user = User::where('id', $id->user_id)->firstOrFail();
                            $group = ($user->hasRole('admin'))? 'admin' : 'user';
                            $user->syncRoles($group); 
                            $user->plan_id = null;
                            $user->group = $group;
                            $user->member_limit = null;
                            $user->save();

                            $data['status'] = 200;
                            $data['message'] = __('Subscription has been successfully cancelled. Please check your wallet and stop auto payment');
                            return $data;
                        }
                    } elseif ($platformID == 12) {
                        if ($status == 'cancelled') {
                            $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                            $user = User::where('id', $id->user_id)->firstOrFail();
                            $group = ($user->hasRole('admin'))? 'admin' : 'user';
                            $user->syncRoles($group); 
                            $user->plan_id = null;
                            $user->group = $group;
                            $user->member_limit = null;
                            $user->save();
                        }
                    } elseif ($platformID == 99) { 
                        $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                        $user = User::where('id', $id->user_id)->firstOrFail();
                        $group = ($user->hasRole('admin'))? 'admin' : 'user';
                        $user->syncRoles($group); 
                        $user->plan_id = null;
                        $user->group = $group;
                        $user->member_limit = null;
                        $user->save();
                    } else {
                        if (is_null($status)) {
                            $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                            $user = User::where('id', $id->user_id)->firstOrFail();
                            $group = ($user->hasRole('admin'))? 'admin' : 'user';
                            $user->syncRoles($group); 
                            $user->plan_id = null;
                            $user->group = $group;
                            $user->member_limit = null;
                            $user->save();
                        }
                    }
                } else {
                    $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                    $user = User::where('id', $id->user_id)->firstOrFail();
                    $group = ($user->hasRole('admin'))? 'admin' : 'user';
                    $user->syncRoles($group); 
                    $user->plan_id = null;
                    $user->group = $group;
                    $user->member_limit = null;
                    $user->save();
                }
                
                $data['status'] = 200;
                $data['message'] = __('Subscription has been successfully cancelled');
                return $data;
            }
            
        }
        
    }


    /**
     * Cancel active subscription
     */
    public function stopPreviousSubscription($subscriber)
    {               
        $id = Subscriber::where('id', $subscriber)->first();

        if ($id->status == 'Cancelled') {
            $data['status'] = 200;
            $data['message'] = __('This subscription was already cancelled before');
            return;
        } elseif ($id->status == 'Suspended') {
            $data['status'] = 400;
            $data['message'] = __('Subscription has been suspended due to failed renewal payment');
            return;
        } elseif ($id->status == 'Expired') {
            $data['status'] = 400;
            $data['message'] = __('Subscription has been expired, please create a new one');
            return;
        }

        if ($id->frequency == 'lifetime') {
            $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
            $user = User::where('id', $id->user_id)->firstOrFail();
            $user->plan_id = null;
            $user->group = 'user';
            $user->member_limit = null;
            $user->save();

        } else {

            switch ($id->gateway) {
                case 'PayPal':
                    $platformID = 1;
                    break;
                case 'Stripe':
                    $platformID = 2;
                    break;
                case 'BankTransfer':
                    $platformID = 3;
                    break;
                case 'Paystack':
                    $platformID = 4;
                    break;
                case 'Razorpay':
                    $platformID = 5;
                    break;
                case 'Mollie':
                    $platformID = 7;
                    break;
                case 'Flutterwave':
                    $platformID = 10;
                    break;
                case 'Yookassa':
                    $platformID = 11;
                    break;
                case 'Paddle':
                    $platformID = 12;
                    break;
                case 'Manual':
                case 'FREE':
                    $platformID = 99;
                    break;
                default:
                    $platformID = 1;
                    break;
            }
            

            if ($id->gateway == 'PayPal' || $id->gateway == 'Stripe' || $id->gateway == 'Paystack' || $id->gateway == 'Razorpay' || $id->gateway == 'Mollie' || $id->gateway == 'Flutterwave' || $id->gateway == 'Yookassa' || $id->gateway == 'Paddle') {
                $paymentPlatform = $this->paymentPlatformResolver->resolveService($platformID);

                $status = $paymentPlatform->stopSubscription($id->subscription_id);

                if ($platformID == 2) {
                    if ($status) {
                        $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                        $user = User::where('id', $id->user_id)->firstOrFail();
                        $user->plan_id = null;
                        $user->group = 'user';
                        $user->member_limit = null;
                        $user->save();
                    }
                } elseif ($platformID == 4) {
                    if ($status->status) {
                        $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                        $user = User::where('id', $id->user_id)->firstOrFail();
                        $group = ($user->hasRole('admin'))? 'admin' : 'user';
                        $user->syncRoles($group); 
                        $user->plan_id = null;
                        $user->group = $group;
                        $user->member_limit = null;
                        $user->save();
                    }
                } elseif ($platformID == 5) {
                    if ($status->status == 'cancelled') {
                        $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                        $user = User::where('id', $id->user_id)->firstOrFail();
                        $group = ($user->hasRole('admin'))? 'admin' : 'user';
                        $user->syncRoles($group); 
                        $user->plan_id = null;
                        $user->group = $group;
                        $user->member_limit = null;
                        $user->save();
                    }
                } elseif ($platformID == 7) {
                    if ($status->status == 'Cancelled') {
                        $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                        $user = User::where('id', $id->user_id)->firstOrFail();
                        $group = ($user->hasRole('admin'))? 'admin' : 'user';
                        $user->syncRoles($group); 
                        $user->plan_id = null;
                        $user->group = $group;
                        $user->member_limit = null;
                        $user->save();
                    }
                } elseif ($platformID == 10) {
                    if ($status == 'cancelled') {
                        $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                        $user = User::where('id', $id->user_id)->firstOrFail();
                        $group = ($user->hasRole('admin'))? 'admin' : 'user';
                        $user->syncRoles($group); 
                        $user->plan_id = null;
                        $user->group = $group;
                        $user->member_limit = null;
                        $user->save();
                    }
                } elseif ($platformID == 11) {
                    if ($status == 'cancelled') {
                        $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                        $user = User::where('id', $id->user_id)->firstOrFail();
                        $group = ($user->hasRole('admin'))? 'admin' : 'user';
                        $user->syncRoles($group); 
                        $user->plan_id = null;
                        $user->group = $group;
                        $user->member_limit = null;
                        $user->save();
                    }
                } elseif ($platformID == 12) {
                    if ($status == 'cancelled') {
                        $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                        $user = User::where('id', $id->user_id)->firstOrFail();
                        $group = ($user->hasRole('admin'))? 'admin' : 'user';
                        $user->syncRoles($group); 
                        $user->plan_id = null;
                        $user->group = $group;
                        $user->member_limit = null;
                        $user->save();
                    }
                } elseif ($platformID == 99) { 
                    $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                    $user = User::where('id', $id->user_id)->firstOrFail();
                    $group = ($user->hasRole('admin'))? 'admin' : 'user';
                    $user->syncRoles($group); 
                    $user->plan_id = null;
                    $user->group = $group;
                    $user->member_limit = null;
                    $user->save();
                } else {
                    if (is_null($status)) {
                        $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                        $user = User::where('id', $id->user_id)->firstOrFail();
                        $group = ($user->hasRole('admin'))? 'admin' : 'user';
                        $user->syncRoles($group); 
                        $user->plan_id = null;
                        $user->group = $group;
                        $user->member_limit = null;
                        $user->save();
                    }
                }
            } else {
                $id->update(['status'=>'Cancelled', 'active_until' => Carbon::createFromFormat('Y-m-d H:i:s', now())]);
                $user = User::where('id', $id->user_id)->firstOrFail();
                $group = ($user->hasRole('admin'))? 'admin' : 'user';
                $user->syncRoles($group); 
                $user->plan_id = null;
                $user->group = $group;
                $user->member_limit = null;
                $user->save();
            }
            
        }
             
    }


    /**
     * Register free subscription
     */
    private function registerFreeSubscription(SubscriptionPlan $plan, Request $request)
    {
        $order_id = Str::random(10);
        $subscription = Str::random(10);
        $duration = $plan->payment_frequency;
        $days = ($duration == 'monthly') ? 30 : 365;

        $record_payment = new Payment();
        $record_payment->user_id = auth()->user()->id;
        $record_payment->plan_id = $plan->id;
        $record_payment->frequency = $plan->payment_frequency;
        $record_payment->order_id = $order_id;
        $record_payment->plan_name = $plan->plan_name;
        $record_payment->price = 0;
        $record_payment->currency = $plan->currency;
        $record_payment->gateway = 'FREE';
        $record_payment->status = 'completed';
        $record_payment->tokens = $plan->token_credits;
        $record_payment->characters = $plan->characters;
        $record_payment->minutes = $plan->minutes;
        $record_payment->images = $plan->image_credits;
        $record_payment->billing_first_name = $request->name;
        $record_payment->billing_last_name = $request->lastname;
        $record_payment->billing_email = $request->email;
        $record_payment->billing_phone = $request->phone_number;
        $record_payment->billing_city = $request->city;
        $record_payment->billing_postal_code = $request->postal_code;
        $record_payment->billing_country = $request->country;
        $record_payment->billing_vat_number = $request->vat;
        $record_payment->billing_address = $request->address;
        $record_payment->save();

        $subscription = Subscriber::create([
            'user_id' => auth()->user()->id,
            'plan_id' => $plan->id,
            'status' => 'Active',
            'created_at' => now(),
            'gateway' => 'FREE',
            'frequency' => $plan->payment_frequency,
            'images' => $plan->image_credits,
            'tokens' => $plan->token_credits,
            'characters' => $plan->characters,
            'minutes' => $plan->minutes,
            'subscription_id' => $subscription,
            'active_until' => Carbon::now()->addDays($days),
        ]); 
        
        $group = (auth()->user()->hasRole('admin'))? 'admin' : 'subscriber';

        $user = User::where('id', auth()->user()->id)->first();
        $user->syncRoles($group);    
        $user->group = $group;
        $user->plan_id = $plan->id;
        $user->tokens = $plan->token_credits;
        $user->characters = $plan->characters;
        $user->minutes = $plan->minutes;
        $user->images = $plan->image_credits;
        $user->member_limit = $plan->team_members;
        $user->used_free_tier = true;
        $user->save();       
        
        return $order_id;
    } 
}
