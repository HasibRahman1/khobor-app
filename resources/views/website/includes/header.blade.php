<!-- Header Top Start -->
<div class="header-top section">
    <div class="container">
        <div class="row">

            <!-- Header Top Links Start -->
            <div class="header-top-links col-md-9 col-6">

                <!-- Header Links -->
                <ul class="header-links">
                    <li class="disabled block d-none d-md-block"><a href="#"><i class="fa fa-clock-o"></i> Sunday, March 25, 2023</a></li>
                    <li class="d-none d-md-block"><a href="#"><i class="fa fa-mixcloud"></i> <span class="weather-degrees">20 <span class="unit">c</span> </span> <span class="weather-location">- Sydney</span></a></li>
                </ul>

            </div><!-- Header Top Links End -->

            <!-- Header Top Social Start -->
            <div class="header-top-social col-md-3 col-6">

                <!-- Header Social -->
                <div class="header-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                    <a href="#"><i class="fa fa-vimeo"></i></a>
                </div>

            </div><!-- Header Top Social End -->

        </div>
    </div>
</div ><!-- Header Top End -->

<!-- Header Start -->
<div class="header-section section">
    <div class="container">
        <div class="row align-items-center">

            <!-- Header Logo -->
            <div class="header-logo col-md-4 d-none d-md-block">
                <a href="{{route('home')}}" class="logo"><img src="{{asset('/')}}website/assets/img/logo.png" alt="Logo"></a>
            </div>

            <!-- Header Banner -->
            <div class="header-banner col-md-8 col-12">
                <div class="banner"><a href="{{$firstAd->ad_link}}"><img src="{{asset($firstAd->image)}}" alt="Header Banner"></a></div>
            </div>

        </div>
    </div>
</div><!-- Header End -->

<div id="navbar">
    <!-- Menu Section Start -->
    <div id="menu" class="menu-section section bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="menu-section-wrap d-flex">

                        <!-- Main Menu Start -->
                        <div class="main-menu d-none d-md-block me-auto">
                            <a href="{{route('home')}}" id="logo" class="logo float-start d-none"><img src="{{asset('/')}}website/assets/img/logo-white.png" alt="Logo"></a>
                            <nav id="nav">
                                <ul>
                                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="category-news.html">News</a></li>
                                    @foreach($headCategories as $headCategory)
                                    <li><a href="{{route('news-category', ['id' => $headCategory->id])}}">{{$headCategory->name}}</a></li>
                                    @endforeach
                                    <li><a href="category-news.html">Videos</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Main Menu Start -->

                        <div class="mobile-logo d-md-none"><a href="index.html"><img src="{{asset('/')}}website/assets/img/logo-white.png" alt="Logo"></a></div>

                        <!-- Header Search -->
                        <div class="header-search me-4">

                            <!-- Search Toggle -->
                            <button class="header-search-toggle"><i class="fa fa-search"></i></button>

                            <!-- Header Search Form -->
                            <div class="header-search-form">
                                <form action="#">
                                    <input type="text" placeholder="Search Here">
                                </form>
                            </div>


                        </div>

                        <div class="main-menu d-none d-md-block float-end">
                            <nav id="nav">
                                <ul>
                                    @if(Session::get('visitor_id'))
                                        <li class="">
                                            <a href="{{route('my-dashboard')}}">{{Session::get('visitor_name')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user-logout')}}">Logout</a>
                                        </li>

                                    @elseif(Session::get('reporter_id'))
                                        <li class="">
                                            <a href="{{route('reporter-dashboard')}}">{{Session::get('reporter_name')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{route('user-logout')}}">Logout</a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{route('user-login')}}" target="">
                                                LOGIN
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('user-register')}}" target="">
                                                REGISTER
                                            </a>
                                        </li>

                                    @endif
                                </ul>
                            </nav>
                        </div>


                        <!-- Mobile Menu Wrap -->
                        <div class="mobile-menu-wrap d-none">
                            <nav>
                                <ul>

                                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="category-lifestyle.html">News</a></li>
                                    @foreach($headCategories as $headCategory)
                                        <li><a href="{{route('news-category', ['id' => $headCategory->id])}}">{{$headCategory->name}}</a></li>
                                    @endforeach
                                    <li><a href="category-news.html">Videos</a></li>

                                </ul>
                            </nav>
                        </div>

                        <!-- Mobile Menu -->
                        <div class="mobile-menu"></div>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- Menu Section End -->

    <!-- Breaking News Section Start -->
    <div class="breaking-news-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Breaking News Wrapper Start -->
                    <div class="breaking-news-wrapper">

                        <!-- Breaking News Title -->
                        <h5 class="breaking-news-title float-start">Breaking News</h5>

                        <!-- Breaking Newsticker Start -->
                        <ul class="breaking-news-ticker float-start">
                            @foreach($breakingPosts as $breakingPost)
                            <li><a href="{{route('news-detail', ['id' => $breakingPost->id])}}">{{$breakingPost->title}}!!!</a></li>
                            @endforeach
                        </ul><!-- Breaking Newsticker Start -->

                        <!-- Breaking News Nav -->
                        <div class="breaking-news-nav">
                            <button class="news-ticker-prev"><i class="fa fa-angle-left"></i></button>
                            <button class="news-ticker-next"><i class="fa fa-angle-right"></i></button>
                        </div>

                    </div><!-- Breaking News Wrapper End -->

                </div>
            </div>
        </div>
    </div><!-- Breaking News Section End -->
</div>
