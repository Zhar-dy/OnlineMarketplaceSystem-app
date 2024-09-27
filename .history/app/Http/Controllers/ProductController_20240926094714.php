<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
public function create(Catgo)
{
    return view('product.create');
}
}
