@extends('layouts.app')


@section('title')
    Add Exam Type
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div> --}}
                <div class="col-lg-12">
                    <h4 class="page-title">Add Exam Type</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 ">
                    <form action="/addtype" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Type <span class="text-danger">*</span></label>
                                    <input class="form-control" name="type" type="text" required>
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
                        <?php $type = \App\Models\Type::get(); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Type</th>
                                <th>Active</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($type as $key)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{$key->examtype}}</td>
                                <td>{{$key->active}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" style="border:none" class="dropdown-item" data-toggle="modal" data-target="#edittype{{$key->sn}}"><i class="fa fa-pencil m-r-5"></i>Edit</a>
                                            
                                           
                                            <form action="/deletetype" method="post">
                                                @csrf
                                                 <button style="border:none" type="submit"  class="dropdown-item" name="deletetype" value="{{$key->sn}}"><i class="fa fa-trash m-r-5"></i>Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            
                          
                                <div class="modal fade" id="edittype{{$key->sn}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Examination Type</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                   <form action="/edittype" method="post">
                                    @csrf
                                  <div class="modal-body">
                                    <input type="text" name="examtype" value="{{$key->examtype}}" class="form-control" required/>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="typesn" value="{{$key->sn}}" class="btn btn-primary">Save</button>
                                  </div>
                                  </form>
                                </div>
                            </div>
                            
                                                        
                                                        
                            
                            
                            
                            
                            
                            
                            
                            @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                

            </div>
        </div>
       
    </div>
    
      

@endsection