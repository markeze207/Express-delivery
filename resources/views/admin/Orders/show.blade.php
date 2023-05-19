@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Заказ</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2" style="margin-left: 15px;">
                <h3 class="text-primary" style="padding-top: 10px;"> {{ $order->FN }}</h3>
                <br>
                <div class="text-muted">
                    <p class="text-md">Телефон
                        <b class="d-block">{{ $order->phone }}</b>
                    </p>
                    <p class="text-md">Маркет
                        @foreach($markets as $id => $market)
                            @if( (int) $order->service === $id)
                                <b class="d-block">{{ $market }}</b>
                            @endif
                        @endforeach
                    </p>
                    <p class="text-md">Статус:
                        @foreach($statuses as $id => $status)
                            @if( (int) $order->status === $id)
                                @switch($order->status)
                                    @case(1)
                                        <span class="badge badge-warning"> {{ $status }}</span>
                                        @break
                                    @case(2)
                                        <span class="badge badge-info"> {{ $status }}</span>
                                        @break
                                    @case(3)
                                        <span class="badge badge-success"> {{ $status }}</span>
                                        @break
                                @endswitch
                            @endif
                        @endforeach
                    </p>
                    @if(isset($order->qr_photo))
                        <img style="width: 900px; height: 500px; margin-bottom: -20px;" src="{{ $order->qr_photo  }}" alt="photo">
                    @else
                        <p class="text-md">Последние 4 цифры заказа:
                            <b class="d-block">{{ $order->order_number }}</b>
                        </p>
                        <p class="text-md">Последние 4 цифры телефона WB:
                            <b class="d-block">{{ $order->order_phone }}</b>
                        </p>
                    @endif
                    <div class="mt-5 mb-3" >
                        <a href="{{ route('orders.index') }}" class="btn btn-primary" >Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
