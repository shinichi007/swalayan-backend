@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br/>
        @endforeach
    </div>
@endif

@if ($success = Session::get('success'))
    <div class="alert alert-success">
        {{ $success }}
    </div>
@endif
