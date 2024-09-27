<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
public function create(Category $category)
{
    return view('product.create');
}
}
