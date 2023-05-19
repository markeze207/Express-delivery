@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование пользователя</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Редактирование пользователя</li>
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
                        <h3 class="card-title">Пользователь</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="status">Роль</label>
                                <select name="role" class="form-control" id="status">
                                    @foreach($rolesUser as $id => $roles)
                                        <option
                                            {{ $id == $user->roles ? 'selected' : '' }}
                                            value="{{ $id }}">{{ $roles }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <p style="color: red;" class="text-danger">Роль обязательный параметр</p>
                                @enderror
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="resetPassword" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Сброс пароля (случайный)</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Редактировать</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
