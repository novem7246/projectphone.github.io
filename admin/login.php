<?php 

	require_once "connect.php";

	session_start();

	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);


		$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
			$_SESSION['username'] = $username;
			echo "<script>alert('Login Successfully');</script>";
			header("Location: index.php");
		} else {
			echo "<script>alert('Username or Password is incorrect');</script>";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/adminstyle.css">
</head>
<body>

    <center style="margin-top: 2rem;">
        <form method="post" action="login.php">
	
		<table width="400" border="1" align="center">
		
			<tr>
				<td bgcolor="yellow" colspan="4" align=
				"center"><h1>Admin Login form</h1></td>
			</tr>
			
			<tr>
				<td align="right">User Name:</td>
				<td><input type="text" name="username"></td>
			</tr>
			
			<tr>
				<td align="right">User Password:</td>
				<td><input type="password" name="password"></td>
			</tr>
			
			<tr>
				<td colspan="4" align="center"><input type="submit" name="login" value="Login"></td>
			</tr>
	
		</table>
	</form>
    </center>
    
</body>
</html>