<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(){
        return view('order.create');
    }
    public function store(Request $request,P){
        Order::create([
            'user_id' => Auth::id(),
            'category_id' => $category->id,
            'order_date' => $request->order_date,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
        ]);
        return redirect()->route('home');
    }


}
