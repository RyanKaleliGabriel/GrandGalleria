<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;

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
        return view('Category.all', compact('categories'));
    }
    public function transactions()
    {
        $transactions = Transaction::where('active', true);
        return view('Transaction.all', compact('transactions'));
    }

    public function addcustomer()
    {
        return view('Customer.add');
    }

    public function addproduct()
    {
        $categories = Category::where('active', true);
        return view('Product.add' , compact('categories'));
    }
    
    public function addcategory()
    {
        
        return view('Category.add');
    }




    //Post Methods///
    public function storecustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $customer = Customer::create([
            'name'=>$request->name
        ]);
        return redirect()->route('customers')->with('Success', 'New Customer added Successfully');
    }

    public function storecategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique: categories'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = Category::create([
            'name'=>$request->name
        ]);
        return redirect()->route('categories')->with('Success', 'New Category added Successfully');
    }

    public function storeproduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|unique: products',
            'price'=>'required',
            'image'=>'required',
            'description'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'shop_id'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::create([
            ''
        ]);
    }


}
