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

    public function orders()
    {
        $orders = Order::where('active', true)->get();
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Order.all', compact('orders', 'notifcations'));
    }
    public function customers()
    {
        $customers = Customer::where('active', true)->get();
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Customer.all', compact('customers', 'notifications'));
    }
    public function products()
    {
        $products = Product::where('active', true)->get();
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Product.all', compact('products', 'notifications'));
    }
    public function categories()
    {
        $categories = Category::where('active', true)->get();
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Category.all', compact('categories', 'notifications'));
    }
    public function transactions()
    {
        $transactions = Transaction::where('active', true)->get();
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Transaction.all', compact('transactions', 'notifcations'));
    }

    public function addcustomer()
    {
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Customer.add', compact('notifications'));
    }

    public function addproduct()
    {
        $categories = Category::where('active', true)->get();
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Product.add', compact('categories', 'notifications'));
    }

    public function addcategory()
    {
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Category.add', compact('notifcations'));
    }

    public function signin()
    {
        return view('Shop.signin');
    }

    public function signup()
    {
        return view('Shop.signup');
    }

    public function editcustomer($id)
    {
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        $customer = Customer::findorFail($id);
        return view('Customer.update', compact('customer', 'notifications'));
    }

    public function editcategory($id)
    {
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        $category = Category::findorFail($id);
        return view('Category.update', compact('category', 'notifications'));
    }

    public function editproduct($id)
    {
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        $product = Product::findorFail($id);
        $categories = Category::where('active', true)->get();
        return view('Product.update', compact('product', 'categories', 'notifications'));
    }

    public function profile()
    {
        $shop = Auth::user();
        $notifications = Notification::where('shop_id', $shop->id)->where('active', true)->count();
        return view('Shop.profile', compact('notifications'));
    }




    //Post Methods///
    public function storecustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'shop_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $customer = Customer::create([
            'name' => $request->name,
            'shop_id' => $request->shop_id
        ]);
        return redirect()->route('customers')->with('Success', 'New Customer added Successfully');
    }

    public function storecategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
            'shop_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = Category::create([
            'name' => $request->name,
            'shop_id' => $request->shop_id
        ]);
        return redirect()->route('categories')->with('Success', 'New Category added Successfully');
    }

    public function storeproduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required|max:1000',
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

        if (Auth::attempt($credentials)) {
            return Redirect::route('home')->with('Success', 'Successfully authenticated');
        } else {
            $errors = new MessageBag(['error' => 'Invalid credentials. Please try again']);
            return redirect()->route('signin')->withErrors($errors);
        }
    }

    //Put methods

    public function updatecustomer(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = Customer::findorFail($id);
        $customer->update([
            'name' => $request->name
        ]);
        return redirect()->route('customers');
    }

    public function updatecategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories,name,' . $id
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::findorFail($id);

        $category->update([
            'name' => $request->name
        ]);
        return redirect()->route('categories');
    }

    public function updateproduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name,' . $id,
            'price' => 'required',
            'image' => 'required',
            'description' => 'required|max:1000',
            'quantity' => 'required',
            'category_id' => 'required',
            'shop_id' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('product_images'), $imageName);

        $product = Product::findorFail($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'shop_id' => $request->shop_id
        ]);
        return redirect()->route('products');
    }

    ///DELETE Methods
    public function deletecustomer($id)
    {
        $customer = Customer::findorFail($id);
        if ($customer) {
            $customer->active = false;
            $customer->save();
        }
        return redirect()->route('customers');
    }


    public function deleteproduct($id)
    {
        $product = Product::findorFail($id);
        if ($product) {
            $product->active = false;
            $product->save();
        }
        return redirect()->route('products');
    }

    public function deletecategory($id)
    {
        $category = Category::findorFail($id);
        if ($category) {
            $category->active = false;
            $category->save();
        }
        return redirect()->route('categories');
    }

    public function signout()
    {
        Auth::logout();
        return redirect()->route('signin');
    }
}
