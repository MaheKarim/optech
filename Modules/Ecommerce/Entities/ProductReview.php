<?php

namespace Modules\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'reviews'
    ];

    // Define the inverse relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
