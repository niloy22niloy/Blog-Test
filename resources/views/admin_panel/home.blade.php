
@extends('admin_panel.layouts.app')
@section('contents')
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Dashboard</span></li>
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
    <div class="col-lg-6 mt-5 bg-success mx-auto">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h3>This Page Is In Under Construction!! Please Check UsersList page and Category Page for more!!</h3>
            </div>
        </div>

    </div>
    
</div>
@endsection
