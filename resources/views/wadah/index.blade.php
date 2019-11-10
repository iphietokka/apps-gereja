@extends('layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Wadah</h3>
          <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target="#tambah-data"><i class="fa fa-plus"></i> Tambah Wadah</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Kordinator</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($wadah as $dt)
              <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">{{$dt->nama}}</td>
                 <td class="text-center">{{$dt->koordinator}}</td>
                <td class="text-center">
                  <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_modal{{$dt->id}}"> <i class="fa fa-edit"></i> Edit</a>
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
                      <form class="form-horizontal" method="POST" action="{{ route('wadah-delete', $dt->id) }}" enctype="multipart/form-data">
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
                        <h4 class="modal-title">Edit Data Sektor</h4>
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
                        <form method="POST" role="form" action="{{ route('wadah-update', $dt->id) }}" enctype="multipart/form-data">
                          @csrf
                          <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama</label>
                              <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$dt->nama}}">
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Kordinator</label>
                              <input type="text" class="form-control" placeholder="Kordinator" name="koordinator" value="{{$dt->kordinator}}">
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
                <h4 class="modal-title">Tambah Data Wadah</h4>
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

                <form method="POST" role="form" action="{{ route('wadah-store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="Nama" name="nama" value="{{old('nama')}}">
                    </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">Kordinator</label>
                              <input type="text" class="form-control" placeholder="Kordinator" name="koordinator" value="{{old('kordinator')}}">
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
      @if (count($errors) > 0)
      $('#tambah-data').modal('show');
      @endif
    </script>
    <script>
      $(function() {

        $("#example2").DataTable();

      });
    </script>
    @endsection