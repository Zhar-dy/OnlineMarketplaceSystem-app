<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'seller_name'
        'shipping_address',
        'shipping_status',
    ];

    public function orders()
    {
        return $this->belongsTo(user::class);
    }
}
