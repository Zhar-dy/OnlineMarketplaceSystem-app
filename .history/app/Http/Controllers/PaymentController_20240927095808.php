<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        return view('payment.show')
    }
    public function create()
    {
        return view('payment.create');
    }
    public function store(Request $request,Order $order)
    {
        Payment::create([
            'order_id' => $order->id,
            'payment_method' => $request -> payment_method,
            'payment_status' => $request -> payment_status,
            'payment_date' => $request -> payment_date
        ]);
        return redirect()->route('order.index');
    }
}
