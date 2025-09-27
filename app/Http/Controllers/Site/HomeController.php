<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('public.home', compact('setting'));
    }
}
