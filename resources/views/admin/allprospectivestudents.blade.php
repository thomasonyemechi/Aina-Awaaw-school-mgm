@extends('layouts.app')


@section('title')
    All Prospective Student
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
               
               
            </div>
            <div class="row">
                

                
                <div class="col-md-12 col-lg-12">
                            
                    <div class="table-responsive mt-3">
                        
                        <?php $student = \App\Models\Prostudent::orderby('sn', 'DESC')->paginate(100); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr>
                                <th></th>
                                <th>S/n</th>
                                <th>Id</th>
                                <th colspan="3">Student</th>
                                <th>Pro Class</th>
                                <th>DOB</th>
                                <th>Address</th>
                                <th>Phone</th>
                                
                                
                            </tr>
                           
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($student as $key)
                                @php
                                    $color = ($key->approved == 1) ? 'green' : '';
                                @endphp
                                <tr style="color:{{$color}}">
                                <td><input type="checkbox" name="checkbox[]" class="f" value="{{$key->sn}}"></td>
                                <td>{{$i++}}</td>
                                <td>{{$key->id}}</td>
                                <td colspan="3">{{$key->lastname}} {{$key->firstname}} ({{$key->gender}}) </td>
                                <td>{{classe($key->class)}}</td>
                                <td>{{$key->dob}}</td>
                                <td>{{$key->address}}</td>
                                <td>{{$key->phone}}</td>
                                <td>
                                    @if ($key->edate != '')
                                        {{date('j M Y',$key->edate)}} {{date('h:i:s:a',$key->etime)}}
                                    @endif
                                    </td>
                               
                            </tr>
                            @endforeach
                               
                            </tbody> 
                        </table>
                    </div>
                   
                    
                </div>


            </div>
        </div>
       
    </div>

   



   


@endsection