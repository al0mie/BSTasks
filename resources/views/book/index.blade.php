@extends('app')

@section('pagetitle')
	Book list
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
			<td>Actions</td>
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
			
			<td width="200">
				<a class = "btn btn-small btn-info" href="{{ URL::to('book/' . $book->id.'/edit')}}">Edit</a>
			{!! Form::open(array('url' => 'book/' . $book->id, 'class' => 'pull-right')) !!}
			{!! Form::hidden('_method', 'DELETE') !!}
			{!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
			{!! Form::close() !!}
			</td>
		</tr>
	@endforeach

	</tbody>

</table>
{!! $books->render() !!}
@stop