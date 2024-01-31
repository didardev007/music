@if(session('success'))
    <script>
        swal("Successfully", "{!! session('success') !!}", "success");
    </script>
@elseif(isset($success))
    <script>
        swal("Successfully", "{!! $success !!}", "success");
    </script>
@endif

@if(session('error'))
    <div class="alert alert-danger position-fixed top-0 end-0 m-2 m-sm-3" role="alert" style="z-index:1100;">
        {!! session('error') !!}
    </div>
@elseif(isset($error))
    <div class="alert alert-danger position-fixed top-0 end-0 m-2 m-sm-3" role="alert" style="z-index:1100;">
        {!! $error !!}
    </div>
@elseif($errors->any())
    <div class="alert alert-danger position-fixed top-0 end-0 m-2 m-sm-3" role="alert" style="z-index:1100;">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif