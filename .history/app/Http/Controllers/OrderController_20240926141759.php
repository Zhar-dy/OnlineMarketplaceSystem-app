<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function store(Request $request){
        Order::create([
            'user_id' => Auth::id(),
            'order_date' => $request->order_date,

        ]);
    }
}
