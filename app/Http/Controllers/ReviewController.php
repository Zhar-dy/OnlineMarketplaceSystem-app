<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    public function show(Product $product, Category $category)
    {
        $reviews = Review::all();
        return view('review.show',compact('product','reviews', 'category'));
    }
    public function create(Order $order){
        return view('review.create', compact('order'));
    }

    public function store(Request $request){
        Review::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);
        return redirect()->route('home');
    }

    public function destroy(Product $product,Review $review)
    {
        $review->delete();
        return redirect()->route('review.show',compact('product'));
    }
}
