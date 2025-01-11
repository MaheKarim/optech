<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\PaypalPayment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Ecommerce\Entities\Cart;
use Modules\Ecommerce\Entities\Order;
use Modules\Ecommerce\Entities\OrderDetail;
use Modules\Ecommerce\Entities\ShippingMethod;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class UserPaypalController extends Controller
{

    public function paypal(Request $request)
    {
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('translate.This Is Demo Version. You Can Not Change Anything');
            return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
        }

        $user = Auth::guard('web')->user();
        $paypal_setting = PaypalPayment::first();

        // Get cart details
        $cart = Cart::where('user_id', $user->id)->with('product')->get();

        // Validate cart is not empty
        if($cart->isEmpty()) {
            return redirect()->back()->with([
                'messege' => trans('translate.Your cart is empty'),
                'alert-type' => 'error'
            ]);
        }

        $orderData = session()->get('orderData');

        $total = $orderData['total'];

        $payable_amount = round($total * $paypal_setting->currency->currency_rate, 2);


        config(['paypal.mode' => $paypal_setting->account_mode]);

        if($paypal_setting->account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $paypal_setting->client_id]);
            config(['paypal.sandbox.client_secret' => $paypal_setting->secret_id]);
        }else{
            config(['paypal.live.client_id' => $paypal_setting->client_id]);
            config(['paypal.live.client_secret' => $paypal_setting->secret_id]);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.paypal-success-payment'),
                "cancel_url" => route('user.paypalFailedPayment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $paypal_setting->currency->currency_code,
                        "value" => $payable_amount
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
        }

        return redirect()->back()->with([
            'messege' => trans('translate.Something went wrong, please try again'),
            'alert-type' => 'error'
        ]);
    }

    public function paypal_success_payment(Request $request)
    {
        // Get order details from session
        $orderData = session()->get('orderData');

        if (!$orderData) {
            return redirect()->route('payment')->with([
                'messege' => trans('translate.Order details not found'),
                'alert-type' => 'error'
            ]);
        }

        $paypal_setting = PaypalPayment::first();

        config(['paypal.mode' => $paypal_setting->account_mode]);

        if($paypal_setting->account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $paypal_setting->client_id]);
            config(['paypal.sandbox.client_secret' => $paypal_setting->secret_id]);
        }else{
            config(['paypal.live.client_id' => $paypal_setting->client_id]);
            config(['paypal.live.client_secret' => $paypal_setting->secret_id]);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $user = Auth::guard('web')->user();

            try {
                $order = $this->create_order($user, $orderData, 'Paypal', Status::APPROVED, $response['id']);

                // Clear session data after successful order creation
                session()->forget('order_details');

                return redirect()->route('user-order.index')->with([
                    'messege' => trans('translate.Your payment has been made successful. Thanks for your new purchase'),
                    'alert-type' => 'success'
                ]);
            } catch (\Exception $e) {
                \Log::error('PayPal Order Creation Error: ' . $e->getMessage());
                return redirect()->route('payment')->with([
                    'messege' => trans('translate.Error creating order. Please contact support'),
                    'alert-type' => 'error'
                ]);
            }
        }

        return redirect()->route('payment')->with([
            'messege' => trans('translate.Payment failed or cancelled'),
            'alert-type' => 'error'
        ]);
    }

    public function paypalFailedPayment(Request $request)
    {
        $notification = trans('translate.Something went wrong, please try again');
        $notification = array('messege'=>$notification,'alert-type'=>'error');
        return redirect()->route('payment')->with($notification);
    }

    protected function create_order($user, array $orderData, $payment_method, $payment_status, $tnx_info = null)
    {
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
