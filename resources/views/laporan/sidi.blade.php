@extends('layouts.app')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="#" class="btn btn-danger btn-alt border-orange font-orange btn-sm " onclick="printDiv('printableArea')">
            <i class="fa fa-print"></i>
            Print
          </a>
        </div>
        <div class="card-box" id="printableArea">
          <div class="header-title">
            <h4 class="text-center">
              <b>Laporan Sidi : </b>
              {{$from, 'Y-m-d'}}
              <b>Sampai</b>
              {{$to, 'Y-m-d'}}
            </h4>
          </div>
          <table class="table table-bordered dt-responsive nowrap" id="dataTables-example">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">No.KK</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tanggal Sidi</th>
                <th class="text-center">No. Surat Sidi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sidi as $sidis)
              <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center">{{$sidis->keluarga->no_kk}}</td>
                <td class="text-center">{{$sidis->nik}}</td>
                <td class="text-center">{{$sidis->nama}}</td>
                <td class="text-center">{{$sidis->tgl_sidi}}</td>
                <td class="text-center">{{$sidis->no_surat_sidi}}</td>
              </tr>
              <!--  Modal EDIT DATA  -->
              @endforeach
              <tfoot>
                <tr style="background-color: #F8F9F9; border: 1px solid #ddd;">
                  <td colspan="5" align="right">
                    <b>Total Jemaat :</b>
                  </td>
                  <td>
                    {{$count}}
                  </td>
                </tr>
              </tfoot>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>
@endsection 