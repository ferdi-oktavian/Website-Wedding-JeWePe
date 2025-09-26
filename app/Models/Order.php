<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; // default sudah 'orders', ini opsional

    protected $fillable = [
        'order_code', 'package_id', 'customer_name', 'customer_email',
        'customer_phone', 'payment_method', 'status', 'total_price',
    ];

    // relasi ke paket
    public function package()
    {
        return $this->belongsTo(\App\Models\Catalogue::class, 'package_id');
    }
}
