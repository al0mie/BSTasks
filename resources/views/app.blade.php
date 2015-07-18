<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>

<div class="container">
	<nav class = "navbar navbar-inverse">
		<ul class="nav navbar-nav">
		@if(Auth::check())

			@if(Auth::user()->admin)
			<li><a href="{{ URL::to('user')}}">View all users</a></li>
			<li><a href="{{ URL::to('book')}}">View all books</a></li>
			<li><a href="{{ URL::to('user/create')}}">Create user</a></li>
			<li><a href="{{ URL::to('book/create')}}">Create book</a></li>
			@endif	

			<li><a href="{{ URL::to('user/signout')}}">Log out</a></li>
			
		@endif
		</ul>
	</nav>

<h1>@yield('pagetitle')</h1>

@if(Session::has('message'))	
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@yield('content')


</div>
</body>
</html>