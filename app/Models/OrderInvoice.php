<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'shippingcost',
        'paymentmethod',
        'paymentreference',
        'discount',
        'discounttype',
        'shippingtax',
        'note',
    ];

}
