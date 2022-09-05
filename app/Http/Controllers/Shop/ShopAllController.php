<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Models\User;

class ShopAllController extends BaseShopController
{
    public function shopExample()
    {
        //return "Hello";
        return view('dashboards.shop.example-page');
    }
}

