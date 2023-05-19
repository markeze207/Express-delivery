@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Посты</h3>

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
                            Имя
                        </th>
                        <th style="width: 30%">
                            Почта
                        </th>
                        <th>
                            Роль
                        </th>
                        <th style="width: 8%" class="text-center">

                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr id="block_{{ $user->id }}">
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $user->name }}
                                </a>
                                <br/>
                                <small>
                                    Created {{ $user->created_at }}
                                </small>
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                @foreach($rolesUser as $id => $roles)
                                    @if((int)$user->role === $id)
                                        {{ $roles }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="project-state">

                            </td>
                            <td class="project-actions text-right" style="font-size: 12px;">
                                <a class="btn btn-info btn-sm" href="{{ route('admin.user.edit', $user->id) }}">
                                    ✏ Edit
                                </a>
                                <form class="form_delete_user" id="{{ $user->id }}" style="display: inline;">
                                    <input type="submit" class="btn btn-danger btn-sm" value="🗑️ Delete">
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div  style="margin-left: 20px;">
                {{ $users->withQueryString()->links() }}
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
        $(".form_delete_user").on("submit", function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            const userCount = $('.userCount').text();
            let url = '{{ route("admin.user.destroy", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data){
                    $('#block_'+id).fadeOut();
                    $('.userCount').text(userCount - 1);
                }
            });
        });
    </script>
@endsection
