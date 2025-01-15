<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ecommerce\Entities\Order;

class UserOrderController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->guard('web')->user();
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');

        $query = Order::where('user_id', $user->id)
            ->with(['order_detail', 'order_detail.singleProduct']);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('order_id', 'like', "%{$search}%")
                    ->orWhere('transaction_id', 'like', "%{$search}%");
            });
        }

        $orders = $query->latest()->paginate($perPage);
        return view('ecommerce::user.order.index', compact('orders', 'user'));
    }

    public function singleOrder($orderId)
    {
        $user = auth()->guard('web')->user();
        $order = Order::where('user_id', $user->id)
            ->where('order_id', $orderId)
            ->with(['order_detail', 'order_detail.singleProduct'])->firstOrFail();
        return view('ecommerce::user.order.single_order', compact('order'));
    }
}
