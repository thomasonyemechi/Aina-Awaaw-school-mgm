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
                        Select prospective class to add questions
                    </h4>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 col-lg-12">
                    <form action method="post">
                            
                    <div class="table-responsive mt-3">
                        
                        <?php $class = \App\Models\Classe::orderby('class', 'ASC')->get(); ?>
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
                                <td><?php echo $key->class ?></td>
                                <td class="text-right">
                                    <a href="/question/prospective/{{$key->id}}">click to add question</a>
                                </td>
                            </tr>
                            @endforeach
                               
                            </tbody> 
                        </table>
                    </div>
                    </form> 
                </div>




            </div>
        </div>
       
    </div>
    

@endsection