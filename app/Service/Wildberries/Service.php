<?php

namespace App\Service\Wildberries;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{

    public function store($data)
    {
        try {
            Db::beginTransaction();

            if(isset($data['qr_photo'])) // Check if the photo is uploaded
            {
                $photoPut = Storage::put('public/images/wb/', $data['qr_photo']); // Upload new photo in storage
                $data['qr_photo'] = Storage::url($photoPut); // Save url path in database
            }
            $order = Order::create($data); // Create order
            DB::commit();
            return $order;
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

}
