<?php

use Illuminate\Support\Facades\Route;
use Modules\LiveChat\App\Http\Controllers\Buyer\LiveChatController;
use Modules\LiveChat\App\Http\Controllers\Seller\LiveChatController as SellerLiveChatController;

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


Route::group(['as' => 'buyer.', 'prefix' => 'buyer', 'middleware' => [ 'HtmlSpecialchars', 'MaintenanceMode', 'auth:web']], function () {

    Route::get('livechat', [LiveChatController::class, 'index'])->name('livechat');
    Route::get('get-message-body/{buyer_id}', [LiveChatController::class, 'get_message_body'])->name('get-message-body');
    Route::get('get-message-list/{buyer_id}', [LiveChatController::class, 'get_message_list'])->name('get-message-list');
    Route::post('store-message', [LiveChatController::class, 'store'])->name('store-message');
    Route::post('store-message-from-service', [LiveChatController::class, 'store_from_service'])->name('store-message-from-service');

});


Route::group(['as' => 'seller.', 'prefix' => 'seller', 'middleware' => [ 'HtmlSpecialchars', 'MaintenanceMode', 'auth:web']], function () {

    Route::get('livechat', [SellerLiveChatController::class, 'index'])->name('livechat');
    Route::get('get-message-body/{buyer_id}', [SellerLiveChatController::class, 'get_message_body'])->name('get-message-body');
    Route::get('get-message-list/{buyer_id}', [SellerLiveChatController::class, 'get_message_list'])->name('get-message-list');
    Route::post('store-message', [SellerLiveChatController::class, 'store'])->name('store-message');

});
