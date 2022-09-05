<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderType extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'order', 'revoke', 'status'];

    protected static function booted()
    {
        static::creating(function ($order) {
            $order->user_id = Auth::user()->hasRole('Admin')? 0 : Auth::user()->id;
        });
    }

    public function setRevokeAttribute($value)
    {
        $array=$this->revoke??array();
        array_push($array,$value);
        $this->attributes['revoke'] = json_encode($array);    
        
    }

    public function getRevokeAttribute($value)
    {
        $this->attributes['revoke']=$value;
        return json_decode($this->attributes['revoke']);
    }
}
