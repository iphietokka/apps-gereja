@extends('layouts.app')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Anggota</h3>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('anggota-update') }}" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="form-group has-feedback">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama Keluarga</label>
              <div class="col-sm-6">
              <select name="keluarga_id" class="form-control select2 {{ $errors->has('keluarga_id') ? ' is-invalid' : '' }}">
              <option value="{{$data->keluarga_id}}">{{$data->keluarga->no_kk}}</option>
                @foreach ($keluarga as $key => $value)
              <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
                @if ($errors->has('keluarga_id'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('keluarga_id') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Status Keluarga</label>
              <div class="col-sm-6">
                <input type="text" class="form-control {{ $errors->has('status_keluarga') ? ' is-invalid' : '' }}" placeholder="Status Dalam Keluarga" name="status_keluarga" value="{{$data->status_keluarga}}">
                @if ($errors->has('status_keluarga'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('status_keluarga') }}</strong>
                </span>
                @endif
              </div>
            </div>
             <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">NIK</label>
              <div class="col-sm-6">
                <input type="text" class="form-control {{ $errors->has('nik') ? ' is-invalid' : '' }}" placeholder="Status Dalam Keluarga" name="nik" value="{{$data->nik}}">
                @if ($errors->has('nik'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nik') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="Nama Anggota Jemaat" name="nama" value="{{ $data->nama}}">
                @if ($errors->has('nama'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nama') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">  
              <label for="inputEmail3" class="col-sm-3 control-label">Gelar</label>
              <div class="col-sm-6">
              <input type="text" class="form-control {{ $errors->has('gelar') ? ' is-invalid' : '' }}" name="gelar" placeholder="Gelar" value="{{$data->gelar}}">
                @if ($errors->has('gelar'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('gelar') }}</strong>
                </span>
                @endif
              </div>
            </div>
             <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Status Nikah</label>
              <div class="col-sm-4">
                <select name="status_nikah" class="form-control select2 {{ $errors->has('status_nikah') ? ' is-invalid' : '' }}">
                <option value="{{$data->status_nikah}}">{{$data->status_nikah}}</option>
                 <option value="Nikah">Nikah</option>
                <option value="Belum Nikah">Belum Nikah</option>
                <option value="Cerai">Cerai</option>
                </select>
                @if ($errors->has('status_nikah'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('status_nikah') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Tempat Lahir</label>
              <div class="col-sm-6">
                <input type="text" class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" placeholder="Tempat Lahir" name="tempat_lahir" value="{{$data->tempat_lahir}}">
                @if ($errors->has('tempat_lahir'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tempat_lahir') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Lahir</label>
              <div class="col-sm-4">
              <input type="text" class="form-control {{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" name="tgl_lahir" placeholder="Tanggal Lahir" value="{{$data->tgl_lahir}}" id="datepicker">
                @if ($errors->has('tgl_lahir'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('tgl_lahir') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Jenis Kelamin</label>
              <div class="col-sm-6">
                <div class="checkbox">
                      <label>
                        <input type="checkbox" @if($data->jenis_kelamin == "Laki-Laki") checked @endif value="Laki-Laki" name="jenis_kelamin"> Laki-Laki
                      </label>
                       <label>
                        <input type="checkbox" @if($data->jenis_kelamin == "Perempuan") checked @endif value="Perempuan" name="jenis_kelamin"> Perempuan
                      </label>
                    </div>
                @if ($errors->has('jenis_kelamin'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Alamat</label>
              <div class="col-sm-6">
               <textarea name="alamat" id="" cols="30" rows="3" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" placeholder="Alamat Anggota">{{$data->alamat}}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Pekerjaan</label>
              <div class="col-sm-6">
                <input type="text" class="form-control{{ $errors->has('jenis_pekerjaan') ? ' is-invalid' : '' }}" placeholder="Pekerjaan" name="jenis_pekerjaan" value="{{$data->jenis_pekerjaan}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Status Baptis</label>
              <div class="col-sm-4">
            <select name="status_baptis" class="form-control select2 {{ $errors->has('status_baptis') ? ' is-invalid' : '' }}">
             <option value="{{$data->status_baptis}}">{{$data->status_baptis}}</option>
              <option value="Belum">Belum</option>
                <option value="Sudah">Sudah</option>
                </select>               
                 @if ($errors->has('status_baptis'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('status_baptis') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">No.Surat Baptis</label>
              <div class="col-sm-6">
                <input type="text" class="form-control{{ $errors->has('no_surat_baptis') ? ' is-invalid' : '' }}" placeholder="Nomor Surat Baptis" name="no_surat_baptis" value="{{$data->no_surat_baptis}}">
                @if ($errors->has('no_surat_baptis'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('no_surat_baptis') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Baptis</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Tanggal Baptis" name="tgl_baptis" value="{{$data->tgl_baptis}}" id="datepicker2">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Status Sidi</label>
              <div class="col-sm-4">
             <select name="status_sidi" class="form-control select2 {{ $errors->has('status_sidi') ? ' is-invalid' : '' }}">
             <option value="{{$data->status_sidi}}">{{$data->status_sidi}}</option>
              <option value="Belum">Belum</option>
                <option value="Sudah">Sudah</option>
                </select>
                @if ($errors->has('status_sidi'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('status_sidi') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">No.Surat Sidi</label>
              <div class="col-sm-6">
                <input type="text" class="form-control{{ $errors->has('no_surat_sidi') ? ' is-invalid' : '' }}" placeholder="Nomor Surat Sidi" name="no_surat_sidi" value="{{$data->no_surat_sidi}}">
                @if ($errors->has('no_surat_sidi'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('no_surat_sidi') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Sidi</label>
              <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Tanggal Sidi" name="tgl_sidi" value="{{$data->tgl_sidi}}" id="datepicker3">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Wadah</label>
              <div class="col-sm-4">
              <select name="wadah_id" class="form-control select2">
                <option value="{{$data->wadah_id}}">{{$data->wadah->nama}}</option>
                @foreach ($wadah as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
              </div>
            </div>
             <div class="form-group">
              <label for="inputPassword3" class="col-sm-3 control-label">Status</label>
              <div class="col-sm-4">
                <select name="status" class="form-control select2 {{ $errors->has('status') ? ' is-invalid' : '' }}">
                <option value="{{$data->status}}">{{$data->status}}</option>
                 <option value="Hidup">Hidup</option>
                <option value="Meninggal">Meninggal</option>
                </select>
                @if ($errors->has('status_nikah'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('status_nikah') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
          <div class="box-footer">
          <input type="hidden" name="id" value="{{$data->id}}">
            <a href="{{url('admin/kerjasama')}}" class="btn btn-danger"> Cancel</a>
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
  $(function() {
    $('.select2').select2();
    $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
    });  
     $('#datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
    });  
         $('#datepicker3').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
    });    
    });
</script>
@endsection