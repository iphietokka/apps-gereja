    @extends('layouts.app')
    @section('content')
    <section class="content">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Pendaftaran Baptis</h3>
          <div class="pull-right">
            <a href="{{ route('pendaftaran-baptis-create') }}" class="btn btn-primary"> <i class="fa  fa-plus-square"></i> Tambah Pendaftaran Baptis</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">No.KK</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Saksi</th>
                <th class="text-center">Pendeta</th>
                <th class="text-center">Tanggal </th>
                 <th class="text-center">Tempat </th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($baptis as $dt)
            <tr>
              <td class="text-center">{{$loop->iteration}}</td>
              <td class="text-center">{{$dt->anggota->keluarga->no_kk}}</td>
              <td class="text-center">{{$dt->anggota->nik}}</td>
              <td class="text-center">{{$dt->anggota->nama}}</td>
              <td class="text-center">{{$dt->nama_saksi}}</td>
              <td class="text-center">{{$dt->nama_pendeta}}</td>
              <td class="text-center">{{$dt->tgl_baptis}}</td>
              <td class="text-center">{{$dt->tempat_baptis}}</td>
              </td>
              <td class="text-center">
                    <a href="{{ route('pendaftaran-baptis-edit', $dt->id) }}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Edit</a>
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
                                   <form class="form-horizontal" method="POST" action="{{ route('pendaftaran-baptis-delete', $dt->id) }}" enctype="multipart/form-data">
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
          </tbody>
        </table>
      </div>
    </div>
  </section>
  @endsection
  @section('scripts')

    <script>
    $(function() {
  $('.select2').select2();
  $("#example2").DataTable();
       
});
</script>
  @endsection