@extends('app')

@section('pagetitle')
	Create user
@stop

@section('content')

	{!! HTML::ul($errors->all()) !!}

	{!! Form::open(array('url' => 'user')) !!}

	<div class="form-group">
			{!! Form::label('firstname', 'First name') !!}
			{!! Form::text('firstname', Input::old('firstname'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('lastname', 'Lastname') !!}
			{!! Form::text('lastname', Input::old('lastname'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('email', 'Email') !!}
			{!! Form::text('email', Input::old('email'), array('class' => 'form-control')) !!}
	</div>

	{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
	<a class = "btn btn-small btn-primary" href="{{ URL::to('user/')}}">Go back</a>
	{!! Form::close() !!}
@stop