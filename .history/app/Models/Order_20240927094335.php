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
        'product_id',
        'order_date',
        'total_amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function product()
    {
    return $this->belongsTo(Product::class, 'product_id');
    }
    public function shipping()
    {
        return $this->has(Shipping::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
