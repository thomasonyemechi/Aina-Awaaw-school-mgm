@extends('layouts.app')

@section('title')
    Add Question
@endsection

<?php $esn = session()->get('esn'); ?>

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div> --}}
                <div class="col-lg-12">
                    <h4 class="page-title">
                        @if (session()->has('question'))
                            Update Question for {{esn($esn)}} 
                        @else
                            Add Question for {{esn($esn)}} 
                        @endif
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('question'))@php
                        $question = session()->get('question');
                    @endphp
                    <form action="/updatequestion" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea rows="4" cols="5" name="question" class="form-control summernote" placeholder="Enter your message here">{{question($question)}}</textarea>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option A</label>
                                    <textarea name="a" rows="4" cols="5" class="form-control summernote" placeholder="Option A">{{question($question,'a')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option B</label>
                                    <textarea name="b" rows="4" cols="5" class="form-control summernote" placeholder="Option B">{{question($question,'b')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option C</label>
                                    <textarea name="c" rows="4" cols="5" class="form-control summernote" placeholder="Option C">{{question($question,'c')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option D</label>
                                    <textarea name="d" rows="4" cols="5" class="form-control summernote" placeholder="Option D">{{question($question,'d')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <input type="text" class="form-control" name="ca" value="{{question($question,'ca')}}">
                                </div>
                            </div>

                           
                            <div class="col-md-12" style="margin-bottom: 10px">
                                <hr/>
                            </div>
                        </div>
                       
                       
                       
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" type="submit">Update</button>
                        </div>
                    </form>
                    @else
                    <form action="/submitQuestion" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea rows="4" cols="5" name="question" class="form-control summernote" placeholder="Enter your message here"></textarea>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option A</label>
                                    <textarea name="a" rows="4" cols="5" class="form-control summernote" placeholder="Option A"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option B</label>
                                    <textarea name="b" rows="4" cols="5" class="form-control summernote" placeholder="Option B"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option C</label>
                                    <textarea name="c" rows="4" cols="5" class="form-control summernote" placeholder="Option C"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option D</label>
                                    <textarea name="d" rows="4" cols="5" class="form-control summernote" placeholder="Option D"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <input type="text" class="form-control" name="ca">
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
                    @endif
                </div>



                <div class="col-md-12 col-lg-12">







                    <form action="/getAction" method="post">
                    <div class="table-responsive mt-3">
                        
                        <?php $question = \App\Models\Question::where('esn', $esn)->get(); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr><td colspan="12"><em>Questions In red color are deactivated: They will not be display for student to answer</em></td></tr>
                            <tr>
                                <th></th>
                                <th>S/n</th>
                                <th>Question</th>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>Correct Answer</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($question as $key)
                                @php
                                    $color = ($key->status == 0)? 'red' : '';
                                @endphp
                                <tr style="color:{{$color}};">
                                <td><input type="checkbox" name="checkbox[]" class="f" value="{{$key->sn}}"></td>
                                <td>{{$i++}}</td>
                                <td><?php echo $key->question ?></td>
                                <td><?php echo $key->a ?></td>
                                <td><?php echo $key->b ?></td>
                                <td><?php echo $key->c ?></td>
                                <td><?php echo $key->d ?></td>
                                <td><?php echo strtoupper($key->ca) ?></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            
                                                @csrf
                                            <button style="border:none" type="submit" class="dropdown-item" name="question" value="{{$key->sn}}"><i class="fa fa-pencil m-r-5"></i>Edit</button>                                            
                                                
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                               
                            </tbody> 
                        </table>
                    </div>
                    <div class="float-right mt-2">
                        <button name="action" value="activate" class="btn btn-success">Activate Questions</button>
                        <button name="action" value="deactivate" class="btn btn-danger"> Deactivate Questions</button>
                    </div>
                    </form> 
                </div>




            </div>
        </div>
       
    </div>
    

@endsection