<?php
	require 'dbconfig/config.php';
?>
<?php include('reg_process.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel = "stylesheet" href = "style.css">
	<script src="javascript.js"></script>
</head>
<body style = "background-image:url('img/book.jpg')">
<a href="index.php"><input type="button" id="back_btn" value="<< Back to Login"/><br></a>
	<div id= "title">
		<h1>Online Bookstore</h1>
	</div>

	<div id= "main-wrapper">
		
		<form id="register_form">
					<center><h2>Registration Form</h2>

		</center>

			<div id="error_msg"></div>
			<br><label><b>Name:</b></label><br>
			<input name="name" id="name" type="text" class = "inputvalues" placeholder="Name" required /><br>

			<br><label><b>Gender:</b></label><br>
			<input type="radio" id="gender" name="gender" value="Male"><label> Male</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" id="gender" name="gender" value="Female"><label>Female</label><br>

			<br><div><b>Choose Username:</b><br>
			<input name="username" id="username" type="text" class = "inputvalues" placeholder="Type your Username" required />
			<span></span></div>
			<br>

			<b>Password:</b><br>
			<input name="password" id="password" type="password" class = "inputvalues" placeholder="Type your Password" required/><br>

			<br><label><b>Confirm Password:</b></label><br>
			<input name="cpassword" id="cpassword" type="password" class = "inputvalues" placeholder="Confirm Password" required/><br>
			
			
			<div><button type="button" name="register" id="reg_btn">Register</button></div>
			</div>
			
		</form>

	</div>

</body>
</html>
<script src="jquery-3.2.1.min.js"></script>
<script src="usercheck.js"></script>