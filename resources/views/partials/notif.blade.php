@if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach ($errors->all() as $error)
        {{ $error }} <br/>
        @endforeach
    </div>
@endif

@if ($success = Session::get('success'))
<br>
    <div class="alert alert-success alert-dismissible">
        <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $success }}
    </div>
@endif
