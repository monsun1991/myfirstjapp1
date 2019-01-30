



<?php 

	
	session_start();
	$db = mysqli_connect("localhost","root","","crud");
	mysqli_select_db($db,"crud" );

	if (isset($_POST['login_btn'])) 
	
	{
		$username = $_POST['username'];
	
		$password = $_POST['password'];
		
    $sql = "SELECT * from user where username ='$username' AND password='$password' ";
       
       $result = mysqli_query($sql);
       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $active = $row['active'];
       $count = mysqli_num_rows($result);

       if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }

	
      
  }

 ?>













<!doctype html>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Input from Ui Design</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="box" method="post" action="#">
		<h2>Login</h2>
		<form>
			
			<div class="inputBox">
				<input type="text" name="username" required="">
				<label>Username</label>
				
			</div>
			<div class="inputBox">
				<input type="password" name="password" required="">
				<label>Password</label>
				
			</div>
			<input type="submit" name="login_btn" value="submit">
		</form>
		
	</div>

</body>
</html>