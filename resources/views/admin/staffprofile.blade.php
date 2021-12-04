<?php
$id = session()->has('staffid') ? session()->get('staffid') : adminId();
$staff = \App\Models\Admin::find($id);
$image = isset($staff->image) ? $staff->image : 'user.jpg';


?>
@extends('layouts.app')


@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Student Profile</h4>
                </div>
                @if(getAdmin(adminId(), 'p1') == 1)
                <div class="col-sm-5 col-6 text-right m-b-30">
                    <a href="#" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#EditProfile"><i class="fa fa-plus"></i> Edit Profile</a>
                </div>
                @endif
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
                                            <h3 class="user-name m-t-0 mb-0">{{ $staff->firstname.' '. $staff->lastname }}</h3>
                                            <div class="staff-msg"> 

                                                

                                                @if(getAdmin(adminId(), 'p1') == 1)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Upload Profile Picture
                                                </button>
                                                @endif<br><br>
                                                <a href="#" class="">{{role($staff->level)}} </a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Name:</span>
                                                <span class="text">{{ getAdmin($id) }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text">{{ $staff->email }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Phone:</span>
                                                <span class="text">{{ $staff->phone }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{ $staff->address }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Gender:</span>
                                                <span class="text">{{ $staff->gender }}</span>
                                            </li>
                                            <li>
                                                <span class="title">City:</span>
                                                <span class="text">{{ $staff->city }}</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @if(getAdmin(adminId(), 'p1') == 1)
            <div class="profile-tabs">
                <div class="tab-content">
                   <div class="tab-pane show active" id="about-cont">
                       <div class="row">
                           <div class="col-md-12">
                               <div class="card-box">
                                   <h3 class="card-title">Options</h3>
                                   <div class="row">
                                       <div class="col-lg-12">
                                           <form action="getAdminStatus"  method="post">@csrf

                                               @if($staff->status == 0)
                                               <button type="submit" name="status" value="{{$staff->sn}}"  class="btn btn-success" onclick="return confirm(' Satff will be allowed to Login .')" >Activate Staff</button>
                                                @else
                                               <button type="submit" name="status" value="{{$staff->sn}}" class="btn btn-danger"  onclick="return confirm(' Staff will be prevented from Loging in.')" >Deactivate Staff</button>
                                               @endif
                                           </form>

                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div> 
           </div>
            @endif



            {{-- <div class="row">
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <h4>Recent Notes</h4>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Subject </th>
                                    <th>Week </th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sub = \App\Models\Note::where('rep', $id);  
                                    foreach ($sub as $key) {
                                ?>
                                <tr>
                                    <td>{{$key->note}} </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}


        </div>

    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/updateStaffImg" method="post" enctype="multipart/form-data">
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
                            <input type="hidden" name="staffid" value="{{$staff->sn}}" class="form-control" required/>
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
            <form action="/adminUpdate" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Update Profile </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group"> 
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" value="{{ $staff->firstname }}" name="firstname" type="text" required>
                                    <input class="form-control" value="{{ $staff->sn }}" name="staffid" type="hidden" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="lastname" value="{{ $staff->lastname }}" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" value="{{ $staff->email }}" type="email" required>
                                </div>
                            </div>
                          
                            <div class="col-sm-6">
                                <div class="form-group gender-select">
                                    <label class="gen-label">Gender:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" value="male" @if ($staff->gender == 'male') {{'checked'}}  @endif name="gender" class="form-check-input">Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" value="female"  @if ($staff->gender == 'female') {{'checked'}}  @endif name="gender" class="form-check-input">Female
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control " value="{{ $staff->address }}">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control " value="{{ $staff->phone }}">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control"  value="{{ $staff->city }}" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role" required>
                                        <option selected value="{{ $staff->level }}"> {{ role($staff->level) }} </option>
                                        <option value="9" >Administrator</option>
                                        <option value="2" >CBT Manager</option>
                                        <option value="5" >Teacher</option>
                                    </select>
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