<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
        <title> @yield('title') </title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    
        {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />--}}

    </head>


<body>
    <div class="main-wrapper error-wrapper">
        <div class="error-box">
            <form action="/prospective/login" method="POST">
                @csrf
                
                <div class="lock-user">
                    <img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" alt="">
                    @include('prospective/message')
                    <h6>Paste your ID to continue</h6>
                </div>
                <div class="form-group">
                    <input class="form-control" name="id" placeholder="Enter ID" type="text">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" >Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>


<!-- lock-screen24:03-->
</html>