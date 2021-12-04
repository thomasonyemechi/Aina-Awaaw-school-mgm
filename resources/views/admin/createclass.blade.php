@extends('layouts.app')


@section('title')
    Add Student
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div> --}}
                <div class="col-lg-12">
                    <h4 class="page-title">Add Class</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 ">
                    <form action="/ClassCreate" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Class Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="class" type="text" required>
                                </div>
                            </div>
                           
                            <div class="col-md-12" style="margin-bottom: 10px">
                                <hr/>
                            </div>
                        </div>
                       
                       
                       
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>



                <div class="col-md-6 col-lg-6">








                    <div class="table-responsive">
                        <?php $class = \App\Models\Classe::get(); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Class</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($class as $key)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{$key->class}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form method="post" action="/DeleteClass">
                                            @csrf
                                            <button style="border:none" type="submit" class="dropdown-item" name="deleteclass" value="{{$key->id}}"><i class="fa fa-pencil m-r-5"></i>Delete</button>
                                            </form>
          
                                        </div>
                                    </div>
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