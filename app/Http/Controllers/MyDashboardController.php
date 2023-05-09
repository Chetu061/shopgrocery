<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyDashboardController extends Controller
{
    public function LoadMyDashboard()
    {
        return view('welcome.my-dashboard');
    }
}
