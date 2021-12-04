@extends('app')

@section('title')
    Admin Registration
@endsection
@section('content')

        <div class="main-wrapper  account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="/adminstore" method="post" class="form-register">
                        @csrf
                        <div class="account-logo">
                            <a href="#"><img src="{{ asset('assets/img/logo-dark.png') }}" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input name="firstname" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastname" type="text" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label for="phone">Mobile Number</label>
                            <input type="number" name="phone" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control" required>
                        </div>

                        {{-- <div class="form-group checkbox">
                            <label>
                                <input type="checkbox" required> I have read and agree the Terms & Conditions
                            </label>
                        </div> --}}

                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Signup</button>
                        </div>
                        <div class="text-center login-link">
                            Already have an account? <a href="{{ url('/login') }}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
