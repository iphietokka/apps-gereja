@extends('layouts.app')
@section('content')
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-default">
<div class="box-header with-border">
<h3 class="box-title">Tambah Jadwal Ibadah</h3>
</div>
<form method="POST" action="{{ route('jadwal-ibadah-store') }}" enctype="multipart/form-data" class="form-horizontal">
@csrf

@if ($errors->any())
   <div class="alert alert-danger">
      <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
      </ul>
   </div>
@endif
<div class="box-body">
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Nama</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Nama Ibadah" name="nama_ibadah" value="{{old('nama_ibadah')}}">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Ibadah</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" id="datepicker" name="tanggal" value="{{old('tanggal')}}" placeholder="Tanggal Ibadah">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Jam Mulai Ibadah</label>
    <div class="col-sm-6">
    <input type="text" class="form-control timepicker" name="jam_mulai" value="{{old('jam_mulai')}}" placeholder="Jam Mulai">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Jam Selesai Ibadah</label>
    <div class="col-sm-6">
    <input type="text" class="form-control timepicker" name="jam_selesai" value="{{old('jam_selesai')}}" placeholder="Jam Selesai">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Tempat Ibadah</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" name="tempat" value="{{old('tempat')}}" placeholder="Tempat Ibadah">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Nama Pengkhotbah </label>
    <div class="col-sm-6">
    <input type="text" class="form-control" name="nama_pengkhotbah" value="{{old('nama_pengkhotbah')}}" placeholder="Nama Pengkhotbah">
    </div>
</div>
</div>
<div class="box-footer">
<a href="{{route('jadwal-ibadah')}}" type="reset" class="btn btn-danger">Cancel</a>
<button type="submit" class="btn btn-info">Simpan</button>
</div>
</form>
</div>
</div>
</div>
</section>
@endsection
@section('scripts')
    <script>
            $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        </script>
@endsection

