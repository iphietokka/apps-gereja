@extends('layouts.app')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Data Keluarga</h3>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('keluarga-store') }}" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="form-group has-feedback">
              <label for="inputEmail3" class="col-sm-3 control-label">Gereja</label>
              <div class="col-sm-4">
              <select name="gereja_id" class="form-control select2 {{ $errors->has('gereja_id') ? ' is-invalid' : '' }}">
                <option value="">-- Pilih --</option>
                @foreach ($gereja as $key => $value)
              <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
                @if ($errors->has('gereja_id'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('gereja_id') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Sektor</label>
              <div class="col-sm-4">
                <select class="form-control select2" name="sektor_id" id="sektor_id">
                    <option>Pilih Sektor</option>
                    @foreach($sektor as $key=>$role)
                    <option value="{{$key}}">{{$role}}</option>
                    @endforeach
                </select>
                @if ($errors->has('sektor_id'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('sektor_id') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Unit</label>
              <div class="col-sm-4">
              <select class="form-control select2" name="unit_id" data-live-search="true" id="unitOptions" placeholder="Please select a Subcategory">
               </select>
                @if ($errors->has('tempat_lahir'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tempat_lahir') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Nomor Kartu Keluarga</label>
              <div class="col-sm-4">
                    <input type="text" class="form-control{{ $errors->has('no_kk') ? ' is-invalid' : '' }}" placeholder="Nomor Kartu Keluarga" name="no_kk" value="{{old('no_kk')}}">
                @if ($errors->has('no_kk'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('no_kk') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Nama Ayah</label>
              <div class="col-sm-6">
            <input type="text" class="form-control{{ $errors->has('nama_ayah') ? ' is-invalid' : '' }}" placeholder="Nama Ayah" name="nama_ayah" value="{{old('nama_ayah')}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Nama Ibu</label>
              <div class="col-sm-6">
                    <input type="text" class="form-control{{ $errors->has('nama_ibu') ? ' is-invalid' : '' }}" placeholder="Nama Ibu" name="nama_ibu" value="{{old('nama_ibu')}}">
                @if ($errors->has('nama_ibu'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nama_ibu') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Nikah</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Tanggal Nikah" name="tgl_nikah" value="{{old('tgl_nikah')}}" id="datepicker">
              </div>
            </div>
          </div>
          <div class="box-footer">
            <a href="{{url('keluarga')}}" class="btn btn-danger"> Cancel</a>
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
  $(document).ready(function(){
     $('#sektor_id').on('change',function(){
            $('#unitOptions').html('');
            var categoryID = $(this).val();
            if(categoryID){
                $.ajax({
                    type:'get',
                    url:'ajaxData',
                    data:'categoryID='+categoryID,
                    success:function(html){
                        $('#unitOptions').html(html);
                    }
                });
            }
        });
        $('.select2').select2();
         $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    });
</script>
@endsection