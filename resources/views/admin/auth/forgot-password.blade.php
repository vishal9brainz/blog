<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Forget Password</h1>

	<form action="{{ route('post:admin:forgot:password')}}" method="post">

		 {{ csrf_field() }}
		Enter Email:-
		<input type="text" name="email" value="{{ old('email') }}">
		<br>

		{{ $errors->first('email')}}
		
		<input type="submit" name="forget" value="Send Link">
	</form>	

</body>
</html>