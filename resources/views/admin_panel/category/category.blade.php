
@extends('admin_panel.layouts.app')
@section('contents')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>category</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    
                    <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <div class="col-lg-6 col-ml-12 mx-auto">
        <div class="row">
            <!-- basic form start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Category Insert</h4>
                        <form action="{{route('category.insert')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                
                                
                                <input type="text" name="category_name" class="form-control"  placeholder="Enter Category Name">
                              
                                    @error('category_name')
                                    <span role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="">--Select Status--</option>
                                    <option value="1">On</option>
                                    <option value="0">OFF</option>
                                </select>
                                 
                                @error('status')
                                    <span  role="alert">
                                        <strong class="text-danger"> {{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
          
            <!-- Custom file input end -->
        </div>
    </div>
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Data Table Default</h4>
                    <div class="data-tables">
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                  
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th></th>
                                  
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $key=>$category)
                                <tr>
                                    
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->status}}</td>
                                    <td>Action</td>
                                    <td></td>
                                    


                                </tr>
                                @empty
                                @endforelse
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
       
    </div>
      

</div>
@if(session('success'))
<script>
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "{{session('success')}}",
    showConfirmButton: false,
    timer: 2500
  });
  </script>
@endif

@endsection
