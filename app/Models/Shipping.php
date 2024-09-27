<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table ="shipping";
    
    protected $fillable = [
        'order_id',
        'seller_name',
        'buyer_name',
        'shipping_address',
        'shipping_status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
