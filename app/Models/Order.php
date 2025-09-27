<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'order_code','package_id','customer_name','customer_email',
        'customer_phone','payment_method','status','total_price'
    ];
    public $timestamps = true;

    public function package()
    {
        return $this->belongsTo(Catalogue::class, 'package_id');
    }
}
