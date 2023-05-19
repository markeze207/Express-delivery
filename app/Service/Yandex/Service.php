<?php

namespace App\Service\Yandex;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function store($data)
    {
        try {
            Db::beginTransaction();

            $photoPut = Storage::put('public/images/yandex/', $data['qr_photo']); // Upload new photo in storage
            $data['qr_photo'] = Storage::url($photoPut); // Save path in database

            $order = Order::create($data); // Order create
            DB::commit();
            return $order;
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

}
