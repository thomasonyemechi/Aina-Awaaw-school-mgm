<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>Aina Awaw - @yield('title', 'Home')</title>
    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assetss/img/logo.png')}}">
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/css/bootstrap.min.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/css/animate.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/css/owl.carousel.css')}}">
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/css/slick.css')}}">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/css/off-canvas.css')}}">
    <!-- linea-font css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/fonts/linea-fonts.css')}}">
    <!-- flaticon css  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/fonts/flaticon.css')}}">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/css/magnific-popup.css')}}">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="{{ asset('assetss/css/rsmenu-main.css')}}">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/css/rs-spacing.css')}}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/style.css')}}"> <!-- This stylesheet dynamically changed from style.less -->
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetss/css/responsive.css')}}">

    @yield('css')
</head>
<body class="defult-home">


{{--<div id="loader" class="loader orange-color">--}}
{{--    <div class="loader-container">--}}
{{--        <div class='loader-icon'>--}}
{{--            <img src="{{asset('assets/img/logo.png')}}" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--Preloader area End here-->

<!-- Main content Start -->
<div class="main-content">
    <!--Full width header Start-->
    <div class="full-width-header home8-style4 main-home">
        <!--Header Start-->
        <header id="rs-header" class="rs-header">
            <!-- Menu Start -->
            <div class="menu-area menu-sticky">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-2">
                            <div class="logo-cat-wrap">
                                <div class="logo-part">
                                    <a href="/">
                                        <img class="normal-logo" src="assets/img/logo.png" alt="">
                                        <img class="sticky-logo" src="assets/img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 text-right">
                            <div class="rs-menu-area">
                                <div class="main-menu">
                                    <div class="mobile-menu">
                                        <a class="rs-menu-toggle">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                    </div>
                                    <nav class="rs-menu">
                                        <ul class="nav-menu">
                                            <li class="rs-mega-menu mega-rs menu-item-has-children current-menu-item">
                                                <a href="/">Home</a>

                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="/about">About</a>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a href="/contact">Contact Us</a>
                                            </li>
                                            <li><a href="/gallery">GALLERY</a></li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Login</a>
                                                <ul class="sub-menu">
                                                    <li><a href="/student/login">Student Login</a> </li>
                                                    <li><a href="/adminlogin">Staff Login</a> </li>
                                                </ul>
                                            </li>

                                        </ul> <!-- //.nav-menu -->

                                    </nav>
                                </div> <!-- //.main-menu -->

                            </div>
                        </div>
                        <div class="col-lg-2 text-right">
                            <div class="expand-btn-inner">
                                <ul>




                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Canvas Menu end -->
        </header>
        <!--Header End-->
    </div>

    @yield('content')

</div>
<!-- Main content End -->

<!-- Footer Start -->
<footer id="rs-footer" class="rs-footer home9-style main-home">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <!-- <div class="footer-logo mb-30">
                        <a href="index-2.html"><img src="assets/images/lite-logo.png" alt=""></a>
                    </div> -->
                    <div class="textwidget pr-60 md-pr-15"><p class="white-color">We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of your moment, so blinded by desire those who fail weakness.</p>
                    </div>
                    <ul class="footer_social">
                        <li>
                            <a href="#" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><span><i class="fa fa-twitter"></i></span></a>
                        </li>

                        <li>
                            <a href="#" target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><span><i class="fa fa-google-plus-square"></i></span></a>
                        </li>
                        <li>
                            <a href="#" target="_blank"><span><i class="fa fa-instagram"></i></span></a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <h3 class="widget-title">Address</h3>
                    <ul class="address-widget">
                        <li>
                            <i class="flaticon-location"></i>
                            <div class="desc">Klm, 10 Along Akure/Owo Express Road, Ilu-Abo, Akure LGA Ondo State</div>
                        </li>
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                                <a href="tel:(+234)7084163560">+2347084163560</a>
                            </div>
                        </li>
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                                <a href="tel:(+234)8034756848">+2348034756848</a>
                            </div>
                        </li>
                        <!-- <li>
                            <i class="flaticon-email"></i>
                            <div class="desc">
                                <a href="mailto:support@rstheme.com">support@rstheme.com</a>
                            </div>
                        </li> -->
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 pl-50 md-pl-15 footer-widget md-mb-50">
                    <h3 class="widget-title">Pages</h3>
                    <ul class="site-map">
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    </ul>
                </div>
                <!-- <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                    <h3 class="widget-title">Recent Posts</h3>
                    <div class="recent-post mb-20">
                        <div class="post-img">
                            <img src="assets/images/footer/1.jpg" alt="">
                        </div>
                        <div class="post-item">
                            <div class="post-desc">
                                <a href="#">University while the lovely valley team work</a>
                            </div>
                            <span class="post-date">
                                <i class="fa fa-calendar"></i>
                                September 20, 2020
                            </span>
                        </div>
                    </div>
                    <div class="recent-post mb-20 md-pb-0">
                        <div class="post-img">
                            <img src="assets/images/footer/2.jpg" alt="">
                        </div>
                        <div class="post-item">
                            <div class="post-desc">
                                <a href="#">High school program starting soon 2021</a>
                            </div>
                            <span class="post-date">
                               <i class="fa fa-calendar-check-o"></i>
                                September 14, 2020
                            </span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-6 md-mb-20">
                    <div class="copyright">
                        <p>&copy; 2021 All Rights Reserved. Developed By Oluwatobi & Gideon</p>
                    </div>
                </div>
                <!-- <div class="col-lg-6 text-right md-text-left">
                    <ul class="copy-right-menu">
                        <li><a href="#">Event</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- start scrollUp  -->
<div id="scrollUp" class="orange-color">
    <i class="fa fa-angle-up"></i>
</div>
<!-- End scrollUp  -->

<!-- Search Modal Start -->
<div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span class="flaticon-cross"></span>
    </button>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="search-block clearfix">
                <form>
                    <div class="form-group">
                        <input class="form-control" placeholder="Search Here..." type="text">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal End -->

<!-- modernizr js -->
<script src="{{ asset('assetss/js/modernizr-2.8.3.min.js')}}"></script>
<!-- jquery latest version -->
<script src="{{ asset('assetss/js/jquery.min.js')}}"></script>
<!-- Bootstrap v4.4.1 js -->
<script src="{{ asset('assetss/js/bootstrap.min.js')}}"></script>
<!-- Menu js -->
<script src="{{ asset('assetss/js/rsmenu-main.js')}}"></script>
<!-- op nav js -->
<script src="{{ asset('assetss/js/jquery.nav.js')}}"></script>
<!-- owl.carousel js -->
<script src="{{ asset('assetss/js/owl.carousel.min.js')}}"></script>
<!-- Slick js -->
<script src="{{ asset('assetss/js/slick.min.js')}}"></script>
<!-- isotope.pkgd.min js -->
<script src="{{ asset('assetss/js/isotope.pkgd.min.js')}}"></script>
<!-- imagesloaded.pkgd.min js -->
<script src="{{ asset('assetss/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- wow js -->
<script src="{{ asset('assetss/js/wow.min.js')}}"></script>
<!-- Skill bar js -->
<script src="{{ asset('assetss/js/skill.bars.jquery.js')}}"></script>
<script src="{{ asset('assetss/js/jquery.counterup.min.js')}}"></script>
<!-- counter top js -->
<script src="{{ asset('assetss/js/waypoints.min.js')}}"></script>
<!-- video js -->
<script src="{{ asset('assetss/js/jquery.mb.YTPlayer.min.js')}}"></script>
<!-- magnific popup js -->
<script src="{{ asset('assetss/js/jquery.magnific-popup.min.js')}}"></script>
<!-- plugins js -->
<script src="{{ asset('assetss/js/plugins.js')}}"></script>
<!-- contact form js -->
<script src="{{ asset('assetss/js/contact.form.js')}}"></script>
<!-- main js -->
<script src="{{ asset('assetss/js/main.js')}}"></script>

@yield('js')
</body>

<!-- Mirrored from keenitsolutions.com/products/html/educavo/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 08:05:55 GMT -->
</html>
