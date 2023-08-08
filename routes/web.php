<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Grandgalleria;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/', [Grandgalleria::class, 'home'])->name('home')->middleware('auth');

Route::get('orders', [Grandgalleria::class, 'orders'])->name('orders')->middleware('auth');

Route::get('customers', [Grandgalleria::class, 'customers'])->name('customers')->middleware('auth');
Route::get('addcustomer', [Grandgalleria::class, 'addcustomer'])->name('addcustomer')->middleware('auth');
Route::post('storecustomer', [Grandgalleria::class, 'storecustomer'])->name('storecustomer')->middleware('auth');
Route::get('customer/{customer}/edit', [Grandgalleria::class, 'editcustomer'])->name('editcustomer')->middleware('auth');
Route::put('customer/{customer}', [Grandgalleria::class, 'updatecustomer'])->name('updatecustomer')->middleware('auth');
Route::delete('customer/{customer}', [Grandgalleria::class, 'deletecustomer'])->name('deletecustomer')->middleware('auth');

Route::get('products', [Grandgalleria::class, 'products'])->name('products')->middleware('auth');
Route::get('addproduct', [Grandgalleria::class, 'addproduct'])->name('addproduct')->middleware('auth');
Route::post('storeproduct', [Grandgalleria::class, 'storeproduct'])->name('storeproduct')->middleware('auth');
Route::get('product/{product}/edit', [Grandgalleria::class, 'editproduct'])->name('editproduct')->middleware('auth');
Route::put('product/{product}', [Grandgalleria::class, 'updateproduct'])->name('updateproduct')->middleware('auth');
Route::delete('product/{product}', [Grandgalleria::class, 'deleteproduct'])->name('deleteproduct')->middleware('auth');

Route::get('categories', [Grandgalleria::class, 'categories'])->name('categories')->middleware('auth');
Route::get('addcategory', [Grandgalleria::class, 'addcategory'])->name('addcategory')->middleware('auth');
Route::post('storecategory', [Grandgalleria::class, 'storecategory'])->name('storecategory')->middleware('auth');
Route::get('category/{category}/edit', [Grandgalleria::class, 'editcategory'])->name('editcategory')->middleware('auth');
Route::put('category/{category}', [Grandgalleria::class, 'updatecategory'])->name('updatecategory')->middleware('auth');
Route::delete('category/{category}', [Grandgalleria::class, 'deletecategory'])->name('deletecategory')->middleware('auth');

Route::get('transactions', [Grandgalleria::class, 'transactions'])->name('transactions')->middleware('auth');

Route::get('signin', [Grandgalleria::class, 'signin'])->name('signin');
Route::get('signup', [Grandgalleria::class, 'signup'])->name('signup');
Route::post('storeshop', [Grandgalleria::class, 'storeshop'])->name('storeshop');
Route::post('authadmin', [Grandgalleria::class, 'authadmin'])->name('authadmin');
Route::post('signout', [Grandgalleria::class, 'signout'])->name('signout')->middleware('auth');
Route::get('profile', [Grandgalleria::class, 'profile'])->name('profile')->middleware('auth');
Route::put('updateprofile/{shop}', [Grandgalleria::class, 'updateprofile'])->name('updateprofile')->middleware('auth');




