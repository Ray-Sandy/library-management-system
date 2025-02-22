@extends('layouts.layouts')

@section('account.create')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>Add New Account</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                      <li class="breadcrumb-item active">Add New Account</li>
                  </ol>
              </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Account Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter full name" value="{{ $user->name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('email') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                  </div>
                  <!-- Role -->
                  <div class="form-group">
                    <label for="role_id">Role</label>
                      <select class="form-control select2" id="role_id" name="role_id" style="width: 100%;" required>
                          @foreach($roles as $role)
                              <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  {{-- <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div> --}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ url('/admin/accounts') }}" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection