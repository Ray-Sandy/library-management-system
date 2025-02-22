
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Collapsed Sidebar</title>

  @include('layouts.css')
  @include('page.book.css')
  @include('layouts.table-css')

</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('layouts.massage')
    @yield('page.admin')
    @yield('page.search')

    @yield('page.book')
    @yield('book.create')
    @yield('book.edit')

    @yield('page.account')
    @yield('account.create')
    @yield('account.edit')

    @yield('page.borrow')
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

@include('layouts.script')
@include('page.book.script')
@include('layouts.table-script')
</body>
</html>
