<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\PieChartController;
use App\Http\Controllers\PermissionController;

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
Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class);

//Category Route
Route::get('category/indexing', [CategoryController::class, 'indexing'])->name('category.indexing');
Route::get('/category/{category:uuid}', [CategoryController::class, 'show'])->name('category.show');
Route::resource('category', CategoryController::class)->except([
    'show',
    'indexing'
]);


//Product Route
// Route::get('/product/create/{category}',[ProductController::class,'create'])->name('product.create');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::resource('product', ProductController::class)->except([
    'create',
    'store',
    'show'
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

//Shipping Route
Route::resource('shipping', ShippingController::class);
//Review Route
Route::get('/review/show/{product}/{category}', [ReviewController::class,'show'])-> name('review.show');
Route::get('/review/create/{order}', [ReviewController::class,'create'])-> name('review.create');
Route::delete('/review/destroy/{product}/{review}', [ReviewController::class,'destroy'])-> name('review.destroy');
Route::resource('review', ReviewController::class)->except([
    'create',
    'show',
    'destroy'
]);


//Payment Route
Route::resource('payment', PaymentController::class)->except([
    'downloadPDF',
    'store'
]);
Route::resource('order.payment', PaymentController::class)->only([
    'store'
]);
//learning pdf stuff
Route::get('/payment/{payment}',[PaymentController::class, 'downloadPDF'])->name('payment.downloadPDF');
//excel stuff
Route::get('products/export/', [ProductController::class, 'export'])->name('product.export');
Route::post('/import',[ProductController::class,'import'])->name('product.import');

//add pie chart page
Route::get('/pie-chart', [PieChartController::class, 'pieChart'])->name('pie-show');

// adding permission page
Route::get('permission',[PermissionController::class, 'index'])->name('permission.index');
Route::get('/permission/create',[PermissionController::class, 'create'])->name('permission.create');
Route::post('permission',[PermissionController::class, 'store'])->name('permission.store');
Route::delete('permission/delete',[PermissionController::class, 'batchDelete'])->name('permission.batchDelete');
