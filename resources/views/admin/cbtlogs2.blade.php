@extends('layouts.app')
@section('content')
@php
    
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

                                <div class="card-box mb-0">
                                    <div class="alert alert-danger" id="error2" style="display: none"></div>
                                    
                                    
                                
                                    <h3 class="card-title">{{ucfirst(student($student, 'lastname'))}} {{ucfirst(student($student, 'firstname'))}}</h3>
                                    <div class="experience-box mb-4">
                                        <div class="table-responsive">
                                            <?php $result = \App\Models\student\Result::where('id', $student)->orderby('sn','DESC')->paginate(100); ?>
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
                                        </div>
                                    </div>

                                    {{$result->links()}}


                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

    </div>
@endsection