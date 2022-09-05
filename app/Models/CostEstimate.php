<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostEstimate extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'originalprice',
        'repaircost',
        'insurancenumber',
        'customernumber',
        'email',
        'note',
        'errordescription',
    ];

}
