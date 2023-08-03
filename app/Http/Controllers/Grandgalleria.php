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

class Grandgalleria extends Controller
{

    public function home()
    {
        $shop = Auth::user();
        $transactions = Transaction::where('shop_id', $shop->id)->where('active', true)->count();
        $orders = Order::where('shop_id', $shop->id)->where('active', true)->count();
        $products = Product::where('shop_id', $shop->id)->where('active', true)->count();
        $customers = Customer::where('shop_id', $shop->id)->where('active', true)->count();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();

        return view('home', compact('transactions', 'orders', 'products', 'customers', 'notifications'));
    }
    //
    public function orders()
    {
        $orders = Order::where('active', true)->get();
        return view('Order.all', compact('orders'));
    }
    public function customers()
    {
        $customers = Customer::where('active', true)->get();
        return view('Customer.all', compact('customers'));
    }
    public function products()
    {
        $products = Product::where('active', true)->get();
        return view('Product.all', compact('products'));
    }
    public function categories()
    {
        $categories = Category::where('active', true)->get();
        return view('Category.all', compact('categories'));
    }
    public function transactions()
    {
        $transactions = Transaction::where('active', true)->get();
        return view('Transaction.all', compact('transactions'));
    }

    public function addcustomer()
    {
        return view('Customer.add');
    }

    public function addproduct()
    {
        $categories = Category::where('active', true);
        return view('Product.add', compact('categories'));
    }

    public function addcategory()
    {

        return view('Category.add');
    }

    public function signin()
    {
        return view('Shop.signin');
    }

    public function signup()
    {
        return view('Shop.signup');
    }




    //Post Methods///
    public function storecustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $customer = Customer::create([
            'name' => $request->name
        ]);
        return redirect()->route('customers')->with('Success', 'New Customer added Successfully');
    }

    public function storecategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('categories')->with('Success', 'New Category added Successfully');
    }

    public function storeproduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'shop_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('product_images'), $imageName);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'shop_id' => $request->shop_id
        ]);
        return redirect()->route('products')->with('Success', 'Product added successfully');
    }

    public function storeshop(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:shops',
            'image' => 'required|max:5000',
            'description' => 'required',
            'password' => 'required|min:8|max:15'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('shop_images'), $imageName);
        $shop = Shop::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName,
            'description' => $request->description,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('signin')->with('Success', 'Successfully signed in');
        //add pop up
    }

    public function authadmin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return Redirect::route('home')->with('Success', 'Successfully authenticated');
        }else{
            $errors = new MessageBag(['error'=>'Invalid credentials. Please try again']);
            return redirect()->withErrors($errors);
        }
    }
}
