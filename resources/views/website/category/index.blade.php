@extends('website.master')
@section('title', 'Modern Magazine & Newspaper')

@section('body')

    <!-- Page Banner Section Start -->
    <div class="page-banner-section section mt-30 mb-30">
        <div class="container">
            <div class="row row-1">

                <!-- Page Banner Start -->
                <div class="col-lg-8 col-12">
                    <div class="page-banner" style="background-image: url({{asset('/')}}website/assets/img/bg/page-banner-sports.jpg); height: 250px">
                        <h2>Category: <span class="category-sports">{{$category->name}}</span></h2>
                        <ol class="page-breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">{{$category->name}}</li>
                        </ol>
                        <p>{{$category->description}}</p>
                    </div>
                </div><!-- Page Banner End -->

                <div class="page-banner-image col-lg-4 col-12 d-none d-lg-block"><img src="{{asset($category->image)}}" height="250" alt="Page Banner Image"></div>

            </div>
        </div>
    </div><!-- Page Banner Section End -->

    <!-- Popular Section Start -->
    <div class="popular-section section bg-dark pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Popular Post Slider Start -->
                    <div class="popular-post-slider">
                        <!-- Overlay Post Start -->
                        @foreach($popularPosts as $popularPost)
                        <div class="post post-overlay">
                            <div class="post-wrap">

                                <!-- Image -->
                                <div class="image"><img src="{{asset($popularPost->image)}}" height="300" alt="post"></div>

                                <!-- Content -->
                                <div class="content">

                                    <!-- Title -->
                                    <h4 class="title"><a href="{{route('news-detail', ['id'=> $popularPost->id])}}">{{$popularPost->title}}</a></h4>

                                    <!-- Meta -->
                                    <div class="meta fix">
                                        <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$popularPost->created_at->format('d M Y')}}</span>
                                    </div>

                                </div>

                            </div>
                        </div><!-- Overlay Post End -->
                        @endforeach
                    </div><!-- Popular Post Slider End -->

                </div>
            </div>
        </div>
    </div><!-- Popular Section End -->

    <!-- Post Section Start -->
    <div class="post-section section mt-50">
        <div class="container">

            <!-- Feature Post Row Start -->
            <div class="row d-md-flex">

                <div class="col-lg-8 col-12 mb-50">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper">

                        <!-- Post Block Body Start -->
                        <div class="body">
                            <div class="row">
                                <!-- Post Start -->
                                @foreach($posts as $post)
                                <div class="post sports-post post-separator-border col-md-6 col-12">
                                    <div class="post-wrap" style="height: 600px; width: 350px">

                                        <!-- Image -->
                                        <a class="image" href="{{route('news-detail', ['id'=> $post->id])}}"><img src="{{asset($post->image)}}" height="300" alt="post"></a>

                                        <!-- Content -->
                                        <div class="content">

                                            <!-- Title -->
                                            <h4 class="title"><a href="{{route('news-detail', ['id'=> $post->id])}}">{{$post->title}}</a></h4>

                                            <!-- Meta -->
                                            <div class="meta fix">
                                                <a href="#" class="meta-item author"><i class="fa fa-user"></i>{{$post->reporter->name}}</a>
                                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$post->created_at->format('d M Y')}}</span>
                                            </div>

                                            <!-- Description -->
                                            <p>
                                                {!!$post->short_description!!}
                                            </p>
                                            <!-- Read More -->
                                           <a href="" class="read-more">continue reading</a>

                                        </div>

                                    </div>
                                </div><!-- Post End -->
                                @endforeach
                                <div class="page-pagination text-center col-12">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4 col-12 mb-50">
                    <div class="row">

                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">

                            <!-- Sidebar Banner -->
                            <a href="#" class="sidebar-banner"><img src="{{asset('/')}}website/assets/img/banner/sidebar-banner-1.jpg" alt="Sidebar Banner"></a>

                        </div>

                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">

                            <!-- Sidebar Banner -->
                            <a href="#" class="sidebar-banner"><img src="{{asset('/')}}website/assets/img/banner/sidebar-banner-2.jpg" alt="Sidebar Banner"></a>

                        </div>

                        <!-- Single Sidebar -->
                        <div class="single-sidebar col-lg-12 col-md-6 col-12">

                            <div class="sidebar-subscribe">
                                <h4>Subscribe To <br>Our <span>Update</span> News</h4>
                                <p>Adipiscing elit. Fusce sed mauris arcu. Praesent ut augue imperdiet, semper lorem id.</p>
                                <!-- Newsletter Form -->
                                <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="subscribe-form validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <label for="mce-EMAIL" class="d-none">Subscribe to our mailing list</label>
                                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Your email address" required>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                        <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button">submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div><!-- Sidebar End -->

            </div><!-- Feature Post Row End -->

        </div>
    </div><!-- Post Section End -->


@endsection
