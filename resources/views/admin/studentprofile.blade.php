<?php
$student = \App\Models\User::where('studentid', session()->get('studentid'))->first();
$image = isset($student->image) ? $student->image : 'user.jpg';


?>
@extends('layouts.app')


@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Student Profile</h4>
                </div>

                <div class="col-sm-5 col-6 text-right m-b-30">
                    <a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#EditProfile"><i class="fa fa-plus"></i> Edit Profile</a>

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
                                            <div class="staff-msg"> 

                                                


                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Upload Profile Picture
                                                </button>
                                                <a href="#" class=""></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text">{{ $student->email }}</span>
                                            </li>
                                            {{-- <li>
                                                <span class="title">Email:</span>
                                                <span class="text">{{ $student->email }}</span>
                                            </li> --}}
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



                                <div class="col-md-12">
                                    <div class="card-box">
                                        <h3 class="card-title">Options</h3>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form action="getFormRes" method="post">@csrf

                                                    @if($student->status == 0)
                                                    <button type="submit" name="status" value="{{$student->studentid}}"  class="btn btn-success" onclick="return confirm(' Student will be allowed to write CBTs .')" >Activate Student</button>
                                                     @else
                                                    <button type="submit" name="status" value="{{$student->studentid}}" class="btn btn-danger"  onclick="return confirm(' Student will be prevented from writing CBTs.')" >Deactivate Student</button>
                                                    @endif
                                                    <button type="submit" name="promote" value="{{$student->studentid}}" class="btn btn-success" onclick="return confirm(' Student will be promoted.')" >Promote Student</button>
                                                    <button type="submit" name="demote" value="{{$student->studentid}}" class="btn btn-danger" onclick="return confirm(' Student will be demoted.')" >Demote Student</button>
                                                </form>

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
                                                    </tr>
                                               
                    
                    
                                                @endforeach
                                                   
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


    @php
        $std = $student;
    @endphp

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/updateStudentImg" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Profile Picture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="photo" class="form-control" required/>
                            <input type="hidden" name="studentid" value="{{$std->studentid}}" class="form-control" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="EditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <form action="/updateStudent" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Profile </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="firstname" value="{{$std->firstname}}" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Middle Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{$std->middlename}}" name="middlename" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="lastname" value="{{$std->lastname}}" type="text" required>
                                </div>
                            </div>
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" value="{{$std->email}}" type="email" required>
                                </div>
                            </div>
                          
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="cal-icon"> 
                                        <input type="text" min="1970" name="dob" value="{{date('j/m/Y',$std->dob)}}" class="form-control datetimepicker" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username</label>
                                        <input type="text" name="username" value="{{$std->username}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group gender-select">
                                    <label class="gen-label">Gender:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" value="male" @if ($std->gender == 'male') {{'checked'}}  @endif name="gender" class="form-check-input">Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" value="female"  @if ($std->gender == 'female') {{'checked'}}  @endif name="gender" class="form-check-input">Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address"  value="{{$std->address}}"class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control select" name="country">
                                                <option selected value="{{$std->country}}">{{$std->country}}</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="USA">USA</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city" value="{{$std->city}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                          
                          
                            <div class="col-md-12" style="margin-bottom: 10px">
                                <hr/>
                                <h4>Parent / Guardian Information</h4>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Father's Name</label>
                                    <input class="form-control" name="fathername" value="{{$std->fathername}}" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Father's Phone</label>
                                    <input class="form-control" name="fatherphone" value="{{$std->fatherphone}}" type="number">
                                </div>
                            </div>
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Father's Email</label>
                                    <input class="form-control" name="fatheremail" value="{{$std->fatheremail}}" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mother's Name</label>
                                    <input class="form-control" name="mothername" value="{{$std->mothername}}" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mother's Phone</label>
                                    <input class="form-control" name="motherphone" value="{{$std->motherphone}}" type="number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mother's Email</label>
                                    <input class="form-control" name="motheremail" value="{{$std->motheremail}}" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Guardian's Name</label>
                                    <input class="form-control" name="guardianname" value="{{$std->guardianname}}" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Guardian's Phone</label>
                                    <input class="form-control" name="guardianphone" value="{{$std->guardianphone}}" type="number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Guardian's Email</label>  
                                    <input class="form-control" name="guardianemail" value="{{$std->guardianemail}}" type="email">
                                    <input type="hidden" class="form-control" name="studentid" value="{{$std->studentid}}" type="email">
                                </div>
                            </div>
                           
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection