<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class Grandgalleria extends Controller
{
    //
    public function allorders()
    {
        $orders = Order::where('active', true);
        return view('Order.list',compact('orders'));
    }
}
