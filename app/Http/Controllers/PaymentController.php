<?php

namespace App\Http\Controllers;

use App\Mail\PaymentEmail;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Review;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('payment.show', compact('payments'));
    }
    public function create()
    {
        return view('payment.create');
    }
    public function store(Request $request, Order $order)
    {
        Payment::create([
            'order_id' => $order->id,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'payment_date' => $request->payment_date
        ]);
        Mail::to($order->user)->send(new PaymentEmail($order));

        return redirect()->route('order.index');
    }


    public function downloadPDF(Payment $payment)
    {
        $pdf = PDF::loadView('pdf', compact('payment'));

        return $pdf->download('payment.pdf');
    }
}
