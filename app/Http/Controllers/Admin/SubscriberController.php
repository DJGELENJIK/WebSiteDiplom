<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubscriberController extends Controller
{

    public function index()
    {
        $subscriptions = Subscription::get();
        return view('auth.subscriptions.index', compact('subscriptions'));
    }


    public function show(subscription $subscription)
    {
        $products_id = $subscription->get();
        return view('auth.subscriptions.show', compact('subscription', 'products_id'));
    }
}
