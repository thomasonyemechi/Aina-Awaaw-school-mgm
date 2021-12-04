@extends('layouts.app')

@section('title')
    Admin - Dashboard
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3> {{count(\App\Models\Admin::all())}} </h3>
                            <span class="widget-title1">Staff </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{count(\App\Models\User::all())}}</h3>
                            <span class="widget-title2">Students </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{count(\App\Models\Subject::all())}}</h3>
                            <span class="widget-title3">Subjects
                                {{--<i class="fa fa-check" aria-hidden="true"></i>--}}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-book" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{count(\App\Models\Note::all())}}</h3>
                            <span class="widget-title4">Notes
                                {{--<i class="fa fa-check" aria-hidden="true"></i>--}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Recent Notes</h4> <a href="/review" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="d-none">
                                    </thead>
                                    <tbody>
                                        <?php $sub =  \App\Models\Note::orderby('id', 'DESC')->limit(5)->get(); 
                                        foreach ($sub as $ke){ ?>
                                        <tr>
                                            <td style="min-width: 200px;">
                                                <a class="avatar" href="profile.html">{{substr(subject($ke->subject),0,3)}}</a>
                                                <h2><a href="profile.html"> {{subject($ke->subject)}} <span>{{classe($ke->class)}} </span></a></h2>
                                            </td>                 
                                            <td>
                                                <h5 class="time-title p-0">{{ucwords($ke->des)}} </h5>
                                                <p> {{getAdmin($ke->rep)}} </p>
                                            </td>
                                            <td>
                                                <h5 class="time-title p-0">{{date('j M,Y',$ke->ctime)}}</h5>
                                                <p> {{date('h:i a',$ke->ctime)}} </p>
                                            </td>
                                            <td class="text-right">
                                                <a href="/review/{{$ke->subject}}/{{$ke->week}}" class="btn btn-outline-primary take-btn">Review</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0">Staffs</h4>
                        </div>
                        <div class="card-body">
                            <ul class="contact-list">
                                <?php $staff =  \App\Models\Admin::orderby('sn', 'DESC')->limit(7)->get(); 
                                foreach ($staff as $key){ ?>
                                <li>
                                    <div class="contact-cont">
                                        <div class="float-left user-img m-r-10">
                                            <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                        </div>
                                        <div class="contact-info">
                                            <span class="contact-name text-ellipsis">{{getAdmin($key->sn)}} </span>
                                            <span class="contact-date">{{role($key->level)}} </span>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="/viewstaff" class="text-muted">View all staff</a>
                        </div>
                    </div>
                </div>
            </div>

         
        </div>
        
    </div>
@endsection