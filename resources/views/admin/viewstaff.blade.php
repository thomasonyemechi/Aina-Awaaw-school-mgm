@extends('layouts.app')

@section('title')
    All Staff
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Staffs</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="/addstaff" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i>Add Staff</a>
                </div>

            </div>
            
                <div class="col-md-12 col-lg-12">








                    <div class="table-responsive">
                    <table class="table table-border table-striped custom-table mb-0">
                        <thead>
                        <tr>
                            <th>S/n</th>
                            <th>FirstName</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;  $data = \App\Models\Admin::orderby('lastname','ASC')->paginate(100); ?>
                           
                            @foreach($data as $key)
                            <tr>
                            <td>{{$i++}} </td>
                            <td>{{$key->firstname}}</td>
                            <td>{{$key->lastname}}</td>
                            <td>{{$key->email}}</td>
                            <td>{{$key->phone}}</td>
                            <td>{{role($key->level)}}  </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="/getStaffId" method="post">
                                            @csrf
                                        <button style="border:none" type="submit" class="dropdown-item" name="staffid" value="{{$key->sn}}"><i class="fa fa-pencil m-r-5"></i>View More Info</button>
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
