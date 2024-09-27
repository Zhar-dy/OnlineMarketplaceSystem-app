<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.show',compact('orders'));
    }
    public function create(Product $product){
        return view('order.create', compact('product'));
    }
    public function store(Request $request, Product $product) {
        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'order_date' => $request->order_date,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
        ]);
        return redirect()->route('home');
    }

    public function update(Request $request, Produc)


}
