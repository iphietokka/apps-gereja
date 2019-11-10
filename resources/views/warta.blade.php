@extends('layouts.home')
@section('content')

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Post Area -->
                <div class="col-12 col-lg-8">
                    <div class="row">
                         @if($warta)
                @foreach ($warta as $item)
                        <!-- Single Blog Post Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post mb-50">
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

                    <div class="pagination-area">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              {{ $warta->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

@endsection