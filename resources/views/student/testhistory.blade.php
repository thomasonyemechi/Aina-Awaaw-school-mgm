@extends('layouts.studentapp')


@section('title')
    Test History
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
                    <h4 class="page-title">History</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">



                    <div class="table-responsive">
                        <?php $result = \App\Models\student\Result::where('id', studentId())->orderby('sn','DESC')->paginate(100); ?>
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
                                </tr>
                           


                            @endforeach

                            
                               
                            </tbody>
                        </table>
                        {{$result->links()}}
                    </div>
                </div>




            </div>
        </div>
       
    </div>



@endsection