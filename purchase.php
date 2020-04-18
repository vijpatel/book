<?php
	session_start();
	if(!isset($_SESSION['id'])) { echo '<script>windows: location="index.php"</script>'; }
	$uploaded_by_id = $_POST['upload_id'];
	$book_id = $_POST['book_id'];
	$price = $_POST['price'];
	$user_id = $_SESSION['id'];
	$balance = $_SESSION['balance'];
	$updated_bal = $balance - $price;

	if ($price < $balance) {
		require 'dbconfig/config.php';
		$query1 = "INSERT INTO purchase(user_id,book_id,purchase_date) VALUES ('$user_id','$book_id', NOW());";
		$query2 = "UPDATE user SET balance = balance - '$price' WHERE id='$user_id';";
		$query3 = "UPDATE user SET balance = balance + '$price' WHERE id='$uploaded_by_id';";

		$result1 = mysqli_query($con,$query1) or die("Can't Execute Query1".mysqli_error($con));
		$result2 = mysqli_query($con,$query2) or die("Can't Execute Query2");
		$result3 = mysqli_query($con,$query3) or die("Can't Execute Query3");
		if ($result1 and $result2 and $result3) {
			$_SESSION['balance'] = $updated_bal;
			echo '<script type="text/javascript">alert("Purchase Successful")</script>';
			echo "<script>location.href='homepage.php';</script>";
		}
		
	}
	else {
		echo '<script type="text/javascript">alert("Unsufficient Balance!")</script>';
		echo "<script>location.href='homepage.php';</script>";	
	}
?>