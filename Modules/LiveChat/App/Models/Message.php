<?php

namespace Modules\LiveChat\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\LiveChat\Database\factories\MessageFactory;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];


    public function buyer(){
        return $this->belongsTo(User::class, 'buyer_id')->select('id', 'name', 'designation', 'email', 'phone', 'image');
    }

    public function seller(){
        return $this->belongsTo(User::class, 'seller_id')->select('id', 'name', 'designation', 'email', 'phone', 'image');
    }


}
