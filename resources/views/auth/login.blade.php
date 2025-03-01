@extends('auth.auth-layout')

@section('auth.login')
<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg">Sign in to start your story</p>

    <form action="{{route('login')}}" method="post">
      @csrf
      <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <div class="input-group-append"> 
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
              Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- Pesan Error -->
    {{-- @include('layouts.massage') --}}
    <!-- Link Register -->
    <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
    </p>
  </div>
  <!-- /.login-card-body -->
</div>
@endsection
