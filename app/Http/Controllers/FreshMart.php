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
use Cart;
use Darryldecode\Cart\Cart as CartCart;

class FreshMart extends Controller
{
    //Get Methods
    public function freshmart()
    {
        $shop = Shop::find(1);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $products = Product::where('shop_id', $shop->id)->where('active', true)->paginate(15);
        $numberofproducts = Product::where('shop_id', $shop->id)->where('active', true)->count();
        $cart = Cart::getContent();
        $itemCount = $cart->count();
        return view('Landing.home', compact('shop', 'categories', 'products', 'numberofproducts', 'itemCount'));
    }

    public function freshmartcategory($id)
    {
        $shop = Shop::find(1);
        $category = Category::find($id);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $products = Product::where('category_id', $id)->where('active', true)->where('shop_id', $shop->id)->get();
        $numberofproducts = Product::where('category_id', $id)->where('active', true)->where('shop_id', $shop->id)->count();
        $cart = Cart::getContent();
        $itemCount = $cart->count();
        return view('Landing.category', compact('products', 'category', 'numberofproducts', 'shop', 'categories', 'itemCount'));
    }

    public function subscribe()
    {
        $shop = Shop::find(1);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $cart = Cart::getContent();
        $itemCount = $cart->count();
        return view('Landing.subscribe', compact('shop', 'categories', 'itemCount'));
    }

    public function cartlist()
    {
        $shop = Shop::find(1);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $cart = Cart::getContent();
        $itemCount = $cart->count();

        return view('Landing.cart', compact('cart', 'shop', 'categories', 'itemCount'));
    }

    public function checkout()
    {
        $shop = Shop::find(1);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $cart = Cart::getContent();
        $itemCount = $cart->count();

        return view('Landing.checkout', compact('cart', 'shop', 'categories', 'itemCount'));
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

    public function addtocart(Request $request)
    {
        $product = Product::find($request->product_id);
        $product_image = $product->image;
        $add = Cart::add([
            'id' => $request->product_id,
            'name' => $request->name,
            'image' => $product_image,
            'price' => $request->price,
            'quantity' => 1,
            'attributes' => [
                'image' => $product_image
            ],
        ]);

        return redirect()->back()->with('Success', 'Added to Cart');
    }

    public function removefromcart($product_id)
    {
        Cart::remove($product_id);
        return redirect()->back()->with('Success', 'Item Removed');
    }

    public function updatecart(Request $request, $id)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->back()->with('success', 'Item Cart is Updated Successfully !');
    }

    public function clearcart()
    {
        Cart::clear();
        return redirect()->back()->with('Success', 'Cleared');
    }
}
