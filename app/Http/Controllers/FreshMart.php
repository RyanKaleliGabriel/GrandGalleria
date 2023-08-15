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
use Carbon\Carbon;
use PAM\API\B2C;
use PAM\API\PayLoad;
use PAM\API\RegC2bUrl;
use PAM\API\ShortCode;
use PAM\API\App;
use PAM\API\Balance;
use PAM\API\STKPush;
use App\Models\MPESA;
use App\Models\Orderproduct;

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
        $product = Product::find($id);

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity
        ]);

        if ($product->quantity >= $request->quantity) {
            Cart::update(
                $request->id,
                [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity
                    ],
                ]
            );
            return redirect()->back()->with('success', 'Item Cart is Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Insufficient quantity available.');
        }
    }

    public function clearcart()
    {
        Cart::clear();
        return redirect()->back()->with('Success', 'Cleared');
    }

    public function checkout(Request $request)
    {
        $shop = Shop::find(1);
        $categories = Category::where('shop_id', $shop->id)->where('active', true)->get();
        $cart = Cart::getContent();
        $itemCount = $cart->count();

        $order = Order::create([
            'shop_id' => $request->shop_id,
            'status' => 'pending',
            'amount' => $request->amount
        ]);

        if ($order) {
            return view('Landing.checkout', compact('cart', 'shop', 'categories', 'itemCount', 'order'));
        }else{
            return redirect()->back()->with('Failed', 'Failed to Place an order');
        }
    }

    public function pay(Request $request)
    {
        $allproducts = $request->cartcontent;
        $data = json_decode($allproducts, true);
        $product_id = $data[3]["id"];
        $quantity = $data[3]["quantity"];
        foreach($data as $product)
        {
            $orderproduct = Orderproduct::create([
                'order_id'=>$request->order_id,
                'product_id'=>$product_id,
                'quantity'=>$quantity,
                'shop_id'=>$request->shop_id
            ]);
        } 

        $response =  (new STKPush())->initiateSTK([
            "CallingCode" => "254", // 254 or 255
            "Secret" => env('PAM_APP_SHORTCODE_SECRET_KEY'),
            "TransactionType" => "CustomerPayBillOnline", // CustomerPayBillOnline or CustomerBuyGoodsOnline
            "PhoneNumber" => $request->phone,
            'Amount' => $request->amount,
            "ResultUrl" => route('stk.push'),
            "Description" => "Testing Payment"
        ]);

        if ($response->success) {
            $order = Order::find($request->order_id);

            if($order){
                $order->status = 'Complete';
                $order->save();
            }

            Mpesa::query()->create([
                'order_id' => $request->order_id,
                'reference_number' => $response->data->ReferenceNumber,
                'phone_number' => $request->phone,
                'amount' => $request->amount,
                'description' => 'Payments for Course',
                'attempts' => 1,
                'is_initiated' => true,
                'queued_at' => now()
            ]);
            return redirect()->back();
        } else {
            $this->alert('error', implode(",\n", $response->data[0]->errors));
        }
    }
}
