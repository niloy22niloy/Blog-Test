

@extends('Frontend.layouts.app')
@section('content')
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		@include('Frontend.sidebar')
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container px-0">
	    		<div class="row d-flex no-gutters">
	    			<div class="col-lg-8 px-md-5 py-5">
	    				<div class="row">
	    					<h1 class="mb-3">{{$blog->title}}</h1>
		            <p>{!! $blog->description !!}</p>
		            <p>
		              
		            {{-- <div class="tag-widget post-tag-container  mb-5 mt-5">
		              <div class="tagcloud">
		                <a href="#" class="tag-cloud-link">Life</a>
		                <a href="#" class="tag-cloud-link">Sport</a>
		                <a href="#" class="tag-cloud-link">Tech</a>
		                <a href="#" class="tag-cloud-link">Travel</a>
		              </div>
		            </div> --}}
		            
		            <div class="about-author d-flex p-4 bg-light ml-5">
		              <div class="bio mr-5">
		                <img src="https://yt3.googleusercontent.com/-CFTJHU7fEWb7BYEb6Jh9gm1EpetvVGQqtof0Rbh-VQRIznYYKJxCaqv_9HeBcmJmIsp2vOO9JU=s900-c-k-c0x00ffffff-no-rj" alt="Image placeholder" class="img-fluid mb-4" style="height:100px;width:100px;">
		              </div>
		              <div class="desc">
		                <h3>Author Name</h3>
		                <p>{{$blog->rel_to_user->name}}</p>
		              </div>
		            </div>

              <!---comments-->
              
              @include('Frontend.comments')
             
            
                     <!---comments-->
		           
			    		</div><!-- END-->
			    	</div>
	    			<div class="col-lg-4 sidebar ftco-animate bg-light pt-5">
	           
	           <!--Category-->
               @include('Frontend.category')
               <!--categoryEnd-->

	            <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Popular Articles</h3>
				  @if(isset($popular_posts))
				  @foreach($popular_posts as $p)
				  <?php
				   $count = App\Models\Comments::where('post_id',$p->id)->count();
				  ?>
				 
				  <div class="block-21 mb-4 d-flex">
	                <a class="blog-img mr-4" style="background-image: url('{{ asset('Blog_thumbnail_image/' . $p->image) }}');"></a>
	                <div class="text">
	                  <h3 class="heading"><a href="{{route('blog.details',$p->slug)}}">{{$p->title}}</a></h3>
	                  <div class="meta">
	                    <div><a href="{{route('blog.details',$p->slug)}}"><span class="icon-calendar"></span> {{$p->created_at->format('M. d,Y')}}</a></div>
	                    <div><a href="{{route('blog.details',$p->slug)}}"><span class="icon-person"></span> {{$p->rel_to_user->name}}</a></div>
	                    <div><a href="{{route('blog.details',$p->slug)}}"><span class="icon-chat"></span> {{$count}}</a></div>
	                  </div>
	                </div>
	              </div>
				  @endforeach
	             @else
			   Sorry No Post
				 @endif
				 
	              
	            </div>

	           <!--Tags-->
              {{-- @include('Frontend.tags') --}}
               <!--end-->

							

	            


	            {{-- <div class="sidebar-box ftco-animate">
	              <h3 class="sidebar-heading">Paragraph</h3>
	              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
	            </div> --}}
	          </div><!-- END COL -->
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

 
@if(session('error'))
<script>
    Swal.fire({
  icon: "error",
  title: "{{session('error')}}",
  text: "Something went wrong!",
  footer: '<a href="#">Why do I have this issue?</a>'
});
</script>
@endif

@if(session('success'))
<script>
    Swal.fire({
  position: "top-end",
  icon: "success",
  title: "{{session('success')}}",
  showConfirmButton: false,
  timer: 1500
});
</script>
@endif
 @endsection