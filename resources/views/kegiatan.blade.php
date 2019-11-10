@extends('layouts.home')
@section('content')
        <!-- ##### Latest Sermons Area Start ##### -->
    <section class="latest-sermons-area">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Jadwal Kegiatan</h2>
                        <p>Loaded with fast-paced worship, activities, and video teachings to address real issues that students face each day</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Latest Sermons -->
                @if($kegiatan)
                @foreach($kegiatan as $kg)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-latest-sermons mb-100">
                        <div class="sermons-thumbnail">
                            <img src="{{$kg->gambar!='' && File::exists('gambar/kegiatan/'.$kg->image)?'/gambar/kegiatan/'.$kg->gambar:'/gambar/default-image.png'}}" alt="">
                        </div>
                        <div class="sermons-content">
                            <h4>{{$kg->nama}}</h4>
                            <div class="sermons-meta-data">
                                <p><i class="fa fa-user" aria-hidden="true"></i> Nama Pengkhotbah: <span>{{$kg->nama_pengkhotbah}}</span></p>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{$kg->tanggal}} on <span>{{$kg->jam_mulai}} - {{$kg->jam_selesai}}</span></p>
                             <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$kg->tempat}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- ##### Latest Sermons Area End ##### -->
@endsection