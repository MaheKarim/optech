<?php

namespace Modules\Subscription\Http\Controllers\Seller;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Currency\App\Models\Currency;

use Illuminate\Contracts\Support\Renderable;
use Modules\Subscription\Entities\SubscriptionPlan;
use Modules\PaymentGateway\App\Models\PaymentGateway;
use Modules\Subscription\Entities\SubscriptionHistory;
use Modules\Subscription\Http\Requests\SubscriptionPlanRequest;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Checkout\Session as StripSession;
use Mollie\Laravel\Facades\Mollie;
use Razorpay\Api\Api;
use Stripe\Price;
use Stripe, Auth, Exception, Session, Log;



class SubscriptionPlanController extends Controller
{

    public $payment_setting;

    public function __construct()
    {
        $payment_data = PaymentGateway::all();


            $this->payment_setting = array();

            foreach($payment_data as $data_item){
                $payment_setting[$data_item->key] = $data_item->value;
            }

            $this->payment_setting  = (object) $payment_setting;
    }


    public function purchase_history()
    {
        $auth_user = Auth::guard('web')->user();

        $histories = SubscriptionHistory::orderBy('id','desc')->where('user_id', $auth_user->id)->paginate(20);

        return view('subscription::seller.purchase_history', compact('histories'));
    }



    public function index()
    {
        $plans = SubscriptionPlan::orderBy('serial', 'asc')->where('status', 'active')->get();

        return view('subscription::seller.index', ['plans' => $plans]);
    }

    public function payment($plan_id)
    {

        $auth_user = Auth::guard('web')->user();

        $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

        $razorpay_currency = Currency::findOrFail($this->payment_setting->razorpay_currency_id);
        $flutterwave_currency = Currency::findOrFail($this->payment_setting->flutterwave_currency_id);
        $paystack_currency = Currency::findOrFail($this->payment_setting->paystack_currency_id);

        $payable_amount = $plan->plan_price;

        return view('subscription::seller.payment', [
            'user' => $auth_user,
            'plan' => $plan,
            'payable_amount' => $payable_amount,
            'payment_setting' => $this->payment_setting ,
            'razorpay_currency' => $razorpay_currency ,
            'flutterwave_currency' => $flutterwave_currency ,
            'paystack_currency' => $paystack_currency ,
        ]);

    }


    public function free_enroll(Request $request, $id){

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('admin_validation.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $user = Auth::guard('web')->user();

        $free_exist = SubscriptionHistory::where('user_id', $user->id)->where(['payment_method' => 'Free'])->count();

        if($free_exist == 0){

            $plan = SubscriptionPlan::where('status', 'active')->where('id', $id)->firstOrFail();
            $this->create_order($user, $plan, $plan->plan_price, 'Free', 'success', 'free_enroll');

            $notify_message = trans('translate.Enrolled Successfully');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->route('seller.subscription.purchase-history')->with($notify_message);

        }else{
            $notify_message = trans('translate.You have already enrolled trail version');

            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }


    }


    public function stirpe_payment(Request $request, $plan_id){

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();

        $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

        $package_main_price = $plan->plan_price;

        if($package_main_price == '0.00'){
            $notify_message = trans('translate.Minimum 1 USD is required for payment');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $stripe_currency = Currency::findOrFail($this->payment_setting->stripe_currency_id);

        $payable_amount = round($package_main_price * $stripe_currency->currency_rate,2);

        Stripe\Stripe::setApiKey($this->payment_setting->stripe_secret);

        try{
            $result = Stripe\Charge::create ([
                "amount" => $payable_amount * 100,
                "currency" => $stripe_currency->currency_code,
                "source" => $request->stripeToken,
                "description" => env('APP_NAME')
            ]);
        }catch(Exception $ex){
            Log::info($ex->getMessage());

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $order = $this->create_order($auth_user, $plan, $package_main_price, 'Stripe', 'success', $result->balance_transaction);

        $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('seller.subscription.purchase-history')->with($notify_message);

    }


    public function paypal_payment(Request $request, $plan_id){

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();


        $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

        $package_main_price = $plan->plan_price;

        if($package_main_price == '0.00'){
            $notify_message = trans('translate.Minimum 1 USD is required for payment');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);

        $payable_amount = round($package_main_price * $paypal_currency->currency_rate,2);

        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);

        if($this->payment_setting->paypal_account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        }else{
            config(['paypal.live.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
            config(['paypal.live.app_id' => 'APP-80W284485P519543T']);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('seller.subscription.payment.paypal-success-payment'),
                "cancel_url" => route('seller.subscription.payment.paypal-faild-payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $paypal_currency->currency_code,
                        "value" => $payable_amount
                    ]
                ]
            ]
        ]);

        Session::put('plan_id', $plan_id);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);

        } else {
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

    }



