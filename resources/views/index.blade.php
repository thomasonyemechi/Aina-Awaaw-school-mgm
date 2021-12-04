@extends('layouts.home')

@section('css')

@stop

@section('content')

    <!-- Slider Section Start -->
    <div class="rs-slider main-home">
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0"
             data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
             data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
             data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="1"
             data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="1"
             data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="1" data-md-device-nav="true"
             data-md-device-dots="false">
            <div class="slider-content slide1">
                <div class="container">
                    <div class="content-part">
                        <div class="sl-sub-title wow bounceInLeft" style="color:black;" data-wow-delay="300ms" data-wow-duration="2000ms">Welcome To Aina Awaw</div>
                        <h1 class="sl-title wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">An Institution Dedicated To Impacting Knowledge</h1>
                        <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                            <a class="readon orange-btn main-home" href="/register">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-content slide2">
                <div class="container">
                    <div class="content-part">
                        <div class="sl-sub-title wow bounceInLeft" style="color:black;" data-wow-delay="300ms" data-wow-duration="2000ms">Welcome To Aina Awaw</div>
                        <h1 class="sl-title wow fadeInRight" data-wow-delay="600ms" data-wow-duration="2000ms">An Institution Dedicated To Impacting Knowledge</h1>
                        <div class="sl-btn wow fadeInUp" data-wow-delay="900ms" data-wow-duration="2000ms">
                            <a class="readon orange-btn main-home" href="/register">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section start -->
        <div id="rs-features" class="rs-features main-home">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 md-mb-30">
                        <div class="features-wrap">
                            <div class="icon-part">
                                <img src="{{asset('assetss/images/features/icon/3.png')}}" alt="">
                            </div>
                            <div class="content-part">
                                <h4 class="title">
                                    <span class="watermark">JSS 1 - 3</span>
                                </h4>
                                <p class="dese">
                                    Admission into Junior Secondary School
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 md-mb-30">
                        <div class="features-wrap">
                            <div class="icon-part">
                                <img src="{{asset('assetss/images/features/icon/2.png')}}" alt="">
                            </div>
                            <div class="content-part">
                                <h4 class="title">
                                    <span class="watermark">SSS 1 - 3</span>
                                </h4>
                                <p class="dese">
                                    Admission into Senior Secondary School
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="features-wrap">
                            <div class="icon-part">
                                <img src="{{asset('assetss/images/features/icon/1.png')}}" alt="">
                            </div>
                            <div class="content-part">
                                <h4 class="title">
                                    <span class="watermark">Examinations Offered</span>
                                </h4>
                                <p class="dese">
                                    CHECKPOINT, BECE, SSCE, WASCE & IGSCE
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features Section End -->
    </div>
    <!-- Slider Section End -->


    <!-- Categories Section Start -->
    <div id="rs-categories" class="rs-categories main-home pt-90 pb-100 md-pt-60 md-pb-40">
        <div class="container">
            <div class="sec-title3 text-center mb-45">
                <div class="sub-title">School Activities</div>
                <h2 class="title black-color">The School has a lot of fascinating resources and equipments</h2>
            </div>
            <div class="row mb-35">
                <div class="col-lg-3 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{asset('assetss/img/bus.JPG')}}" alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{asset('assetss/images/categories/main-home/icon/2.png')}}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">School Bus</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{asset('assetss/img/DSC_0717.JPG')}}" alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{asset('assetss/images/categories/main-home/icon/2.png')}}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">Science laboratory</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{asset('assetss/img/DSC_0724 - Copy.JPG')}}" alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{asset('assetss/images/categories/main-home/icon/3.png')}}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">Computer Laboratory</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-30">
                    <div class="categories-items">
                        <div class="cate-images">
                            <a href="#"><img src="{{asset('assetss/img/DSC_1084 - Copy.JPG')}}" alt=""></a>
                        </div>
                        <div class="contents">
                            <div class="img-part">
                                <img src="{{asset('assetss/images/categories/main-home/icon/4.png')}}" alt="">
                            </div>
                            <div class="content-wrap">
                                <h2 class="title"><a href="#">Social /<br>Cultural</a></h2>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!-- Categories Section End -->



    <!-- CTA Section Start -->
    <div class="rs-cta main-home">
        <div class="partition-bg-wrap">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-6"></div>
                    <div class="col-lg-6 pl-70 md-pl-15">
                        <div class="sec-title3 mb-40">
                            <h2 class="title white-color mb-12">We are Open To Applications From Both Local And International Students</h2>
                            <div class="desc white-color pr-100 md-pr-0">Application made easy, potential students seeking admission can fill the form online and make their payments.</div>
                        </div>
                        <div class="btn-part">
                            <a class="readon orange-btn transparent" href="/register">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Section End -->

    <!-- Faq Section Start -->
    <div class="rs-faq-part style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 padding-0">
                    <div class=" main-part">
                        <div class="title mb-40 md-mb-15">
                            <h2 class="text-part">Frequently Asked Questions</h2>
                        </div>
                        <div class="faq-content">
                            <div id="accordion" class="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">What are the requirements ?</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            we have different requirements for different classes, for more info contact us +2348034756848 and we clarify things for you on that
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false">How many classes do you have?</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            We have classes from JSS 1 to SSS 3 for secondary school and KG1 to PRY 6 for our Primaries
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">What is the application process?</a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Click on the Apply Now and Register, after you'd get a call or invitation from us for the next process
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapsefour" aria-expanded="false">Where is the School Situated ?</a>
                                    </div>
                                    <div id="collapsefour" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                          The school is situated at Km, 10 Along Akure/Owo Express Road, Ilu-Abo, Akure LGA Ondo State
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapsefive" aria-expanded="false">Can I apply internationally?</a>
                                    </div>
                                    <div id="collapsefive" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Yes, you can apply anywhere across the world as we don't require your physical presence before we process your admission
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">

                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapsesix" aria-expanded="false">Do you accept Distance Learning?</a>
                                    </div>
                                    <div id="collapsesix" class="collapse" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            Not for now because we would need you to participate in virtually all the activities going on within the school
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 padding-0">
<!--                    <div class="img-part media-icon orange-color">-->
<!--{{--                        <a class="popup-videos" href="https://www.youtube.com/watch?v=atMUy_bPoQI">--}}-->
<!--{{--                            <i class="fa fa-play"></i>--}}-->
<!--{{--                        </a>--}}-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- faq Section Start -->

    <!--<div class="rs-cta style2">-->
    <!--    <div class="partition-bg-wrap inner-page">-->
    <!--        <div class="container">-->
    <!--            <div class="row y-bottom">-->
                    <!--<div class="col-lg-6 pb-50 md-pt-70 md-pb-70">-->
                        <!--<div class="video-wrap">-->
                        <!--    <img src="{{asset('assetss/img/bus.JPG')}}" alt="">-->
                        <!--</div>-->
                    <!--</div>-->
    <!--                <div class="">-->
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

    <!-- Testimonial Section Start -->
    <div class="rs-testimonial main-home pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title3 mb-50 md-mb-30 text-center">
                <div class="sub-title primary">Testimonial</div>
                <h2 class="title white-color">What Students Saying</h2>
            </div>
            <div class="rs-carousel owl-carousel"
                 data-loop="true"
                 data-items="2"
                 data-margin="30"
                 data-autoplay="true"
                 data-hoverpause="true"
                 data-autoplay-timeout="5000"
                 data-smart-speed="800"
                 data-dots="true"
                 data-nav="false"
                 data-nav-speed="false"

                 data-md-device="2"
                 data-md-device-nav="false"
                 data-md-device-dots="true"
                 data-center-mode="false"

                 data-ipad-device2="1"
                 data-ipad-device-nav2="false"
                 data-ipad-device-dots2="true"

                 data-ipad-device="2"
                 data-ipad-device-nav="false"
                 data-ipad-device-dots="true"

                 data-mobile-device="1"
                 data-mobile-device-nav="false"
                 data-mobile-device-dots="false">
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote" src="assets/images/testimonial/main-home/test-2.png" alt="">
                            I love this school infact I learnt a whole lot while in the school. At some point I felt like I shouldn't leave the school but
                            I had no other choice because I had to move on with my education. Smiles... To be sincere I will urge our parents to
                            look out for schools like Aina Awaw for their children because they will never regret it at the long run
                            <img src="assets/images/testimonial/style5/1.png" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Aina Ojo</a>
                        <span class="designation">Alumnus</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote" src="assets/images/testimonial/main-home/test-2.png" alt="">
                            I don't know of other schools because I have not been there but so far and the little I know, Aina Awaw is still the best
                            school with the fascinaing activities and educative programmes that would make you love been in school. Is it the conducive
                            environment or the pattern the teachers uses in teaching, I love Aina Awaw and I will always recommend it to anyone that cross my path
                        </div>
                        <div class="author-img">
                            <img src="assets/images/testimonial/style5/2.png" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Francis Segun Oni</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote" src="assets/images/testimonial/main-home/test-2.png" alt="">
                            As a parent, I will always recommend Aina Awaw to every parent I know because all my four children attended
                            the school and to be honest I saw and still seeing her impacts on them. I never regretted putting my kids in Aina Awaw,
                            I really blessed God the day I knew Aina Awaw school because I wouldn't have ever imagined a  better school for my kids
                        </div>
                        <div class="author-img">
                            <img src="assets/images/testimonial/style5/3.png" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Mrs Dorcas</a>
                        <span class="designation">Parent</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
