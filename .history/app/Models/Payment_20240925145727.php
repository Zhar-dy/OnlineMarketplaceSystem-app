<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable =[
        'order_id',
        'payment_method',
        'payment_status',
        'amount_paid',
        'payment_date',
    ];

    public function orders
    {
        return $this->
    }
}
