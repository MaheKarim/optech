<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\Ecommerce\Entities\Cart;
use Modules\Ecommerce\Entities\Product;
//use Modules\GeneralSetting\Entities\SeoSetting;
use Modules\SeoSetting\App\Models\SeoSetting;

class CartController extends Controller
{
    public function cart()
    {
        $seo_setting = SeoSetting::first();
        $user = auth()->guard('web')->user();
        $carts = [];

        if ($user) {
            $carts = Cart::with('product')->where('user_id', $user->id)->get();
        } else {
            $session_id = session()->getId();
            $carts = Cart::with('product')->where('session_id', $session_id)->get();
        }

        return view('ecommerce::frontend.cart', compact('seo_setting', 'carts'));
    }

    public function addToCart(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:1'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 422);
            }

            $product = Product::active()->findOrFail($request->product_id);

           $userId = auth()->id();
           $sessionId = session()->get('session_id', session()->getId());
           session()->put('session_id', session()->getId());

            DB::beginTransaction();

            try {
                $cart = Cart::updateOrCreate(
                    [
                        'user_id' => $userId,
                        'session_id' => $sessionId,
                        'product_id' => $request->product_id
                    ],
                    [
                        'quantity' => DB::raw('quantity + ' . $request->quantity)
                    ]
                );

                $totalCartItems = Cart::where($userId ? 'user_id' : 'session_id', $userId ?: $sessionId)
                    ->count();

                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Product added to cart successfully!',
                    'totalCartItem' => $totalCartItems
                ]);

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }

        } catch (\Exception $e) {
            \Log::error('Cart Addition Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to add product to cart. Please try again.'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $cart = Cart::findOrFail($id);

            if ($cart->user_id !== auth()->id()) {
                $notification = [
                    'messege' => trans('translate.Unauthorized action'),
                    'alert-type' => 'error'
                ];

                return response()->json([
                    'success' => false,
                    'message' => trans('translate.Unauthorized action'),
                    'notification' => $notification
                ], 403);
            }

            $cart->delete();

            $notification = [
                'messege' => trans('translate.Item removed from cart successfully'),
                'alert-type' => 'success'
            ];

            return response()->json([
                'success' => true,
                'message' => trans('translate.Item removed from cart successfully'),
                'notification' => $notification
            ]);

        } catch (ModelNotFoundException $e) {
            $notification = [
                'messege' => trans('translate.Cart item not found'),
                'alert-type' => 'error'
            ];

            return response()->json([
                'success' => false,
                'message' => trans('translate.Cart item not found'),
                'notification' => $notification
            ], 404);

        } catch (\Exception $e) {
            \Log::error('Cart deletion error: ' . $e->getMessage());

            $notification = [
                'messege' => trans('translate.Error removing item from cart'),
                'alert-type' => 'error'
            ];

            return response()->json([
                'success' => false,
                'message' => trans('translate.Error removing item from cart'),
                'notification' => $notification
            ], 500);
        }
    }

    public function update(Request $request)
    {
        $itemId = $request->input('id');
        $quantity = $request->input('quantity');

        if ($quantity < 1) {
            $notification = [
                'message' => trans('translate.Quantity must be at least 1'),
                'alert-type' => 'error'
            ];

            return response()->json([
                'success' => false,
                'notification' => $notification
            ], 400);
        }

        $cartItem = Cart::find($itemId);
        if ($cartItem) {
            $cartItem->quantity = $quantity;
            $cartItem->save();

            $updatedPrice = $cartItem->quantity * $cartItem->product->finalPrice;

            $cartItems = Cart::all();
            $subtotal = $cartItems->sum(function ($item) {
                return $item->quantity * $item->product->finalPrice;
            });

            $notification = [
                'message' => trans('translate.Item updated successfully'),
                'alert-type' => 'success'
            ];

            return response()->json([
                'success' => true,
                'updatedPrice' => number_format($updatedPrice, 2),
                'subtotal' => number_format($subtotal, 2),
                'notification' => $notification
            ]);
        }

        $notification = [
            'message' => trans('translate.Failed to update item in cart'),
            'alert-type' => 'error'
        ];

        return response()->json([
            'success' => false,
            'notification' => $notification
        ], 400);
    }


}
