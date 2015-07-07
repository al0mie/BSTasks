@extends('app')

@section('pagetitle')
	Add book for user {{$user->firstname . ' ' . $user->lastname}}
@stop

@section('content')

	{!! Form::open(array('url' => 'user/save_book/'. $user->id)) !!}

	<div class="form-group">
		{!! Form::label('owner', 'Owner') !!}
		{!! Form::select('owner', $books,  null, ['class' => 'form-control']) !!}
	</div>

	{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
	 <a class = "btn btn-small btn-primary" href="{{ URL::to('user/')}}">Go back</a> 
	{!! Form::close() !!}
@stop