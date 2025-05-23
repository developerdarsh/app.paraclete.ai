<?php

namespace App\Services;

use App\Traits\ConsumesExternalServiceTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\Payment;
use App\Models\Subscriber;
use App\Models\PrepaidPlan;
use App\Models\SubscriptionPlan;
use App\Services\HelperService;
use Carbon\Carbon;

class PaddleService 
{
    use ConsumesExternalServiceTrait;

    protected $baseURI;
    protected $key;
    protected $secret;
    protected $promocode;

    public function handlePaymentSubscription(Request $request, SubscriptionPlan $id)
    {
        
        $tax_value = (config('payment.payment_tax') > 0) ? $tax = $id->price * config('payment.payment_tax') / 100 : 0;
        $total_value = round($request->value);

        $order_id = Str::random(10);
        $metadata = array(
            'user_id' => auth()->user()->id,
            'plan_id' => $id->id,
            'frequency' => $id->payment_frequency,
            'price' => $total_value,
            'order_id' => $order_id,
        );
        
        session()->put('type', $id->payment_frequency);
        session()->put('plan_id', $id);
        
        $params = [
            'vendor_id' => config('services.paddle.vendor_id'),
            'vendor_auth_code' => config('services.paddle.vendor_auth_code'),
            'product_id' => $id->paddle_gateway_plan_id,
            'customer_email' => auth()->user()->email,
            'return_url' => config('app.url') . "/user/payments/approved/paddle",
            'passthrough' => json_encode($metadata),
            'image_url' => URL::asset('img/brand/logo.png'),
        ];


        try {
            $payment = $this->createPayment($params);
        } catch (\Exception $e) {
            toastr()->error(__('Paddle authentication error, verify your paddle settings first'));
            return redirect()->back();
        }

        $payment = json_decode($payment);

        if ($payment->success == true) {
            
            HelperService::registerRecurringSubscriber($id, 'Paddle', 'Pending', $order_id);
     
            HelperService::registerRecurringPayment($id, $order_id, 'Paddle', 'pending');
            
            $redirect = $payment->response->url;
            $plan_name = $id->plan_name;
            return view('user.plans.paddle-checkout', compact('redirect', 'plan_name'));

        } else {
            toastr()->error(__('Payment was not successful, please verify your paddle gateway settings: ') . $payment->error->message);
            return redirect()->back();
        }
    }


    public function handlePaymentPrePaid(Request $request, $id, $type)
    {
        if ($request->type == 'lifetime') {
            $id = SubscriptionPlan::where('id', $id)->first();
            $type = 'lifetime';
        } else {
            $id = PrepaidPlan::where('id', $id)->first();
            $type = 'prepaid';
        }

        $tax_value = (config('payment.payment_tax') > 0) ? $tax = $id->price * config('payment.payment_tax') / 100 : 0;
        $total_value = round($request->value);
        
        $order_id = Str::random(10);
        $metadata = array(
            'user_id' => auth()->user()->id,
            'plan_id' => $id->id,
            'payment_type' => $type,
            'price' => $total_value,
            'order_id' => $order_id,
        );
        
        session()->put('type', $type);
        session()->put('plan_id', $id);
        
        $params = [
            'vendor_id' => config('services.paddle.vendor_id'),
            'vendor_auth_code' => config('services.paddle.vendor_auth_code'),
            'title' => $id->plan_name,
            'webhook_url' => config('app.url') . '/webhooks/paddle',
            'prices' => [$id->currency . ':' . $total_value],
            'customer_email' => auth()->user()->email,
            'return_url' => config('app.url') . "/user/payments/approved/paddle",
            'passthrough' => json_encode($metadata),
            'image_url' => URL::asset('img/brand/logo.png'),
            'quantity_variable' => 0,
        ];


        try {
            $payment = $this->createPayment($params);
        } catch (\Exception $e) {
            toastr()->error(__('Paddle authentication error, verify your paddle settings first'));
            return redirect()->back();
        }

        $payment = json_decode($payment);

        if ($payment->success == true) {
            
            if ($type == 'lifetime') {

                $days = 18250;

                HelperService::registerSubscriber($id, 'Paddle', 'Pending', $order_id, $days);
    
            }

            HelperService::registerPayment($type, $id->id, $order_id, $id->price, 'Paddle', 'pending');
    
            $redirect = $payment->response->url;
            $plan_name = $id->plan_name;
            return view('user.plans.paddle-checkout', compact('redirect', 'plan_name'));

        } else {
            toastr()->error(__('Payment was not successful, please verify your paddle gateway settings: ') . $payment->error->message);
            return redirect()->back();
        }
        
    }


    public function stopSubscription($subscriptionID)
    {
        $subscription = Subscriber::where('subscription_id', $subscriptionID)->first();

        $redirect = $subscription->paddle_cancel_url;
        
        return 'cancelled';
    }


    public function createPayment($params)
    {  
        if(config('services.paddle.sandbox') == 'true'){
            $url = "https://sandbox-vendors.paddle.com/api/2.0/product/generate_pay_link";
        } else {
            $url =  "https://vendors.paddle.com/api/2.0/product/generate_pay_link";
        }

        return $this->makeRequest(
            'POST',
            $url,
            [], $params
        );        
    }

}