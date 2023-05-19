<?php

namespace App\Service\Admin\Markets;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class Service
{

    public function update($data, Order $order)
    {
        try {
            Db::beginTransaction();

            $order->update($data); // Update order

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $order->fresh();
    }

}
