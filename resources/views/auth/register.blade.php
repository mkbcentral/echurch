@extends('layouts.guest')
@section('content')
  <div class="card">
    <div class="card-body login-card-body">
      <h3 class="login-box-msg text-danger text-bold">Sign Up</h3>
      <form action="{{ route('register') }}" method="post">
        @csrf
        @error('name') <span class="error text-danger pb-2">{{ $message }}</span> @enderror
        <div class="input-group mb-3">

          <input type="text" name="name" class="form-control @error('name') is-invalid border border-danger rounded @enderror"
                 placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
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
          <input type="password" name="password" class="form-control @error('password') is-invalid border border-danger rounded @enderror"
          placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password_confirmation') <span class="error text-danger">{{ $message }}</span> @enderror
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid border border-danger rounded @enderror"
            placeholder="Password confirmation">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>

          </div>

        <div class="row">
          <div class="col-8">
            <p>Or <a href="{{ route('login') }}">Login</a></p>
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
