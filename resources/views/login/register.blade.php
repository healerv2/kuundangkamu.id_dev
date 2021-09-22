@extends('layouts/auth.index')
@section('content')
  <div class="auth__left">
    <div><b>Undang</b>an</div>
  </div>
  <div class="auth__right">
    <div class="logo"><b>Undang</b>an</div>
    <div class="">
      <p class="">Register a new membership</p>
      <form action="{{url('register')}}" class="form" method="post">
        {{ csrf_field() }}
        <div class="form__item">
          <input type="text" class="" name="name" id="name" placeholder="Full name">
          <span class="fas fa-user"></span>
        </div>
        <div class="form__item">
          <input type="text" class="" name="username" id="username" placeholder="Username">
          <span class="fas fa-user-circle"></span>
        </div>
        <div class="form__item">
          <input type="email" class="" name="email" id="email" placeholder="Email">
          <span class="fas fa-envelope-open"></span>
        </div>
        <div class="form__item">
          <input type="password" class="" name="password" id="Password" autocomplete="on" placeholder="Password">
          <span class="fas fa-lock"></span>
        </div>
        <div class="form__item">
          <input type="number" class="" name="phone" id="Phone" placeholder="Phone (WA)">
          <span class="fas fa-mobile"></span>
        </div>
        <div class="form__item otp">
          <input type="number" class="" name="otp" id="otp" placeholder="Otp">
          <a href="javascript:void(0);" onclick="SendOtp()" class="">Send Otp</a>
        </div>
        <div class="-flex -justify-between -align-center">
          <div class="form__checkbox -flex ">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
            <label for="agreeTerms">
              I agree to the <a href="#" class="link">terms</a>
            </label>
          </div>
          <button type="submit" name="register" id="register" class="btn btn--primary">Register</button>
        </div>
      </form>
      <a href="{{ url('auth/google') }}" class="btn btn--google">
        <i class="fab fa-google-plus"></i>
        Sign up using Google+
      </a>
    </div>
    <a href="{{url('login')}}" class="link">I already have a membership</a>
  </div>


@push('scripts')
 <script>
   function SendOtp() {
    $.ajax({
      url: '{{url('/send/otp')}}',
      type: 'post',
      dataType: 'json',
      data: {
        _token: "{{ csrf_token() }}",
        phone: $('#Phone').val()
      // value: c
    },
    success: function (response) {
      if(response.success){
        return toastr.success(response.message, 'Sukses !')
      }
      alert(response.message);
    return toastr.error(response.message, 'Gagal !')
    },
    error: function (response) {
      console.log(response)
      toastr.error("Gagal, terjadi kesalahan server")
    }
  });
  }
</script>
@endpush
</body>
</html>
