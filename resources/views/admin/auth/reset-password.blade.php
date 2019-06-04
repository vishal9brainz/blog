<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

Password Update form
	


	<form method="post" action="{{ route('post:admin:reset:password', $user->id) }}">
		{{ csrf_field() }}

		Enter Password:-<input type="text" name="password"><br>
		Enter Confirm Password:-<input type="text" name="confirm"><br>


		{{ $errors->first('password')}}
		{{ $errors->first('confirm')}}
		<input type="submit" name="update_password" value="update_password">

	</form>

</body>
</html>