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
            'seller_id' => Auth()->id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $products = Product::all();
        return view('modal.category.show', compact('products'));
    }

    public function edit(Request $request,Product $product)
    {
        dd($)
       return view('product.edit',$product);
    }
    public function update(Request $request,Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect()->route('category.show');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('category.show');
    }
}
