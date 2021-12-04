@extends('layouts.app')


@section('title')
    Read Notes
@endsection

@section('content')

@php
@endphp



    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Lesson {{$mal}}: {{mal($note,$mal)}} </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php echo trim(mal($note,$mal,'note')) ?>
                        </div>
                    </div>

                    
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="fixed-bottom  p-3" style="background-col;">
                            @php
                                $ck = \App\Models\Note::where('subject',$note)->where('week', '>', $mal)->first();
                                $nxA = ($ck == '') ? 'disabled' : ''; 
                            @endphp
                            <form action="/review/{{$note}}/{{@$ck->week}}" method="get">
                                <button type="submit" class="btn btn-grey float-right ml-2 " {{$nxA}} >Next</a>
                            </form>


                            @php
                                $ck = \App\Models\Note::where('subject',$note)->where('week', '<', $mal)->first();
                                $prA = ($ck == '') ? 'disabled' : ''; 
                            @endphp
                            <form action="/review/{{$note}}/{{@$ck->week}}" method="get">
                                <button type="submit" class="btn btn-white float-right" {{$prA}} >Previous</a>
                            </form>

                    </div>
                </div>
                
            </div>

            

            
            
        </div>
       
    </div>



@endsection