@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавление поста</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Добавление поста</li>
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
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Название поста</label>
                                <input value="{{ old('title') }}" type="text" name="title" id="inputName" class="form-control">
                                @error('title')
                                <p class="text-danger">Название поста обязательное</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Текст поста</label>
                                <textarea name="content" id="inputDescription" class="form-control" rows="4">{{ old('content') }}</textarea>
                                @error('content')
                                <p class="text-danger">Текст поста обязателен</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputGroupFileAddon01">Фотография</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="photo" accept="image/jpeg,image/png" type="file" class="custom-file-input" id="inputGroupFile01"
                                               aria-describedby="inputGroupFileAddon01">
                                        <label id="label_inputGroupFile01" class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                @error('preview_photo')
                                <p class="text-danger">Фотография поста обязательная</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Create">
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#inputGroupFile01').change(function() {
                if (this.files[0]) // если выбрали файл
                    $('#label_inputGroupFile01').text(this.files[0].name);
            });
        });
    </script>
@endsection
