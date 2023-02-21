@if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br/>
        @endforeach
    </div>
@endif
@if ($success = Session::get('success') && count($success) > 0)
    <div class="alert alert-success">
        @foreach ($success as $s)
        {{ $s }} <br/>
        @endforeach
    </div>
@endif
