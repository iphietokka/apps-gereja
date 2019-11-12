@extends('layouts.app')
@section('content')
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-default">
<div class="box-header with-border">
<h3 class="box-title">Edit Pendaftaran Baptis</h3>
</div>
<form method="POST" action="{{ route('pendaftaran-baptis-update') }}" enctype="multipart/form-data" class="form-horizontal">
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
       <select name="anggota_id" class="form-control select2">
       <option value="{{$data->anggota_id}}">{{$data->anggota->nama}}</option>
           @foreach ($anggota as $key => $value)
            <option value="{{$key}}">{{$value}}}</option>
           @endforeach
       </select>
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Nama Saksi</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" name="nama_saksi" value="{{$data->nama_saksi}}" placeholder="Nama Saksi">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Nama Pendeta</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" name="nama_pendeta" value="{{$data->nama_pendeta}}" placeholder="Nama Pendeta">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Baptis</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" id="datepicker" name="tgl_baptis" value="{{$data->tgl_baptis}}" placeholder="Tanggal Baptis">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Tempat Baptis</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" name="tempat_baptis" value="{{$data->tempat_baptis}}" placeholder="Tempat Baptis">
    </div>
</div>
</div>
<div class="box-footer">
    <input type="hidden" name="id" value="{{$data->id}}">
<a href="{{route('pendaftaran-baptis')}}" type="reset" class="btn btn-danger">Cancel</a>
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
         $('.select2').select2();
            $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        </script>
@endsection

