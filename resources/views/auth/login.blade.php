@extends('layouts.guest')
@section('content')
  <div class="card">
    <div class="card-body login-card-body">
      <h3 class="login-box-msg text-danger text-bold">Sign In</h3>
      <form action="{{ route('login') }}" method="post" autocomplete="off">
        @csrf
        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid border border-danger rounded @enderror"
                 placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>

        </div>
        @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid border border-danger rounded @enderror"
            name="password" placeholder="Password">
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
            <div>
                <p>Or <a href="{{route('register')}}">Register</a></p>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
@endsection
