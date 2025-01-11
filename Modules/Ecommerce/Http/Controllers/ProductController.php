<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ecommerce\Entities\Product;
use Modules\GeneralSetting\Entities\SeoSetting;
use App\Models\Review;

class ProductController extends Controller
{

    public function product($slug)
    {
        $seo_setting = SeoSetting::first();

        $product = Product::where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('sub_category_id', $product->sub_category_id)
            ->where('id', '!=', $product->id)
            ->limit(8)
            ->get();

        $reviews = Review::with('user')->where('listing_id', $product->id)->where('status', 'enable')->where('reviewType', 'product')->latest()->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::latest()
                ->where('id', '!=', $product->id)
                ->limit(8)
                ->get();
        }



        return view('ecommerce::frontend.single_product', compact('product', 'seo_setting', 'relatedProducts','reviews'));
    }
}
