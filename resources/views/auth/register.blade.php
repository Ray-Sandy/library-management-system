@extends('auth.auth-layout')

@section('auth.register')
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

        <form action="{{ route('register') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
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
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>

        <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
      </div>
  </div>
@endsection