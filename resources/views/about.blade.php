@extends('layouts.home')

@section('css')

@endsection

@section('title')
    About Us
@stop
@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset('assetss/images/breadcrumbs/tobi-1.jpg')}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">About Us</h1>
                <ul>
                    <li>
                        <a class="active" href="index-2.html">Home</a>
                    </li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- About Section Start -->
        <div id="rs-about" class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-last padding-0 md-pl-15 md-pr-15 md-mb-30">
                        <div class="img-part">
                            <img class="" src="{{ asset('assetss/img/IMG_3036.JPG')}}" alt="About Image">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-70 md-pr-15">
                        <div class="sec-title">
                             <div class="sub-title orange"><b>About Aina Awaw</b></div>
                           
                            <div class="bold-text mb-22">Aina Awaw is a school expanding the frontiers of education through modern technology.</div>
                            <div class="text-uppercase"><strong>What makes us stand out</strong></div>
                            <p>1. Nature endowed and friendly teaching environment with Interacting board & projector in all our classrooms</p>
                            <p>2. Intelligent and professional teachers with diverse 21st century oriented teaching methodologies</p>
                            <p>3. Conducive and Serene hostel facilities</p>
                            <p>4. Well equipped laboratories and studios with digital equipments</p>
                            <p>5. Standby generators for all round comfort of students and staff</p>
                            <p>6. All round child development via extra curricular activities</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Section End -->

        <!-- CTA Section Start -->
        <!--<div class="rs-cta style2">-->
        <!--    <div class="partition-bg-wrap inner-page">-->
        <!--        <div class="container">-->
        <!--            <div class="row y-bottom">-->
        <!--                <div class="col-lg-6 pb-50 md-pt-70 md-pb-70">-->
        <!--                    <div class="video-wrap">-->
        <!--                        <img src="{{asset('assetss/img/bus.JPG')}}" alt="">-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-lg-6 pl-62 pt-134 pb-150 md-pt-50 md-pb-50 md-pl-15">-->
        <!--                    <div class="sec-title mb-40 md-mb-20">-->
        <!--                        <h2 class="title mb-16">Admission Always Open</h2>-->
        <!--                        <div class="desc">Admission into Junior Secondary School, Senior Secondary School, JUPEB are currently on</div>-->
        <!--                    </div>-->
        <!--                    <div class="btn-part">-->
        <!--                        <a class="readon2 orange" href="/register">Apply Now</a>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- CTA Section End -->

        <!-- Counter Section Start -->
        <!--<div id="rs-counter" class="rs-counter style2-about pt-100 md-pt-70">-->
        <!--    <div class="container">-->
        <!--        <div class="row couter-area">-->
        <!--            <div class="col-md-4 sm-mb-30">-->
        <!--                <div class="counter-item text-center">-->
        <!--                    <div class="counter-bg">-->
        <!--                        <img src="{{asset('assetss/images/counter/bg1.png')}}" alt="Counter Image">-->
        <!--                    </div>-->
        <!--                    <div class="counter-text">-->
        <!--                        <h2 class="rs-count kplus">2</h2>-->
        <!--                        <h4 class="title mb-0">Students</h4>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-4 sm-mb-30">-->
        <!--                <div class="counter-item text-center">-->
        <!--                    <div class="counter-bg">-->
        <!--                        <img src="{{asset('assetss/images/counter/bg2.png')}}" alt="Counter Image">-->
        <!--                    </div>-->
        <!--                    <div class="counter-text">-->
        <!--                        <h2 class="rs-count percent">100</h2>-->
        <!--                        <h4 class="title mb-0">Results</h4>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-4">-->
        <!--                <div class="counter-item text-center">-->
        <!--                    <div class="counter-bg">-->
        <!--                        <img src="{{asset('assetss/images/counter/bg3.png')}}" alt="Counter Image">-->
        <!--                    </div>-->
        <!--                    <div class="counter-text">-->
        <!--                        <h2 class="rs-count percent">95</h2>-->
        <!--                        <h4 class="title mb-0">Graduates</h4>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Counter Section End -->

        <!-- About Section Start -->
        <div class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 padding-0 md-pl-15 md-pr-15 md-mb-30">
                        <div class="img-part">
                            <img class="" src="{{asset('assetss/img/building.jpg')}}" alt="About Image">
                        </div>
                        <ul class="nav nav-tabs histort-part" id="myTab" role="tablist">
                            <li class="nav-item tab-btns single-history">
                                <a class="nav-link tab-btn active" id="about-history-tab" data-toggle="tab" href="#about-history" role="tab" aria-controls="about-history" aria-selected="true"><span class="icon-part"><i class="flaticon-banknote"></i></span>History</a>
                            </li>
                            <li class="nav-item tab-btns single-history">
                                <a class="nav-link tab-btn" id="about-mission-tab" data-toggle="tab" href="#about-mission" role="tab" aria-controls="about-mission" aria-selected="false"><span class="icon-part"><i class="flaticon-flower"></i></span>Mission & Vission</a>
                            </li>
                            <li class="nav-item tab-btns single-history last-item">
                                <a class="nav-link tab-btn" id="about-admin-tab" data-toggle="tab" href="#about-admin" role="tab" aria-controls="about-admin" aria-selected="false"><span class="icon-part"><i class="flaticon-analysis"></i></span>Administration</a>
                            </li>
                        </ul>
                    </div>
                    <div class="offset-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="tab-content tabs-content" id="myTabContent">
                            <div class="tab-pane tab fade show active" id="about-history" role="tabpanel" aria-labelledby="about-history-tab">
                                <div class="sec-title mb-25">
                                    <h2 class="title">AAIC History</h2>
                                    <div class="desc">Aina Awaw Internatoonal College was founded on Aug 14, 2010. It was first situated at oba ile before
                                        it was later brought to its permanent site along Airport Akure. Aina Awaw was first named Aina Anaw but later changed because
                                     there was a similar school named Segun Anaw, so people were thinking we knew each other. It was then decided to be changed to
                                    Aina Awaw International College</div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="about-mission" role="tabpanel" aria-labelledby="about-mission-tab">
                                <div class="sec-title mb-25">
                                    <h2 class="title">AAIC Mission & Vision</h2>
                                    <div class="desc">
                                        <strong>Our Mission</strong>
                                         <p>Expanding the frontiers of education through modern technologies</p>
                                        <p>Develop students for intellectual and academic independence with a sense of responsibility</p>
                                        <p>Build a conducive professional environment that supports all round development of a child</p>
                                        
                                        
                                        <p>To be a conducive professional environment that supports the intellectual, social, emotional,
                                        and physical development of all students</p>

                                        <strong>Our Vision</strong>
                                        <p>
                                            To be a world class institution of learning where education is redefined to suit individual and societal academic needs
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="about-admin" role="tabpanel" aria-labelledby="about-admin-tab">
                                <div class="sec-title mb-25">
                                    <h2 class="title">AAIC Administration</h2>
                                    <div class="desc">
                                        We have the Proprietor, the principal for secondary school and headmaster for primary school,
                                         a bursar who is in charge of our financial aspect
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Intro Info Tabs-->
                <div class="intro-info-tabs">

                </div>
            </div>
        </div>
        <!-- About Section End -->

        <!-- Team Section Start -->
        <div id="rs-team" class="rs-team style1 orange-color pt-94 pb-100 md-pt-64 md-pb-70 gray-bg">
            <div class="container">
                <div class="sec-title mb-50 md-mb-30">
                    <div class="sub-title orange">Our Educators</div>
                    <h2 class="title mb-0"></h2>
                </div>
                <div class="rs-carousel owl-carousel nav-style2 " data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="true" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="true" data-md-device-dots="false">
                    <div class="">
                        <img src="{{asset('assetss/images/team/10.png')}}" alt="">
                        
                    </div>
                    <div class="">
                        <img src="{{asset('assetss/images/team/11.png')}}" alt="">
                        
                    </div>
                    <div class="">
                        <img src="{{asset('assetss/images/team/12.png')}}" alt="">
                        
                    </div>
                    <div class="">
                        <img src="{{asset('assetss/images/team/13.png')}}" alt="">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Team Section End -->

        <!-- Testimonial Section Start -->
        <div class="rs-testimonial style2 pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 pr-90 md-pr-15 md-mb-30">
                        <div class="donation-part">
                            <img src="assets/images/donor/1.jpg" alt="">
                            <h3 class="title mb-10">Admission is on</h3>
                            <div class="desc mb-38">Do you feel you want to be part of the students or you want your child/ren to become student(s) of Aina Awaw</div>
                            <div class="btn-part">
                                <a class="readon2 orange" href="/register">Apply Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 lg-pl-0 ml--15 md-ml-0">
                        <div class="testi-wrap mb-50">
                            <div class="img-part">
                                <img src="assets/images/testimonial/style2/1.jpg" alt="">
                            </div>
                            <div class="content-part new-content pt-12">
                                <div class="desc">Education is the passport to the future for tomorrow belongs to those who prepare for it today</div>
{{--                                <div class="info">--}}
{{--                                    <h5 class="name">Mahadi mansura</h5>--}}
{{--                                    <div class="designation">Head Teacher</div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="testi-wrap">
                            <div class="img-part">
                                <img src="assets/images/testimonial/style2/2.jpg" alt="">
                            </div>
                            <div class="content-part new-content pt-12">
                                <div class="desc">Education is the passport to the future for tomorrow belongs to those who prepare for it today</div>
{{--                                <div class="info">--}}
{{--                                    <h5 class="name">Jonathon Lary</h5>--}}
{{--                                    <div class="designation">Math Teacher</div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial Section End -->

        <!-- Partner Start -->
{{--        <div class="rs-partner pb-100 md-pb-70">--}}
{{--            <div class="container">--}}
{{--                <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="true" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5" data-md-device-nav="true" data-md-device-dots="false">--}}
{{--                    <div class="partner-item">--}}
{{--                        <a href="#"><img src="assets/images/partner/1.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="partner-item">--}}
{{--                        <a href="#"><img src="assets/images/partner/2.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="partner-item">--}}
{{--                        <a href="#"><img src="assets/images/partner/3.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="partner-item">--}}
{{--                        <a href="#"><img src="assets/images/partner/4.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Partner End -->

        <!-- Newsletter section start -->
        <div class="rs-newsletter style1 orange-color mb--90 sm-mb-0 sm-pb-70">
            <div class="container">
                <div class="newsletter-wrap">
                    <div class="row y-middle">
                        <div class="col-lg-6 col-md-12 md-mb-30">
                            <div class="content-part">
                                <div class="sec-title">
                                    <h2 class="title mb-0 white-color">Subscribe to Newsletter</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <form class="newsletter-form" action="{{ route('newsletter.store') }}" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Enter Your Email" required="">
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter section end -->
    </div>
    <!-- Main content End -->
@endsection
