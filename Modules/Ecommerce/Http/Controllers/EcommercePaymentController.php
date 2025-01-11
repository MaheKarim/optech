<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Constants\Status;
use App\Models\PaystackAndMollie;
use Modules\Ecommerce\Entities\Cart;
use Modules\Ecommerce\Entities\Order;
use Modules\Ecommerce\Entities\OrderDetail;
use Modules\Ecommerce\Entities\ShippingMethod;
use Mollie\Laravel\Facades\Mollie;
use Session, Auth, Stripe, Mail, Str, Exception, Redirect;
use App\Models\StripePayment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaypalPayment;
use App\Models\RazorpayPayment;
use App\Models\Flutterwave;
use App\Models\InstamojoPayment;
use App\Models\BankPayment;
use Razorpay\Api\Api;

class EcommercePaymentController extends Controller
{

    public function stripe(Request $request)
    {
        if (env('APP_MODE') == 'DEMO') {
            return redirect()->back()->with([
                'messege' => trans('translate.This Is Demo Version. You Can Not Change Anything'),
                'alert-type' => 'error'
            ]);
        }

        try {
            $user = Auth::guard('web')->user();
            if (!$user) {
                throw new \Exception(trans('translate.User not authenticated'));
            }

            $stripe = StripePayment::first();
            if (!$stripe) {
                throw new \Exception(trans('translate.Stripe configuration not found'));
            }

           $orderData = session()->get('orderData');

           $total = $orderData['total'];

            $payable_amount = round($total * $stripe->currency->currency_rate, 2);

            // Set Stripe API key
            Stripe\Stripe::setApiKey($stripe->stripe_secret);
            // Create Stripe charge
            $result = Stripe\Charge::create([
                "amount" => (int)($payable_amount * 100), // Convert to cents
                "currency" => $stripe->currency->currency_code,
                "source" => $request->stripeToken,
                "description" => env('APP_NAME')
            ]);


            // Create first order
            $order = $this->create_order($user, $orderData, 'Stripe', Status::APPROVED);

            // Create second order with same data

            return redirect()->route('user-order.index')->with([
                'messege' => trans('translate.Your payment has been made successful. Thanks for your new purchase'),
                'alert-type' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'messege' => $e->getMessage() ?? trans('translate.Something went wrong, please try again'),
                'alert-type' => 'error'
            ]);
        }
    }

    public function bank(Request $request)
    {
        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $rules = [
            'tnx_info' => 'required',
        ];
        $customMessages = [
            'tnx_info.required' => trans('translate.Transaction is required'),
        ];

        $request->validate($rules, $customMessages);

        $user = Auth::guard('web')->user();

        $orderData = session()->get('orderData');

        $total = $orderData['total'];


        $order = $this->create_order($user, $orderData,'Bank_Payment',Status::PENDING, $request->tnx_info);

        $notification = trans('translate.Your payment has been made. please wait for admin payment approval');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('user-order.index')->with($notification);
    }

