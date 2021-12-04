@extends('layouts.app')


@section('title')
    All Subject
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-title">All Subject</h4>
                </div>
            </div>
            <div class="row">
                

                <div class="col-md-12 col-lg-12">








                    <div class="table-responsive">
                        <?php $set = \App\Models\Setsubject::orderby('id','DESC')->paginate(100); ?>
                        <table class="table table-border table-striped custom-table  mb-0">
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
                                    <button class="btn btn-grey" data-toggle="modal" data-target="#take{{$key->id}}" >Click to View Topics</button>
                                </td>
                            </tr>
                            @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    {{$set->links()}}
                </div>




            </div>
        </div>
       
    </div>
    

    @foreach($set as $key) 
    @php
        $class = $key->classid;
        $sub = $key->sid;
    @endphp
    <div class="modal fade" id="take{{$key->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-bold">Description of: {{subject($sub)}}, {{classe($class)}}  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action method="post">
                    @csrf

                    <?php $o = 1;
                        $not = \App\Models\Note::where('subject', $sub)->where('class', $class)->orderby('week','ASC')->get();
                        foreach ($not as $nt) {                            
                    ?>
                        <center>
                            {{$o++}}. <a href="/review/{{$sub}}/{{$nt->week}} ">{{ucwords($nt->des)}}</a><br>
                            <small>by: {{getAdmin($nt->rep)}} </small>
                        </center>
                        

                    <?php } ?>
                </form>
          </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach


@endsection