<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Category $category)
    { $products = Product::all();
        return view('product.create', compact('category',compact('products')));
    }

    public function store(Request $request,Category $category)
    {
        Product::create([
            'category_id' => $category->id,
            'seller_id' => Auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity'=> $request->stock_quantity,
        ]);

        $products = Product::all();
        return view('category.product.show', compact('products'));
    }
}
