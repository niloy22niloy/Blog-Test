@extends('Frontend.Register&Login.app')
@section('content')
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="POST" action="{{route('user.login')}}"  enctype="multipart/form-data">
                @csrf
                <div class="login-form-head">
                    <h4>Sign In</h4>
                    <p>Bloging Website</p>
                </div>
                <div class="login-form-body">
                    
                      
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="email">
                            <i class="ti-email"></i>
                            @error('email')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="password">
                            <i class="ti-lock"></i>
                            @error('password')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                             
                            </div>
                            {{-- <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div> --}}
                        </div>
                        <div class="submit-btn-area">
                            <button  type="submit">Submit <i class="ti-arrow-right"></i></button>
                           
                        </div>
                 
                   
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a href="{{url('user/register')}}">Sign up</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
   title: "{{ session('success') }}",
 });
 </script>
@endif

@endsection