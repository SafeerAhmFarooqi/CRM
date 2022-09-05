<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
{
    public $username='';

    public function __construct()
    {
        $this->username='safeer1';
    }

    public function dashboard()
    {
        return view('dashboard');
    }



}
