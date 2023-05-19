<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Http\Filters\OrdersFilter;
use App\Http\Requests\Admin\Orders\FilterRequest;
use App\Http\Requests\Admin\Orders\UpdateRequest;
use App\Models\Order;
use App\Service\Admin\Markets\Service;

class OrdersController extends Controller
{

    protected Service $ordersService;

    /**
     * Get service
     */

    public function __construct(Service $ordersService)
    {
        $this->ordersService = $ordersService;
    }

    /**
     * Show the order list in admin panel
     */
    public function index(FilterRequest $requests)
    {

        $data = $requests->validated();
        $filter = app()->make(OrdersFilter::class, ['queryParams' => array_filter($data)]);
        $orders = Order::filter($filter)->orderBy('created_at', 'desc')->paginate(10);
        $markets = Order::getMarkets();
        $statuses = Order::getStatusOrder();

        return view('admin.orders.index', compact('orders', 'markets', 'statuses'));
    }

    /**
     * Show the desired order
     */
    public function show(Order $order)
    {
        $markets = Order::getMarkets();
        $statuses = Order::getStatusOrder();

        return view('admin.orders.show', compact('order', 'markets', 'statuses'));
    }

    /**
     * Display the specified order edit form.
     */
    public function edit(Order $order)
    {
        $markets = Order::getMarkets();
        $statuses = Order::getStatusOrder();

        return view('admin.orders.edit', compact('order', 'statuses', 'markets'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(UpdateRequest $request, Order $order)
    {
        $data = $request->validated();

        $this->ordersService->update($data, $order);

        return redirect()->route('orders.show', $order->id);
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        if(isset($order->qr_photo)) // Delete image
        {
            unlink(public_path($order->qr_photo));
        }
        $order->delete();
    }
}
