<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Post;

class MainController extends Controller
{

    /**
     * Show the main page
     */
    public function index()
    {

        $completeDelivery = Order::where('status', 3)->count();
        $orderCount = Order::count();
        $deliveryInStock = Order::where('status', 2)->count();
        $posts = Post::getCacheMainPage(4);
        return view('main.index', compact('completeDelivery', 'orderCount', 'deliveryInStock', 'posts'));
    }
}
