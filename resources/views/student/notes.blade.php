@extends('layouts.studentapp')


@section('title')
    All Notes
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
                    <h4 class="page-title">Notes</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">



                    <div class="table-responsive">
                        <?php 
                        $set = \App\Models\Setsubject::where('classid', $class)->orderby('id','desc')->get();
                        foreach ($set as $key) {
                            $subject[] = $key->sid;
                        }
                        $sub = array_unique($subject);
                        ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Topics</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($sub as $key)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{subject($key)}}</td>
                                <td>{{classe($class)}}</td>
                                <td><button class="btn btn-grey" data-toggle="modal" data-target="#take{{$key}}" >Click to View Topics</button></td>
                            </tr> 
                           


                            @endforeach
                               
                            </tbody>
                        </table>
                        
                    </div>
                </div>




            </div>
        </div>
       
    </div>

    


    @foreach($sub as $sub)
    <div class="modal fade" id="take{{$sub}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-bold">Description of: {{subject($sub)}}, {{classe($class)}}  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action method="post">
                    @csrf

                    <?php $o = 1;
                        $not = \App\Models\Note::where('subject', $sub)->where('class', $class)->orderby('week','ASC')->get();
                        foreach ($not as $nt) {                            
                    ?>
                        <center>
                            {{$o++}}. <a href="/student/readnote/{{$sub}}/{{$nt->week}} ">{{ucwords($nt->des)}}</a><br>
                            <small>by: {{getAdmin($nt->rep)}} </small>
                        </center>
                        

                    <?php } ?>
                </form>
          </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach




@endsection