<?php

namespace Modules\Subscription\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\Entities\SubscriptionPlan;

use Modules\Subscription\Http\Requests\SubscriptionPlanRequest;
use Modules\Subscription\Entities\SubscriptionHistory;

class SubscriptionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $plans = SubscriptionPlan::orderBy('serial', 'asc')->get();

        return view('subscription::admin.index', ['plans' => $plans]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('subscription::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(SubscriptionPlanRequest $request)
    {

        $plan = new SubscriptionPlan();
        $plan->plan_name = $request->plan_name;
        $plan->plan_price = $request->plan_price;
        $plan->expiration_date = $request->expiration_date;
        $plan->serial = $request->serial;
        $plan->max_listing = $request->max_listing;
        $plan->featured_listing = $request->featured_listing;
        $plan->status = $request->status ? 'active' : 'inactive';
        $plan->recommended_seller = $request->recommended_seller ? 'active' : 'inactive';
        $plan->save();

        $notify_message = trans('translate.Create Successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.subscription-plan.index')->with($notify_message);

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $plan = SubscriptionPlan::findOrFail($id);

        return view('subscription::admin.edit', ['plan' => $plan]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(SubscriptionPlanRequest $request, $id)
    {
        $plan = SubscriptionPlan::findOrFail($id);

        $plan->plan_name = $request->plan_name;
        $plan->plan_price = $request->plan_price;
        $plan->expiration_date = $request->expiration_date;
        $plan->serial = $request->serial;
        $plan->max_listing = $request->max_listing;
        $plan->featured_listing = $request->featured_listing;
        $plan->status = $request->status ? 'active' : 'inactive';
        $plan->recommended_seller = $request->recommended_seller ? 'active' : 'inactive';
        $plan->save();

        $notify_message = trans('translate.Update Successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.subscription-plan.index')->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $purchase_qty = SubscriptionHistory::where('subscription_plan_id', $id)->count();
        if($purchase_qty > 0){
            $notify_message = trans('translate.Multiple order already created using it, so you can not delete this one');
            $notify_message = array('massage'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $plan = SubscriptionPlan::findOrFail($id);
        $plan->delete();

        $notify_message = trans('translate.Delete Successfully');
        $notify_message = array('massage'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.subscription-plan.index')->with($notify_message);
    }
}
