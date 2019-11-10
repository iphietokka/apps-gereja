@extends('layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Anggota Jemaat</h3>
          <a href="{{ route('anggota-create') }}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Tambah Anggota</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">No.</th>
                <th class="text-center">No.KK</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Gelar</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Tanggal Lahir</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @isset($anggota)
              @foreach ($anggota as $dt)
              <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">{{$dt->keluarga->no_kk}}</td>
                <td class="text-center">{{$dt->nama}}</td>
                <td class="text-center">{{$dt->gelar}}</td>
                <td class="text-center">{{$dt->tempat_lahir}}</td>
                <td class="text-center">{{$dt->tgl_lahir}}</td>
                <td class="text-center">{{$dt->alamat}}</td>
                <td class="text-center">
                  <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#details_modal{{$dt->id}}"> <i class="fa fa-eye"></i> Details</a>
                  <a href="{{ route('anggota-edit', $dt->id) }}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Edit</a>
                  <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$dt->id}}"><i class="fa fa-trash"></i> Hapus</a>
                  {{-- Modal EDIT Start --}}
                  <div class="modal fade" id="details_modal{{$dt->id}}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Details Data Keluarga</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-bordered">
                              <tr>
                                <th>Keluarga</th>
                                <td>{{ $dt->keluarga->no_kk }}</td>
                              </tr>
                              <tr>
                                <th>Nama</th>
                                <td>{{ $dt->nama }}</td>
                              </tr>
                              <tr>
                                <th>Gelar</th>
                                <td>{{ $dt->gelar }}</td>
                              </tr>
                              <tr>
                                <th>Tempat Lahir</th>
                                <td>{{$dt->tempat_lahir}}</td>
                              </tr>
                              <tr>
                                <th>Tanggal Lahir</th>
                                <td> {{  $dt->tgl_lahir }}</td>
                              </tr>
                              <tr>
                                <th>Status Keluarga</th>
                                <td>{{ $dt->status_keluarga }}</td>
                              </tr>

                              <tr>
                                <th>Status Nikah</th>
                                <td>{{ $dt->status_nikah }}</td>
                              </tr>
                              <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $dt->jenis_kelamin }}</td>
                              </tr>
                              <tr>
                                <th>Alamat</th>
                                <td>{{$dt->alamat}}</td>
                              </tr>
                              <tr>
                                <th>Pekerjaan</th>
                                <td>{{$dt->jenis_pekerjaan}}</td>
                              </tr>
                              <tr>
                                <tr>
                                  <th>Status Baptis</th>
                                  <td>{{$dt->status_baptis}}</td>
                                </tr>
                                <tr>
                                  <th>No. Surat Baptis</th>
                                  <td>{{$dt->no_surat_baptis}}</td>
                                </tr>
                                <tr>
                                  <th>Tanggal Baptis</th>
                                  <td>{{$dt->tgl_baptis}}</td>
                                </tr>
                                 <tr>
                                <tr>
                                  <th>Status Sidi</th>
                                  <td>{{$dt->status_sidi}}</td>
                                </tr>
                                <tr>
                                  <th>No. Surat Sidi</th>
                                  <td>{{$dt->no_surat_sidi}}</td>
                                </tr>
                                <tr>
                                  <th>Tanggal Sidi</th>
                                  <td>{{$dt->tgl_sidi}}</td>
                                </tr>
                                  <tr>
                                  <th>Wadah</th>
                                  <td>{{$dt->wadah->nama}}</td>
                                </tr>
                                 <tr>
                                  <th>Status</th>
                                  <td>{{$dt->status}}</td>
                                </tr>
                              </table>             
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
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
                              <form class="form-horizontal" method="POST" action="{{ route('anggota-delete', $dt->id) }}" enctype="multipart/form-data">
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
                      @endforeach
                      @endisset
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
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