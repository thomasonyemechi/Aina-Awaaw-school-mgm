@extends('layouts.app')


@section('title')
    Assign Subject
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div> --}}
                <div class="col-lg-12">
                    <h4 class="page-title">Assign Subject</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 ">
                    <form action="/setSubject" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Teacher <span class="text-danger">*</span></label>
                                    <select name="teacher" class="form-control" required>
                                        <option disabled selected>Select Teacher</option>
                                        <?php 
                                        $teach = \App\Models\Admin::where('level', 5)->get();
                                           foreach ($teach as $key) { ?>
                                            <option value="{{$key->sn}}">{{ucfirst($key->firstname).' '.ucfirst($key->lastname)}}</option>
                                        <?php } ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Class <span class="text-danger">*</span></label>
                                    <select name="class" class="form-control" required>
                                        <option disabled selected>Select Class</option>
                                        <?php 
                                        $class = \App\Models\Classe::orderby('class', 'ASC')->get();
                                           foreach ($class as $key) { ?>
                                            <option value="{{$key->id}}">{{ucfirst($key->class)}}</option>
                                        <?php } ?>
                                        
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Subject <span class="text-danger">*</span></label>
                                    <select name="subject" class="form-control" required >
                                        <option selected disabled>Select Subject</option>
                                        <?php 
                                        $subject = \App\Models\Subject::orderby('subject', 'ASC')->get();
                                           foreach ($subject as $key) { ?>
                                            <option value="{{$key->id}}">{{ucfirst($key->subject)}}</option>
                                        <?php } ?>
                                        
                                    </select>
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



                <div class="col-md-6 col-lg-6">








                    <div class="table-responsive">
                        <?php $set = \App\Models\Setsubject::orderby('id','DESC')->get(); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <tr>
                                <td colspan="12"><em>Teacher will be alble to create/edit notes for subject assigned to them</em></td>
                            </tr>
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Teacher</th>
                                <th>subject</th>
                                <th>Class</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($set as $key)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{getAdmin($key->uid)}}</td>
                                <td>{{subject($key->sid)}}</td>
                                <td>{{classe($key->classid)}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="/deletesetsubject" method="post">
                                                @csrf
                                            <button style="border:none" type="submit" class="dropdown-item" name="id" value="{{$key->id}}"><i class="fa fa-pencil m-r-5"></i>Delete</button>
                                            </form>
          
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>




            </div>
        </div>
       
    </div>

@endsection