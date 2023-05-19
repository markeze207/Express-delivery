<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class OrdersFilter extends AbstractFilter
{
    public const FN = 'FN';
    public const STATUS = 'status';
    public const SERVICE = 'service';

    protected function getCallbacks(): array
    {
        return [
            self::FN => [$this, 'FN'],
            self::SERVICE => [$this, 'service'],
            self::STATUS => [$this, 'status'],
        ];
    }

    public function FN(Builder $builder, $value)
    {
        $builder->where('FN', 'like', "%{$value}%");
    }

    public function status(Builder $builder, $value)
    {
        $builder->where('status', $value);
    }

    public function service(Builder $builder, $value)
    {
        $builder->where('service', $value);
    }

}
