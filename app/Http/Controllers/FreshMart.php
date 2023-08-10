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
use Darryldecode\Cart\Facades\Cart;



class FreshMart extends Controller
{
    //Get Methods
    public function freshmart()
    {
        $shop = Shop::find(1);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $products = Product::where('shop_id', $shop->id)->where('active', true)->paginate(15);
        $numberofproducts = Product::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Landing.home', compact('shop', 'categories', 'products', 'numberofproducts'));
    }

    public function freshmartcategory($id)
    {
        $shop = Shop::find(1);
        $category = Category::find($id);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $products = Product::where('category_id', $id)->where('active', true)->where('shop_id', $shop->id)->get();
        $numberofproducts = Product::where('category_id', $id)->where('active', true)->where('shop_id', $shop->id)->count();
        return view('Landing.category', compact('products', 'category', 'numberofproducts', 'shop', 'categories'));
    }

    public function subscribe()
    {
        $shop = Shop::find(1);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        return view('Landing.subscribe', compact('shop', 'categories'));
    }

    public function cartlist()
    {
        $cartItems = Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    //Post Methods///
    public function subscribecustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'shop_id' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $customer = Customer::create([
            'name' => $request->name,
            'shop_id' => $request->shop_id,
            'email' => $request->email
        ]);
        return redirect()->route('freshmart')->with('Success', 'New Customer added Successfully');
    }
}
