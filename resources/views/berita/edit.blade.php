@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Berita</h3>
                </div>
                <form method="POST" action="{{ route('berita-update') }}" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{$data->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Isi Berita</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5" name="isi_berita">{{$data->isi_berita}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Gambar</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" placeholder="Gambar" name="gambar">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    <input type="hidden" name="id" value="{{$data->id}}">
                        <a href="{{route('berita')}}" type="reset" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

