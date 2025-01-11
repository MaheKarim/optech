<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ecommerce\Entities\Order;

class UserOrderController extends Controller
{

    public function index()
    {
        $user = auth()->guard('web')->user();
        $orders = Order::where('user_id', $user->id)->with(['order_detail', 'order_detail.singleProduct'])->latest()->paginate(20);

        return view('ecommerce::user.order.index', compact('orders', 'user'));
    }
}