    public function pay_via_razorpay(Request $request)
    {

        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $razorpay = RazorpayPayment::first();
        $input = $request->all();
        $api = new Api($razorpay->key, $razorpay->secret_key);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $payId = $response->id;

                $user = Auth::guard('web')->user();

               // Create first order
                $orderData = session()->get('orderData');
                $order = $this->create_order($user, $orderData, 'Razorpay', Status::APPROVED);

                $notification = trans('translate.Your payment has been made successful. Thanks for your new purchase');
                $notification = array('messege' => $notification, 'alert-type' => 'success');
                return redirect()->route('user-order.index')->with($notification);

            } catch (Exception $e) {
                $notification = trans('translate.Something went wrong, please try again');
                $notification = array('messege' => $notification, 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = trans('translate.Something went wrong, please try again');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function pay_via_flutterwave(Request $request, $id)
    {

        $flutterwave = Flutterwave::first();
        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $flutterwave->secret_key;
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
        if ($response->status == 'success') {

            $user = Auth::guard('web')->user();

            // Create first order
            $orderData = session()->get('orderData');
            $order = $this->create_order($user, $orderData, 'Flutterwave', Status::APPROVED);

            return redirect()->route('user-order.index')->with([
                'messege' => trans('translate.Your payment has been made successful. Thanks for your new purchase'),
                'alert-type' => 'success'
            ]);


        } else {
            $notification = trans('translate.Something went wrong, please try again');
            return response()->json(['status' => 'faild', 'message' => $notification]);
        }
    }

    public function pay_via_payStack(Request $request)
    {

        $paystack = PaystackAndMollie::first();

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $paystack->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
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

        if ($final_data->status == true) {

            $user = Auth::guard('web')->user();

             // Create first order
             $orderData = session()->get('orderData');
             $order = $this->create_order($user, $orderData, 'Paystack', Status::APPROVED);

            $notification = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success', 'message' => $notification]);
        } else {
            $notification = trans('translate.Something went wrong, please try again');
            return response()->json(['status' => 'faild', 'message' => $notification]);
        }
    }

    public function pay_via_mollie(Request $request)
    {

        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $user = Auth::guard('web')->user();

        $orderData = session()->get('orderData');

        $total = $orderData['total'];

        $mollie = PaystackAndMollie::first();
        $price = $total * $mollie->mollie_currency->currency_rate;
        $price = sprintf('%0.2f', $price);

        $mollie_api_key = $mollie->mollie_key;
        $currency = strtoupper($mollie->mollie_currency->currency_code);
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $currency,
                'value' => '' . $price . '',
            ],
            'description' => env('APP_NAME'),
            'redirectUrl' => route('ecommerce.mollie-payment-success'),
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);
        session()->put('payment_id', $payment->id);
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function mollie_payment_success(Request $request)
    {

        $mollie = PaystackAndMollie::first();
        $mollie_api_key = $mollie->mollie_key;
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments->get(session()->get('payment_id'));
        if ($payment->isPaid()) {

            $user = Auth::guard('web')->user();

            $orderData = session()->get('orderData');
            $order = $this->create_order($user, $orderData, 'Mollie', Status::APPROVED);

            $notification = trans('translate.Your payment has been made successful. Thanks for your new purchase');
            $notification = array('messege' => $notification, 'alert-type' => 'success');
            return redirect()->route('user-order.index')->with($notification);
        } else {

            $notification = trans('translate.Something went wrong, please try again');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }


    public function pay_via_instamojo(Request $request)
    {


        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $user = Auth::guard('web')->user();

        $orderData = session()->get('orderData');

        $total = $orderData['total'];

        $instamojoPayment = InstamojoPayment::first();
        $price = $total * $instamojoPayment->currency->currency_rate;
        $price = round($price, 2);

        $environment = $instamojoPayment->account_mode;
        $api_key = $instamojoPayment->api_key;
        $auth_token = $instamojoPayment->auth_token;

        if ($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url . 'payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"
            )
        );
        $payload = array(
            'purpose' => env("APP_NAME"),
            'amount' => $price,
            'phone' => '918160651749',
            'buyer_name' => Auth::user()->name,
            'redirect_url' => route('ecommerce.response-instamojo'),
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
        return redirect($response->payment_request->longurl);
    }

    public function instamojo_response(Request $request)
    {

        $input = $request->all();
        $instamojoPayment = InstamojoPayment::first();
        $environment = $instamojoPayment->account_mode;
        $api_key = $instamojoPayment->api_key;
        $auth_token = $instamojoPayment->auth_token;

        if ($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . 'payments/' . $request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"
            )
        );
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {

            $notification = trans('translate.Something went wrong, please try again');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        } else {
            $data = json_decode($response);
        }

        if ($data->success == true) {
            if ($data->payment->status == 'Credit') {


                $user = Auth::guard('web')->user();

                $orderData = session()->get('orderData');
                $order = $this->create_order($user, $orderData, 'Instamojo', Status::APPROVED);

                $notification = trans('translate.Your payment has been made successful. Thanks for your new purchase');
                $notification = array('messege' => $notification, 'alert-type' => 'success');
                return redirect()->route('user-order.index')->with($notification);
            }
        } else {
            $notification = trans('translate.Something went wrong, please try again');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }





    protected function create_order($user, array $orderData, $payment_method, $payment_status, $tnx_info = null)
    {
        // Update existing pending orders if payment is successful
        if ($payment_status == Status::PENDING) {
            Order::where('user_id', $user->id)
                ->where('payment_status', Status::PENDING)
                ->update(['payment_status' => Status::APPROVED]);
        }

        $order = new Order();
        $order->order_id =  time() . randomNumber(5);
        $order->user_id = $user->id;
        $order->subtotal = $orderData['subtotal'];
        $order->shipping_charge = $orderData['shipping_charge'];
        $order->total = $orderData['total'];
        $order->shipping_method_id = $orderData['shipping_method_id'];
        $order->address = $orderData['address'];
        $order->payment_method = $payment_method;
        $order->payment_status = $payment_status;
        $order->order_status = Status::APPROVED;
        $order->transaction_id = $tnx_info;
        $order->save();

        $cartItems = Cart::where('user_id', $user->id)->get();

        foreach ($cartItems as $item) {
            $price = $item->quantity * $item->product->finalPrice;
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $item->product_id;
            $orderDetail->quantity = $item->quantity;
            $orderDetail->price = $price;
            $orderDetail->save();
        }

        Cart::where('user_id', $user->id)->delete();
        return $order;
    }
}
