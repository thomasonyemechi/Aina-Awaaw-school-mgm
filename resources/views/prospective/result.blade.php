<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
        <title> @yield('title') </title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    
        {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />--}}
        <title>Result</title>
    </head>

@php
    $id = session()->get('prospective');
    $tcode = getPro($id, 'tcode');
@endphp
<body>
    <div class="main-wrapper error-wrapper">
        <div class="error-box">
                
            <div class="lock-user">
                <img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" alt="">
                @include('prospective/message')
                <h3>{{getPro($id)}} <br><small>Test Result</small></h3>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th colspan="">Subjects</th>
                            <th>Questions</th>
                            <th>Answered</th>
                            <th>Correct</th>
                        </tr>
                        <?php
                            $ctotal = 0; $cans = 0; $ccorrect = 0; 
                            $subjects = json_decode(getPro($id, 'subjects'));
                            foreach ($subjects as $sub) {

                                if(count(\App\Models\Proresult::where('tcode', $tcode)->where('subject', $sub)->get()) > 0 ){

                                $total = ProGetExamInfo($tcode, $sub, 'total' );
                                $ans = ProGetExamInfo($tcode, $sub, 'ans' );
                                $correct = ProGetExamInfo($tcode, $sub, 'correct' );

                                $ctotal += ProGetExamInfo($tcode, $sub, 'total' );
                                $cans += ProGetExamInfo($tcode, $sub, 'ans' );
                                $ccorrect += ProGetExamInfo($tcode, $sub, 'correct' );
                                
                        ?>
                            <tr>
                                <th>{{subject($sub)}}</th>
                                <td>{{$total}}</td>
                                <td>{{$ans}}</td>
                                <td>{{$correct}}</td>
                            </tr>
                        <?php } } ?>
                            <tr>
                                <th>Total</th>
                                <td>{{$ctotal}}</td>
                                <td>{{$cans}}</td>
                                <td>{{$ccorrect}}</td>
                            </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>


<!-- lock-screen24:03-->
</html>