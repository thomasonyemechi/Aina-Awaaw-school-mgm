<?php
$student = \App\Models\User::where('studentid', studentId())->first();
$image = isset($student->image) ? $student->image : 'user.jpg';

?>
@extends('layouts.studentapp')


@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Student Profile</h4>
                </div>
            </div>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ asset('assets/images/'.$image) }}" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $student->firstname.' '. $student->lastname }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text">{{ $student->email }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Birthday:</span>
                                                <span class="text">{{ date('M dS, Y',$student->dob) }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{ $student->address }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Gender:</span>
                                                <span class="text">{{ ucfirst($student->gender) }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Class:</span>
                                                <span class="text">{{ classe($student->class) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-tabs">
                 <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">Parent's Guardians Information</h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            Father's Information <br><br>
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Name:</span>
                                                    <span class="text">{{ucfirst($student->fathername)}}</span>
                                                </li>
                                                <li>
                                                    <span class="title"> Email:</span>
                                                    <span class="text">{{$student->fatheremail}}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text">{{$student->fatherphone}}</span>
                                                </li>
                                                
                                            </ul>
                                        </div>

                                        <div class="col-lg-4">
                                            Mother's Information <br><br>
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Name:</span>
                                                    <span class="text">{{ucfirst($student->mothername)}}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text">{{$student->motheremail}}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text">{{$student->motherphone}}</span>
                                                </li>
                                                
                                            </ul>
                                        </div>

                                        <div class="col-lg-4">
                                            Guardian's Information <br><br>
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Name:</span>
                                                    <span class="text">{{ucfirst($student->guardianname)}}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text">{{$student->guardianemail}}</span>
                                                </li>
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text">{{$student->guardianphone}}</span>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-box mb-0">
                                    <div class="alert alert-danger" id="error2" style="display: none"></div>
                                    <h3 class="card-title">CBT history</h3>
                                    <div class="experience-box">
                                        <div class="table-responsive">
                                            <?php $result = \App\Models\student\Result::where('id', $student->studentid)->orderby('sn','DESC')->limit(50)->get(); ?>
                                            <table class="table table-border table-striped custom-table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>S/n</th>
                                                    <th>Subject</th>
                                                    <th>Class</th>
                                                    <th>Type</th>
                                                    <th>Term</th>
                                                    <th>Time Spent</th>
                                                    <th>Question</th>
                                                    <th>per(%)</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1 ?>
                                                    @foreach($result as $key)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{subject($key->subject)}}</td>
                                                        <td>{{classe($key->class)}}</td>
                                                        <td>{{type($key->type)}}</td>
                                                        <td>{{term($key->term)}}</td>
                                                        <td>{{number_format(($key->ctime2 - $key->ctime)/60,1)}}</td>
                                                        <td>{{getExamInfo($key->tcode,'total')}} ques, {{getExamInfo($key->tcode,'ans')}} answered, {{getExamInfo($key->tcode,'correct')}} correct </td>
                                                        <td>{{calExamPer($key->tcode)}}</td>                                                    
                                                        <td><button style="border:none" type="button" class="dropdown-item"  data-toggle="modal" data-target="#take{{$key->sn}}">View Exams</button></td>

                                                    </tr>
                                                @endforeach
                                                @if(count($result) == 50)
                                                    <tr> 
                                                        <td colspan="12"> <a href="/student/testhistory" class="btn btn-outline-primary btn-block"> View All Logs </a> </td>
                                                    </tr>
                                                @endif
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

    </div>
@endsection