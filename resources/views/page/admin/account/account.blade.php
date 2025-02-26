@extends('layouts.main-layout')

@section('page.account')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Account</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Account</li>
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
                <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary mb-3">Add New Accounts</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                              <td>{{ $user->id }}
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d-m-Y H:i') : '-' }}</td>
                                <td>{{ $user->updated_at ? \Carbon\Carbon::parse($user->updated_at)->format('d-m-Y H:i') : '-' }}</td>                                
                                <td>
                                  <a href="{{ route('admin.accounts.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Are you sure want to Delete this ?')" action="{{ route('admin.accounts.destroy', $user->id) }}" method="POST" style="display:inline;">
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