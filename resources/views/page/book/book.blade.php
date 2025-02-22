@extends('layouts.layouts')

@section('page.book')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Admin/Homepage</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Homepage</li>
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
                <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Year</th>
                            <th>ISBN</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->year }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->status }}</td>
                            <td>
                                <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Are you sure want to Delete this ?')" class="d-inline" action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
  </section>
@endsection