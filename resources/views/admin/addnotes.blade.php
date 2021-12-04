@extends('layouts.app')

@section('title')
    Add Notes
@endsection

<?php $note = session()->get('note');
    $class = note($note,'classid');
    $subject = note($note,'sid');
    $noteval = session()->has('notevalue')? session()->get('notevalue'): '';
    $learn = session()->has('notelearn')? session()->get('notelearn'): '';
?>

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                {{-- <div class="col-lg-8 col-md-8 offset-10 float-right">
                    <a href="/viewstudents" class="fa fa-info btn btn-primary">View All Student</a>
                </div> --}}
                <div class="col-lg-12">
                    <h4 class="page-title">
                        Add notes for: {{note($note)}}
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="/addNotes" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Week</label>
                                    <select name="week" class="form-control" >
                                        <option disabled selected>Select Week</option>
                                        <?php
                                        $i = 0 ;
                                        while($i < 16){ $i++; ?>
                                            <option value="{{$i}}">Week {{$i}}</option>                                          
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label>What will students Learn</label>
                                <input type="text" name="learn" value="{{$learn}}" class="form-control">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea rows="4" cols="5" name="note" class="form-control summernote" placeholder="Enter your message here"><?php echo $noteval ?></textarea>
                                </div>
                            </div>

                            

                           
                            <div class="col-md-12" style="margin-bottom: 10px">
                                <hr/>
                            </div>
                        </div>
                       
                       
                       
                            <div class="m-t-20 mb-4 text-left">
                                <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                            </div>
                            </form>
                             
                            
                       <form method="post" action="/uploadNote" enctype="multipart/form-data">
                           @csrf
                       <div class="d-flex justify-content-between">
                                    <select name="week" class="form-control mr-1" required>
                                        <option disabled selected>Select Week</option>
                                        <?php
                                        $i = 0 ;
                                        while($i < 16){ $i++; ?>
                                            <option value="{{$i}}">Week {{$i}}</option>                                          
                                        <?php } ?>
                                    </select>
                                    <input type="text" class="form-control mr-1" name="learn" placeholder="What will students Learn" required/>
                                    <input type="file" class="form-control mr-1" name="note" required/>
                                    <button class="btn btn-primary submit-btn" type="submit">Upload Note</button>
                        </div>
                        </form>
                   
                    
                    
                   
                </div>



                <div class="col-md-12 col-lg-12">

                    <div class="table-responsive mt-3">
                        
                        <?php $question = \App\Models\Note::where('class',$class)->where('subject',$subject)->orderby('week', 'ASC')->get(); ?>
                        <table class="table table-border table-striped custom-table datatable mb-0">
                            <thead>
                            <tr><td colspan="12"><em>Recent Notes, click to edit</em></td></tr>
                            <tr>
                                <th></th>
                                <th>S/n</th>
                                <th>week</th>
                                <th>subject/Class</th>
                                <th>Learn</th>
                                <th>Note</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach($question as $key)
                            
                                <tr>
                                <td><input type="checkbox" name="checkbox[]" class="f" value="{{$key->sn}}"></td>
                                <td>{{$i++}}</td>
                                <td><?php echo $key->week ?></td>
                                <td><?php echo subject($key->subject).'/'.classe($key->class) ?></td>
                                <td><?php echo $key->des ?></td>
                                <td><?php echo substr($key->note,0,50) ?></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <form action="/getNotesn" method="post">  
                                                @csrf
                                                <button style="border:none" type="submit" class="dropdown-item" name="notesn" value="{{$key->id}}"><i class="fa fa-pencil m-r-5"></i>Edit</button>                                            
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