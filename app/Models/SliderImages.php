<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderImages extends Model
{
    use HasFactory;

    protected $table = 'slider_images';
    public $timestamps = true;

    protected $fillable = ['user_id', 'path'];

    // Validation Rules
    protected array $validationRules = [
        'path' => 'required|max:500',
    ];

    
    public function shop()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
