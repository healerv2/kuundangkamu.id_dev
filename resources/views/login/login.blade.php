@extends('layouts/auth.index')
@section('content')
  <div class="auth__left">
    <div><b>Undang</b>an</div>
  </div>
  <div class="auth__right">
    <div class="logo"><b>Undang</b>an</div>
    <div class="">
      <p class="">Sign in to start your session</p>
      <p class="login-box-msg"></p>
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
        <div class="form__item">
          <input type="text" name="username" id="username" autocomplete="on" placeholder="Username">
          <span class="fas fa-user"></span>
        </div>
        <div class="form__item">
          <input type="password" name="password" id="password" autocomplete="on" placeholder="Password">
          <span class="fas fa-lock"></span>
        </div>
        
        <div class="-flex -justify-between -align-center">
          <div class="form__checkbox -flex ">
            <input type="checkbox" name="remember"  id="remember">
            <label for="agreeTerms">
              Remember Me
            </label>
          </div>
          <button type="submit" class="btn btn--primary">Sign In</button>
        </div>
      </form>      
      <a href="{{ url('auth/google') }}" class="btn btn--google">
        <i class="fab fa-google-plus"></i>
        Sign up using Google+
      </a>
    </div>
    <a href="{{url('register')}}" class="link">Dont have Account? register</a>
  </div>
@stop