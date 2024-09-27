<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function store(){
        Order::create([
            'user_id'->Auth::id(),
        ]);
    }
}
