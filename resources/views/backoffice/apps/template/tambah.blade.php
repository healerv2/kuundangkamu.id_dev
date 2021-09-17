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
          <h1>Add Template</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">add</a></li>
            <li class="breadcrumb-item active">template</li>
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
              <h3 class="card-title">Form Add Template</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url('/superadmin/template/save') }}" method="post" enctype="multipart/form-data">
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
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name Product</label>
                <div class="col-sm-10">
                  <select class="custom-select" name="product_id" id="product_id"  style="width: 100%;">
                    <option selected disabled>-- Product --</option>
                    @foreach($product as $value)
                    <option value="{{ $value->id }}">{{ $value->name_product }}</option>
                    @endforeach
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name Template</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name_template" id="name_template" placeholder="Name Template" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Url Template</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="url" id="url" placeholder="Url" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="keterangan" id="Keterangan" placeholder="Keterangan">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Thumbnail</label>
                <div class="col-sm-10">
                  <input type="file" name="image" id="image" class="form-control" placeholder="Tumbnail">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="reset" class="btn btn-default ">Reset</button>
              <a href="{{ url('/') }}/superadmin/template" class="btn btn-danger">Cancel</a>
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