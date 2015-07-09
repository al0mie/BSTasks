<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body background="http://api.ning.com/files/zhAjpQX5BZMWSveCty2SQS9QIJoCZL*Xrnt8binb-OChpB2QoABCZV3U4M879Aj3xKX00vzY06LTE4azwQG55BZI3cAwB*vb/1287419187_apple_and_books.jpg">


<div class="container">
	
<p class = "text-center lead">Hello!  Here, you can choose your next action  <br>
	<a class = "btn btn-primary btn-lg" href="{{ URL::to('user/')}}">Go to list of users</a>
	<a class = "btn btn-primary btn-lg" href="{{ URL::to('book/')}}">Go to list of books</a>
</p>
</div>
</body>
</html>