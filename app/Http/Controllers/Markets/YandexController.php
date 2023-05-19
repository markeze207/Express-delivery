<?php

namespace App\Http\Controllers\Markets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Markets\Yandex\StoreRequest;
use App\Service\Yandex\Service;

class YandexController extends Controller
{

    protected Service $yandexService;

    /**
     * Get service
     */
    public function __construct(Service $yandexService)
    {
        $this->yandexService = $yandexService;
    }

    /**
     * Show the main page
     */
    public function index()
    {
        return view('yandex.index');
    }

    /**
     * Show the form for creating a new order.
     */
    public function form()
    {
        return view('yandex.form');
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $order = $this->yandexService->store($data);

        return view('main.success-form', compact('order'));
    }
}
