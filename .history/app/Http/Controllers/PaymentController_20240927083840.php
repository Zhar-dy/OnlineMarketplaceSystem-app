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
            'payment_method' => $request->payment_method,
            'payment_status' =>
        ]);
    }
}
