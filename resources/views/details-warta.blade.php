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
                                <img src="{{asset('gambar/warta')}}/{{$wartas->gambar}}" alt="">
                            </div>
                            <div class="post-content">
                                <h2 class="post-title">{{$wartas->title}}</h2>
                                <p>{{$wartas->isi_warta}}</p>
                                <object width="800px" height="800px" data="{{asset('dokumen/warta')}}/{{$wartas->dokumen}}"></object>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection