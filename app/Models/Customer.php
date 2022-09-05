<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'firstname',
        'surname',
        'company',
        'companycontact1',
        'companycontact2',
        'address',
        'postalcode',
        'city',
        'landlinenumber',
        'mobilenumber',
        'email',
        'category',
    ];

}
