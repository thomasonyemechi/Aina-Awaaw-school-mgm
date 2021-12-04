@extends('layouts.home')

@section('css')

@endsection

@section('title')
    Register
@stop
@section('content')
    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset('assetss/images/breadcrumbs/5.jpg')}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color padding">
                <h1 class="page-title white-color">Register</h1>
                <ul>
                    <li>
                        <a class="active" href="/">Home</a>
                    </li>
                    <li>Register</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Contact Section Start -->
        <div class="contact-page-section pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 pl-60 md-pl-15">
                        <div class="contact-comment-box">
                            <div class="inner-part">
                                <h2 class="title mb-mb-15">Register Now</h2>
                                <p>Feel Free to Supply your information</p>
                            </div>
                            <div id="form-messages"></div>
                            <form method="post" action="/addStudentSelfReg">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <input class="from-control" type="text"  name="firstname" placeholder="First Name" required="">
                                        </div>
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <input class="from-control" type="text" id="lastname" name="lastname" placeholder="Last Name" required="">
                                        </div>
                                        
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <input class="from-control" type="date" id="dob" name="dob" placeholder="Date Of Birth" required="">
                                        </div>
                                        
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option value>Select Gender...</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="col-lg-12 mb-35 col-md-12 col-sm-12">
                                            <select name="class" id="class" class="form-control" required>
                                                <option value>Select Class...</option>
                                                <?php $class = \App\Models\Classe::orderby('class','ASC')->get();
                                                    foreach ($class as $key) { ?>
                                                    <option value="{{$key->id}}"> {{$key->class}}</option>
                                                <?php    } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <input class="from-control" type="text" id="address" name="address" placeholder="Home Address" required="">
                                        </div>
                                        
                                        <div class="col-lg-6 mb-35 col-md-6 col-sm-6">
                                            <input class="from-control" type="number" id="phone" name="phone" placeholder="Phone Number" required="">
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
