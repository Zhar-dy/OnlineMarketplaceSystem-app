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
        dd(category');
        Product::create([
            'category_id' => $category->id,
            'seller_id' => Auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity'=> $request->stock_quantity,
        ]);
        return redirect()->route('home');
    }
}