    public function paypal_success_payment(Request $request){

        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);

        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);

        if($this->payment_setting->paypal_account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        }else{
            config(['paypal.live.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
            config(['paypal.live.app_id' => 'APP-80W284485P519543T']);
        }

        $plan_id = Session::get('plan_id');

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

            $auth_user = Auth::guard('web')->user();

            $package_main_price = $plan->plan_price;

            $order = $this->create_order($auth_user, $plan, $package_main_price, 'Paypal', 'success', $request->PayerID);

            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->route('seller.subscription.purchase-history')->with($notify_message);

        } else {

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('seller.subscription.payment.pay', $plan_id)->with($notify_message);
        }

    }

    public function paypal_faild_payment(Request $request){

        $plan_id = Session::get('plan_id');

        $notify_message = trans('translate.Something went wrong, please try again');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
        return redirect()->route('seller.subscription.payment.pay', $plan_id)->with($notify_message);
    }


    public function razorpay_payment(Request $request, $plan_id){

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $input = $request->all();
        $api = new Api($this->payment_setting->razorpay_key,$this->payment_setting->razorpay_secret);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $payId = $response->id;

                $auth_user = Auth::guard('web')->user();

                $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

                $package_main_price = $plan->plan_price;

                $order = $this->create_order($auth_user, $plan, $package_main_price, 'Razorpay', 'success', $payId);

                $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
                return redirect()->route('seller.subscription.purchase-history')->with($notify_message);

            }catch (Exception $e) {
                $notify_message = trans('translate.Something went wrong, please try again');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
                return redirect()->route('seller.subscription.payment.pay', $plan_id)->with($notify_message);
            }
        }else{
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('seller.subscription.payment.pay', $plan_id)->with($notify_message);
        }
    }


    public function flutterwave_payment(Request $request, $plan_id){

        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $this->payment_setting->flutterwave_secret_key;
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if($response->status == 'success'){

            $auth_user = Auth::guard('web')->user();

            $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

            $package_main_price = $plan->plan_price;

            $order = $this->create_order($auth_user, $plan, $package_main_price, 'Flutterwave', 'success', $tnx_id);

            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success' , 'message' => $notify_message]);
        }else{
            $notify_message = trans('translate.Something went wrong, please try again');
            return response()->json(['status' => 'faild' , 'message' => $notify_message]);
        }


    }


    public function mollie_payment(Request $request, $plan_id){

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();

        $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

        $package_main_price = $plan->plan_price;

        try{
            $mollie_currency = Currency::findOrFail($this->payment_setting->mollie_currency_id);

            $price = $package_main_price * $mollie_currency->currency_rate;
            $price = sprintf('%0.2f', $price);

            $mollie_api_key = $this->payment_setting->mollie_key;

            $currency = strtoupper($mollie_currency->currency_code);

            Mollie::api()->setApiKey($mollie_api_key);

            $payment = Mollie::api()->payments()->create([
                'amount' => [
                    'currency' => $currency,
                    'value' => ''.$price.'',
                ],
                'description' => env('APP_NAME'),
                'redirectUrl' => route('seller.subscription.payment.mollie-callback'),
            ]);

            $payment = Mollie::api()->payments()->get($payment->id);

            Session::put('plan_id', $plan_id);
            Session::put('payment_id', $payment->id);

            return redirect($payment->getCheckoutUrl(), 303);

        }catch (Exception $e) {
            Log::info($e->getMessage());
            $notify_message = trans('translate.Please provide valid mollie api key');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

    }


    public function mollie_callback(Request $request){

        $mollie_api_key = $this->payment_setting->mollie_key;
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments->get(session()->get('payment_id'));
        if ($payment->isPaid()){

            $plan_id = Session::get('plan_id');

            $auth_user = Auth::guard('web')->user();

            $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

            $package_main_price = $plan->plan_price;

            $order = $this->create_order($auth_user, $plan, $package_main_price, 'Mollie', 'success', session()->get('payment_id'));

            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->route('seller.subscription.purchase-history')->with($notify_message);

        }else{
            $plan_id = Session::get('plan_id');

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('seller.subscription.payment.pay', $plan_id)->with($notify_message);
        }


    }


    public function paystack_payment(Request $request, $plan_id){

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $this->payment_setting->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST =>0,
            CURLOPT_SSL_VERIFYPEER =>0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $final_data = json_decode($response);
        if($final_data->status == true) {

            $auth_user = Auth::guard('web')->user();

            $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

            $package_main_price = $plan->plan_price;

            $order = $this->create_order($auth_user, $plan, $package_main_price, 'Paystack', 'success', $transaction);

            $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success' , 'message' => $notify_message]);

        }else{
            $notify_message = trans('translate.Something went wrong, please try again');
            return response()->json(['status' => 'faild' , 'message' => $notify_message]);
        }


    }

    public function instamojo_payment(Request $request, $plan_id){
        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();

        $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

        $package_main_price = $plan->plan_price;

        $instamojo_currency = Currency::findOrFail($this->payment_setting->instamojo_currency_id);

        $price = $package_main_price * $instamojo_currency->currency_rate;
        $price = round($price,2);

        $environment = $this->payment_setting->instamojo_account_mode;
        $api_key = $this->payment_setting->instamojo_api_key;
        $auth_token = $this->payment_setting->instamojo_auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url.'payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $payload = Array(
            'purpose' => env("APP_NAME"),
            'amount' => $price,
            'phone' => '918160651749',
            'buyer_name' => Auth::user()->name,
            'redirect_url' => route('seller.subscription.payment.instamojo-callback'),
            'send_email' => true,
            'webhook' => 'http://www.example.com/webhook/',
            'send_sms' => true,
            'email' => Auth::user()->email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        Session::put('plan_id', $plan_id);

        return redirect($response->payment_request->longurl);

    }

    public function instamojo_callback(Request $request){


        $input = $request->all();

        $environment = $this->payment_setting->instamojo_account_mode;
        $api_key = $this->payment_setting->instamojo_api_key;
        $auth_token = $this->payment_setting->instamojo_auth_token;

        if($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.'payments/'.$request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"));
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $plan_id = Session::get('plan_id');

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('seller.subscription.payment.pay', $plan_id)->with($notify_message);

        } else {
            $data = json_decode($response);
        }

        if($data->success == true) {
            if($data->payment->status == 'Credit') {

                $plan_id = Session::get('plan_id');

                $auth_user = Auth::guard('web')->user();

                $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

                $package_main_price = $plan->plan_price;

                $order = $this->create_order($auth_user, $plan, $package_main_price, 'Instamojo', 'success', $request->get('payment_id'));

                $notify_message = trans('translate.Your payment has been made successful. Thanks for your new purchase');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
                return redirect()->route('seller.subscription.purchase-history')->with($notify_message);


            }
        }else{
            $plan_id = Session::get('plan_id');

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('seller.subscription.payment.pay', $plan_id)->with($notify_message);
        }

    }


    public function bank_payment(Request $request, $plan_id){

        $request->validate([
            'tnx_info' => 'required|max:255'
        ],[
            'tnx_info.required' => trans('translate.Transaction field is required')
        ]);

        $auth_user = Auth::guard('web')->user();

        $plan = SubscriptionPlan::where('status', 'active')->where('id', $plan_id)->firstOrFail();

        $package_main_price = $plan->plan_price;

        $order = $this->create_order($auth_user, $plan, $package_main_price, 'Bank Payment', 'pending', $request->tnx_info);

        $notify_message = trans('translate.Your payment has been made. please wait for admin payment approval');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('seller.subscription.purchase-history')->with($notify_message);

    }


    public function create_order($user, $subscription_plan, $package_main_price, $payment_method, $payment_status, $transaction_id){

        $purchase = new SubscriptionHistory();

        if($subscription_plan->expiration_date == 'monthly'){
            $expiration_date = date('Y-m-d', strtotime('30 days'));
        }elseif($subscription_plan->expiration_date == 'yearly'){
            $expiration_date = date('Y-m-d', strtotime('365 days'));
        }elseif($subscription_plan->expiration_date == 'lifetime'){
            $expiration_date = 'lifetime';
        }

        SubscriptionHistory::where('user_id', $user->id)->update(['status' => 'expired']);

        $purchase->order_id = substr(rand(0,time()),0,10);
        $purchase->user_id = $user->id;
        $purchase->subscription_plan_id = $subscription_plan->id;
        $purchase->plan_name = $subscription_plan->plan_name;
        $purchase->plan_price = $subscription_plan->plan_price;
        $purchase->expiration = $subscription_plan->expiration_date;
        $purchase->expiration_date = $expiration_date;
        $purchase->max_listing = $subscription_plan->max_listing;
        $purchase->featured_listing = $subscription_plan->featured_listing;
        $purchase->recommended_seller = $subscription_plan->recommended_seller;
        $purchase->status = 'active';
        $purchase->payment_method = $payment_method;
        $purchase->payment_status = $payment_status;
        $purchase->transaction = $transaction_id;
        $purchase->save();

        return $purchase;

    }

}
