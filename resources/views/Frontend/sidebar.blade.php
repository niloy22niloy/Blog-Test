<aside id="colorlib-aside" role="complementary" class="js-fullheight img"
style="background-image: url(images/sidebar-bg.jpg);">
<h1 id="colorlib-logo" class="mb-4"><a href="{{url('/')}}">ionize</a></h1>
@if (auth()->guard('user')->check())
    <h6 id="colorlib-logo" style="font-size:24px;" class="mb-4"><a href="">Hello,
            {{ auth()->guard('user')->user()->name }}</a></h6>
    <a href="{{ route('user.logout') }}">Logout</a>
@else
    <h6 id="colorlib-logo" style="font-size:24px;" class="mb-4"><a
            href="{{ route('user.register') }}">Register/Login</a></h6>
@endif

<nav id="colorlib-main-menu" role="navigation">
    <ul>
        <li class="{{ (request()->is('/')) ? 'colorlib-active' : '' }}"><a href="{{route('index')}}">Home</a></li>
        @forelse($category as $categories)
        <li class="{{ request()->is('category_base/post/'.$categories->category_name) ? 'colorlib-active' : '' }}">
            <a href="{{ route('category_base.post', $categories->category_name) }}">{{ $categories->category_name }}</a>
        </li>
        @empty
        @endforelse
       
        @if (auth()->guard('user')->check())
            <li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
        @endif


    </ul>
</nav>


</aside>