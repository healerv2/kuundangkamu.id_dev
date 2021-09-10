@extends('layouts.index')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Product</h3>
              <a href="{{ url('superadmin/product/add') }}" class="btn btn-primary btn-sm float-right">Add Product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Product</th>
                    <th>Sub harga</th>
                    <th>Diskon (%)</th>
                    <th>Harga</th>
                    <th>Fitur</th>
                    <th>Keterangan</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop
@push('scripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      ajax: function(data, callback){
        $.ajax({
          url: '{{ url('/')}}/superadmin/product/ajax',
          'data': data,
          dataType: 'json',
          beforeSend: function(){
                // Here, manually add the loading message.
                $('#example1 > tbody').html(
                  '<tr class="odd">' +
                  '<td valign="top" colspan="9" class="dataTables_empty"><i class="fa fa-spinner fa-spin fa-2x fa-fw"></i></td>' +
                  '</tr>'
                  );
              },
              success: function(res){
                callback(res);
              }
            })
      },
      columns: [
      //{ data: 'id', name: 'Id' },
         { data: null,sortable: false, 
            render: function (data, type, row, meta) {
             return meta.row + meta.settings._iDisplayStart + 1;
           }  
         },
         { data: 'name_product', name: 'name_product' },
         { data: 'subharga', name: 'subharga', render: $.fn.dataTable.render.number( ',', '.', ) },
         { data: 'diskon', name: 'diskon' },
         { data: 'harga', name: 'harga',render: $.fn.dataTable.render.number( ',', '.', ) },
         { data: 'fitur', name: 'fitur' },
         { data: 'keterangan', name: 'keterangan' },
         { data: 'image', mRender: function(data, type, full) {
           return '<img src="/image/'+data+'" style="height:100px;width:100px;"/>';
         }
        },
        { data: null, mRender: function(data, type, full) {

        return `<a class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?');" href="{{url('')}}/superadmin/product/delete/${data.id}"> 
        Delete</a>
        <a class="btn btn-primary btn-sm" href="{{url('')}}/superadmin/product/edit/${data.id}"> 
        Edit</a>`;
        }
      }
    ],
    language: {
      loadingRecords: "&nbsp;",
      processing: 'Mohon tunggu sedang meload data'},
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush 