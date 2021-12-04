@extends('layouts.app')

@section('title')
    Admin - Students
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            
                <div class="col-md-12 col-lg-12">

                    <div class="table-responsive">
                        <?php $class = session()->get('allstudent');
                        ?>

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
                            @foreach($data as $key)
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




                    {{$data->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
