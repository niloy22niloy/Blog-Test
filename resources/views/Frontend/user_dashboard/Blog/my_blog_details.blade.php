@extends('Frontend.user_dashboard.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card big-card">
                <div class="card-body">
                    <form action="{{route('blog.edit',$blog->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                    <div class="mb-3">
                        <label for="" class="form-label">Blog Thumbnail:</label>
                        <br>
                        <img src="{{asset('Blog_thumbnail_image/'.$blog->image)}}" id="thumbnail_preview" class="img-thumbnail" alt="Thumbnail">
                        <input type="file" id="blog_thumbnail" name="blog_thumbnail" class="form-control">

                        <!-- Preview image -->
                        <script>
                            // JavaScript code to update preview image when a file is selected
                            document.getElementById('blog_thumbnail').addEventListener('change', function(event) {
                                var input = event.target;
                                var reader = new FileReader();
                        
                                reader.onload = function(){
                                    var dataURL = reader.result;
                                    var previewImage = document.getElementById('thumbnail_preview');
                                    previewImage.src = dataURL;
                                };
                        
                                reader.readAsDataURL(input.files[0]);
                            });
                        </script>


                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$blog->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Blog Description</label>
                        <textarea  id="summernote" name="Blog_Description">
                            {!! $blog->description !!}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select name="category_id" id="" class="form-control">
                            @forelse($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == $blog->category_id) selected @endif>{{$category->category_name}}</option>

                            @empty
                            @endforelse
                           
                        </select>
                    </div>
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary btn-lg w-100">Edit</button>
                    </div>
                   
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .img-thumbnail{
        height:200px;
        width:300px;
        object-fit: cover;
    }
</style>
<script>
    $(document).ready(function() {
  $('#summernote').summernote({
    height: 500
  });
});
</script>



@if(session('success'))
<script>
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "{{(session('success'))}}"
});
</script>
@endif
<script>
    
</script>
@endsection