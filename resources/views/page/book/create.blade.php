@extends('layouts.layouts')

@section('book.create')
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
                    <form action="{{ url('/admin/books') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" required>
                                </div>
    
                                <!-- Author -->
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" value="{{ old('email') }}" required>
                                </div>
    
                                <!-- Publisher -->
                                <div class="form-group">
                                    <label for="publisher">Publisher</label>
                                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter publisher name" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <!-- /.col -->
    
                            <div class="col-md-6">
                                <!-- Year -->
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" placeholder="Enter publication year" value="{{ old('email') }}" required>
                                </div>
    
                                <!-- ISBN -->
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter ISBN" value="{{ old('email') }}" required>
                                </div>
    
                                <!-- Status -->
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control select2" id="status" name="status" style="width: 100%;">
                                        <option selected="available">available</option>
                                        <option value="borrowed">borrowed</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('/admin/books') }}" class="btn btn-default">Cancel</a>
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