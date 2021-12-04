@if(Session::has('success'))
    <script type="text/javascript">
        setTimeout(function() {
            $("#refresh").fadeOut(1000);
        }, 3000);
    </script>
    <div id="refresh" class="alert alert-success alert-dismissible"  style="position:fixed; top:50px; right:15px; z-index:10000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i> {{ Session::get('success') }}
    </div>

@endif

@if ($errors->any())
    <script type="text/javascript">
        setTimeout(function() {
            $("#refresh").fadeOut(1000);
        }, 3000);
    </script>
    <div id="refresh" class="alert alert-danger alert-dismissible" style="position:fixed; top:50px; right:15px; z-index:10000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            @foreach($errors->all() as $error)
                <i class="icon fa fa-ban">
                    {{ $error }}
                </i>
                <br/>
            @endforeach
    </div>

@endif

@if (session::has('error'))
    <script type="text/javascript">
        setTimeout(function() {
            $("#refresh").fadeOut(1000);
        }, 3000);
    </script>
    <div id="refresh" class="alert alert-danger alert-dismissible" style="position:fixed; top:50px; right:15px; z-index:10000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-ban">
            {{ session::get('error') }}
        </i>

        </div>

@endif