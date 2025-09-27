<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Catalogue;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders   = Order::count();
        $pending       = Order::where('status','requested')->count();
        $approved      = Order::where('status','approved')->count();
        $totalPackages = Catalogue::count();
        $setting       = Setting::first();

        return view('admin.dashboard', compact('totalOrders','pending','approved','totalPackages','setting'));
    }
}
