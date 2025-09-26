<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // tabel: settings (default cocok)
    protected $fillable = [
        'main_image','intro_text','secondary_image','secondary_text',
    ];
    // created_at & updated_at sudah ada di DB → biarkan default $timestamps = true
}
