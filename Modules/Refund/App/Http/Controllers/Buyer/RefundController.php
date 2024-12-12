<?php

namespace Modules\Refund\App\Http\Controllers\Buyer;

use Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Refund\App\Models\RefundRequest;
use Modules\Refund\App\Http\Requests\RefundValidateRequest;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::guard('web')->user();

        $refunds = RefundRequest::with('order', 'buyer')->where('buyer_id', $user->id)->latest()->get();

        return view('refund::buyer.index', ['refunds' => $refunds]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RefundValidateRequest $request)
    {

        
        $user = Auth::guard('web')->user();

        $order = Order::where('buyer_id', $user->id)->where('id', $request->order_id)->first();

        $is_exist = RefundRequest::where('order_id', $request->order_id)->first();
        if($is_exist){
            $notify_message = trans('translate.Refund request already send to admin');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $refund = new RefundRequest();
        $refund->buyer_id = $order->buyer_id;
        $refund->seller_id = $order->seller_id;
        $refund->order_id = $order->id;
        $refund->refund_amount = $order->total_amount;
        $refund->note = $request->note;
        $refund->save();

        $notify_message = trans('translate.Refund request send to admin. please wait for admin approval');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('refund::show');
    }

}
