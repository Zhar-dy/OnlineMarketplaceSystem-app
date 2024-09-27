<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('home');
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('home');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('home');
    }

    public function show(Category $category)
    {$products = Product::all();
        return view('modal.category.show', compact('category'));
    }
}
