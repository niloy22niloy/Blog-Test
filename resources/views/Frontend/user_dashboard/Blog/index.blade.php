@extends('Frontend.user_dashboard.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Blog Add</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                 
                   <div class="mb-3">
                    <label for="" class="form-label">Enter Blog Title</label>
                    <input type="text" class="form-control" name="Blog_title">
                    @error('Blog_title')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror 
                   </div>
                   <div class="mb-3">
                    <label for="" class="form-label">Select Category</label>
                    <select name="category" id="" class="form-control">
                   <option value="">Select category</option>

                        @forelse($categories as $category)
                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                   
                        @empty

                        @endforelse
                      
                    </select> 
                    @error('category')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror                    
                   </div>
                   <div class="mb-3">
                    <label for="" class="form-label">Enter Blog Description</label>
                    <textarea id="summernote" name="Blog_Description"></textarea>
                    @error('Blog_Description')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror

                   </div>
                   <div id="image-preview-container" class="image-preview-container"></div>
                   <div class="mb-3 mt-3">
                       <label for="image-upload" class="form-label">Upload Image</label>
                       <input type="file" name="thumbnail_image" id="image-upload" accept="image/*">
                     
                   </div>
                   @error('thumbnail_image')
                   <strong class="text-danger">{{$message}}</strong>
                   @enderror
                   <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Insert</button>
                   </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .image-preview-container {
    width: 200px; /* Adjust width as needed */
    height: 200px; /* Adjust height as needed */
    border: 1px solid #ccc;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.image-preview {
    max-width: 100%;
    max-height: 100%;
}
</style>

  
<script>
    $(document).ready(function() {
        // Function to display selected image in the preview container
        function previewImage(input) {
            var $container = $('#image-preview-container');
            $container.empty(); // Clear previous image (if any)
    
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function(e) {
                    var $img = $('<img>').attr('src', e.target.result).addClass('image-preview');
                    $container.append($img); // Append the image to the container
                }
    
                reader.readAsDataURL(input.files[0]);
            }
        }
    
        // Listen for file input change event
        $('#image-upload').change(function() {
            previewImage(this);
        });
    });
    </script>
<script>
    $(document).ready(function() {
  $('#summernote').summernote({
    height:500,
  });
});
</script>
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