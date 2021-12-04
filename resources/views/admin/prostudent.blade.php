@extends('layouts.app')


@section('title')
    Add Prospective Student
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="#" class="fa fa-info btn btn-primary">View All Student</a>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Prospective Student</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="/prospective/addStudent" method="post" enctype="multipart/form-data">
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
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="lastname" type="text" required>
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" name="phone" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-6 col-lg-4">
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
                           

                        </div>

                        <div class="col-md-12" style="margin-bottom: 10px">
                            <hr/>
                        </div>
                       
                       
                       
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

                
                <div class="col-md-12 col-lg-12">

                    




                    
                    <form action method="post">
                            
                    <div class="table-responsive mt-3">
                        
                        <?php $student = \App\Models\Prostudent::orderby('sn', 'DESC')->paginate(100); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr>
                                <th></th>
                                <th>S/n</th>
                                <th>Id</th>
                                <th colspan="3">Student</th>
                                <th>Pro Class</th>
                                <th>DOB</th>
                                <th>Address/Phone</th>
                                <th>Exam Date/Time</th>
                                <th class="text-right">Action</th>
                            </tr>
                            <tr>
                                <td colspan="12"><em>Application in green have been approved: student will be able to write exam on the selected date and time</em></td>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($student as $key)
                                @php
                                    $color = ($key->approved == 1) ? 'green' : '';
                                @endphp
                                <tr style="color:{{$color}}">
                                <td><input type="checkbox" name="checkbox[]" class="f" value="{{$key->sn}}"></td>
                                <td>{{$i++}}</td>
                                <td>{{$key->id}}</td>
                                <td colspan="3">{{$key->lastname}} {{$key->firstname}} ({{$key->gender}}) </td>
                                <td>{{classe($key->class)}}</td>
                                <td>{{$key->dob}}</td>
                                <td>{{$key->address}} | {{$key->phone}}</td>
                                <td>
                                    @if ($key->edate != '')
                                        {{date('j M Y',$key->edate)}} {{date('h:i:s:a',$key->etime)}}
                                    @endif
                                    </td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            
                                                @csrf
                                            <!--<button style="border:none" type="submit" class="dropdown-item" name="question" value="{{$key->sn}}"><i class="fa fa-pencil m-r-5"></i>Edit</button>                                            -->
                                            <button style="border:none" type="button" class="dropdown-item" data-toggle="modal" data-target="#addSubject{{$key->sn}}"><i class="fa fa-pencil m-r-5"></i>Add Subject</button>                                            
                                            <button style="border:none" type="button" class="dropdown-item" data-toggle="modal" data-target="#approve{{$key->sn}}"><i class="fa fa-pencil m-r-5"></i>Approve Application</button>                                            
                                                
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                               
                            </tbody> 
                        </table>
                    </div>
                    <div class="float-right mt-2">
                        <button name="action" value="activate" class="btn btn-success">Approve</button>
                        <button name="action" value="deactivate" class="btn btn-danger"> Disapprove</button>
                    </div>
                    </form> 
                </div>





            </div>
        </div>
       
    </div>

    @foreach($student as $key)
        <div class="modal fade" id="addSubject{{$key->sn}}">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title text-bold">Modify Subject for {{$key->lastname}} {{$key->firstname}} </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    <form action="/prospective/selectSubject" method="post" class="row p-1"> 
                        @csrf
                        <div class="col-12">
                            @if($key->subjects != '') @php $msubs = json_decode($key->subjects) @endphp
                                {{ucwords($key->firstname)}}'s Subject ({{count($msubs)}}) : @foreach ($msubs as $msub) {{subject($msub)}} | @endforeach
                                <hr/>
                            @endif
                        </div>

                            

                        <?php
                        $subject = \App\Models\Subject::orderby('subject','ASC')->get();
                        foreach ($subject as $sub) { ?>
                            <div class="col-lg-6 col-md-6 p-1">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" value="{{$sub->id}}" name="subjects[]" class="form-check-input">{{$sub->subject}}
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="sn" value="{{$key->sn}}">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
            </div>
            
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    @endforeach



    @foreach($student as $key)
        <div class="modal fade" id="approve{{$key->sn}}">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title text-bold">Approve Application {{$key->lastname}} {{$key->firstname}} </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    <form action="/prospective/approveApplication" method="POST" class="row p-1"> 
                        @csrf
                        <div class="col-lg-12 col-md-12 mb-2">
                            <em>Candidate will be able to write exam on the selected date and time</em>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-2">
                            Select exam date:
                                <input type="date" class="form-control" name="date" class="form-check-input" required>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-2">
                            Select exam time:
                                <input type="time" class="form-control" name="time" class="form-check-input" required>
                        </div>

                            <input type="hidden" name="sn" value="{{$key->sn}}">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-right">Complete Approval</button>
                        </div>
                    </form>
            </div>
            
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    @endforeach


@endsection