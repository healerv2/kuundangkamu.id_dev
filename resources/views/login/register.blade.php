<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('')}}/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('')}}/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('')}}/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="../../index.html" method="post">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Phone (WA)">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-mobile"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="otp" id="otp" placeholder="Otp">
            <div class="input-group-append">
              <div class="input-group-text">
                <a href="javascript:void(0);"class="btn btn-primary btn-sm">Send Otp</a>

                {{-- <span class="fas fa-lock"></span> --}}
              </div>
              <span id="error_otp"></span>
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
           <!-- /.col -->
           <div class="col-4">
            <button type="submit" name="register" id="register" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="{{ url('auth/google') }}" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{url('login')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
@push('scripts')
<!-- jQuery -->
<script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('')}}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('')}}/assets/dist/js/adminlte.min.js"></script>
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
 $(document).ready(function () {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('#sendOtp').on('change', function(e){
   ///var status = $(this).find(":selected").attr("value");

   $.ajax({
    url: '{{url('/penyelia/report/update')}}',
    data: { _token: CSRF_TOKEN, id: {{ Request::segment(4) }}, status: status},
    dataType: "json",
    type: "POST",
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
 });
});
</script>
@endpush
</body>
</html>
