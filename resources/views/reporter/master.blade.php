<!DOCTYPE html>
<html lang="en">


<head>
    @include('website.includes.meta')
    <title> Neeon | @yield('title') </title>
    @include('website.includes.style')

</head>

<body>

<!-- Start wrapper -->
<div id="wrapper" class="wrapper">

    <!-- start perloader -->
    <div class="pre-loader" id="preloader">
        <div class="loader"></div>
    </div>
    <!-- end perloader -->

    <!-- Start main-content -->
    <div id="main_content" class="footer-fixed">

    @include('website.includes.header')

    <!-- Start Main -->
        <main>
            @yield('body')
        </main>
        <!-- End Main -->

        @include('website.includes.footer')

    </div>
    <!-- End main-content -->

</div>
<!-- End wrapper -->

@include('website.includes.script')

</body>


</html>

