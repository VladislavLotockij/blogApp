@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                    <form action="{{ route('admin.post.store') }}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Название поста" value="{{old('title')}}">
                            @error('title')
                            <div class="text-danger">Это обезательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="content" value="{{old('content')}}"></textarea>
                            @error('content')
                            <div class="text-danger">Это обезательное поле</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </div>
                        <div class="col-3 mt-4">
                            <a href="{{ route('admin.post.index') }}" class="btn btn-block btn-primary">Вернуться</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection