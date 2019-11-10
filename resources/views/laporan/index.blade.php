@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row">
 <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Laporan Umat</a></li>
              <li><a href="#timeline" data-toggle="tab">Laporan Baptis</a></li>
              <li><a href="#settings" data-toggle="tab">Laporan Sidi</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">

                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
              <form class="form-horizontal" method="POST" action="{{route('laporan-sidi')}}">
                @csrf
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Dari</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="datepicker1" placeholder="Pilih Tanggal" name="from">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Sampai</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" placeholder="Pilih Tanggal" id="datepicker2" name="to">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Lihat</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
  $(function() {
    $('.select2').select2();
    $('#datepicker1').datepicker({
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