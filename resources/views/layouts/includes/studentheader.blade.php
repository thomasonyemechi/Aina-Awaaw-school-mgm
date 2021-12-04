<?php $id = studentId(); ?>
<div class="header">
    <div class="header-left">
        <a href="#" class="logo">
            <img src="{{ asset('assets/img/logo2.png') }}" width="35" height="35" alt="">
             <span class="float-left"> {{ student($id,'lastname') }} </span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu float-right">
        
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
                <span></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/student/myprofile">My Profile</a>
                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePassword">Change Password</a> --}}

                <a href="{{ url('/logoutUser') }}" class="dropdown-item" onclick=" event.preventDefault();
                    if(confirm('Are You sure You want to log out?')){
                       document.getElementById('logoutForm').submit();
                    }
                ">Logout</a>
                <form id="logoutForm" action="/logout" method="post" style="display: none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>

    <div class="dropdown mobile-user-menu float-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="">My Profile</a>
            <a class="dropdown-item" href="">Edit Profile</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePassword">Change Password</a>

            <a href="{{ url('/logoutUser') }}" class="dropdown-item" onclick=" event.preventDefault();
                if(confirm('Are You sure You want to log out?')){
                       document.getElementById('logoutForm').submit();
                    }
                ">Logout</a>
            <form id="logoutForm" action="" method="post" style="display: none">
                @csrf
            </form>
        </div>
    </div>
</div>


