<?php

namespace App\Service\Ozon;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function store($data)
    {
        try {
            Db::beginTransaction();

            $photoPut = Storage::put('public/images/ozon/', $data['qr_photo']); // Upload new photo in storage
            $data['qr_photo'] = Storage::url($photoPut); // Save url path in database

            $order = Order::create($data); // Create order
            DB::commit();
            return $order;
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

}
