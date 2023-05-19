<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'orders';
    protected $guarded = [];

    const WILDBERRIES = 1;
    const OZON = 2;
    const YANDEX = 3;
    const OTHER = 4;

    /**
     * Return markets list
     */
    public static function getMarkets()
    {
        return [
            self::WILDBERRIES => 'Wildberries',
            self::OZON => 'Ozon',
            self::YANDEX => 'Yandex Market',
            self::OTHER => 'Другое',
        ];
    }


    const NEW_ORDER = 1;
    const PROCESSING_ORDER = 2;
    const COMPLETED_ORDER = 3;

    /**
     * Return status order
     */
    public static function getStatusOrder()
    {
        return [
            self::NEW_ORDER => 'Новый заказ',
            self::PROCESSING_ORDER => 'Ожидает клиента',
            self::COMPLETED_ORDER => 'Выпол. заказ',
        ];
    }


}
