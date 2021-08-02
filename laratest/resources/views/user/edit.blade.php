<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
	<form method="post">
	 @csrf
	<table>
	    <!-- <tr>
			<td>ID</td>
				<td><input type="text" name="id"></td>
		</tr>  -->
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" value="{{$user['username']}}"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" value="{{$user['password']}}"></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" value="{{$user['name']}}"></td>
		</tr>
		<tr>
			<td>Type</td>
			<td><input type="text" name="type" value="{{$user['type']}}"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="Submit" value="Update"></td>
		</tr>
	</table>
	</form>
</body>
</html>