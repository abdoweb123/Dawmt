<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;

class HomeController extends BasicController
{
    public function home(Request $request)
    {
        return view('Admin.home');
    }
}
