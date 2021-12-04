@extends('layouts.app')


@section('title')
    View Exam
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div> --}}
                <div class="col-lg-12">
                    <h4 class="page-title">View All Exam</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">







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
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="/getesn" method="post">
                                                
                                            <button style="border:none" type="submit" class="dropdown-item" name="esn" value="{{$key->sn}}"><i class="fa fa-pencil m-r-5"></i>Add Question</button>
                                            <?php echo $ac ?>
                                            <button style="border:none" type="button" class="dropdown-item"  data-toggle="modal" data-target="#EditHour{{$key->sn}}"><i class="fa fa-times m-r-5"></i>Edit Time</button>
          
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


    @foreach($type as $key)
    <div class="modal fade" id="EditHour{{$key->sn}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-bold">Edit Hours</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/getExamAction" method="post">
                    @csrf
                    <center>
                        <h4><small>{{esn($key->sn)}} </small><h4>
                        <h6>How Many minutes should this exam last ({{countques($key->sn,'active')}} questions) </h6>
                        <br>
                          <input type="number" name="min" class="form-control" value="{{$key->min}}">                              
                          {{-- <input type="hidden" name="esntwo" class="form-control" value="">                               --}}
                          <button name="submitMin" value="{{$key->sn}}" class="btn btn-primary mt-2">Submit</button>
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