    @extends('layouts.home')
    @section('content')
  <section class="blog-content-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">

                        <!-- Post Details Area -->
                       
                        <div class="single-post-details-area">
                            <div class="post-thumbnail mb-30">
                                <img src="{{asset('gambar/berita')}}/{{$beritas->gambar}}" alt="">
                            </div>
                            <div class="post-content">
                                <h2 class="post-title">{{$beritas->title}}</h2>
                                <p>{{$beritas->isi_berita}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection