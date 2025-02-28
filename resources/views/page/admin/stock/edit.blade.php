@extends('layouts.main-layout')

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
                    <form action="{{ route('admin.stocks.update', $stock->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter book title" value="{{ $stock->title }}" required>
                                </div>
                    
                                <!-- Author -->
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" value="{{ $stock->author }}" required>
                                </div>
                    
                                <!-- Publisher -->
                                <div class="form-group">
                                    <label for="publisher">Publisher</label>
                                    <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter publisher name" value="{{ $stock->publisher }}" required>
                                </div>
                            </div>
                            <!-- /.col -->
                    
                            <div class="col-md-6">
                                <!-- ISBN -->
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" class="form-control" disabled="disabled" id="isbn" name="isbn" placeholder="Enter ISBN" value="{{ $stock->isbn }}">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- Year -->
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <input type="number" class="form-control" id="year" name="year" placeholder="Enter publication year" value="{{ $stock->year }}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <!-- Year -->
                                        <div class="form-group">
                                            <label for="year">Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter book stocks" value="{{ $stock->stock }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="form-lebel">Image input</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- /.row -->
                    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.stocks.index') }}" class="btn btn-default">Cancel</a>
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