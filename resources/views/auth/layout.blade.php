
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LMS | Log in</title>

  @include('layouts.css')

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}"><b>LMS</b></a>
  </div>
  <!-- /.login-logo -->
  @yield('auth.login')
  @yield('auth.register')
</div>
<!-- /.login-box -->

@include('layouts.script')
</body>
</html>
