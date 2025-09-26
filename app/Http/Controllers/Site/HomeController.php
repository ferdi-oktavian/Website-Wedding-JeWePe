<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Catalogue;

class HomeController extends Controller
{
    public function index()
    {
        $setting  = Setting::first();
        $packages = Catalogue::orderBy('id')->get();
        return view('public.home', compact('setting','packages'));
    }
}
