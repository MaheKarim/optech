<?php

namespace Modules\Ecommerce\Entities;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Model;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\Wishlist\App\Models\Wishlist;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
    ];

    protected $appends = ['name', 'description', 'seo_title', 'seo_description'];

    // Relationship with main Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
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

    public function getPriceDisplayAttribute()
    {
        if ($this->offer_price) {
            return '<del>$' . number_format($this->price, 2) . '</del> $' . $this->final_price;
        }

        return  currency($this->final_price);
    }

    // This method will be used when saving tags
    public function getTagsAttribute($value)
    {
        if (is_string($value)) {
            $tags = json_decode($value, true);
            if (is_array($tags)) {
                // Check if it's an array of objects or strings
                if (isset($tags[0]['value'])) {
                    // Old format, extract 'value' from each object
                    return array_column($tags, 'value');
                } else {
                    // New format, it's already an array of strings
                    return $tags;
                }
            } else {
                return [];
            }
        } elseif (is_array($value)) {
            return $value;
        } else {
            return [];
        }
    }

    public function setTagsAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['tags'] = json_encode(array_values(array_filter(array_map('trim', $value))));
        } elseif (is_string($value)) {
            $this->attributes['tags'] = json_encode(array_values(array_filter(array_map('trim', explode(',', $value)))));
        } else {
            $this->attributes['tags'] = '[]';
        }
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }


}
