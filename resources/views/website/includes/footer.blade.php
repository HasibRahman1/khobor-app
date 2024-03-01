<!-- Footer Top Section Start -->
<div class="footer-top-section section bg-dark">
    <div class="container-fluid">
        <div class="row">

            <!-- Footer Widget Start -->
            <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">

                <!-- Title -->
                <h4 class="widget-title">About Us</h4>

                <div class="content fix">
                    <p>Lorem ipsum dolor sit amet, consectet adipiscing Se velit ex, dictum at nunc  placerat consequatS quam. ornaremi condiment PhasellusI  cursii placerat quam et, mattis nibh Suspendislacinias.</p>

                    <!-- Footer Contact -->
                    <ol class="footer-contact">
                        <li><i class="fa fa-home"></i>House No 08, Din Bari, Dhaka, Bangladesh</li>
                        <li><i class="fa fa-envelope-open"></i>Username@gmail.com</li>
                        <li><i class="fa fa-headphones"></i>(+660 256 24857) , (+660 256 24857)</li>
                    </ol>

                    <!-- Footer Social -->
                    <div class="footer-social">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    </div>

                </div>

            </div><!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">

                <!-- Title -->
                <h4 class="widget-title">popular News</h4>

                <!-- Footer Widget Post Start -->
                @foreach($footerPopularPosts as $footerPopularPost)
                <div class="footer-widget-post">
                    <div class="post-wrap">

                        <!-- Image -->
                        <a href="{{route('news-detail', ['id'=> $footerPopularPost->id])}}" class="image"><img src="{{asset($footerPopularPost->image)}}" height="80" alt="Post"></a>

                        <!-- Content -->
                        <div class="content">

                            <!-- Title -->
                            <h5 class="title"><a href="{{route('news-detail', ['id'=> $footerPopularPost->id])}}">{{$footerPopularPost->title}}</a></h5>

                            <!-- Meta -->
                            <div class="meta fix">
                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$footerPopularPost->created_at->format('d M Y')}}</span>
                            </div>

                        </div>

                    </div>
                </div><!-- Footer Widget Post ENd -->
                @endforeach


            </div><!-- Footer Widget End -->


            <!-- Footer Widget Start -->
            <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">

                <!-- Title -->
                <h4 class="widget-title">Top News</h4>

                <!-- Footer Widget Post Start -->
                @foreach($footerTopPosts as $footerTopPost)
                <div class="footer-widget-post">
                    <div class="post-wrap">

                        <!-- Image -->
                        <a href="{{route('news-detail', ['id'=> $footerTopPost->id])}}" class="image"><img src="{{asset($footerTopPost->image)}}" height="80" alt="Post"></a>

                        <!-- Content -->
                        <div class="content">

                            <!-- Title -->
                            <h5 class="title"><a href="{{route('news-detail', ['id'=> $footerTopPost->id])}}">{{$footerTopPost->title}}</a></h5>

                            <!-- Meta -->
                            <div class="meta fix">
                                <span class="meta-item date"><i class="fa fa-clock-o"></i>{{$footerTopPost->created_at->format('d M Y')}}</span>
                            </div>

                        </div>

                    </div>
                </div><!-- Footer Widget Post ENd -->
                @endforeach

            </div><!-- Footer Widget End -->

            <!-- Footer Widget Start -->
            <div class="footer-widget col-xl-3 col-md-6 col-12 mb-60">

                <h4 class="widget-title">Quick Links</h4>

                <!-- Single Tweet Start -->
                <div class="single-tweet">
                    <!-- Content -->
                    <div class="content fix">
                        <!-- Links -->
                        <div class="links"><a href="{{route('privacy-policy')}}">Privacy Policy</a></div>
                        <div class="links"><a href="{{route('terms-condition')}}">Terms & Condition</a></div>
                        <div class="links"><a href="{{route('circulation')}}">Circulation</a></div>
                        <div class="links"><a href="{{route('advertisement')}}">Advertisement</a></div>
                        <div class="links"><a href="{{route('contact')}}">Contact Us</a></div>
                    </div>
                </div><!-- Single Tweet End -->
            </div><!-- Footer Widget End -->

        </div>
    </div>
</div><!-- Footer Top Section End -->

<!-- Footer Bottom Section Start -->
<div class="footer-bottom-section section bg-dark">
    <div class="container">
        <div class="row">

            <!-- Copyright Start -->
            <div class="copyright text-center col">
                <p>© 2022 Khobor. Made with <i class="fa fa-heart heart-icon"></i> By <a target="_blank" href="https://hasthemes.com/">HasThemes</a></p>
            </div><!-- Copyright End -->

        </div>
    </div>
</div><!-- Footer Bottom Section End -->

