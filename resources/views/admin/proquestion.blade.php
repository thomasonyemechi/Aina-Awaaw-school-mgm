@extends('layouts.app')

@section('title')
    Add Question
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div> --}}
                <div class="col-lg-12">
                    <h4 class="page-title">
                        Add Question for Prospective Student {{classe($class)}}
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {{-- @if (session()->has('question'))@php
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
                    @else --}}
                    <form action="/prospective/submitQuestion" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <select name="subject" class="form-control" required>
                                        <option disabled Selected>..Select Subject</option>
                                        <?php $subject = \App\Models\Subject::get();  foreach($subject as $sub){ ?>
                                            <option value="{{$sub->id}}">{{$sub->subject}}</option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="class" value="{{$class}}">
                                </div>

                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea rows="4" cols="5" name="question" class="form-control summernote" placeholder="Enter your message here">{{old('question')}}</textarea>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option A</label>
                                    <textarea name="a" rows="4" cols="5" class="form-control summernote" placeholder="Option A">{{old('a')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option B</label>
                                    <textarea name="b" rows="4" cols="5" class="form-control summernote" placeholder="Option B">{{old('b')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option C</label>
                                    <textarea name="c" rows="4" cols="5" class="form-control summernote" placeholder="Option C">{{old('c')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Option D</label>
                                    <textarea name="d" rows="4" cols="5" class="form-control summernote" placeholder="Option D">{{old('d')}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <label>Correct Answer</label>
                                    <input type="text" class="form-control" name="ca" value="{{old('ca')}}">
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
                    {{-- @endif --}}
                </div>



                <div class="col-md-12 col-lg-12">

                    




                    
                    <form action method="post">
                            
                    <div class="table-responsive mt-3">
                        
                        <?php $question = \App\Models\Proquestion::where('class', $class)->get(); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr>
                                <td colspan="12"><strong>
                                    <?php $subject = \App\Models\Subject::get();  foreach($subject as $sub){ 
                                        if(coutProQuestion($class, $sub->id) > 0){    
                                      ?>
                                          {{$sub->subject}} : ({{coutProQuestion($class, $sub->id)}} Questions , {{coutProQuestion($class, $sub->id,'Active')}} Active) <big>|</big>
                                      <?php } } ?>
                                </strong></td>
                            </tr>
                            <tr><td colspan="12"><em>Questions In red color are deactivated: They will not be display for student to answer</em></td></tr>
                            <tr>
                                <th></th>
                                <th>S/n</th>
                                <th>Subject</th>
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
                                <td><?php echo subject($key->subject) ?></td>
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
                    {{-- <div class="float-right mt-2">
                        <button name="action" value="activate" class="btn btn-success">Activate Questions</button>
                        <button name="action" value="deactivate" class="btn btn-danger"> Deactivate Questions</button>
                    </div> --}}
                    </form> 
                </div>




            </div>
        </div>
       
    </div>
    

@endsection