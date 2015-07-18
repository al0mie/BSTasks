@extends('app')

@section('pagetitle')
	Create book
@stop

@section('content')

	{!! HTML::ul($errors->all()) !!}

	{!! Form::open(array('url' => 'book')) !!}

	<div class="form-group">
			{!! Form::label('Title', 'Title') !!}
			{!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('Author', 'Author') !!}
			{!! Form::text('author', Input::old('author'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('Year', 'Year') !!}
			{!! Form::text('year', Input::old('year'), array('class' => 'form-control')) !!}
	</div>

	<div class="form-group">
			{!! Form::label('Genre', 'Genre') !!}
			{!! Form::text('genre', Input::old('genre'), array('class' => 'form-control')) !!}
	</div>

	{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
		<a class = "btn btn-small btn-primary" href="{{ URL::to('book/')}}">Go back</a>
	{!! Form::close() !!}
@stop