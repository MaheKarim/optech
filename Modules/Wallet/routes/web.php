<?php

use Illuminate\Support\Facades\Route;
use Modules\Wallet\App\Http\Controllers\WalletController;
use Modules\Wallet\App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['as' => 'buyer.', 'prefix' => 'buyer', 'middleware' => ['auth:web', 'HtmlSpecialchars', 'MaintenanceMode']], function () {
    Route::resource('wallet', WalletController::class)->names('wallet');

    Route::group(['as' => 'wallet-payment.', 'prefix' => 'wallet-payment'], function () {

        Route::get('/stripe', [PaymentController::class, 'stripe_payment'])->name('stripe');
        Route::post('/stripe-store', [PaymentController::class, 'stripe_payment_store'])->name('stripe-store');

        Route::get('/paypal', [PaymentController::class, 'paypal_payment'])->name('paypal');
        Route::get('/paypal-success-payment', [PaymentController::class, 'paypal_success_payment'])->name('paypal-success-payment');
        Route::get('/paypal-faild-payment', [PaymentController::class, 'paypal_faild_payment'])->name('paypal-faild-payment');
        
        Route::get('/mollie', [PaymentController::class, 'mollie_payment'])->name('mollie');
        Route::get('/mollie-callback', [PaymentController::class, 'mollie_callback'])->name('mollie-callback');


        Route::get('/razorpay', [PaymentController::class, 'razorpay_payment'])->name('razorpay');
        Route::post('/razorpay-store', [PaymentController::class, 'razorpay_payment_store'])->name('razorpay-store');

    });


});
