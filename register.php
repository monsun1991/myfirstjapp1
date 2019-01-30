<?php 

	session_start();

	$db = mysqli_connect("localhost","root","","crud");
	if (isset($_POST['register_btn'])) 
	{
		$username = ($_POST['username']);
		$email = ($_POST['email']);
		$password = ($_POST['password']);
		$password2 = ($_POST['password2']);


		if ($password == $password2)
		{
			$password = md5($password);
			$sql = "INSERT INTO user(username,email,password) VALUES('$username','$email','$password')";
			mysqli_query($db, $sql);
			$_SESSION['message']="you are now loged in";
			$_SESSION['username']= $username;
			header("location: home.php");
		}
		else
		{
			header("location: register.php? message=Two passwords don't match");
		}
	}





 ?>









<!DOCTYPE HTML>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">


</head>
<body>
<div class="header">
	<h2>Enter Your Details</h2>
</div>
<form method="post" action="register.php">
	
		<div class="box">

            <div class="inputBox">
				<input type="text" name="username" required="">
				<label>Username</label>
			</div>
			<div class="inputBox">
				<input type="text" name="email" required="">
				<label>Email</label>
           
			</div>

			<div class="inputBox">
				<input type="password" name="password" required="">
				<label>Password</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password2" required="">
				<label>Retype Password</label>
			</div>
			<input type="submit" name="register_btn" value="submit">
		</div>
		

	

</form>
</body>
</html>