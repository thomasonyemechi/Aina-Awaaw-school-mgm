@extends('layouts.app')


@section('title')
    Permission Setup
@endsection

@section('content')


    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">Permission Setup</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">


                    <form action="/updatePermission" method="POST">@csrf
                    <div class="table-responsive">
                        <?php $staff = \App\Models\Admin::where('level','<',10)->orderby('lastname','ASC')->paginate(100); ?>
                        <table class="table table-border table-striped custom-table mb-0">
                            <thead>
                            <tr>
                                <th>S/n</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Administrator </th>
                                <th>Teacher</th>
                                <th>Cbt Manager</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($staff as $key)
                                @php
                                $i++;
                                @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{getAdmin($key->sn)}}</td>
                                    <td>{{role($key->level)}}</td>
                                    <td><input type="checkbox" {{pCheck($key->p1)}} class="form" name="admin{{$i}}" value="1"> </td>
                                    <td><input type="checkbox" {{pCheck($key->p2)}} name="teach{{$i}}" value="1"> </td>
                                    <td><input type="checkbox" {{pCheck($key->p3)}} name="cbt{{$i}}" value="1">  <input type="hidden" name="id{{$i}}" value="{{$key->sn}}"> </td>
                                </tr>
                           


                            @endforeach

                            
                               <tr>
                                   <td colspan="12">
                                    Administrator: review notes, assign subjects, check student/staff profile,creating class & subject,review cbt question.  <bR>
                                    Teacher : Uploading of student notes. <br>
                                    CBTs Manager: Creating of exams and uploading of cbt questions. <br>
                                   </td>
                               </tr>
                            </tbody>
                        </table>
                        
                        {{$staff->links()}}
                    </div>
                    <button class="btn btn-primary float-right mt-2">Update Permission</button>
                    </form>
                </div>




            </div>
        </div>
       
    </div>



@endsection