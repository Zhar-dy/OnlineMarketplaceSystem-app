<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Category $category)
    {
        return view('product.create', compact('category'));
    }

    public function store(Request $request,Category $category)
    {
        Product::create([
            'category_id' => $category->id,
            'name' => $request->getScriptName()
        ]);
    }
}
