<?php

use Illuminate\Support\Facades\Route;
use Modules\Refund\App\Http\Controllers\Buyer\RefundController;
use Modules\Refund\App\Http\Controllers\Admin\RefundController as AdminRefundController;

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

    Route::resource('refund', RefundController::class)->names('refund');

});


Route::group(['as'=> 'admin.', 'prefix' => 'admin'], function () {
    Route::resource('refund', AdminRefundController::class)->names('refund');

    Route::post('refund-approval/{id}', [AdminRefundController::class, 'refund_approval'])->name('refund-approval');
    Route::post('refund-rejected/{id}', [AdminRefundController::class, 'refund_rejected'])->name('refund-rejected');

});


