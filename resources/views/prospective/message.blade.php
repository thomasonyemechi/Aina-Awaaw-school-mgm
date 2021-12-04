@if (count($errors) > 0)
    @foreach($errors as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{$error}}
        </div>
    @endforeach
@endif
@if ($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('success')}}</strong>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <strong>{{session('error')}}</strong>
    </div>
@endif
