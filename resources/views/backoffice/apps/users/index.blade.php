@extends('layouts.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
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
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Data User</h3>
          <a href="{{ url('superadmin/user/add') }}" class="btn btn-primary btn-sm float-right">Add Data User</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Action</th>
              </tr>
            </tfoot>
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      ajax: function(data, callback){
      $.ajax({
        url: '{{ url('/')}}/superadmin/user/ajax',
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
        { data: 'id', name: 'Id' },
         //  { data: null,sortable: false, 
         //    render: function (data, type, row, meta) {
         //     return meta.row + meta.settings._iDisplayStart + 1;
         //   }  
         // },
         { data: 'name', name: 'name' },
         { data: 'username', name: 'username' },
         { data: 'address', name: 'address' },
         { data: 'phone', name: 'phone' },
         { data: 'email', name: 'email' },
         { data: 'level', name: 'level' },
         { data: null, mRender: function(data, type, full) {

          return `<a class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?');" href="{{url('')}}/backoffice/penyelia/delete/${data.id}"> 
          Delete</a>
          <a class="btn btn-primary btn-sm" href="{{url('')}}/backoffice/penyelia/edit/${data.id}"> 
          Edit</a>
          <a class="btn btn-danger btn-sm" href="{{url('')}}/backoffice/penyelia/getreset/${data.id}"> 
          Reset Password</a>
          `;

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