@extends('layouts/auth.index')
@section('content')
  <div class="auth__left">
    <div><b>Undang</b>an</div>
  </div>
  <div class="auth__right">
    <div class="logo"><b>Undang</b>an</div>
    <div class="">
      <p class="">Register a new membership</p>
      <form action="../../index.html" class="form" method="post">
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
          <input type="text" class="" name="phone" id="Phone" placeholder="Phone (WA)">
          <span class="fas fa-mobile"></span>
        </div>
        <div class="form__item otp">
          <input type="text" class="" name="otp" id="otp" placeholder="Otp">
          <a href="javascript:void(0);" onclick="SendOtp()" class="">Send Otp</a>
          {{-- <span class="fas fa-lock"></span> --}} 
          <span id="error_otp"></span>
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
  <!-- jQuery -->
  <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
  <script>
    $(document).ready(function(){

     $('#otp').blur(function(){
      var error_otp = '';
      var otp = $('#otp').val();
      var _token = $('input[name="_token"]').val();
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(!filter.test(otp))
      {    
       $('#error_otp').html('<label class="text-danger">Otp tidak sesuai, mohon dicek!</label>');
       $('#otp').addClass('has-error');
       $('#register').attr('disabled', 'disabled');
     }
     else
     {
       $.ajax({
         url: '{{ url('/')}}/otp/check',
         method:"POST",
         data:{otp:otp, _token:_token},
         success:function(result)
         {
           if(result == 'unique')
           {
            $('#error_otp').html('<label class="text-success">Otp Available</label>');
            $('#otp').removeClass('has-error');
            $('#register').attr('disabled', false);
          }
          else
          {
            $('#error_otp').html('<label class="text-danger">Otp not Available</label>');
            $('#otp').addClass('has-error');
            $('#register').attr('disabled', 'disabled');
          }
        }
      })
     }
   });

   });
 </script>
 <script>
   function SendOtp() {
    $.ajax({
      url: '{{url('/send/otp')}}',
      type: 'post',
      data: {
        _token: "{{ csrf_token() }}",
      // value: c
    },
    success: function (response) {
      if(response.success){
        return toastr.success(response.message, 'Sukses !')
      }
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
