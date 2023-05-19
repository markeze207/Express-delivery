@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование заказа</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Редактирование заказа</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Заказ</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="inputName">ФИО</label>
                                <input value="{{ $order->FN }}" type="text" name="FN" id="inputName" class="form-control">
                                @error('FN')
                                <p style="color: red;" class="text-danger">ФИО обязательный параметр</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPhone">Телефон</label>
                                <input data-phone-pattern name="phone" id="inputPhone" type="tel" class="form-control" value="{{ $order->phone }}">
                                @error('phone')
                                <p style="color: red;" class="text-danger">Телефон обязательный параметр</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Статус</label>
                                <select name="status" class="form-control" id="status">
                                    @foreach($statuses as $id => $status)
                                        <option
                                            {{ $id == $order->status ? 'selected' : '' }}
                                            value="{{ $id }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <p style="color: red;" class="text-danger">Статус обязательный параметр</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="markets">Маркет</label>
                                <select name="service" class="form-control" id="markets">
                                    @foreach($markets as $id => $market)
                                        <option
                                            {{ $id == $order->service ? 'selected' : '' }}
                                            value="{{ $id }}">{{ $market }}</option>
                                    @endforeach
                                </select>
                                @error('service')
                                <p style="color: red;" class="text-danger">Маркет обязательный параметр</p>
                                @enderror
                            </div>
                            @if(isset($order->order_number) && isset($order->phone))
                                <div class="form-group">
                                    <label for="inputOrderNumber">Последние 4 цифры</label>
                                    <input name="order_number" id="inputOrderNumber" type="text" class="form-control" value="{{ $order->order_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputOrderPhone">Последние 4 цифры телефона WB</label>
                                    <input name="order_phone" id="inputOrderPhone" type="text" class="form-control" value="{{ $order->order_phone }}">
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary">Редактировать</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <script>
        // Phone mask
        var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.arrayIteratorImpl=function(a){var b=0;return function(){return b<a.length?{done:!1,value:a[b++]}:{done:!0}}};$jscomp.arrayIterator=function(a){return{next:$jscomp.arrayIteratorImpl(a)}};$jscomp.makeIterator=function(a){var b="undefined"!=typeof Symbol&&Symbol.iterator&&a[Symbol.iterator];return b?b.call(a):$jscomp.arrayIterator(a)};
        document.addEventListener("DOMContentLoaded",function(){var a=function(e){var c=e.target,n=c.dataset.phoneClear;c=(c=c.dataset.phonePattern)?c:"+7(___) ___-__-__";var g=0,k=c.replace(/\D/g,""),d=e.target.value.replace(/\D/g,"");"false"!==n&&"blur"===e.type&&d.length<c.match(/([_\d])/g).length?e.target.value="":(k.length>=d.length&&(d=k),e.target.value=c.replace(/./g,function(l){return/[_\d]/.test(l)&&g<d.length?d.charAt(g++):g>=d.length?"":l}))},b=document.querySelectorAll("[data-phone-pattern]");
            b=$jscomp.makeIterator(b);for(var f=b.next();!f.done;f=b.next()){f=f.value;for(var m=$jscomp.makeIterator(["input","blur","focus"]),h=m.next();!h.done;h=m.next())f.addEventListener(h.value,a)}});
    </script>
@endsection
