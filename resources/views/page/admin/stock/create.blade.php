@extends('layouts.main-layout')

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
                    <form action="{{ route('admin.stocks.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" value="{{ old('title') }}" required>
                                </div>
    
                                <!-- Author -->
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" value="{{ old('author') }}" required>
                                </div>
    
                                <!-- Publisher -->
                                <div class="form-group">
                                    <label for="publisher">Publisher</label>
                                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter publisher name" value="{{ old('publisher') }}" required>
                                </div>
                            </div>
                            <!-- /.col -->
    
                            <div class="col-md-6">
                                <!-- ISBN -->
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Enter ISBN" value="{{ old('isbn') }}" required>
                                </div>

                                <!-- Year -->
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" placeholder="Enter publication year" value="{{ old('year') }}" required>
                                </div>

                                <!-- Year -->
                                <div class="form-group">
                                    <label for="year">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter book stock " value="{{ old('stock') }}" required>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.stocks.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection