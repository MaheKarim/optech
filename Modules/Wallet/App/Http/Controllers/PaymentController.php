<?php

namespace Modules\Wallet\App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use Modules\Wallet\App\Models\Wallet;
use Modules\Currency\App\Models\Currency;
use Modules\Wallet\App\Models\WalletTransaction;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Modules\PaymentGateway\App\Models\PaymentGateway;
use Stripe\Price;
use Stripe;
use Mollie\Laravel\Facades\Mollie;

use Razorpay\Api\Api;

class PaymentController extends Controller
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


    public function stripe_payment(){

        if(!Session::has('wallet_amount')){
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }

        return view('wallet::stripe', ['payment_setting' => $this->payment_setting]);
    }

    public function stripe_payment_store(Request $request){

        $auth_user = Auth::guard('web')->user();

        $wallet_amount = Session::get('wallet_amount');

        $stripe_currency = Currency::findOrFail($this->payment_setting->stripe_currency_id);

        $payable_amount = round($wallet_amount * $stripe_currency->currency_rate,2);

        Stripe\Stripe::setApiKey($this->payment_setting->stripe_secret);

        try{
            $result = Stripe\Charge::create ([
                "amount" => $payable_amount * 100,
                "currency" => $stripe_currency->currency_code,
                "source" => $request->stripeToken,
                "description" => env('APP_NAME')
            ]);
        }catch(Exception $ex){
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $order = $this->create_wallet_balance($auth_user, $wallet_amount, 'Stripe', 'success', $result->balance_transaction);

        $notify_message = trans('translate.The payment has been added to your wallet');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('buyer.wallet.index')->with($notify_message);
    }



    public function paypal_payment()
    {

        if(!Session::has('wallet_amount')){
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }

        $wallet_amount = Session::get('wallet_amount');

        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);

        $payable_amount = round($wallet_amount * $paypal_currency->currency_rate,2);

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
                "return_url" => route('buyer.wallet-payment.paypal-success-payment'),
                "cancel_url" => route('buyer.wallet-payment.paypal-faild-payment'),
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

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $wallet_amount = Session::get('wallet_amount');

            $auth_user = Auth::guard('web')->user();

            $order = $this->create_wallet_balance($auth_user, $wallet_amount, 'Paypal', 'success', $request->PayerID);

            $notify_message = trans('translate.The payment has been added to your wallet');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->route('buyer.wallet.index')->with($notify_message);

        } else {

            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }

    }

    public function paypal_faild_payment(Request $request){

        $notify_message = trans('translate.Something went wrong, please try again');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
        return redirect()->route('buyer.wallet.create')->with($notify_message);
    }


    public function mollie_payment(){

        if(!Session::has('wallet_amount')){
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }

        $auth_user = Auth::guard('web')->user();

        $wallet_amount = Session::get('wallet_amount');


        try{
            $mollie_currency = Currency::findOrFail($this->payment_setting->mollie_currency_id);

            $price = $wallet_amount * $mollie_currency->currency_rate;
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
                'redirectUrl' => route('buyer.wallet-payment.mollie-callback'),
            ]);

            $payment = Mollie::api()->payments()->get($payment->id);

            Session::put('payment_id', $payment->id);

            return redirect($payment->getCheckoutUrl(), 303);

        }catch (Exception $e) {
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

            $auth_user = Auth::guard('web')->user();

            $wallet_amount = Session::get('wallet_amount');

            $order = $this->create_wallet_balance($auth_user, $wallet_amount, 'Mollie', 'success', session()->get('payment_id'));

            $notify_message = trans('translate.The payment has been added to your wallet');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
            return redirect()->route('buyer.wallet.index')->with($notify_message);

        }else{
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }


    }




    public function razorpay_payment(){

        if(!Session::has('wallet_amount')){
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }

        if(env('APP_MODE') == 'DEMO'){
            $notify_message = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notify_message=array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }

        $razorpay_currency = Currency::findOrFail($this->payment_setting->razorpay_currency_id);

        return view('wallet::razorpay', ['payment_setting' => $this->payment_setting, 'razorpay_currency' => $razorpay_currency]);
    }


    public function razorpay_payment_store(Request $request){

        $input = $request->all();
        $api = new Api($this->payment_setting->razorpay_key,$this->payment_setting->razorpay_secret);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                $payId = $response->id;

                $auth_user = Auth::guard('web')->user();

                $wallet_amount = Session::get('wallet_amount');

                $order = $this->create_wallet_balance($auth_user, $wallet_amount, 'Razorpay', 'success', $payId);

                $notify_message = trans('translate.The payment has been added to your wallet');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
                return redirect()->route('buyer.wallet.index')->with($notify_message);

            }catch (Exception $e) {
                $notify_message = trans('translate.Something went wrong, please try again');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
                return redirect()->route('buyer.wallet.create')->with($notify_message);
            }
        }else{
            $notify_message = trans('translate.Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('buyer.wallet.create')->with($notify_message);
        }
    }

    public function create_wallet_balance($user, $wallet_amount, $payment_gateway, $payment_status, $transaction_id){


        $my_wallet = Wallet::where('buyer_id', $user->id)->first();

        if(!$my_wallet){
            $my_wallet = new Wallet();
            $my_wallet->buyer_id = $user->id;
            $my_wallet->balance = 0.00;
            $my_wallet->save();
        }

        $my_wallet->balance = $my_wallet->balance + $wallet_amount;
        $my_wallet->save();

        $wallet_transaction = new WalletTransaction();
        $wallet_transaction->buyer_id = $user->id;
        $wallet_transaction->amount = $wallet_amount;
        $wallet_transaction->payment_gateway = $payment_gateway;
        $wallet_transaction->transaction_id = $transaction_id;
        $wallet_transaction->payment_status = $payment_status;
        $wallet_transaction->payment_type = 'credit';
        $wallet_transaction->save();

        Session::forget('wallet_amount');
        Session::forget('wallet_payment_gateway');

    }
}
