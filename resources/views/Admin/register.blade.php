<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registraion Page</title>
</head>
<body>

	<form method="post" action="/admin/registration">
        {{csrf_field()}}
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<fieldset >
			<legend width=100%>Registraion</legend>
			<table>
	
			
				<tr>
					<td>Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="email" name="email"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
                <tr>
					<td>Confirm-Password</td>
					<td><input type="password" name="confirmation"></td>
				</tr>
				<tr>
					<td>Type</td>
					<td><input type="text" name="type"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="submit">
						<a href="/admin/login">Log in</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

    <div>
        @foreach($errors->all() as $error)
            {{$error}}<br>
        @endforeach
        </div>
</body>
</html>