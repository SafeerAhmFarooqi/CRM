<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class InvoiceSetting extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','invoicetype', 'header', 'general', 'footer'];

    protected static function booted()
    {
        static::creating(function ($invoiceSetting) {
            $invoiceSetting->user_id = Auth::user()->id;
        });
    }

    public function shop()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
