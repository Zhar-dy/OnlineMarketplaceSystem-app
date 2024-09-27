<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request,Order $order)
    {
        Payment::create([
            'order_id'=>
            'payment_method' => $request -> payment_method,
            'payment_status' => $request -> payment_status,
            'amount_paid' => $request -> amount_paid,
            'payment_date' => $request -> payment_date
        ]);
    }
}
