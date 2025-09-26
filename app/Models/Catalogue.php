<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    // tabel: catalogues (default cocok)
    protected $fillable = [
        'package_name','package_desc','package_price','cover_image',
    ];
}
