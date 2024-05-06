<div class="sidebar-box ftco-animate">
    <h3 class="sidebar-heading">Categories</h3>
  <ul class="categories">

   
@foreach ($category as $categor) 
  @php
            $postCount = App\Models\BlogAdd::where('category_id', $categor->id)->count(); // Count posts for each category
            
            @endphp
              <li><a href="{{route('category_base.post',$categor->category_name)}}">{{$categor->category_name}} <span>({{$postCount}})</span></a></li>
       @endforeach
  </ul>
</div>