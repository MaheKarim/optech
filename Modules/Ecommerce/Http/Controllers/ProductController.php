<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Ecommerce\Entities\Product;
use Modules\Ecommerce\Entities\ProductReview;
use Modules\SeoSetting\App\Models\SeoSetting;

class ProductController extends Controller
{
    public function shop()
    {
        $pageTitle = 'Shop';
        $products = Product::active()->latest()->get();
        $brands = Brand::with('translate')->get();
        $categories = Category::with('translate')->withCount([
            'products' => function($query) {
                $query->active();
            }
        ])->get();

        return view('frontend.shop.index', compact('products', 'pageTitle', 'brands', 'categories'));
    }

    public function product($slug)
    {
        $seo_setting = SeoSetting::first();

        $product = Product::where('slug', $slug)->with(['translate','galleries','reviews'])->firstOrFail();
        $pageTitle = $product->translate?->name;

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(8)
            ->get();

        if ($relatedProducts->isEmpty()) {
            $relatedProducts = Product::latest()
                ->where('id', '!=', $product->id)
                ->limit(8)
                ->get();
        }

        $reviews = ProductReview::with('user')->where('product_id', $product->id)->latest()->get();

        return view('ecommerce::frontend.single_product', compact('product','pageTitle', 'seo_setting', 'relatedProducts','reviews'));
    }
}
