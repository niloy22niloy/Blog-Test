<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="#">Dashboard</a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{ (request()->is('admin/home')) ? 'active' : '' }}">
                        <a href="{{url('admin/home')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                       
                    </li>
                   
                    <li 
                    class="{{ (request()->is('admin/users/list')) ? 'active' : '' }}">
                       <a href="{{ route('admin.user_list') }}">Users List</a>
                   </li>
                   <li 
                   class="{{ (request()->routeIs('admin.category')) ? 'active' : '' }}">
                      <a href="{{ route('admin.category') }}">Category</a>
                  </li>
                   
                   
                    {{-- <li class="active">
                        <a href="{{route('admin.user_list')}}" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Users List
                                
                            </span></a>
                       
                    </li> --}}
                  
                </ul>
            </nav>
        </div>
    </div>
</div>