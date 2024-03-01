<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('website.includes.meta')
    <title>Khobor - @yield('title')</title>
    @include('website.includes.style')

</head>

<body>

<!-- Main Wrapper -->
<div id="main-wrapper">
    <!-- Header -->
    @include('website.includes.header')
    <!--body -->
    @yield('body')
<!-- Footer-->
        @include('website.includes.footer')
</div>
<!--Script -->
@include('website.includes.script')
</body>

</html>
