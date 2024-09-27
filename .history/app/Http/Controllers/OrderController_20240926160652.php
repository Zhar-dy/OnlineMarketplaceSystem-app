<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(product){
        return view('order.create');
    }
    public function store(Request $request,Product $product){
        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'order_date' => $request->order_date,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
        ]);
        return redirect()->route('home');
    }


}
