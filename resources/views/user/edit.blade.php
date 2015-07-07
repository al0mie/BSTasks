@extends('app')

@section('pagetitle')

@stop

@section('content')

	{!! HTML::ul($errors->all()) !!}

	{!! Form::model($user, array('route' =>array('user.update' , $user->id), 'method' => 'PUT')) !!}

	<div class="form-group">
			{!! Form::label('firstName', 'First name') !!}
			{!! Form::text('firstname', Input::old('firstname'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('LastName', 'Last name') !!}
			{!! Form::text('lastname', Input::old('lastname'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('email', 'Email') !!}
			{!! Form::text('email', Input::old('email'), array('class' => 'form-control')) !!}
	</div>

	{!! Form::submit('Save', array('class' => 'btn btn-small btn-primary')) !!}
	<a class = "btn btn-small btn-primary" href="{{ URL::to('user/')}}">Go back</a>
	{!! Form::close() !!}
@stop