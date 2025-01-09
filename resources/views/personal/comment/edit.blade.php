 @extends('personal.layouts.main')

 @section('content')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Коментарии</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Коментарии</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <form action="{{ route('personal.comment.update', $comment->id) }}" method="POST" class="w-50">
              @csrf
              @method('PUT')
              <div class="form-group">
                <textarea class="form-control" name="message" cols="30" rows="10">{{ $comment->message }}</textarea>
                  @error('title')
                      <div class="text-danger">Это обезательное поле</div>
                  @enderror
              </div>
                  <input type="submit" class="btn btn-primary" value="Обновить">
          </form>
          <div class="col-3 mt-4">
              <a href="{{ route('admin.category.index') }}" class="btn btn-block btn-primary">Вернуться</a>
          </div>
      </div>
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  @endsection
