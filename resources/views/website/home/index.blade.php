@extends('website.master')
@section('title', 'Modern Magazine & Newspaper')

@section('body')
    <!-- Hero Section Start -->
    <div class="hero-section section mt-30 mb-30">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row row-1">

                        <div class="order-lg-1 col-lg-6 col-12">

                            <!-- Hero Post Slider Start -->
                            <div class="post-carousel-1">

                                <!-- Overlay Post Start -->
                                @foreach($topSlidePosts as $topSlidePost)
                                <div class="post post-large post-overlay hero-post">
                                    <div class="post-wrap">

                                        <!-- Image -->
                                        <div class="image"><img src="{{asset($topSlidePost->image)}}" height="442" alt="post"></div>

                                        <!-- Category -->
                                        <a href="#" class="category politic">{{$topSlidePost->category->name}}</a>

                                        <!-- Content -->
                                        <div class="content">

                                            <!-- Title -->
                                            <h2 class="title"><a href="{{route('news-detail', ['id'=> $topSlidePost->id])}}">{{$topSlidePost->title}}</a></h2>

                                            <!-- Meta -->
                                            <div class="meta fix">
                                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$topSlidePost->created_at->format('d M Y')}}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- Overlay Post End -->
                                @endforeach
                            </div><!-- Hero Post Slider End -->

                        </div>

                        <div class="order-lg-2 col-lg-3 col-12">
                            <div class="row row-1">

                                <!-- Overlay Post Start -->
                                @foreach($topPosts as $topPost)
                                <div class="post post-overlay hero-post col-lg-12 col-md-6 col-12">
                                    <div class="post-wrap">

                                        <!-- Image -->
                                        <div class="image"><img src="{{asset($topPost->image)}}" height="220" alt="post"></div>

                                        <!-- Category -->
                                        <a href="#" class="category travel">{{$topPost->category->name}}</a>

                                        <!-- Content -->
                                        <div class="content">

                                            <!-- Title -->
                                            <h4 class="title"><a href="{{route('news-detail', ['id'=> $topPost->id])}}">{{$topPost->title}}</a></h4>

                                            <!-- Meta -->
                                            <div class="meta fix">
                                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$topPost->created_at->format('d M Y')}}</span>
                                            </div>

                                        </div>

                                    </div>
                                </div><!-- Overlay Post End -->
                                @endforeach
                            </div>
                        </div>

                        <div class="order-lg-3 col-lg-3 col-12">
                            <div class="row row-1">
                                <!-- Overlay Post Start -->
                                @foreach($topPosts2 as $topPost)
                                <div class="post post-overlay gradient-overlay-1 hero-post col-lg-12 col-md-6 col-12">
                                    <div class="post-wrap">

                                        <!-- Image -->
                                        <div class="image"><img src="{{asset($topPost->image)}}" height="220" alt="post"></div>

                                        <!-- Category -->
                                        <a href="#" class="category sports">{{$topPost->category->name}}</a>

                                        <!-- Content -->
                                        <div class="content">

                                            <!-- Title -->
                                            <h4 class="title"><a href="{{route('news-detail', ['id'=> $topPost->id])}}">{{$topPost->title}}</a></h4>

                                            <!-- Meta -->
                                            <div class="meta fix">
                                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$topPost->created_at->format('d M Y')}}</span>
                                            </div>

                                        </div>

                                    </div>
                                </div><!-- Overlay Post End -->
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- Hero Section End -->

    <!-- Post Section Start -->
    <div class="post-section section mt-50">
        <div class="container">

            <!-- Feature Post Row Start -->
            <div class="row">

                <div class="col-lg-8 col-12 mb-50">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper">

                        <!-- Post Block Head Start -->
                        <div class="head feature-head">

                            <!-- Title -->
                            <h4 class="title">Latest News</h4>

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body pb-0">

                            <!-- Tab Content Start-->
                            <div class="tab-content">

                                <!-- Tab Pane Start-->
                                <div class="tab-pane fade show active" id="feature-cat-1">

                                    <div class="row">


                                        <!-- Small Post Wrapper Start -->
                                        <div class="col-md-6 col-12 mb-20">

                                            <!-- Post Small Start -->
                                            @foreach($latestPosts as $latestPost)
                                            <div class="post post-small post-list feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="{{route('news-detail', ['id'=> $latestPost->id])}}"><img src="{{asset($latestPost->image)}}" height="94" width="124" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="{{route('news-detail', ['id'=> $latestPost->id])}}">{{$latestPost->title}}</a></h5>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$latestPost->created_at->format('d M Y')}}</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- Post Small End -->
                                            @endforeach
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <!-- Post Small Start -->
                                            @foreach($latestPosts2 as $latestPost2)
                                            <div class="post post-small post-list feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="{{route('news-detail', ['id'=> $latestPost2->id])}}"><img src="{{asset($latestPost2->image)}}" height="94" width="124" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="{{route('news-detail', ['id'=> $latestPost2->id])}}">{{$latestPost2->title}}</a></h5>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$latestPost2->created_at->format('d M Y')}}</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- Post Small End -->
                                            @endforeach
                                        </div>
                                        <!-- Small Post Wrapper End -->

                                    </div>

                                </div><!-- Tab Pane End-->

                                <!-- Tab Pane Start-->
                                <div class="tab-pane fade" id="feature-cat-2">

                                    <div class="row">

                                        <!-- Post Wrapper Start -->
                                        <div class="col-md-6 col-12 mb-20">

                                            <!-- Post Start -->
                                            <div class="post feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="post-details.html"><img src="{{asset('/')}}website/assets/img/post/post-12.jpg" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h4 class="title"><a href="post-details.html">How group of rebel are talking on Banasree epidemic.</a></h4>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <a href="#" class="meta-item author"><i class="fa fa-user"></i>Sathi Bhuiyan</a>
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>10 March 2023</span>
                                                            <a href="#" class="meta-item comment"><i class="fa fa-comments"></i>(34)</a>
                                                        </div>

                                                        <!-- Description -->
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elits. Proin nec purus lectus. Aenean sodales quis eros is quis eleifend. Vestibulum condimentum.</p>

                                                    </div>

                                                </div>
                                            </div><!-- Post End -->

                                            <!-- Post Start -->
                                            <div class="post feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="post-details.html"><img src="{{asset('/')}}website/assets/img/post/post-11.jpg" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h4 class="title"><a href="post-details.html">Fashion is about some thing that comes from with in you.</a></h4>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <a href="#" class="meta-item author"><i class="fa fa-user"></i>Sathi Bhuiyan</a>
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>10 March 2023</span>
                                                            <a href="#" class="meta-item comment"><i class="fa fa-comments"></i>(34)</a>
                                                        </div>

                                                        <!-- Description -->
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elits. Proin nec purus lectus. Aenean sodales quis eros is quis eleifend. Vestibulum condimentum.</p>

                                                    </div>

                                                </div>
                                            </div><!-- Post End -->

                                        </div><!-- Post Wrapper End -->

                                        <!-- Small Post Wrapper Start -->
                                        <div class="col-md-6 col-12 mb-20">

                                            <!-- Post Small Start -->
                                            <div class="post post-small post-list feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="post-details.html"><img src="{{asset('/')}}website/assets/img/post/post-16.jpg" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="post-details.html">Apple, time to IOS With macos.</a></h5>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>10 March 2023</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- Post Small End -->

                                            <!-- Post Small Start -->
                                            <div class="post post-small post-list feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="post-details.html"><img src="{{asset('/')}}website/assets/img/post/post-17.jpg" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="post-details.html">Apple, time to IOS With macos.</a></h5>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>10 March 2023</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- Post Small End -->

                                            <!-- Post Small Start -->
                                            <div class="post post-small post-list feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="post-details.html"><img src="{{asset('/')}}website/assets/img/post/post-18.jpg" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="post-details.html">Most beautiful lens for an amaing photo.</a></h5>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>10 March 2023</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- Post Small End -->

                                            <!-- Post Small Start -->
                                            <div class="post post-small post-list feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="post-details.html"><img src="{{asset('/')}}website/assets/img/post/post-13.jpg" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="post-details.html">Hynpodia helps female travelers find health.</a></h5>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>10 March 2023</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- Post Small End -->

                                            <!-- Post Small Start -->
                                            <div class="post post-small post-list feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="post-details.html"><img src="{{asset('/')}}website/assets/img/post/post-14.jpg" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="post-details.html">Australia announced squad for Bangladesh tour.</a></h5>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>10 March 2023</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- Post Small End -->

                                            <!-- Post Small Start -->
                                            <div class="post post-small post-list feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="post-details.html"><img src="{{asset('/')}}website/assets/img/post/post-15.jpg" alt="post"></a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="post-details.html">Fish Fry With green vegetables.</a></h5>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>10 March 2023</span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div><!-- Post Small End -->

                                        </div><!-- Small Post Wrapper End -->

                                    </div>

                                </div><!-- Tab Pane End-->

                            </div><!-- Tab Content End-->

                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4 col-12 mb-50">
                    <div class="row">

                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">

                            <!-- Sidebar Banner -->
                            <a href="{{$secondAd->ad_link}}" class="sidebar-banner"><img src="{{asset($secondAd->image)}}" alt="Sidebar Banner"></a>

                        </div>
                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">

                            <!-- Sidebar Banner -->
                            <a href="{{$thirdAd->ad_link}}" class="sidebar-banner"><img src="{{asset($thirdAd->image)}}" alt="Sidebar Banner"></a>

                        </div>

                    </div>
                </div><!-- Sidebar End -->

            </div><!-- Feature Post Row End -->

            <!-- Life Style Post Row Start -->

            <!-- Education & Madical Post Row Start -->
            <div class="row">
                @foreach($topCategories as $topCategory)
                <div class="col-lg-4 col-md-6 col-12 mb-50">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper">

                        <!-- Post Block Head Start -->
                        <div class="head education-head">

                            <!-- Title -->
                            <h4 class="title">{{$topCategory->name}} News</h4>

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body">

                            <!-- Sidebar Post Slider Start -->
                            <div class="four-row-post-carousel row-post-carousel post-block-carousel education-post-carousel">
                                <!-- Small Post Start -->
                                @foreach($categoryPosts as $categoryPost)
                                    @if($topCategory->id == $categoryPost->category_id)
                                <div class="post post-small post-list education-post">
                                    <div class="post-wrap" style="height: 130px">

                                        <!-- Image -->
                                        <a class="image w-50" href="{{route('news-detail', ['id'=> $categoryPost->id])}}"><img src="{{asset($categoryPost->image)}}" height="98" width="124" alt="post"></a>

                                        <!-- Content -->
                                        <div class="content">

                                            <!-- Title -->
                                            <h5 class="title"><a href="{{route('news-detail', ['id'=> $categoryPost->id])}}">{{$categoryPost->title}}</a></h5>

                                            <!-- Meta -->
                                            <div class="meta fix">
                                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$categoryPost->created_at->format('d M Y')}}</span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                @endif
                                @endforeach
                                    <!-- Small Post End -->

                            </div><!-- Sidebar Post Slider End -->

                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>
                @endforeach

            </div>
            <!-- Education & Madical Post Row End -->
            <!-- Banner Row Start -->
            <div class="row mb-50">

                <div class="col-12">

                    <a href="{{$fourthAd->ad_link}}" class="post-middle-banner"><img src="{{asset($fourthAd->image)}}" alt="Banner"></a>

                </div>

            </div><!-- Banner Row End -->
            <!-- Video Post Row Start -->
            <div class="row mb-50">

                <div class="col-12">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper mb-50">

                        <!-- Post Block Head Start -->
                        <div class="head">

                            <!-- Title -->
                            <h4 class="title">Video News</h4>

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body">

                            <div class="two-column-post-carousel column-post-carousel post-block-carousel slick-space">
                                @foreach($videos as $video)
                                <div class="slick-slide">

                                    <!-- Overlay Post Start -->
                                    <div class="post post-overlay hero-post">
                                        <div class="post-wrap" style="height: 200px">
                                            <!-- Image -->
                                            <a href="{{$video->video_link}}" class="image video-popup">
                                                <img src="{{asset($video->image)}}" height="170" alt="post">
                                                <span class="video-btn"><i class="fa fa-play"></i></span>
                                            </a>

                                        <!--
                                        <iframe width="220" height="200" src="{{asset($video->converted_video_link)}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                                            -->
                                            <!-- Category -->
                                            <a href="#" class="category politic">{{$video->category->name}}</a>
                                        </div>
                                    </div><!-- Overlay Post End -->

                                </div>
                                @endforeach

                            </div>

                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>

            </div><!-- Video Post Row End -->

            <!-- Banner Row Start -->
            <div class="row mb-50">

                <div class="col-12">

                    <a href="{{$fifthAd->ad_link}}" class="post-middle-banner"><img src="{{asset($fifthAd->image)}}" alt="Banner"></a>

                </div>

            </div><!-- Banner Row End -->



        </div>
    </div><!-- Post Section End -->

@endsection
