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

    </head>


<body>
    <div class="main-wrapper error-wrapper">
        <div class="error-box">
                
            <div class="lock-user">
                <img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" alt="">
                @include('prospective/message')
                <h3>{{$pro->lastname}}</h3>
            </div>
            <div class="mb-3">
                <form action="/prospective/proceedToExam" method="POST">
                    @csrf
                    @if($pro->approved == 1)
                        @if(time() >= $pro->edate)  
                            @php
                                $cke = count(\App\Models\Proresult::where('tcode', $pro->tcode)->where('class', $pro->class)->get())
                            @endphp
                            @if($cke == 0 )
                                <button class="btn btn-primary" type="submit" onclick="return confirm('Confirm to continue.')"> Take Exam</button>
                            @else
                                <a href="/prospective/result" class="btn btn-success" type="submit" > View Result</a>
                            @endif
                        @else
                            <a class="btn btn-primary" id="togglerMe" type="button" href="#">Check Subjects</a>
                        @endif
                    @endif

                    
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Personal Id</th>
                            <td>{{$pro->id}}</td>
                        </tr>
                        <tr>
                            <th>prospective class</th>
                            <td>{{classe($pro->class)}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$pro->gender}}</td>
                        </tr>
                        <tr>
                            <th>Date of birth</th>
                            <td>{{$pro->dob}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$pro->address}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$pro->phone}}</td>
                        </tr>
                        <tr>
                            <th>Test Code</th>
                            <td>@if ($pro->approved == 1) {{$pro->tcode}} @else <em>Pending...</em> @endif</td>
                        </tr>
                        <tr>
                            <th>Exam Date/Time</th>
                            <td>@if ($pro->approved == 1) {{date('j M Y',$pro->edate)}} | {{date('h:i:a',$pro->etime)}} @else <em>Pending...</em> @endif</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <div class="modal fade" id="checkSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Test Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th colspan="">Subject</th>
                                                <th>Question</th>
                                            </tr>
                                            <?php
                                                $ctotal = 0; $cans = 0; $ccorrect = 0; 
                                                $subjects = json_decode($pro->subjects);
                                                if($subjects != ''){
                                                foreach ($subjects as $sub) {
                                                    $ques = \App\Models\Proquestion::where('subject', $sub)->where('class', $pro->class)->get();
                                                    $c = count($ques);

                                                    $ctotal += $c;
                                                    if($c > 0 ){
                                            ?>
                                                <tr>
                                                    <th>{{subject($sub)}}</th>
                                                    <td>{{$c}}</td>
                                                </tr>
                                            <?php } } ?>

                                            <tr>
                                                <th>Total</th>
                                                <td>{{$ctotal}}</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>


<script>
    $(function () {
        $('body').on('click', '#togglerMe', function () {
            $('#checkSubject').modal('show');
        })
    });
</script>


</body>


<!-- lock-screen24:03-->
</html>