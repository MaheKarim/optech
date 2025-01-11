<?php

namespace Modules\Ecommerce\Entities;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class Product extends Model
{
    protected $guarded = [];

    // Relationship with main Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Define the relationship with ProductTranslation
    public function translate()
    {
        return $this->belongsTo(ProductTranslation::class, 'id', 'product_id')->where('lang_code', admin_lang());
    }


    public function front_translate(){
        return $this->belongsTo(ProductTranslation::class, 'id', 'product_id')->where('lang_code', front_lang());
    }


    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }


    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function getFinalPriceAttribute()
    {
        if ($this->offer_price) {
            $discount = ($this->price * $this->offer_price) / 100;
            $finalPrice = $this->price - $discount;
        } else {
            $finalPrice = $this->price;
        }

        return number_format((float) $finalPrice, 2, '.', '');
    }

    public function scopeActive($query)
    {
        return $query->where('status', Status::ENABLE);
    }

    public function scopeTrending($query)
    {
        return $query->where('is_trending', Status::ENABLE);
    }

    public function getPriceDisplayAttribute()
    {
        if ($this->offer_price) {
            return '<del>$' . number_format($this->price, 2) . '</del> $' . $this->final_price;
        }

        return  currency($this->final_price);
    }

}
