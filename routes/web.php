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

Route::get('orders', [Grandgalleria::class, 'orders'])->name('orders');

Route::get('customers', [Grandgalleria::class, 'customers'])->name('customers');
Route::get('addcustomer', [Grandgalleria::class, 'addcustomer'])->name('addcustomer');
Route::post('storecustomer', [Grandgalleria::class, 'storecustomer'])->name('storecustomer');

Route::get('products', [Grandgalleria::class, 'products'])->name('products');
Route::get('addproduct', [Grandgalleria::class, 'addproduct'])->name('addproduct');
Route::get('categories', [Grandgalleria::class, 'categories'])->name('categories');
Route::get('addcategory', [Grandgalleria::class, 'addcategory'])->name('addcategory');

Route::get('transactions', [Grandgalleria::class, 'transactions'])->name('transactions');



