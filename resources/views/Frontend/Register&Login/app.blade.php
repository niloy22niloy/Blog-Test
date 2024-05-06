
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>srtdash - ICO Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://wbackendww.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('backend/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('Admin/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
 @yield('content')
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="{{asset('backend/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('backend/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('backend/js/jquery.slicknav.min.js')}}"></script>
    
    <!-- others plugins -->
    <script src="{{asset('backend/js/plugins.js')}}"></script>
    <script src="{{asset('backend/js/scripts.js')}}"></script>
</body>

</html>