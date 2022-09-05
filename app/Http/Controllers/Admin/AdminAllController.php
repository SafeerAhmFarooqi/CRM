<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;

class AdminAllController extends BaseAdminController
{
    public function adminExample()
    {
        //return "Hello";
        return view('dashboards.admin.example-page');
    }
}
