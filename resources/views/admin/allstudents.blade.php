@extends('layouts.app')

@section('title')
    Admin - Students
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Students</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="/addstudent" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i>Add Students</a>
                </div>
                <div class="col-sm-12 col-12 text-right m-b-20">
                    <div class="card">
                        <form action="/selectclass" method="post">
                            @csrf
                            <select class="form-control" name="class" onchange="submit()">
                                <option selected disabled>Select Class</option>
                                <?php $class = \App\Models\Classe::orderby('class','ASC')->get();
                                    foreach ($class as $key) { ?>
                                    <option value="{{$key->id}}"> {{$key->class}}</option>
                                <?php    } ?>
                                
                                
                             </select>
                        </form>
                    </div>
                
                </div>
            </div>
            
                <div class="col-md-12 col-lg-12">








                    <div class="table-responsive">
                        <?php $data = session()->get('allstudent');
                        if(!empty($data)){
                        ?>

                    <form action="/toGet" method="POST">@csrf
                        <table class="table table-border table-striped custom-table mb-0">
                            <thead>
                            <tr>
                                <th></th>
                                <th>S/n</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Class</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($data as $key)
                                <tr>
                                <td><input type="checkbox" name="id[]" value="{{$key->studentid}} "></td>
                                <td>{{$i++}}</td>
                                <td>{{$key->firstname}}</td>
                                <td>{{$key->middlename}}</td>
                                <td>{{$key->lastname}}</td>
                                <td>{{$key->email}}</td>
                                <td>{{classe($key->class)}}</td>
                                <td class="text-right">
                                    {{-- <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="/getStudent" method="post">
                                                @csrf
                                            <button style="border:none" type="submit" class="dropdown-item" name="studentpro" value="{{$key->studentid}}"><i class="fa fa-pencil m-r-5"></i>View More Info</button>
                                            </form>
                                        </div>
                                    </div> --}}
                                </td>
                            </tr>
                            @endforeach
                               
                            </tbody>
                        </table>
                        <div class="mt-2">
                            <button type="submit" name="promote" value="promote" class="btn btn-success ">Promote</button>
                            <button type="submit" name="demote" value="demote" class="btn btn-danger">Demote</button>
                        </div>
                    </form>




                    {{$data->links()}}












                    <?php }else{ ?>
                   
                        <table class="table table-border table-striped custom-table mb-0">
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Class</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($students as $key)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{$key->firstname}}</td>
                                <td>{{$key->middlename}}</td>
                                <td>{{$key->lastname}}</td>
                                <td>{{$key->email}}</td>
                                <td>{{classe($key->class)}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="/getStudent" method="post">
                                                @csrf
                                            <button style="border:none" type="submit" class="dropdown-item" name="studentpro" value="{{$key->studentid}}"><i class="fa fa-pencil m-r-5"></i>View More Info</button>
                                            </form>
          
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                               
                            </tbody>
                        </table>
                        {{$students->links()}}
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
