<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function store(Request $request){
        Shipping::create([
            'order_id' => $request-
        ]);
    }
}
