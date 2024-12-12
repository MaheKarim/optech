<?php

use Modules\Subscription\Http\Controllers\Admin\SubscriptionLogController;
use Modules\Subscription\Http\Controllers\Admin\SubscriptionPlanController;


use Modules\Subscription\Http\Controllers\Seller\SubscriptionPlanController as SellerSubscriptionPlanController;




Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']],function (){
    Route::resource('subscription-plan', SubscriptionPlanController::class);
    Route::get('purchase-history', [SubscriptionLogController::class, 'index'])->name('purchase-history');
    Route::get('pending-purchase-history', [SubscriptionLogController::class, 'pending_index'])->name('pending-purchase-history');

    Route::get('/assign-plan',[SubscriptionLogController::class, 'assign_plan'])->name('assign-plan');
    Route::post('/store-assign-plan',[SubscriptionLogController::class, 'assign_plan_store'])->name('store-assign-plan');

    Route::get('purchase-history-detail/{id}', [SubscriptionLogController::class, 'show'])->name('purchase-history-detail');
    Route::delete('purchase-history-destroy/{id}', [SubscriptionLogController::class, 'destroy'])->name('purchase-history-destroy');
    Route::post('purchase-history-payment-approved/{id}', [SubscriptionLogController::class, 'approval_payment'])->name('purchase-history-payment-approved');
});

Route::group(['as'=> 'seller.', 'prefix' => 'seller'],function (){

 

    Route::group(['as'=> 'subscription.', 'prefix' => 'subscription'],function (){

        Route::get('/purchase-history',[SellerSubscriptionPlanController::class, 'purchase_history'])->name('purchase-history');
        

        Route::get('/plan',[SellerSubscriptionPlanController::class, 'index'])->name('plan');

        Route::group(['as' => 'payment.', 'prefix' => 'payment', 'middleware' => ['auth:web']], function(){

            Route::get('/pay/{id}',[SellerSubscriptionPlanController::class, 'payment'])->name('pay');
            
            Route::get('/free-enroll/{id}',[SellerSubscriptionPlanController::class, 'free_enroll'])->name('free-enroll');

            Route::post('/stripe/{plan_id}', [SellerSubscriptionPlanController::class, 'stirpe_payment'])->name('stripe');
            Route::post('/bank/{plan_id}', [SellerSubscriptionPlanController::class, 'bank_payment'])->name('bank');

            Route::get('/paypal/{plan_id}', [SellerSubscriptionPlanController::class, 'paypal_payment'])->name('paypal');
            Route::get('/paypal-success-payment', [SellerSubscriptionPlanController::class, 'paypal_success_payment'])->name('paypal-success-payment');
            Route::get('/paypal-faild-payment', [SellerSubscriptionPlanController::class, 'paypal_faild_payment'])->name('paypal-faild-payment');


            Route::post('/razorpay/{plan_id}', [SellerSubscriptionPlanController::class, 'razorpay_payment'])->name('razorpay');

            Route::post('/flutterwave/{plan_id}', [SellerSubscriptionPlanController::class, 'flutterwave_payment'])->name('flutterwave');

            Route::get('/mollie/{plan_id}', [SellerSubscriptionPlanController::class, 'mollie_payment'])->name('mollie');
            Route::get('/mollie-callback', [SellerSubscriptionPlanController::class, 'mollie_callback'])->name('mollie-callback');

            Route::post('/paystack/{plan_id}', [SellerSubscriptionPlanController::class, 'paystack_payment'])->name('paystack');

            Route::get('/instamojo/{plan_id}', [SellerSubscriptionPlanController::class, 'instamojo_payment'])->name('instamojo');
            Route::get('/instamojo-callback', [SellerSubscriptionPlanController::class, 'instamojo_callback'])->name('instamojo-callback');

            Route::get('/wallet/{plan_id}', [SellerSubscriptionPlanController::class, 'wallet_payment'])->name('wallet');

        });
        


    });
});