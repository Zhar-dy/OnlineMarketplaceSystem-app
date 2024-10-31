<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PieChartController extends Controller
{
    public function pieChart()
    {
        $orders = Order::all();
        $total = $orders->sum('total_amount');
        // Example Data
        $data = [
            'labels' => ['Category A', 'Category B', 'Category C', 'Category D', 'Category E'],
            'data' => [25, 30, 15, 10, 20],
        ];
        $data2 = [
            'labels' => ['Category A', 'Category B', 'Category C', 'Category D', 'Category E'],
            'data' => [52, 20, 51, 10, 360],
        ];
        return view('pie-chart', compact('data','data2', 'orders','total'));
    }
}
