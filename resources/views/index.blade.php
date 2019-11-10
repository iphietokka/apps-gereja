@extends('layouts.home')
@section('content')
    <section class="hero-area hero-post-slides owl-carousel">
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(frontend/img/bg-img/1.jpg);">
            <!-- Post Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Membangun Harapan</h2>
                            <p data-animation="fadeInUp" data-delay="300ms">Pelajari tentang misi kita, kepercayaan kita, dan harapan yang kita miliki di dalam Yesus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(frontend/img/bg-img/2.jpg);">
            <!-- Post Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms">Making Jesus Known</h2>
                            <p data-animation="fadeInUp" data-delay="300ms">Learn about our mission, our beliefs, and the hope we have in Jesus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Sermons Area Start ##### -->
    <section class="latest-sermons-area section-padding-100-0">
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

            <div class="row justify-content-center">
                <!-- Single Latest Sermons -->
                @if($kegiatan)
                @foreach($kegiatan as $kg)
                <div class="col-12 col-md-6 col-lg-4">
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
  <!-- ##### Upcoming Events Area Start ##### -->
    <section class="upcoming-events-area section-padding-0-100">
        <!-- Upcoming Events Heading Area -->
        <div class="upcoming-events-heading bg-img bg-overlay bg-fixed" style="background-image: url(frontend/img/bg-img/1.jpg);">
            <div class="container">
                <div class="row">
                    <!-- Section Heading -->
                    <div class="col-12">
                        <div class="section-heading text-left white">
                            <h2>Jadwal Ibadah</h2>
                            <p>( Klik tanda panah disamping untuk melihat jadwal ibadah )</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Events Slide -->
        <div class="upcoming-events-slides-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="upcoming-slides owl-carousel">
                            @if($jadwal)
                            @foreach($jadwal as $jd)
                            <div class="single-slide">
                                <!-- Single Upcoming Events Area -->
                                <div class="single-upcoming-events-area d-flex flex-wrap align-items-center">
                                    <!-- Content -->
                                    <div class="upcoming-events-content d-flex flex-wrap align-items-center">
                                        <div class="events-text">
                                            <h4>{{$jd->nama_ibadah}}</h4>
                                            <div class="events-meta">
                                               <i class="fa fa-user" aria-hidden="true"></i> Nama Pengkhotbah : <span>{{$jd->nama_pengkhotbah}}</span><br>
                                                <i class="fa fa-calendar" aria-hidden="true"></i> Tanggal :  {{$kg->tanggal}}<br>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i> Jam :  {{$jd->jam_mulai}} - {{$jd->jam_selesai}}<br>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i> Tempat :  {{$jd->tempat}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Upcoming Events Area End ##### -->
    
    <!-- ##### Gallery Area Start ##### -->
    <div class="gallery-area d-flex flex-wrap">
        <!-- Single Gallery Area -->
        @if( $gallery)
        @foreach( $gallery as $gl)
        <div class="single-gallery-area">
            <a href="{{asset('gambar/gallery')}}/{{$gl->gambar}}" class="gallery-img" title="Gallery Image 1">
                <img src="{{asset('gambar/gallery')}}/{{$gl->gambar}}" alt="">
            </a>
        </div>
        @endforeach
        @endif
    </div>
    <!-- ##### Gallery Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Warta Jemaat Terbaru</h2>
                        <p>Latest information on religion, church</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Single Blog Post Area -->
                @if($warta)
                @foreach ($warta as $item)
                     <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail">
                            <a href="{{route('warta-details', $item->id)}}"><img src="{{asset('gambar/warta')}}/{{$item->gambar}}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="{{route('warta-details', $item->id)}}" class="post-title">
                                <h4>{{$item->title}}</h4>
                            </a>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> {{$item->users->name}}</a>
                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{date('d F Y', strtotime($item->created_at))}}</a>
                            </div>
                            <p class="post-excerpt">{{$item->isi_warta}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
               
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Berita Terbaru</h2>
                        <p>Latest information on religion, church</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Single Blog Post Area -->
                @if($berita)
                @foreach ($berita as $item)
                     <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail">
                            <a href="{{route('berita-details', $item->id)}}"><img src="{{asset('gambar/berita')}}/{{$item->gambar}}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="{{route('berita-details', $item->id)}}" class="post-title">
                                <h4>{{$item->title}}</h4>
                            </a>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i> {{$item->users->name}}</a>
                                <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{date('d F Y', strtotime($item->created_at))}}</a>
                            </div>
                            <p class="post-excerpt">{{$item->isi_berita}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
               
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->
@endsection