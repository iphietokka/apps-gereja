@extends('layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Keluarga</h3>
              <a href="{{ route('keluarga-create') }}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Tambah Keluarga</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Gereja</th>
                  <th class="text-center">Sektor</th>
                  <th class="text-center">Unit</th>
                  <th class="text-center">No.Kartu Keluarga</th>
                  <th class="text-center">Nama Ayah</th>
                  <th class="text-center">Nama Ibu</th>
                  <th class="text-center">Tanggal Nikah</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                  @isset($keluarga)
                      
                  
                    @foreach ($keluarga as $dt)
                   <tr>
                      <td class="text-center">{{$loop->iteration}}</td>
                      <td class="text-center">{{ !empty($dt->gereja->nama) ? $dt->gereja->nama : ''}}</td>
                      <td class="text-center">{{ !empty($dt->sektor->nama) ? $dt->sektor->nama : ''}}</td>
                      <td class="text-center">{{ !empty($dt->unit->nama) ? $dt->unit->nama : '' }}</td>
                      <td class="text-center">{{$dt->no_kk}}</td>
                      <td class="text-center">{{$dt->nama_ayah}}</td>
                      <td class="text-center">{{$dt->nama_ibu}}</td>
                      <td class="text-center">{{$dt->tgl_nikah}}</td>
                      <td class="text-center">
                        <a href="{{ route('keluarga-edit', $dt->id) }}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                        <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$dt->id}}"><i class="fa fa-trash"></i> Hapus</a>
                      </td>
                </tr>
                {{-- Modal Delete Start --}}
                 <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal{{$dt->id}}">
                            <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-body text-center">
                                  <div class="row">
                                  
                                 <h4 class="modal-heading">Are You Sure?</h4>
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                          </div>
                                        </div>
                                <div class="modal-footer">
                                   <form class="form-horizontal" method="POST" action="{{ route('keluarga-delete', $dt->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                     <button type="reset" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                </form>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->
                           {{-- Modal Delete END --}}
 {{-- Modal EDIT Start --}}
           <div class="modal fade" id="edit_modal{{$dt->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Keluarga</h4>
              </div>
              <div class="modal-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-default">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <!-- form start -->
        <form method="POST" role="form" action="{{ route('keluarga-update', $dt->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label>Gereja</label>
                      <select name="gereja_id" id="" class="form-control">
                      <option value="{{$dt->gereja_id}}">{{ !empty($dt->gereja->nama) ? $dt->gereja->nama : ''}}</option>
                      @foreach ($gereja as $key => $value)
                      <option value="{{$key}}">{{$value}}</option>
                      @endforeach
                      </select>
                </div>
                 <div class="form-group">
                    <label>Sektor</label>
                      <select name="sektor_id" id="" class="form-control">
                      <option value="{{$dt->sektor_id}}">{{ !empty($dt->sektor->nama) ? $dt->sektor->nama : ''}}</option>
                      @foreach ($sektor as $key => $value)
                      <option value="{{$key}}">{{$value}}</option>
                      @endforeach
                      </select>
                </div>
                  <div class="form-group">
                    <label>Unit</label>
              <select class="form-control" name="unit_id" data-live-search="true" id="unitOptions" placeholder="">
                 <option value="{{$dt->unit_id}}">{{ !empty($dt->unit->nama) ? $dt->unit->nama : ''}}</option>
              </select>
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Kartu Keluarga</label>
                    <input type="text" class="form-control{{ $errors->has('no_kk') ? ' is-invalid' : '' }}" placeholder="Nomor Kartu Keluarga" name="no_kk" value="{{$dt->no_kk}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Ayah</label>
                    <input type="text" class="form-control{{ $errors->has('nama_ayah') ? ' is-invalid' : '' }}" placeholder="Nama Ayah" name="nama_ayah" value="{{$dt->nama_ayah}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Ibu</label>
                    <input type="text" class="form-control{{ $errors->has('nama_ibu') ? ' is-invalid' : '' }}" placeholder="Nama Ibu" name="nama_ibu" value="{{$dt->nama_ibu}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Nikah</label>
                    <input type="text" class="form-control{{ $errors->has('tgl_nikah') ? ' is-invalid' : '' }}" placeholder="Tanggal Pernikahan" name="tgl_nikah" value="{{$dt->tgl_nikah}}" id="datepicker">
                  </div>
              </div>
              </div>
              <div class="modal-footer">
              <input type="hidden" name="id" value="{{$dt->id}}">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        {{-- MODAL EDIT END --}}
                @endforeach
                @endisset
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
           <div class="modal fade" id="tambah-data">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Keluarga</h4>
              </div>
              <div class="modal-body">
                @if (count($errors) > 0)
                    <div class="alert alert-default">
                         <ul>
                            @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <form method="POST" role="form" action="{{ route('keluarga-store') }}" enctype="multipart/form-data">
            @csrf
              <div class="box-body">
                <div class="form-group">
                    <label>Gereja</label>
                      <select name="gereja_id" id="" class="form-control">
                      <option value="">-- Pilih --</option>
                      @foreach ($gereja as $key => $value)
                      <option value="{{$key}}">{{$value}}</option>
                      @endforeach
                      </select>
                </div>
                <div class="form-group">
                    <label>Sektor</label>
                    <select class="form-control selectpickerLive" name="sektor_id" id="sektor_id" data-live-search="true" required>
                                <option>Pilih Sektor</option>
                                @foreach($sektor as $key=>$role)
                                <option value="{{$key}}">{{$role}}</option>
                                @endforeach
                            </select>
                </div>
                <div class="form-group">
                    <label>Unit</label>
               <select class="form-control selectpickerLive" name="unit_id" data-live-search="true" id="unitOptions" placeholder="Please select a Subcategory">
                            </select>
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Kartu Keluarga</label>
                    <input type="text" class="form-control{{ $errors->has('no_kk') ? ' is-invalid' : '' }}" placeholder="Nomor Kartu Keluarga" name="no_kk" value="{{old('no_kk')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Ayah</label>
                    <input type="text" class="form-control{{ $errors->has('nama_ayah') ? ' is-invalid' : '' }}" placeholder="Nama Ayah" name="nama_ayah" value="{{old('nama_ayah')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Ibu</label>
                    <input type="text" class="form-control{{ $errors->has('nama_ibu') ? ' is-invalid' : '' }}" placeholder="Nama Ibu" name="nama_ibu" value="{{old('nama_ibu')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Nikah</label>
                    <input type="text" class="form-control{{ $errors->has('tgl_nikah') ? ' is-invalid' : '' }}" placeholder="Tanggal Pernikahan" name="tgl_nikah" value="{{old('tgl_nikah')}}" id="datepicker2">
                  </div>
              </div>
                {{-- end form --}}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content --> 
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
     $('#sektor_id').on('change',function(){
            $('#unitOptions').html('');
            var categoryID = $(this).val();
            if(categoryID){
                $.ajax({
                    type:'get',
                    url:'keluarga/ajaxData',
                    data:'categoryID='+categoryID,
                    success:function(html){
                        $('#unitOptions').html(html);
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#tambah-data').modal('show');
    @endif
</script>
    <script>
    $(function() {
              $('.selectPickerLive').selectpicker();
  $('.select2').select2();
  $("#example2").DataTable();
   $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
         $('#datepicker2').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        }); 



});
</script>
@endsection