@extends('layouts/auth.index')
@section('content')
<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="" class="h1"><b>Page</b>Login</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if(\Session::has('alert'))
        <div class="alert alert-danger text-center">
          <div>{{Session::get('alert')}}</div>
        </div>
        @endif
        @if(\Session::has('alert-success'))
        <div class="alert alert-success text-center">
          <div>{{Session::get('alert-success')}}</div>
        </div>
        @endif
        @if(\Session::has('alert-warning'))
        <div class="alert alert-warning text-center">
          <div>{{Session::get('alert-warning')}}</div>
        </div>
        @endif
        <form action="{{url('action_login')}}" method="post">
           {{ csrf_field() }}
          <div class="input-group mb-3">
            <input type="text" name="username" id="username" class="form-control" autocomplete="on" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control" autocomplete="on" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember"  id="remember">
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

      <div class="social-auth-links text-center mt-2 mb-3">
        {{-- <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a> --}}
        <a href="{{ url('auth/google') }}" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@stop