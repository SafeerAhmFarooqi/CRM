<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'service',
        'serviceprice',
        'servicediscount',
        'servicediscounttype',
        'sparepart',
        'sparepartprice',
        'sparepartnumber',
        'sparepartdiscount',
        'sparepartdiscounttype',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

}
