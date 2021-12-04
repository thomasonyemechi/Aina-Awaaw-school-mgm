@extends('layouts.studentapp')


@section('title')
    View Exam
@endsection

@section('content')

@php
    $class = student(studentId(),'class');
@endphp

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div> --}}
                <div class="col-lg-12">
                    <h4 class="page-title">Take Exams
                        @if(student(studentId(), 'status') == 0) <br>
                            <small>You Are not allowed to write exams , please contact the administrator</small>
                        @endif
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">



                    <div class="table-responsive">
                        <?php $type = \App\Models\Exam::where('class', $class)->orderby('status','desc')->get(); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Type</th>
                                <th>Term</th>
                                <th>No of Qustion</th>
                                <th>Time(min)</th>
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
                                <td>{{countques($key->sn,'qww')}} ({{countques($key->sn,'active')}} active)</td>
                                <td>{{$key->min}}</td>
                                <td class="text-right">
                                    @if($key->status == 1)
                                    <form action method="post">
                                        <button style="border:none" type="button" class="dropdown-item" @if(student(studentId(), 'status') == 0) {{'disabled'}} @endif  data-toggle="modal" data-target="#take{{$key->sn}}">Take Exam</button>
                                    </form>
                                    @endif
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


    @foreach($type as $key)
    <div class="modal fade" id="take{{$key->sn}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-bold">Take Exam?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/student/proceedToExam" method="post">
                    @csrf
                    <center>
                        <h4>Are you sure you want to take exam? </h4><h6> <br> {{esn($key->sn)}} <br> {{countques($key->sn,'active')}} questions for {{$key->min}} mins</h6>
                        <br><button type="button" class="btn btn-danger mt-2" data-dismiss="modal" aria-label="Close">No, Cancel</button>
                        <button type="submot" name="esn" value="{{$key->sn}}" class="btn btn-success mt-2 ml-2">Yes, Proceed</button>
                    </center>
                </form>
          </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach




@endsection