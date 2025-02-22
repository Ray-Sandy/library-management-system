@extends('layouts.layouts')

@section('book.edit')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Books</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add New Book</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Book Details</h3>
              </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" value="{{ $book->title }}" required>
                                </div>
                    
                                <!-- Author -->
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" value="{{ $book->author }}" required>
                                </div>
                    
                                <!-- Publisher -->
                                <div class="form-group">
                                    <label for="publisher">Publisher</label>
                                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter publisher name" value="{{ $book->publisher }}" required>
                                </div>
                            </div>
                            <!-- /.col -->
                    
                            <div class="col-md-6">
                                <!-- Year -->
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" placeholder="Enter publication year" value="{{ $book->year }}" required>
                                </div>
                    
                                <!-- ISBN -->
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter ISBN" value="{{ $book->isbn }}" required>
                                </div>
                    
                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control select2" id="status" name="status" style="width: 100%;" required>
                                        <option value="available" {{ $book->status == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="borrowed" {{ $book->status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.books.index') }}" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection