@extends('app')

@section('pagetitle')

	Book list for user {{$user->firstname .' '. $user->lastname}} 
	@if(Auth::user()->admin)
	<a class = "btn btn-small btn-info" href="{{ URL::to('user/add_book/' . $user->id)}}">Add a new book</a>
	@endif
@stop

@section('content')

<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Title</td>
			<td>Author</td>
			<td>Year</td>
			<td>Genre</td>
			<td>Action</td>
		</tr>
	</thead>

	<tbody>

	@foreach($books as $book)
		<tr>
			<td> {{ $book->id }}</td>
			<td> {{ $book->title }}</td>
			<td> {{ $book->author }}</td>
			<td> {{ $book->year }}</td>
			<td> {{ $book->genre }}</td>
			<td width="150">
			{!! Form::open(array('url' => 'book/drop/' . $book->id , 'method' => 'get')) !!}
			{!! Form::hidden('id', $user->id) !!}
			{!! Form::submit('Dop', array('class' => 'btn btn-warning')) !!}
			{!! Form::close() !!}
			</td>
		</tr>
	@endforeach

	</tbody>

</table>
@if(Auth::user()->admin)
<a class = "btn btn-small btn-success" href="{{ URL::to('user/')}}">Go back</a>
@endif
@stop