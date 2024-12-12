<?php

namespace Modules\Subscription\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Listing\Entities\Listing;
use Illuminate\Contracts\Support\Renderable;
use Modules\Subscription\Entities\SubscriptionPlan;
use Modules\Subscription\Entities\SubscriptionHistory;

class SubscriptionLogController extends Controller
{ 
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $histories = SubscriptionHistory::latest()->get();

        return view('subscription::admin.history', ['histories' => $histories]);
    }

    public function pending_index()
    {
        $histories = SubscriptionHistory::where('status', 'pending')->latest()->get();

        return view('subscription::admin.pending_history', ['histories' => $histories]);
    }




    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $history = SubscriptionHistory::findOrFail($id);

        return view('subscription::admin.history_detail', ['history' => $history]);
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $history = SubscriptionHistory::findOrFail($id);
        $history->delete();

        $notify_message = trans('translate.Deleted Successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.purchase-history')->with($notify_message);
    }

    public function approval_payment($id)
    {
        $history = SubscriptionHistory::findOrFail($id);

        SubscriptionHistory::where('user_id', $history->user_id)->update(['status' => 'expired']);

        $history->payment_status = 'success';
        $history->status = 'active';
        $history->save();

        $expiration_date = $history->expiration_date;

        if($expiration_date == 'lifetime'){
            Listing::where('agent_id', $history->user_id)->update(['expired_date' => null]);
        }else{
            Listing::where('agent_id', $history->user_id)->update(['expired_date' => $expiration_date]);
        }

        $listings = Listing::where('agent_id', $history->user_id)->get();

        if($listings->count() > $history->max_listing){

            foreach($listings as $index => $listing){
                if($index > $history->max_listing){
                    $listing->approved_by_admin = 'pending';
                    $listing->save();
                }
            }
        }


        $notify_message = trans('translate.Payment approved Successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }


    public function assign_plan(){

        $plans = SubscriptionPlan::orderBy('serial', 'asc')->get();

        $users = User::where('status', 'enable')->where('is_seller', 1)->latest()->get();

        return view('subscription::admin.assign_plan', [
            'plans' => $plans,
            'users' => $users,
        ]);
    }

    public function assign_plan_store(Request $request){

        $request->validate([
            'user_id' => 'required',
            'plan_id' => 'required',
        ]);

        $subscription_plan = SubscriptionPlan::findOrFail($request->plan_id);

        if($subscription_plan->plan_price == '0.00'){

            $free_exist = SubscriptionHistory::where('user_id', $request->user_id)->where(['payment_method' => 'Free'])->count();

            if($free_exist > 0){
                $notify_message = trans('Trail version already applied');
                $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
                return redirect()->back()->with($notify_message);
            }
        }

        $purchase = new SubscriptionHistory();

        if($subscription_plan->expiration_date == 'monthly'){
            $expiration_date = date('Y-m-d', strtotime('30 days'));
        }elseif($subscription_plan->expiration_date == 'yearly'){
            $expiration_date = date('Y-m-d', strtotime('365 days'));
        }elseif($subscription_plan->expiration_date == 'lifetime'){
            $expiration_date = 'lifetime';
        }
        
        SubscriptionHistory::where('user_id', $request->user_id)->update(['status' => 'expired']);

        $purchase->order_id = substr(rand(0,time()),0,10);
        $purchase->user_id = $request->user_id;
        $purchase->subscription_plan_id = $subscription_plan->id;
        $purchase->plan_name = $subscription_plan->plan_name;
        $purchase->plan_price = $subscription_plan->plan_price;
        $purchase->expiration = $subscription_plan->expiration_date;
        $purchase->expiration_date = $expiration_date;
        $purchase->max_listing = $subscription_plan->max_listing;
        $purchase->featured_listing = $subscription_plan->featured_listing;
        $purchase->recommended_seller = $subscription_plan->recommended_seller;
        $purchase->status = 'active';
        if($subscription_plan->plan_price == '0.00'){
            $purchase->payment_method = 'Free';
        }else{
            $purchase->payment_method = 'hand_cash';
        }
        
        $purchase->payment_status = 'success';
        $purchase->transaction = 'hand_cash';
        $purchase->save();

        $notify_message = trans('Plan assigned successful');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
        
    }

    
}
