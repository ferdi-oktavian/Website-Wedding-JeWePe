<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;

class CatalogueController extends Controller
{
    public function index()
    {
        $packages = Catalogue::orderBy('package_price')->get();
        return view('public.catalogues.index', compact('packages'));
    }

    public function detail(Catalogue $catalogue)
    {
        // Siapkan variabel aman untuk Blade
        $desc  = (string) ($catalogue->package_desc ?? '');
        $lines = $desc !== '' 
            ? preg_split("/\r\n|\n|\r/", $desc, -1, PREG_SPLIT_NO_EMPTY) 
            : [];

        return view('public.catalogues.detail', compact('catalogue','desc','lines'));
    }
}
