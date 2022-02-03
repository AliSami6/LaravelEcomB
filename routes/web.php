<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\ProductController@home');

Route::get('/account', function () {
    return view('account');
})->name('account');


Route::resource('/products', ProductController::class);
Route::post('/add-to-cart','App\Http\Controllers\ProductController@addToCart');
Route::get('/cart','App\Http\Controllers\ProductController@viewCart');
Route::get('/remove-item/{rowId}','App\Http\Controllers\ProductController@removeItem');
Route::resource('/users', UserController::class);
Route::get('/admin_products','App\Http\Controllers\ProductController@addProduct')->middleware('auth');
Route::post('/products/validate-amount','App\Http\Controllers\ProductController@validateAmount');
