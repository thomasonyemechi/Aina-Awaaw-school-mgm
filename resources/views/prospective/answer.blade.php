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

@php
    $class = $pro->class;
    $subject = $subject;
    $question = $question;
    $ans = pickAnswerPor($pro->tcode,$subject,$class,$question,'myoption');
    $question = \App\Models\Proquestion::where('subject', $subject)->where('qn', $question)->where('class', $class)->where('status', 1)->first(); 

    $array = \App\Models\Proquestion::where('subject', $subject)->where('class', $class)->where('status', 1)->orderby('sn','ASC')->get();
    $arr = [];
    foreach ($array as $k) { $arr[] = $k->qn; }
    $absnum = array_search($question->qn, $arr);


@endphp
<body>
    <div class="main-wrapper error-wrapper">
        <div class="test-box error-box">
            <form action="/prospective/saveAnswer" method="POST" >
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
                            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                                @foreach (json_decode($pro->subjects) as $sub)
                                    @if (count(\App\Models\Proquestion::where('subject', $sub)->where('class', $class)->where('status', 1)->get()) > 0 )
                                        @php
                                            $act = ($subject == $sub) ? 'active' : '';
                                        @endphp
                                        <li class="nav-item"><a class="nav-link {{$act}} " href="/prospective/answerquestion/{{$sub}}/1" >{{subject($sub)}}</a></li>
                                    @endif
                                    
                                @endforeach
                            </ul>

                            <div class="tab-content">

                                    <div class="tab-pane show active" id="subject{{$sub}}">

                                        <?php 
                                          $i=1;
                                          $a=1; $b = 0;
                                          $name='custom'.$b;
                                          ?>
                                              

                                            <h4 class="card-title"><br><small>Question <?php echo $absnum+1;?></small> </h4>
                                            <input type="hidden" name="qn" value="{{$question->qn}}">
                                            <span style="float: left" class="" style="font-size: 21px" >  </span>  <?php  echo trim($question->question);?>
                                            <div class="display-options p-0">
                                                <input type="radio" value="A" id="A" name="custom" {{comp($ans,'A')}} >
                                               <label for="A">{!!$question->a!!}</label>
                                            </div>

                                            <div class="display-options m-0">
                                                <input type="radio" value="B" id="B" name="custom" {{comp($ans,'B')}}>
                                               <label for="B">{!!$question->b!!}</label>
                                            </div>

                                            <div class="display-options">
                                                <input type="radio" value="C" id="C" name="custom" {{comp($ans,'C')}}>
                                               <label for="C">{!!$question->c!!}</label>
                                            </div>
                                            <div class="display-options">
                                                <input type="radio" value="D" id="D" name="custom" {{comp($ans,'D')}}>
                                               <label for="D">{!!$question->d!!}</label>
                                            </div>

                                            <input type="hidden" name="class" value="{{$class}}">
                                            <input type="hidden" name="subject" value="{{$subject}}">
                                            <input type="hidden" name="tcode" value="{{$pro->tcode}}">


                                            <div class="mb-2">
                                                @php
                                                    $c = \App\Models\Proquestion::where('subject', $subject)->where('class', $class)->where('qn','<', $question->qn)->where('status', 1)->get();
                                                @endphp
                                                <button class="btn btn-primary" name="previous" value="previous" type="submit" <?php if(count($c) == 0) { echo 'disabled'; } ?>><< Previous</button>
                                                <button class="btn btn-primary" name="next" value="next" type="submit">Next >></button>
                                            </div>
                                                                            
                                        <div class="mb-2">
                                            <?php
                                                                                       
                                            for ($i=1; $i <= count($arr) ; $i++) { 
                                                $col = (pickAnswerPor($pro->tcode,$subject,$class,$arr[$i-1],'myoption') == '') ? '' : 'green';
                                                ?>
                                                <a class="avatar" style="background-color: {{$col}} " href="/prospective/answerquestion/{{$subject}}/{{$arr[$i-1]}}">{{$i}}</a>
                                            <?php } ?>
                                        </div>


                                    </div>

                            </div>
                            <button class="btn btn-success" type="submit">End Exam</button>

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