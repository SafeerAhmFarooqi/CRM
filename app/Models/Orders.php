<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'status',
        'manufacturer',
        'model',
        'imei',
        'serialno',
        'devicepassword',
        'storage',
        'color', 
        'offer',
        'condition',
        'problem',
        'comment',
        'duration',
        'time',
        'pricedefault',
        'warehouseno',
        'approval',
        'paymentmethod',
        'starttime',
        'endtime',
        'techniciannote',
    ];

    protected $dates = ['starttime','endtime'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function shop()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    

    public function serviceInformations()
    {
        return $this->hasMany(ServiceInformation::class, 'order_id');
    }

    public function invoice()
    {
        return $this->hasOne(OrderInvoice::class, 'order_id');
    }

    public function costEstimate()
    {
        return $this->hasOne(CostEstimate::class, 'order_id');
    }

}
