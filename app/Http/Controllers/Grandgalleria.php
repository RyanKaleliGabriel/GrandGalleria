<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;

class Grandgalleria extends Controller
{
    //
    public function orders()
    {
        $orders = Order::where('active', true);
        return view('Order.all',compact('orders'));
    }
    public function customers()
    {
        $customers = Customer::where('active', true);
        return view('Customer.all', compact('customers'));
    }
    public function products()
    {
        $products = Product::where('active', true);
        return view('Product.all', compact('products'));
    }
    public function categories()
    {
        $categories = Category::where('active', true);
        return view('Product.categories', compact('categories'));
    }
    public function transactions()
    {
        $transactions = Transaction::where('active', true);
        return view('Transaction.all', compact('transactions'));
    }
}
