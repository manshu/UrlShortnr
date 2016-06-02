@extends('layouts')
@section('content')
<div class="dang-middle">    
        <h1>Compress Your Link</h1>
            {!! Form::open(array('url' => 'links')) !!}
        <div class="form-group">
            {!! Form::text('url', null, ['class' => 'form-control', 'id' => 'shorten-input', 'placeholder' => 'http://url.com']) !!}
            @if($errors)
                    <strong>{{ $errors->first('url', 'The url format is invalid' )}}</strong>
            @endif
        </div>
            {{ Form::submit('Click Me!', ['class' => 'btn btn-primary']) }}     
            {!! Form::close() !!}

    <p>
        @if(Session::has('flash_message'))
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h1>{!!   Session::get('flash_message') !!}</h1>
        @endif
    </p>
</div>
@endsection
