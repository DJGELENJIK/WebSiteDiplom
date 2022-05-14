<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests;
use Illuminate\Http\Request;


class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::where('status',1)->get();

 return view('auth.orders.index',compact('orders'));
    }


}
