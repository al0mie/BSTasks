@extends('app')

@section('pagetitle')
General user list
@stop

@section('content')
 
<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>FirstName</td>
			<td>LastName</td>
			<td>Email</td>
			<td>Actions</td>
		</tr>
	</thead>

	<tbody>

	@foreach($users as $user)
		<tr>
			<td> {{ $user->id }}</td>
			<td> {{ $user->firstname }}</td>
			<td> {{ $user->lastname }}</td>
			<td> {{ $user->email }}</td>

			<td width="210">
				<a class = "btn btn-small btn-success" href="{{ URL::to('user/' . $user->id)}}">Books</a>
				<a class = "btn btn-small btn-info" href="{{ URL::to('user/' . $user->id.'/edit')}}">Edit</a>

			{!! Form::open(array('url' => 'user/' . $user->id, 'class' => 'pull-right')) !!}
			{!! Form::hidden('_method', 'DELETE') !!}
			{!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
			{!! Form::close() !!}
			</td>
		</tr>
	@endforeach

	</tbody>

</table>
{!! $users->render() !!}
@stop