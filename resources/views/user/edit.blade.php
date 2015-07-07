@extends('app')

@section('pagetitle')
	Edit user
@stop

@section('content')

	{!! HTML::ul($errors->all) !!}

	{!! Form::model($user, array('route' =>array('users.update' . $user->id), 'method' => 'PUT')) !!}

	<div class="form-group">
			{!! Form::label('FirstName', 'firstname') !!}
			{!! Form::text('firstname', Input::old('firstname'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('LastName', 'lastName') !!}
			{!! Form::text('lastname', Input::old('lastname'), array('class' => 'form-control')) !!}
	</div>

	{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}

	{!! Form::close() !!}
@stop