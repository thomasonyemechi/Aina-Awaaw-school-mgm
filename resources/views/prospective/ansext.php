<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
        <title>Answer Question</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    
    </head>


<body>
    <div class="main-wrapper error-wrapper">
        <div class="test-box error-box">
            <form action="/prospective/login" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box" style="background-color: #ebe0e0;">

                            <div class="lock-user">
                                {{-- <img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" alt=""> --}}
                                @include('prospective/message')
                                <h4> {{$pro->lastname}} {{$pro->firstnname}} ({{classe($pro->class)}}) </h4>
                            </div>

                            <h4 class="card-title">Take Exam</h4>
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified" style="display: flex">
                                @foreach (json_decode($pro->subjects) as $sub)
                                    <li class="nav-item"><a class="nav-link" href="#subject{{$sub}}" data-toggle="tab">{{subject($sub)}}</a></li>
                                @endforeach
                            </ul>

                            <div class="tab-content">

                                @foreach (json_decode($pro->subjects) as $sub)
                                    <div class="tab-pane show" id="subject{{$sub}}">
                                        <?php 
                                            $question = \App\Models\Proquestion::where('subject', $sub)->where('qn', 1)->where('status', 1)->orderby('sn','ASC')->get(); ?>
                                        <?php 
                                          $i=1;
                                          $a=1; $b = 0;
                                          $name='custom'.$b;foreach ($question as $row) { $e=$i++; $b=$a++;  //$col = ($row->status==1)?'success':'warning'; ?>
                                              

                                            <h4 class="card-title"><br><small>Question <?php  //echo $absnum+1;?></small> </h4>
                                            <input type="hidden" name="qn" value="{{$row['qn']}}">
                                            <span style="float: left" class="" style="font-size: 21px" >  </span>  <?php  echo trim($row['question']);?>



                                            <label style="width: 100%; font-weight: normal;" class="m-0" >
                                                <span style="float: left"> <input type="radio" value="A" name="custom" class="mr-2" ></span>  
                                            <?php  echo ($row['a']);?></label>
                                        
                                            
                                            <label style="width: 100%; font-weight: normal;" class="m-0" >
                                                <span style="float: left"> <input type="radio" name="custom"  value="B"  class="mr-2" ></span>
                                            <?php  echo ucfirst($row['b']);?></label>
                                        
                                            
                                            <label style="width: 100%; font-weight: normal;" class="m-0" >
                                                <span style="float: left"> <input type="radio"   value="C" name="custom"  class="mr-2" ></span>
                                            <?php  echo ucfirst($row['c']);?></label>
                                        
                                            <label style="width: 100%; font-weight: normal;" class="m-0" >
                                            <span style="float: left"> <input type="radio"  value="D"  name="custom"  class="mr-2" ></span>
                                            <?php  echo ucfirst($row['d']);?></label>
                                  
                                      <?php }// $c = \App\Models\Question::where('esn', $esn)->where('qn','<', $ques)->get();
                                      
                                      ?>




                                            
                                        <div>
                                            <?php
                                            $array = \App\Models\Proquestion::where('subject', $sub)->where('status', 1)->orderby('sn','ASC')->get();
                                            $arr = [];
                                            foreach ($array as $k) { $arr[] = $k->qn; }
                                            
                                            for ($i=1; $i <= count($arr) ; $i++) { 
                                                //$col = (pickAnswer($tcode,$esn,$arr[$i-1],'myoption') == '') ? '' : 'green';
                                                ?>
                                                <a class="avatar" style="background-color: " href="/student/answerquestion?qn= {{$arr[$i-1]}}">{{$i}}</a>
                                            <?php } ?>
                                        </div>
                                        

                                    </div>
                                    {{-- <li class="nav-item"><a class="nav-link active" href="#subject{{$sub}}" data-toggle="tab">{{subject($sub)}}</a></li> --}}
                                @endforeach


                                <div class="tab-pane show active">
                                    what do you want me to do
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            
                
            
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>


<!-- lock-screen24:03-->
</html>