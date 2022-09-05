<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ValueAddTax extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'apply', 'price_status', 'designation', 'shock_rate'];

    protected static function booted()
    {
        static::creating(function ($valueTax) {
            $valueTax->user_id = Auth::user()->id;
        });
    }
}
