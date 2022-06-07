<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function index(Request $request) {
        Log::debug($request->all());
        $public = explode('|', $request->input('callback_query')['data'])[0];
        $secret_key = explode('|', $request->input('callback_query')['data'])[1];
        $order = Order::where('phone', $secret_key)->first();
        $order->status = explode('|', $request->input('callback_query')['data'])[0];
        $order->save();
    }
}
