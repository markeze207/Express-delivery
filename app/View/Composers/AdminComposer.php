<?php

namespace App\View\Composers;

use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;

class AdminComposer
{

    public function compose(View $view)
    {
        $view->with(
            [
                'ordersCount' => Order::where('status', 1)->count(),
                'postCount' => Post::count(),
                'userCount' => User::count(),
            ]);
    }

}
