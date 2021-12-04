@extends('layouts.app')


@section('title')
    Add Exam
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div> --}}
                <div class="col-lg-12">
                    <h4 class="page-title">Add Exam</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-5 ">
                    <form action="/addexam" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <select name="subject"  class="form-control" required>
                                        <option>Select Subject</option>
                                        <?php foreach (\App\Models\Subject::get() as $sub) {
                                            echo '<option value="'.$sub->id.'">'.$sub->subject.'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Term</label>
                                    <select name="term"  class="form-control" required>
                                        <option>Select Term</option>
                                        <option value="1">Fisrt Term</option>
                                        <option value="2">Second Term</option>
                                        <option value="3">Third Term</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Type</label>
                                    <select name="type" class="form-control" required>
                                        <option>Select Exam Type</option>
                                        <?php foreach (\App\Models\Type::get() as $typ) {
                                            echo '<option value="'.$typ->sn.'">'.$typ->examtype.'</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select name="class"  class="form-control" required>
                                        <option>Select Class</option>
                                        <?php foreach (\App\Models\Classe::get() as $cla) {
                                            echo '<option value="'.$cla->id.'">'.$cla->class.'</option>';
                                        } ?>
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



                <div class="col-md-7 col-lg-7">

                        <a href="/viewstudents" class="fa fa-info btn btn-primary float-right">Move to Exam Setup</a>






                    <div class="table-responsive">
                        <form action="/getExamAction" method="post">
                            @csrf
                        <?php $type = \App\Models\Exam::orderby('sn','desc')->get(); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr><td colspan="12"><em>Exams In red color are deactivated: They will not be display for student to answer</em></td></tr>

                            <tr>
                                <th>S/n</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Type</th>
                                <th>Term</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($type as $key)
                                    @php
                                        $color = ($key->status == 0)? 'red' : '';
                                        $ac = ($key->status == 0)?
                                        '<button style="border:none" type="submit" class="dropdown-item" name="status" value="'.$key->sn.'"><i class="fa fa-power-off m-r-5"></i>Activate</button>':
                                        '<button style="border:none" type="submit" class="dropdown-item" name="status" value="'.$key->sn.'"><i class="fa fa-power-off m-r-5"></i>Deactivate</button>';
                                    @endphp
                                <tr style="color:{{$color}};">
                                <td>{{$i++}}</td>
                                <td>{{subject($key->subject)}}</td>
                                <td>{{classe($key->class)}}</td>
                                <td>{{type($key->examtype)}}</td>
                                <td>{{term($key->term)}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="/getesn" method="post">
                                                
                                            <button style="border:none" type="submit" class="dropdown-item" name="esn" value="{{$key->sn}}"><i class="fa fa-pencil m-r-5"></i>Add Question</button>
                                            <?php echo $ac ?>
          
                                        </div>
                                    </div>
                                </td>
                            </tr>
                           


                            @endforeach
                               
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>




            </div>
        </div>
       
    </div>

@endsection