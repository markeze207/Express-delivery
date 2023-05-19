@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('orders.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-10 offset-md-1" style="margin-top: 10px;">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Статус:</label>
                                    <select name="status" class="select2" style="width: 100%;">
                                        <option selected value="0">Все статусы</option>
                                        @foreach($statuses as $id => $status)
                                            <option {{ isset($_GET['status']) && $_GET['status'] == $id ? 'selected' : '' }} value="{{ $id }}">{{ $status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Магазин:</label>
                                    <select name="service" class="select2" style="width: 100%;">
                                        <option selected value="0">Все магазины</option>
                                        @foreach($markets as $id => $market)
                                            <option {{ isset($_GET['service']) && $_GET['service'] == $id ? 'selected' : '' }} value="{{ $id }}">{{ $market }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" name="FN" class="form-control form-control-lg" placeholder="Поиск по ФИО">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a style="margin-bottom: 15px;" class="btn btn-primary btn-sm" href="{{ route('orders.index') }}">
                            Очистить фильтры
                        </a>
                    </div>

                </div>

            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Заказы</h3>

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
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            ФИО
                        </th>
                        <th style="width: 30%">
                            Телефон
                        </th>
                        <th>
                            Сервис
                        </th>
                        <th style="width: 8%" class="text-center">
                            Статус
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr id="block_{{ $order->id }}">
                            <td>
                                {{ $order->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $order->FN }}
                                </a>
                                <br/>
                                <small>
                                    Created {{ $order->created_at }}
                                </small>
                            </td>
                            <td>
                                {{ $order->phone }}
                            </td>
                            <td class="project_progress">
                                @foreach($markets as $id => $market)
                                    @if( (int) $order->service === $id)
                                        {{ $market }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="project-state">
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
                            </td>
                            <td class="project-actions text-right" style="font-size: 12px;">
                                <a class="btn btn-primary btn-sm" href="{{ route('orders.show', $order->id) }}">
                                    📁 View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('orders.edit', $order->id) }}">
                                    ✏ Edit
                                </a>
                                <form class="form_delete_order" id="{{ $order->id }}" style="display: inline;">
                                    <input type="submit" class="btn btn-danger btn-sm" value="🗑️ Delete">
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div  style="margin-left: 20px;">
                {{ $orders->withQueryString()->links() }}
            </div>
            <!-- /.card-body -->
        </div>
    </section>

            <!-- /.card -->
    <!-- /.content-wrapper -->

@endsection
@section('script')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2()
        });
        $(".form_delete_order").on("submit", function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            const ordersCount = $('.ordersCount').text();
            let url = '{{ route("orders.destroy", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data){
                    $('#block_'+id).fadeOut();
                    $('.ordersCount').text(ordersCount - 1);
                }
            });
        });
    </script>
@endsection
