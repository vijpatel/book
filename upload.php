<?php
	session_start();
	if(!isset($_SESSION['id']))
{
	echo '<script>windows: location="index.php"</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel = "stylesheet" href = "style.css">
	<style type="text/css">
		table
		{
			
			
		}
		td, th {
			  border: 1px solid black;
			  text-align: left;
			  padding: 5px;	
		
}
	</style>
</head>
<body style = "background-color:#16a085 ">

	<div id= "main-wrapper">
		<center>
			<h2>Home Page</h2>
			<h3>Welcome <?php echo $_SESSION['name'];?></h3>
			<h3>Balance : $ <?php echo $_SESSION['balance'];?></h3>
			<img src="img/icon.png" class = "icon">
		</center>
		
	<form class = "myform" action = "process.php" method = "post">
		<input name="Home" type="submit" id="home_btn" value="Home"/><br>
		<input name="change_password" type="submit" id="change_btn" value="Change Password"/><br>
		<input name="delete" type="submit" id="delete_btn" value="Delete Account"/><br>
		<input name="logout" type="submit" id="logout_btn" value="Logout"/><br>
	</form>
	<a  href="upload.php"><input type="button" id="logout_btn" value = "Upload Book"/></a>


	</div>
<div class="scroll-data">
	<form action="upload_process.php" method="post" enctype="multipart/form-data">
		
		<br><label><b>Title:</b></label><br>
		<input name="title" type="text" class = "inputvalues" placeholder="Enter title of the book" required /><br>

		<br><label><b>Select Category:</b></label><br>
		<?php
		require 'dbconfig/config.php';
		$result = mysqli_query($con,"SELECT * FROM category");
		echo "<select name='cat'>";
		echo "<option name='cat' value='None' selected>--</option> ";
		while ($row = mysqli_fetch_assoc($result)) {
    		echo "<option name='cat' value='" . $row['cat_id'] . "'>" . $row['cat_nm'] . "</option>";
		}
		echo "</select>";
		?>

		<label><b><p>Enter Description:</b></label><br>
		<input name="desc" id="desc" type="text" class = "inputvalues" placeholder="Max 250 words" required /></p>

		<label><b><p>Enter Price:</b></label><br>
		<input name="price" id="price" type="text" class = "inputvalues" placeholder="Enter Price" required/></p>

    	<label><b><p>Select Cover File to Upload:</b></label>
    	<input type="file" name="file_image"></p>

    	<label><b><p>Select PDF File to Upload:</b></label>
    	<input type="file" name="file_pdf"><br></p>
    	<br><input type="submit" name="submit" value="Upload">
	</form>
</div>