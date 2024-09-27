<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
public function create(Category $category)
{
    return view('product.create');
}
}
