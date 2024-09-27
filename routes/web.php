<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShippingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Category Route
Route::get('/category/{category:uuid}', [CategoryController::class, 'show'])->name('category.show');
Route::resource('category', CategoryController::class)->except([
    'show'
]);
//Product Route
// Route::get('/product/create/{category}',[ProductController::class,'create'])->name('product.create');
Route::resource('product', ProductController::class)->except([
    'create',
    'store',
]);
Route::resource('category.product', ProductController::class)->only([
    'create',
    'store',

]);
//Order Route
Route::resource('order', OrderController::class)->except([
    'create',
    'store'
]);
Route::resource('product.order', OrderController::class)->only([
    'create',
    'store'
]);

//Payment Route
Route::resource('payment', PaymentController::class)->except([
    'store'
]);
Route::resource('order.payment', PaymentController::class)->only([
    'store'
]);

//Shipping Route
Route::resource('shipping', ShippingController::class);
//Review Route
Route::get('/review/show/{product}', [ReviewController::class,'show'])-> name('review.show');
Route::get('/review/create/{order}', [ReviewController::class,'create'])-> name('review.create');
Route::delete('/review/destroy/{product}/{review}', [ReviewController::class,'destroy'])-> name('review.destroy');
Route::resource('review', ReviewController::class)->except([
    'create',
    'show',
    'destroy'
]);
