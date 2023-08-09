<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;



class FreshMart extends Controller
{
    //Get Methods
    public function freshmart()
    {
        $shop = Shop::find(1);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $products = Product::where('shop_id', $shop->id)->where('active', true)->paginate(6);
        return view('Landing.home', compact('shop', 'categories','products' ));
    }
}
