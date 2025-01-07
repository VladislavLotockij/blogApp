 @extends('personal.layouts.main')

 @section('content')
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Лайки</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Лайки</li>
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
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
              <thead>
              <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th colspan="2" class="text-center"></th>
              </tr>
              </thead>
              @foreach($posts as $post)
                  <tbody>
                  <tr>
                      <td class="text-center">{{$post->id}}</td>
                      <td class="text-center">{{$post->title}}</td>
                      <td class="text-center"><a href="{{ route('admin.post.show', $post->id) }}"><i
                                  class="far fa-eye"></i></a></td>
                      <td class="text-center">
                          <form action="{{ route('personal.liked.delete', $post->id) }}"
                                method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="border-0 bg-transparent">
                                  <i class="fas fa-trash text-danger" role="button"></i>
                              </button>
                          </form>
                      </td>
                  </tr>
                  </tbody>
              @endforeach
          </table>
      </div>
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  @endsection
