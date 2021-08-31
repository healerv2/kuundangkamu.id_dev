@extends('layouts.index')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">add</a></li>
            <li class="breadcrumb-item active">users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          <!-- Horizontal Form -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Form Add Users</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url('/superadmin/user/save') }}" method="post">
             {{ csrf_field() }}
             <div class="card-body">
               @if ($errors->any())
               <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              @if(\Session::has('alert-failed'))
              <div class="alert alert-danger text-center">
                <div>{{Session::get('alert-failed')}}</div>
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
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Phone (Wa)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone (WA)" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Level User</label>
                <div class="col-sm-10">
                  <select class="form-control select2" id="level" name="level" style="width: 100%;" required>
                    <option selected="selected">Level User</option>
                    <option value="superadmin">Superadmin</option>
                    <option value="accounting">Accounting</option>
                    <option value="visitor">Vistor/User</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="reset" class="btn btn-default ">Reset</button>
              <a href="{{ url('/') }}/superadmin/user" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Save</button>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@stop
@push('scripts')
<script>
 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })  
  });
 @endpush 