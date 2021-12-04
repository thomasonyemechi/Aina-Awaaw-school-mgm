@extends('layouts.app')


@section('title')
    My Subject
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">My Subject</h4>
                </div>
            </div>
            <div class="row">
                

                <div class="col-md-12 col-lg-12">








                    <div class="table-responsive">
                        <?php $set = \App\Models\Setsubject::where('uid',adminId())->orderby('id','DESC')->get(); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <tr>
                                <td colspan="12"><em>These Are the list of subject and class addigned to you, click to add notes </em></td>
                            </tr>
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>subject</th>
                                <th>Class</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($set as $key)
                                <tr>
                                <td>{{$i++}}</td>
                                <td>{{subject($key->sid)}}</td>
                                <td>{{classe($key->classid)}}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="/getNotes" method="post">
                                                @csrf
                                            <button style="border:none" type="submit" class="dropdown-item" name="note"  value="{{$key->id}}"><i class="fa fa-pencil m-r-5"></i>Add Notes</button>
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