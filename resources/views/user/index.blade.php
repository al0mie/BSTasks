@extends('app')

@section('pagetitle')
User list
@stop

@section('content')
hello
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

			<td width="400">
				<a class = "btn btn-small btn-success" href="{{ URL::to('users/' . $user->id)}}">Show this user</a>
				<a class = "btn btn-small btn-info" href="{{ URL::to('users/' . $user->id . '/edit')}}">Edit this user</a>
			{!! Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right')) !!}
			{!! Form::hidden('_method', 'DELETE') !!}
			{!! Form::submit('Delete this user', array('class' => 'btn btn-warning')) !!}
			{!! Form::close() !!}
			</td>
		</tr>
	@endforeach

	</tbody>


</table>

@stop