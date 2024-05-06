@extends('Frontend.user_dashboard.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        @forelse($blogs as $blog)
            <div class="col-lg-4">
                <div class="card mb-5">
                    <img src="{{ asset('Blog_thumbnail_image/'.$blog->image) }}" class="card-img-top fixed-image" alt="Image 1">
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <h5  class="card-title">( {{$blog->created_at->format('D m Y')}}) ({{$blog->created_at->diffForHumans()}})</h5>
                        <a href="{{ route('my_blog.details', $blog->slug) }}" class="btn btn-primary">Details</a>
                        <button type="button" class="btn btn-danger del" data-post-id="{{ $blog->id }}">Delete</button>
                       
                    </div>
                </div>
            </div>
        @empty
            Sorry No Blogs Posted Yet
        @endforelse
    </div>

    <!-- Pagination links -->
    
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            {!! $blogs->links() !!}
        </div>
    </div>
   
</div>


  <style>
    .fixed-image {
    width: 100%; /* Ensure the image takes up the entire width of its container */
    height: 200px; /* Set a fixed height for the image */
    object-fit: cover; /* Ensure the image covers the entire space of its container */
}
  </style>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.del', function() {
        var postId = $(this).data('post-id');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform an AJAX request to delete the post
                $.ajax({
                    url: '{{ route('delete.post', '') }}/' + postId,
                    type: 'DELETE',
                    success: function(response) {
                        // Handle success message or UI update
                        Swal.fire({
                            title: "Deleted!",
                            icon: "success"
                        }).then(() => {
                            // Reload the page
                            window.location.reload();
                        });
                    },
                    
                    error: function(xhr, status, error) {
                        // Handle error message or UI update
                        Swal.fire({
                            title: "Error!",
                            text: "An error occurred while deleting the post.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
</script>
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
@endsection