@extends('layouts.main-layout')

@section('page.mylibrary')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>My Library</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Member</a></li>
                <li class="breadcrumb-item active">MyLibrary</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Books Table</h3>
                  </div>
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <a href="" class="btn btn-primary mb-3">My-Library</a>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publisher</th>
                                <th>Year</th>
                                <th>ISBN</th>
                                <th>Borrowed At</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($borrowedBooks as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>{{ $book->year }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->borrowed_at }}</td>
                                <td>
                                    @if($book->status === 'borrowed')
                                        <span class="badge bg-warning">Borrowed</span>
                                    @else
                                        <span class="badge bg-success">Returned</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('member.mylibrary.return', $book->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Return</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
      </section>
@endsection