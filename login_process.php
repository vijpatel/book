<?php 
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];
	$con = mysqli_connect("localhost", "root", "") or die("Unable to connect" . mysql_error());
	mysqli_select_db($con, "bookstore") or die('Database name is not available!');
	$query = "select * from user WHERE username='$username' AND password='$password'";
	$query_run = mysqli_query($con, $query) or die(mysqli_error($con));
	$row=mysqli_fetch_array($query_run);
	if($row) {

 		$_SESSION['id'] = $row['id'];
 		$_SESSION['name'] = $row['name'];
 		$_SESSION['username'] = $row['username'];
 		$_SESSION['balance'] = $row['balance'];
 		$session=$_SESSION['id'];
		header('location:homepage.php');
	}
	else {
		echo '<script type="text/javascript"> alert("invalid credentials")</script>';
	}
?>