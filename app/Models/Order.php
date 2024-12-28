<?php

namespace App\Models;

use Modules\Listing\Entities\Listing;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function listing(){
        return $this->belongsTo(Listing::class);
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id')->select('id', 'name', 'username', 'image', 'designation', 'phone');
    }

    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id')->select('id', 'name', 'username', 'image', 'designation', 'phone');
    }



}
