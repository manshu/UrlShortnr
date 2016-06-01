@extends('layouts')
@section('content')
<div class="dang-middle">    
        <h1>Compress Your Link</h1>
            {!! Form::open(array('url' => 'links')) !!}
        <div class="form-group">
            {!! Form::text('url', null, ['class' => 'form-control', 'id' => 'shorten-input', 'placeholder' => 'http://url.com']) !!}
            {{ $errors->first('url','<div class="error">Message</div>')}}       
        </div>
            {{ Form::submit('Click Me!', ['class' => 'btn btn-primary']) }}     
            {!! Form::close() !!}

    <p>
    @if(Session::has('hashed'))
        <h1>Here you go ...{{ link_to(Session::get('hashed')) }}</h1>
        @endif
    </p>
</div>
@endsection
