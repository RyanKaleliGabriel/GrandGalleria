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
        $shop = Shop::find(1);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $cart = Cart::getContent();
        return view('Landing.cart', compact('cart', 'shop', 'categories'));
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
        $product_id = $request->input('product_id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity', 1);

        $product = Product::find($product_id);
        $product_image = $product->image;

        $add = Cart::add([
            'id'=> $product_id,
            'name'=>$name,
            'image'=>$product_image,
            'price'=>$price,
            'quantity'=>$quantity,
            'attributes'=> [
                'image'=>$product_image
            ],
        ]);

        return redirect()->back()->with('Success', 'Added to Cart');
    }

    public function removefromcart($product_id)
    {
        Cart::remove($product_id);
        return redirect()->back()->with('Success', 'Item Removed');
    }

    public function addupdate($product_id)
    {
        Cart::update(
            $product_id,
            [
                'quantity'=>[
                    'value'=>$
                ]
            ]
        )
    }
}
