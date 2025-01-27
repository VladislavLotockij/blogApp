@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование тега</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index')}}">Главная страница</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.tag.index')}}">Список тегов</a></li>
                            <li class="breadcrumb-item active">{{$tag->title}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Название тега" value="{{$tag->title}}">
                            @error('title')
                                <div class="text-danger">Это обезательное поле</div>
                            @enderror
                        </div>
                            <input type="submit" class="btn btn-primary" value="Обновить">
                    </form>
                    <div class="col-3 mt-4">
                        <a href="{{ route('admin.tag.index') }}" class="btn btn-block btn-primary">Вернуться</a>
                    </div>
                </div>
            </div>
        </section>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
