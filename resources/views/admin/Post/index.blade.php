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
                <a style="margin-left: 21px; margin-top: 10px;" class="btn btn-primary btn-sm" href="{{ route('admin.post.create') }}">
                    ✏ Создать
                </a>
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Заголовок
                        </th>
                        <th style="width: 30%">
                            Текст
                        </th>
                        <th>

                        </th>
                        <th style="width: 8%" class="text-center">

                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr id="block_{{ $post->id }}">
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                <a>
                                    {{ $post->title }}
                                </a>
                                <br/>
                                <small>
                                    Created {{ $post->created_at }}
                                </small>
                            </td>
                            <td>
                                {{ substr($post->content, 0, 20).'...' }}
                            </td>
                            <td class="project_progress">

                            </td>
                            <td class="project-state">

                            </td>
                            <td class="project-actions text-right" style="font-size: 12px;">
                                <a class="btn btn-primary btn-sm" target="_blank" href="{{ route('posts.show', $post->id) }}">
                                    📁 View
                                </a>
                                <a class="btn btn-info btn-sm" href="{{ route('admin.post.edit', $post->id) }}">
                                    ✏ Edit
                                </a>
                                <form class="form_delete_post" id="{{ $post->id }}" style="display: inline;">
                                    <input type="submit" class="btn btn-danger btn-sm" value="🗑️ Delete">
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div  style="margin-left: 20px;">
                {{ $posts->withQueryString()->links() }}
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
        $(".form_delete_post").on("submit", function(e){
            e.preventDefault();
            const id = $(this).attr('id');
            const postCount = $('.postCount').text();
            let url = '{{ route("admin.post.destroy", ":id") }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data){
                    $('#block_'+id).fadeOut();
                    $('.postCount').text(postCount - 1);
                }
            });
        });
    </script>
@endsection
