@extends('layouts.app')
@section('content')
@php
    $class = session()->get('classid');
@endphp

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Student CBTs Logs</h4>
                </div>
            </div>
            <div class="profile-tabs">
                 <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h3 class="card-title">Select Class To View</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form action="/getClass" method="POST">@csrf
                                               <select name="class" class="form-control" onchange="submit()" >
                                                    <option selected disabled>Select Class ...</option>
                                                    <?php $cla = \App\Models\Classe::orderby('class', 'ASC')->get();
                                                    foreach($cla as $c){  ?> <option value="{{$c->id}}">{{$c->class}} </option> <?php } ?> 
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-box mb-0">
                                    <div class="alert alert-danger" id="error2" style="display: none"></div>
                                    
                                    
                                    
                                    
                                    <?php if(session()->has('classid')){ $cla =  session()->get('classid'); 
                                        $student = \App\Models\User::where('class', $cla )->orderby('lastname','ASC')->paginate(50);
                                        foreach ($student as $key) { $uid = $key->studentid;
                                    ?>
                                    <h3 class="card-title">{{ucfirst(student($key->studentid, 'lastname'))}} {{ucfirst(student($key->studentid, 'firstname'))}} {{classe($class)}} </h3>
                                    <div class="experience-box mb-4">
                                        <div class="table-responsive">
                                            <?php $result = \App\Models\student\Result::where('id', $key->studentid)->orderby('sn','DESC')->limit(10)->get(); ?>
                                            <table class="table table-border table-striped custom-table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>S/n</th>
                                                    <th>Subject</th>
                                                    <th>Class</th>
                                                    <th>Type</th>
                                                    <th>Term</th>
                                                    <th>Time Spent(min)</th>
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
                                                   @if(count($result) == 10)
                                                        <tr> 
                                                            <td colspan="12"> <a href="cbtlog/{{$uid}}" class="btn btn-outline-primary btn-block"> View All Logs </a> </td>
                                                        </tr>
                                                   @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <?php } ?> {{$student->links()}} <?php } ?>
                                    


                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

    </div>
@endsection