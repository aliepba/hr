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
          <h3 class="card-title">Absen Pegawai</h3>
          <button type="button" class="btn btn-primary btn-sm ml-3" data-toggle="modal" data-target="#modal-primary">
            <i class="fas fa-plus"></i>
          </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>No Pegawai</th>
              <th>Tanggal</th>
              <th>Masuk</th>
              <th>Keluar</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                  <td>#</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->no_pegawai}}</td>
                  <td>{{$item->tanggal_hadir}}</td>
                  <td>{{$item->masuk}}</td>
                  <td>{{$item->keluar}}</td>
                    @if ($item->masuk >= '08:00:00')
                    <td>
                    <span class="badge badge-pill badge-success">Tepat Waktu</span>
                    </td>
                    @else
                    <td>
                        <span class="badge badge-pill badge-warning">Telat</span>
                        </td>
                    @endif
                  <td>
                    <a href="{{route('pegawai.edit', $item->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                    <form action="{{route('pegawai.destroy', $item->id)}}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
              @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Pegawai</th>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Keluar</th>
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
<div class="modal fade" id="modal-primary">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Primary Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                <label>Nama Pegawai</label>
                <select class="form-control">
                    <option value="0">Pilih Pegawai</option>
                    @foreach ($pegawai as $pgw)
                    <option value="{{$pgw->no_pegawai}}">{{$pgw->nama}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" class="form-control" name="tanggal_hadir"/>
                </div>
                <div class="form-group">
                    <label>Jam Masuk</label>
                    <input type="time" class="form-control" name="masuk"/>
                </div>
                <div class="form-group">
                    <label>Jam Keluar</label>
                    <input type="time" class="form-control" name="keluar"/>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush