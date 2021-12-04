@extends('app')

@section('title')
   Student - Login
@endsection

@section('content')

    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="/student/loginstudent" method="post" class="form-signin">
                        @csrf
                        <div class="account-logo">
                            <a href="#"><img src="{{ asset('assets/img/logo2.png') }}" alt=""></a>
                        </div>
                        <strong>Student login</strong><br><br> 
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" autofocus="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="pass" type="password" name="password" class="form-control" required>
                            <a href="#" id="showPassword" class="float-right text-primary">SHOW</a>
                            <a class="float-left" href="#" data-toggle="modal" data-target="#forgotPassword">Forgot Password?</a>
                        </div>
                       
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form action=""  method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Forgot Password ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Please Enter your Email Address</label>
                                    <input type="email" name="email" class="form-control floating" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        let show = document.getElementById('showPassword');
        let state = false;
        show.addEventListener('click', function (e) {
            e.preventDefault();
            if (!state) {
                document.getElementById('pass').setAttribute('type', 'text');
                state = true;
            } else if(state) {
                state = false;
                document.getElementById('pass').setAttribute('type', 'password')
            }
        })
    </script>
@endsection