<?php
	session_start();
	if(isset($_SESSION['id']))
{
	echo '<script>windows: location="homepage.php"</script>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel = "stylesheet" href = "style.css">
	<script src="javascript.js"></script>
</head>
<body style = "background-image:url('img/book.jpg')">

	<div id= "title">
		<h1>Online Book store</h1>
	</div>

	<div id= "main-wrapper">
		<center>
			<h2>Login Form</h2>
			<img src="img/icon.png" class = "icon">
		</center>
		
		<form class = "myform" action = "login_process.php" onSubmit="return validate()" method = "post">
		<br><label><b>Username:</b></label><br>
		<input name="username" type="text" class = "inputvalues" placeholder="Type your username"/><br>

		<br><label><b>Password:</b></label><br>
		<input name="password" type="password" class = "inputvalues" placeholder="Type your Password"/><br>

		<input  name="login" type="submit" id="login_btn" value="Login"/>
</form>
		<button onclick="window.location.href = 'register.php';" id="register_btn" value="Register">Register</button><br>
	
</div>

</body>
</html>
