<?php

namespace Modules\Refund\App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Refund\Database\factories\RefundRequestFactory;

class RefundRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];
    
    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id')->select('id', 'name', 'username', 'image', 'designation', 'phone');
    }

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id')->select('id', 'order_id');
    }

    
}
