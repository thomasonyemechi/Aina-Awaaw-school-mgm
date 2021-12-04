@extends('layouts.studentapp')


@section('title')
    Answer Question
@endsection

@section('content')

@php
    $student = \App\Models\User::where('studentid', studentId())->first();
    $image = isset($student->image) ? $student->image : 'user.jpg';
    $esn = session()->get('esn');
    $tcode = session()->get('tcode');
@endphp

    <div class="page-wrapper">
        <div class="content">
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="{{ asset('assets/images/'.$image) }}" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $student->firstname.' '. $student->lastname }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Test Code:</span>
                                                <span class="text">{{ $tcode }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Test Code:</span>
                                                <span class="text">{{ $tcode }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Address:</span>
                                                <span class="text">{{ $student->address }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Gender:</span>
                                                <span class="text">{{ ucfirst($student->gender) }}</span>
                                            </li>
                                            <li>
                                                <span class="title">Class:</span>
                                                <span class="text">{{ classe($student->class) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 mt-2">
                    

                        <?php $question = \App\Models\Question::where('esn', $esn)->where('status', 1)->orderby('sn','ASC')->paginate(1); ?>
                    
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body ">
                                  <form action="/student/saveanswer" method="POST">@csrf
                                          <?php  $i=1;
                                          $a=1; $b = 0;
                                          $name='custom'.$b;foreach ($question as $row) { $e=$i++; $b=$a++;  //$col = ($row->status==1)?'success':'warning'; ?>
                                              

                                                    <h4 class="card-title">{{subject(esn($esn,'subject'))}} <br><small>Question <?php  echo $e;?></small> </h4>
                                                      <input type="hidden" name="qn{{$e}}" value="{{$row->qn}}">
                                                      <span style="float: left" class="" style="font-size: 21px" >  </span>  <?php  echo trim($row['question']);?>



                                                      <label style="width: 100%; font-weight: normal;" class="m-0" ><span style="float: left"> 
                                                      <input type="radio" value="A" name="custom<?php echo $b; ?>" class="mr-2"></span>  
                                                      <?php  echo ($row['a']);?></label>
                                                  
                                                      
                                                      <label style="width: 100%; font-weight: normal;" class="m-0" >
                                                          <span style="float: left"> <input type="radio" name="custom<?php echo $b; ?>"  value="B"  class="mr-2"></span>
                                                      <?php  echo ucfirst($row['b']);?></label>
                                                  
                                                      
                                                      <label style="width: 100%; font-weight: normal;" class="m-0" >
                                                          <span style="float: left"> <input type="radio"   value="C" name="custom<?php echo $b; ?>"  class="mr-2"></span>
                                                      <?php  echo ucfirst($row['c']);?></label>
                                                  
                                                      <label style="width: 100%; font-weight: normal;" class="m-0" ><span style="float: left"> <input type="radio"  value="D"  name="custom<?php echo $b; ?>"  class="mr-2"></span>
                                                      <?php  echo ucfirst($row['d']);?></label>
                                  
                                      <?php } ?>

                                          <a href="#" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal-default" >Previous</a>
                                          <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-default" >Next</a>
                                          {{-- <a href="#" class="btn btn-primary float-right ml-2" data-toggle="modal" data-target="#modal-default" >Submit Exam</a> --}}
                                  <br>
                                  <br>
                                       <hr>
                                    
                                  <div class="row">
                                    <div class="col-lg-12">
                                        <?php for ($i=0; $i <= 50 ; $i++) { ?>

                                            <a class="avatar" href="profile.html">{{$i}}</a>
    
                                        <?php } ?>
                  
                                    </div>
                                </div>
              
                                      
                              </form>
                              </div><!-- /.d-md-flex -->
                            </div>




                </div>




            </div>
        </div>
       
    </div>


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Submit Exam</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <center>
                    <h5 class="text-center text-bold">Do you really want to Submit?</h5>
                    <button id="exam" class="btn btn-success  mt-5 waves-effect waves-light ">Submit Exam</button>
                </center>
            </div>
          </div>
        </div>
      </div>

    @php
        $time = 30;
        $ctime = Result($tcode, 'ctime')+(60*$time);
        $t = $ctime-time();
    @endphp


      <script type="text/javascript">
       
            $(document).ready(function(){
               // event.preventDefault();
                $(".answer_wrapper").on('change', '.answer', function () {
                    let fieldName = $(this).attr('name');
                    let no = $(this).attr('count');
                    let btn = document.getElementById('btn'+no);
                    if($('input[name='+fieldName+']:checked').val() !== 0){
                        //set the class value of the btn
                        btn.className ='';
                        btn.className = 'btn btn-success';
                    }
                    else{
                        btn.className ='btn btn-danger';
                    }
                })
        
            });
        
            function startTimer(duration, display) {
                let timer = duration, minutes, seconds;
                setInterval(function () {
                    minutes = parseInt(timer / 60, 10)
                    seconds = parseInt(timer % 60, 10);
        
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
        
                    display.textContent = minutes +' mins' + " : " + seconds + ' sec';
        
                   time = --timer;
                   if(time == 300){
                      alert("You Have Five Minutes Left");
                    // document.getElementById('exam').submit();
                   }
                   if(time == 0){
                    $('#exam').click();
                   }
                }, 1000);
            }
        
            let examTime ='<?php echo $t; ?>', display = document.querySelector('#timmer');
            //let examTime = 3000 , display = document.querySelector('#timmer');
            startTimer(examTime, display);
        
        
        </script>


@endsection