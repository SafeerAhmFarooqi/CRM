<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatusChat extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','shop_id', 'isUser', 'message'];

    public function shop()
    {
        return $this->belongsTo(User::class, 'shop_id');
    }  

    public function order()
    {
        return $this->belongsTo(Orders::class, 'shop_id');
    }  

}
