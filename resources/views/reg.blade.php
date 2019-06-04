<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form action="{{ route('check_data')}}" method="post">


	{{ csrf_field() }}
		<!-- <input type="text" name="email" value="{{ old('email') }}"> -->

		<!-- <select name="city">
			
			<option>Select City</option>
			<option value="rajkot">rajkot</option>
			<option value="jamnagar">jamnagar</option>

		</select> -->

		<!-- <input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="Female">Female -->

		<!-- <input type="text" name="check_value"> -->

		

		<input type="submit" name="submit">
			

		{{ $errors->first('hobby')}}

	</form>

</body>
</html>