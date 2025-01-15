<?php

namespace Modules\Wishlist\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Ecommerce\Entities\Product;
use Modules\Listing\Entities\Listing;
use Modules\Wishlist\App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        $item_array = array();
        $user = Auth::guard('web')->user();
        $wishlists  = Product::query()->active()->whereHas('wishlists', function ($query) {
            $query->where('user_id', Auth::id());
        })->latest()
        ->get();

        return view('wishlist::index', compact('wishlists'));
    }


    public function store(Request $request)
    {
        $user = Auth::guard('web')->user();

        $is_exist = Wishlist::where('user_id', $user->id)->count();

        if($is_exist == 0){
            $wishlist = new Wishlist();
            $wishlist->product_id = $request->product_id;
            $wishlist->user_id = $user->id;
            $wishlist->save();

            $notify_message= trans('translate.Item added to wishlist');
            return response()->json(['message' => $notify_message]);
        }else{
            $notify_message= trans('translate.Item already added to wishlist');
            return response()->json(['message' => $notify_message], 403);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::guard('web')->user();

        Wishlist::where('user_id', $user->id)->delete();

        $notify_message= trans('translate.Item removed to wishlist');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }
}
