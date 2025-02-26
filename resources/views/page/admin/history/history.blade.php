@extends('layouts.main-layout')

@section('page.history')
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>History</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">History</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-6">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Stock History</h3>
                    </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example3" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Isbn</th>
                                <th>Created-at</th>
                                <th>Upadated-at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $historyStok as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $history->id }}</td>
                                <td>{{ $history->title }}</td>
                                <td>{{ $history->isbn }}</td>
                                <td>{{ $history->created_at }}</td>
                                <td>{{ $history->updated_at }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Borrow History</h3>
                      </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example2" class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>User</th>
                                      <th>Buku</th>
                                      <th>Borrowed At</th>
                                      <th>Returned At</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($historyBorrow as $history)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $history->user_name }}</td>
                                      <td>{{ $history->book_title }}</td>
                                      <td>{{ $history->borrowed_at }}</td>
                                      <td>{{ $history->returned_at ?? 'Not returned' }}</td>
                                      <td>{{ ucfirst($history->status) }}</td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.card -->
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Account History</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example4" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Terakhir Diperbarui</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $historyAccount as $account)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->email }}</td>
                                <td>{{ ucfirst($account->role) }}</td>
                                <td>{{ $account->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>    
@endsection