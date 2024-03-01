@extends('website.master')
@section('title', 'Modern Magazine & Newspaper')

@section('body')

    <!-- Post Header Section Start -->
    <div class="post-header-section section mt-30 mb-30">
        <div class="container">
            <div class="row row-1">

                <!-- Page Banner Start -->
                <div class="col-12">
                    <div class="post-header" style="background-image: url({{asset('/')}}website/assets/img/bg/page-banner-fashion.jpg)">

                        <!-- Title -->
                        <h3 class="title">{{$post->title}}</h3>

                        <!-- Meta -->
                        <div class="meta fix">
                            <a href="#" class="meta-item category fashion">{{$post->category->name}}</a>
                            <a href="#" class="meta-item author"><img src="{{asset($post->reporter->image)}}" alt="post author">{{$post->reporter->name}}</a>
                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$post->created_at->format('d M Y')}}</span>
                            <a href="#" class="meta-item comments"><i class="fa fa-comments"></i>({{count($comments)}})</a>
                            <span class="meta-item view"><i class="fa fa-eye"></i>(3483)</span>
                        </div>

                    </div>
                </div><!-- Post Header Section End -->

            </div>
        </div>
    </div><!-- Page Banner Section End -->

    <!-- Post Section Start -->
    <div class="post-section section">
        <div class="container">

            <!-- Feature Post Row Start -->
            <div class="row d-md-flex">

                <div class="col-lg-8 col-12 mb-50" style="width: 800px">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper mb-50">

                        <!-- Post Block Body Start -->
                        <div class="body">
                            <div class="row">

                                <div class="col-12">

                                    <!-- Single Post Start -->
                                    <div class="single-post">
                                        <div class="post-wrap">

                                            <!-- Content -->
                                            <div class="content">
                                                {!! $post->long_description !!}
                                            </div>

                                            <div class="tags-social float-start">

                                                <div class="tags float-start">
                                                    <i class="fa fa-tags"></i>
                                                    <a href="#">{{$post->category->name}},</a>
                                                    <a href="#">
                                                        @if($post->sub_category_id == null)
                                                            Nice {{$post->category->name}},
                                                        @else
                                                        {{$post->subCategory->name}},
                                                        @endif
                                                    </a>
                                                    <a href="#">Cool</a>
                                                </div>

                                                <div class="post-social float-end">
                                                    @foreach($socialShare as $key => $value)
                                                        <a href="{{ $value }}" target="_blank" class="{{$key}}"><i class="fa fa-{{$key}}"></i></a>
                                                    @endforeach
                                                </div>

                                            </div>

                                        </div>
                                    </div><!-- Single Post End -->

                                </div>

                            </div>
                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                    <!-- Post Author Start -->
                    <div class="post-block-wrapper mb-50">

                        <!-- Post Block Head Start -->
                        <div class="head">

                            <!-- Title -->
                            <h4 class="title">Comments  <span>({{count($comments)}})</span></h4>

                        </div><!-- Post Block Head End -->
                        @foreach($comments as $comment)
                        <div class="post-author fix mb-50">
                            <div class="image float-start"><img src="{{asset('/')}}website/assets/img/post/post-author-1.jpg" alt="post-author"></div>
                            <div class="content fix">
                                <h5><a href="#">{{$comment->visitor->name}}</a></h5>
                                <p>{{$comment->comment}}</p>
                                <div class="social">
                                    <span>{{$comment->created_at->diffForHumans()}}</span>
                                    <a href="#" class="float-end"><i class="fa fa-heart" style="color: #f05555;"></i></a>
                                </div>
                            </div>

                        </div><!-- Post Author End -->
                        @endforeach
                    <!-- Post Block Body Start -->
                        <div class="body">
                            <div class="post-comment-form">
                                @if(Session::get('visitor_id'))
                                    <form action="{{route('comment.store')}}" method="POST">
                                        @csrf
                                        <div class="col-12 mb-20">
                                            <label for="message">Your Comment <sup>*</sup></label>
                                            <textarea name="comment" id="message"></textarea>
                                        </div>
                                        <input type="hidden" value="{{$post->id}}" name="post_id"/>

                                        <div class="col-12">
                                            <button type="submit" class="btn text-white" style="background-color: #00c8fa;">Submit Comment</button>
                                        </div>
                                    </form>

                                @else
                                    <a href="{{route('user-login')}}" class="btn text-white" style="background-color: #00c8fa;">Login for Comment</a>
                                @endif
                            </div>

                        </div><!-- Post Block Body End -->

                    </div>

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper">

                        <!-- Post Block Head Start -->
                        <div class="head">

                            <!-- Title -->
                            <h4 class="title">Related News</h4>

                        </div><!-- Post Block Head End -->

                        <!-- Post Block Body Start -->
                        <div class="body">

                            <div class="three-column-post-carousel column-post-carousel post-block-carousel slick-space">
                                @foreach($relatedPosts as $relatedPost)

                                        <div class="slick-slide">

                                            <!-- Overlay Post Start -->
                                            <div class="post post-overlay hero-post">
                                                <div class="post-wrap" style="height: 150px; width: 230px;">
                                                    <!-- Image -->
                                                    <a href="" class="image">
                                                        <img src="{{asset($relatedPost->image)}}" height="200" width="300" alt="post">
                                                    </a>
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h4 class="title"><a href="{{route('news-detail', ['id'=> $relatedPost->id])}}">{{$relatedPost->title}}</a></h4>

                                                        <!-- Meta -->
                                                        <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$relatedPost->created_at->format('d M Y')}}</span>
                                                        </div>

                                                    </div>
                                                    <!-- Category -->
                                                    <a href="#" class="category politic">{{$relatedPost->category->name}}</a>
                                                </div>
                                            </div><!-- Overlay Post End -->

                                        </div>

                                @endforeach

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

