<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $fileName = 'No attachment'; // Default value for the attachment

        if ($request->hasFile('attachment')) {
            // Rename the file
            $fileName = $request->name . '-' . date('Y-m-d') . '.' . $request->attachment->getClientOriginalExtension();

            // Ensure the 'category' directory exists
            Storage::disk('public')->makeDirectory('category');

            // Save the file
            Storage::disk('public')->put('/category/' . $fileName, File::get($request->attachment));
        }
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'attachment'=>$fileName
        ]);

        // $response = Http::post('http://127.0.0.1:8000/api/category/store',[
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'attachment'=>$fileName
        // ]);

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
    {
        $products = Product::all();
        return view('modal.category.show', compact('category', 'products'));
    }

    public function indexing(Request $request)
    {
        $search = $request->keyword ?? null;

        $categories = Category::search($search)->get();
        return view('home')->with(compact('categories'));;
    }
}
