
@extends('admin_panel.layouts.app')
@section('contents')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Users List</span></li>
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
                                  
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                    <th></th>
                                  
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($user_lists as $key=>$user)
                                <tr>
                                    
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
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
@endsection
