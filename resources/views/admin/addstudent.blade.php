@extends('layouts.app')


@section('title')
    Add Student
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Student</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="/submitstudent" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="firstname" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Middle Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="middlename" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="lastname" type="text" required>
                                </div>
                            </div>
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" type="email" required>
                                </div>
                            </div>
                          
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="cal-icon">
                                        <input type="text" min="1970" name="dob" class="form-control datetimepicker" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username</label>
                                        <input type="text" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group gender-select">
                                    <label class="gen-label">Gender:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" value="male" name="gender" class="form-check-input">Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" value="female" name="gender" class="form-check-input">Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control select" name="country">
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="USA">USA</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Class</label>
                                            <select class="form-control" name="class" required>
                                                <option selected disabled>Select Class</option>
                                                <?php $class = \App\Models\Classe::orderby('class','ASC')->get();
                                                    foreach ($class as $key) { ?>
                                                    <option value="{{$key->id}}"> {{$key->class}}</option>
                                                <?php    } ?>
                                                
                                                
                                                </select>
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
                                    <input class="form-control" name="fathername" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Father's Phone</label>
                                    <input class="form-control" name="fatherphone" type="number">
                                </div>
                            </div>
                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Father's Email</label>
                                    <input class="form-control" name="fatheremail" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mother's Name</label>
                                    <input class="form-control" name="mothername" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mother's Phone</label>
                                    <input class="form-control" name="motherphone" type="number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mother's Email</label>
                                    <input class="form-control" name="motheremail" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Guardian's Name</label>
                                    <input class="form-control" name="guardianname" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Guardian's Phone</label>
                                    <input class="form-control" name="guardianphone" type="number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Guardian's Email</label>
                                    <input class="form-control" name="guardianemail" type="email">
                                </div>
                            </div>
                           
                            <div class="col-md-12" style="margin-bottom: 10px">
                                <hr/>
                            </div>
                        </div>
                       
                       
                       
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>

@endsection