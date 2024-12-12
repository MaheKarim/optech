<?php

namespace Modules\Wallet\App\Http\Controllers;

use Session, Auth;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Wallet\App\Models\Wallet;
use Modules\Wallet\App\Models\WalletTransaction;
use Modules\Wallet\App\Http\Requests\WalletRequest;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_user = Auth::guard('web')->user();

        $my_wallet = Wallet::where('buyer_id', $auth_user->id)->first();

        if(!$my_wallet){
            $my_wallet = new Wallet();
            $my_wallet->buyer_id = $auth_user->id;
            $my_wallet->balance = 0.00;
            $my_wallet->save();
        }

        $orders_by_wallet = Order::where('buyer_id', $auth_user->id)->where('payment_method', 'Wallet')->sum('total_amount');

        $current_balance = $my_wallet->balance - $orders_by_wallet;

        $wallet_transactions = WalletTransaction::where('buyer_id', $auth_user->id)->latest()->get();

        return view('wallet::index', [
            'my_wallet' => $my_wallet,
            'current_balance' => $current_balance,
            'orders_by_wallet' => $orders_by_wallet,
            'wallet_transactions' => $wallet_transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallet::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WalletRequest $request)
    {
        Session::put('wallet_amount', $request->amount);
        Session::put('wallet_payment_gateway', $request->payment_gateway);

        if($request->payment_gateway == 'Stripe'){
            return redirect()->route('buyer.wallet-payment.stripe');
        }elseif($request->payment_gateway == 'Paypal'){
            return redirect()->route('buyer.wallet-payment.paypal');
        }elseif($request->payment_gateway == 'Mollie'){
            return redirect()->route('buyer.wallet-payment.mollie');
        }elseif($request->payment_gateway == 'Razorpay'){
            return redirect()->route('buyer.wallet-payment.razorpay');
        }


    }
}
