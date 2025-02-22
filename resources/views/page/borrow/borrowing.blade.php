@extends('layouts.layouts') <!-- Sesuaikan dengan layout yang Anda gunakan -->

@section('page.borrow')
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

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->status }}</td>
                            <td>
                                @if($book->status == 'available')
                                    <form action="{{ route('borrow.book', $book->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Apakah Anda yakin ingin meminjam buku ini?')">Pinjam</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary btn-sm" disabled>Sudah Dipinjam</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
</div>
</section>
@endsection