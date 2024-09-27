<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'product_id'
        'order_date',
        'total_amount',
        'status',
    ];

    public function shipping()
    {
        return $this->has(Shipping::class);
    }

    public function payment()
    {
        return $this->has(Payment::class);
    }

    public function order()
    {

        return $this->belongsTo
    }
}
