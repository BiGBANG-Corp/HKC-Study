<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        return view('sample.dashboard.dashboard');
    }
}