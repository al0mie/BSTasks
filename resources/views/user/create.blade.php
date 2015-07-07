@extends('app')

@section('pagetitle')
	Create user
@stop

@section('content')

	{!! HTML::ul($errors->all) !!}

	{!! Form::open(array('url' => 'users')) !!}

	<div class="form-group">
			{!! Form::label('firstname', 'First name') !!}
			{!! Form::text('firstname', Input::old('firstname'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('LastName', 'Last name') !!}
			{!! Form::text('lastname', Input::old('lastname'), array('class' => 'form-control')) !!}
	</div>

	{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
@stop