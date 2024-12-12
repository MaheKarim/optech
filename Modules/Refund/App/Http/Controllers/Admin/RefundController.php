<?php

namespace Modules\Refund\App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Wallet\App\Models\Wallet;
use Modules\Refund\App\Models\RefundRequest;
use Modules\Wallet\App\Models\WalletTransaction;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $refunds = RefundRequest::with('order', 'buyer')->latest();

        if($request->type == 'pending'){

            $title = trans('translate.Pending Refund');
            $refunds = $refunds->where('status', 'pending');
            
        }elseif($request->type == 'rejected'){

            $title = trans('translate.Rejected Refund');
            $refunds = $refunds->where('status', 'rejected');

        }elseif($request->type == 'approved'){

            $title = trans('translate.Approved Refund');
            $refunds = $refunds->where('status', 'approved');
            
        }else{
            $title = trans('translate.Refund List');
        }

        $refunds = $refunds->get();

        return view('refund::admin.index', [
            'refunds' => $refunds,
            'title' => $title,
        ]);
    }


    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $refund = RefundRequest::with('order', 'buyer')->findOrFail($id);

        return view('refund::admin.show', ['refund' => $refund]);
    }

    public function refund_approval($id)
    {

        $refund = RefundRequest::findOrFail($id);
        $refund->status = 'approved';
        $refund->save();

        
        $my_wallet = Wallet::where('buyer_id', $refund->buyer_id)->first();

        if(!$my_wallet){
            $my_wallet = new Wallet();
            $my_wallet->buyer_id = $refund->buyer_id;
            $my_wallet->balance = 0.00;
            $my_wallet->save();
        }


        $my_wallet->balance = $my_wallet->balance + $refund->refund_amount;
        $my_wallet->save();
        
        $wallet_transaction = new WalletTransaction();
        $wallet_transaction->buyer_id = $refund->buyer_id;
        $wallet_transaction->amount = $refund->refund_amount;
        $wallet_transaction->payment_gateway = 'Refund amount';
        $wallet_transaction->transaction_id = 'from_refund';
        $wallet_transaction->payment_status = 'success';
        $wallet_transaction->payment_type = 'credit';
        $wallet_transaction->save();

        $notify_message= trans('translate.Refund approved successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function refund_rejected($id)
    {

        $refund = RefundRequest::findOrFail($id);
        $refund->status = 'rejected';
        $refund->save();

        $notify_message= trans('translate.Refund rejected successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $refund = RefundRequest::findOrFail($id);
        $refund->delete();

        $notify_message= trans('translate.Refund deleted successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.refund.index')->with($notify_message);
    }
}
