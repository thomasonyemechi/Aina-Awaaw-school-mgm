@extends('layouts.home')

@section('css')

@endsection

@section('title')
    Contact Us
@stop
@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset('assetss/images/breadcrumbs/tobi-1.jpg')}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color padding">
                <h1 class="page-title white-color">Contact Us</h1>
                <ul>
                    <li>
                        <a class="active" href="/">Home</a>
                    </li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Contact Section Start -->
        <div class="contact-page-section pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row rs-contact-box mb-90 md-mb-50">
                    <div class="col-lg-4 col-md-12-4 lg-pl-0 sm-mb-30 md-mb-30">
                        <div class="address-item">
                            <div class="icon-part">
                                <img src="{{asset('assetss/images/contact/icon/1.png')}}" alt="">
                            </div>
                            <div class="address-text">
                                <span class="label">Address</span>
                                <span class="des">Klm, 10 Along Akure/Owo Express Road, Ilu-Abo, Akure LGA Ondo State</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30 md-mb-30">
                        <div class="address-item">
                            <div class="icon-part">
                                <img src="{{asset('assetss/images/contact/icon/2.png')}}" alt="">
                            </div>
                            <div class="address-text">
                                <span class="label">Email Address</span>
                                <span class="des"><a href="mailto:info@rstheme.com">info@ainaawaw.com</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 lg-pl-0 sm-mb-30">
                        <div class="address-item">
                            <div class="icon-part">
                                <img src="{{asset('assetss/images/contact/icon/3.png')}}" alt="">
                            </div>
                            <div class="address-text">
                                <span class="label">Phone Number</span>
                                <span class="des"><a href="#">(+234)708 416 3560</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <!--<div class="col-lg-6 md-mb-30">-->
                        <!-- Map Section Start -->
                    <!--    <div class="contact-map3">-->
                    <!--        <iframe src="https://maps.google.com/maps?q=Fort%20Miley&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-lg-12 pl-60 md-pl-15">
                        <div class="contact-comment-box">
                            <div class="inner-part">
                                <h2 class="title mb-mb-15">Get In Touch</h2>
                                <p>Have some suggestions or just want to say hi? Our  support team are ready to help you 24/7.</p>
                            </div>
                            <div id="form-messages"></div>
                            <form method="post" action="{{ route('contact.us.store') }}">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <input class="from-control" type="text" id="name" name="name" placeholder="Name" required="">
                                        </div>
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <input class="from-control" type="text" id="email" name="email" placeholder="Email" required="">
                                        </div>
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <input class="from-control" type="text" id="phone" name="phone" placeholder="Phone" required="">
                                        </div>
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <input class="from-control" type="text" id="subject" name="subject" placeholder="Subject" required="">
                                        </div>

                                        <div class="col-lg-12 mb-50">
                                            <textarea class="from-control" id="message" name="message" placeholder=" Message" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input class="btn-send" type="submit" value="Submit Now">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Section End -->

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
