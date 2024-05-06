@extends('Frontend.layouts.app')
@section('content')
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        @include('Frontend.sidebar')
        <!-- END COLORLIB-ASIDE -->
        <div id="colorlib-main">
            <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
                <div class="container px-0">
                    <div class="row no-gutters">
                        @forelse($blog as $bl)
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate ">
                                <div class="carousel-blog owl-carousel">
                                    <div class="item">
                                        <a href="single.html" class="img"
                                            style="background-image: url({{asset('Blog_thumbnail_image/'.$bl->image)}});"></a>
                                    </div>
                                 
                                </div>
                                <div class="text p-4">
                                    {{-- <h3 class="mb-2"><a href="single.html">{{$bl->title}}</a></h3> --}}
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>{{$bl->created_at->format('M. d, Y')}}</span>
                                            
                                            <span><a href="single.html"><i class="icon-folder-o mr-2"></i>{{ $bl->rel_to_category->category_name }}</a></span>
                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                        </p>
                                    </div>
                                    <p class="mb-4">{{$bl->title}}</p>
                                    <p><a href="{{route('blog.details',$bl->slug)}}" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="card bg-success mx-auto mt-5 ">
                            <h3 class="text-light text-center pl-4 pr-4 pt-2">No Blog Post Added Yet.  
                                <h3 class="text-light text-center pl-3 pr-3 pt-2">{{ Auth::guard('user')->check() ? 'See the dashboard and add post' : 'Register/Login to see the dashboard and add post' }}</h3>

                    </div>
                        @endforelse
                       

                       
                    
                    </div>
                </div>
            </section>
        </div><!-- END COLORLIB-MAIN -->
    </div>
@endsection
