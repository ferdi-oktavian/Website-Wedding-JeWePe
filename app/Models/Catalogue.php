<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = 'catalogues';
    protected $fillable = ['package_name','package_desc','package_price','cover_image'];
    public $timestamps = true;
}
