<?php

namespace App\Http\Controllers\Markets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Markets\Wildberries\StoreRequest;
use App\Service\Wildberries\Service;

class WildberriesController extends Controller
{

    protected Service $wildberriesService;

    /**
     * Get service
     */

    public function __construct(Service $wildberriesService)
    {
        $this->wildberriesService = $wildberriesService;
    }


    /**
     * Show the main page
     */
    public function index()
    {
        return view('wildberries.index');
    }


    /**
     * Show the form for creating a new order.
     */
    public function form()
    {
        return view('wildberries.form');
    }


    /**
     * Store a newly created order in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $order = $this->wildberriesService->store($data);
        return view('main.success-form', compact('order'));
    }
}
