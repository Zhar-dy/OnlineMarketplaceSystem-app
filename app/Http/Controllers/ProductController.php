<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ImportProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        return redirect()->intended(route('category.show', $category));
        // view('modal.category.show', compact('category','products'));
    }

    public function edit(Request $request,Category $category,Product $product)
    {
       return view('product.edit',compact('category','product'));
    }
    public function update(Request $request,Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect()->route('home');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }

    public function export(Request $request){
        return Excel::download(new ProductsExport, 'product.xlsx');
    }
    public function import(Request $request){
        Excel::import(new ImportProduct,
            $request->file('file')->store('files'));
        return redirect()->back();
    }
}
