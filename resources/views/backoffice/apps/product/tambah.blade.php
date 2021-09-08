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
          <h1>Add Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">add</a></li>
            <li class="breadcrumb-item active">product</li>
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
              <h3 class="card-title">Form Add Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ url('/superadmin/product/save') }}" method="post" enctype="multipart/form-data">
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
                  <input type="text" class="form-control" id="name_product" name="name_product" placeholder="Name Product" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Subharga</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="subharga" id="subharga" placeholder="Subharga" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Diskon (%)</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Diskon" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Akhir</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Fitur</label>
                <div class="col-sm-10">
                  <textarea type="text" name="fitur" id="summernote"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="keterangan" id="Keterangan" placeholder="Keterangan">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input type="file" name="image" id="image" class="form-control" placeholder="Image">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="reset" class="btn btn-default ">Reset</button>
              <a href="{{ url('/') }}/superadmin/product" class="btn btn-danger">Cancel</a>
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
    $('.select2').select2()
})
   $(document).ready(function () {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $( "#diskon" ).keyup(function() {
        var subharga = parseInt($( "#subharga" ).val());
        var diskon = parseInt($( "#diskon" ).val());
        var hasil = parseInt( subharga * (diskon/100));
        $("#harga").val(subharga - hasil);
    });

});
</script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
    //   mode: "htmlmixed",
    //   theme: "monokai"
    // });
  });
</script>
@endpush