@if(session('success'))
    <div class="alert alert-success position-fixed top-0 end-0 m-2 m-sm-3" role="alert" style="z-index:1100;">
        <i class="bi-check-circle-fill"></i> {!! session('success') !!}
    </div>
@elseif(isset($success))
    <div class="alert alert-success position-fixed top-0 end-0 m-2 m-sm-3" role="alert" style="z-index:1100;">
        <i class="bi-check-circle-fill"></i> {!! $success !!}
    </div>
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