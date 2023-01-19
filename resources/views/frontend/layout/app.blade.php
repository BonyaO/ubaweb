<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('frontend/includes/head-scripts')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- prealoader area end -->
    
    <!-- header area start -->
    @include('frontend/includes/header')
    <!-- header area end -->

    <!-- offset search area start -->
    <div class="offset-search">
        <form action="#">
            <input type="text" name="search" placeholder="Sarch here...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- offset search area end -->

    <!-- body overlay area start -->
    <div class="body_overlay"></div>
    <!-- body overlay area end -->

    <!-- course area start -->
        @yield('content')
    <!-- footer area start -->

    @include('frontend/includes/footer')
    <!-- footer area end -->

    @include('frontend/includes/footer-scripts')
</body>

</html>
