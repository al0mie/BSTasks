@extends('app')

@section('pagetitle')
	Edit book  {{$book->title}}
@stop

@section('content')

	{!! HTML::ul($errors->all()) !!}

	{!! Form::model($book, array('route' =>array('book.update' , $book->id), 'method' => 'PUT')) !!}

	<div class="form-group">
			{!! Form::label('title', 'Title') !!}
			{!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('author', 'Author') !!}
			{!! Form::text('author', Input::old('author'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('year', 'Year') !!}
			{!! Form::text('year', Input::old('year'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('genre', 'Genre') !!}
			{!! Form::text('genre', Input::old('genre'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('owner', 'Owner') !!}
		{!! Form::select('owner', $users,  $book->user['id'], ['class' => 'form-control']) !!}
	</div>

	{!! Form::submit('Save ', array('class' => 'btn btn-primary')) !!}
	<a class = "btn btn-small btn-primary" href="{{ URL::to('book/')}}">Go back</a>
	{!! Form::close() !!}
@stop