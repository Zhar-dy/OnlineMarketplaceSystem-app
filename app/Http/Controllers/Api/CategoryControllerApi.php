<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            return response([
                'message' => 'success',
                'products' => 'Product has been updated successfully!',
                'status' => 200
            ]);
        } else {
            return response([
                'message' => 'error',
                'products' => 'product does not exist!',
                'status' => 404
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        if($category)
        {
            $category->delete();
            return response([
                'message' => 'success',
                'products' => 'Product has been deleted successfully!',
                'status' => 200
            ]);
        } else {
            return response([
                'message' => 'error',
                'products' => 'product does not exist!',
                'status' => 404
            ]);
        }
    }
}
