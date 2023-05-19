<?php

namespace App\Http\Controllers\Markets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Markets\Ozon\StoreRequest;
use App\Service\Ozon\Service;

class OzonController extends Controller
{

    protected Service $ozonService;

    /**
     * Get service
     */

    public function __construct(Service $ozonService)
    {
        $this->ozonService = $ozonService;
    }

    /**
     * Show the main page
     */
    public function index()
    {
        return view('ozon.index');
    }

    /**
     * Show the form for creating a new order.
     */
    public function form()
    {
        return view('ozon.form');
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $order = $this->ozonService->store($data);
        return view('main.success-form', compact('order'));
    }
}
