@extends('layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Jabatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('jabatan.index')}}">Pegawai</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>NPWP</th>
              <th>No Pegawai</th>
              <th>Nama</th>
              <th>Kelamin</th>
              <th>Posisi</th>
              <th>Kontak</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                  <td>#</td>
                  <td>{{$item->npwp}}</td>
                  <td>{{$item->no_pegawai}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->kelamin}}</td>
                  <td>{{$item->nama_jabatan}}</td>
                  <td>{{$item->kontak}}</td>
                  <td>{{$item->alamat}}</td>
                  <td></td>
              @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>NPWP</th>
              <th>No Pegawai</th>
              <th>Nama</th>
              <th>Kelamin</th>
              <th>Posisi</th>
              <th>Kontak</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
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
@endsection

@push('addon-script')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush