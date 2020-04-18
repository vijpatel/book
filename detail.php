<?php
	session_start();
	require 'dbconfig/config.php';
	$id=$_GET['id'];	
	$q="select * from book where b_id=$id";
	$res=mysqli_query($con,$q) or die("Can't Execute Query..");
	$row=mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $row['b_nm'];?></title>
	<link rel = "stylesheet" href = "style.css">
</head>
<body style = "background-color:#16a085 ">

	<div id= "main-wrapper">
		<center>
			<h2>Home Page</h2>
			<h3>Welcome 
			<?php 
				echo $_SESSION['name'];
			?></h3>
			<h3>Balance : $ <?php echo $_SESSION['balance'];?></h3>
			<img src="img/icon.png" class = "icon">
		</center>
		
		<form class = "myform" action = "homepage.php" method = "post">
		<input name="Home" type="submit" id="home_btn" value="Home"/><br>
		<input name="change_password" type="submit" id="change_btn" value="Change Password"/><br>
		<input name="delete" type="submit" id="delete_btn" value="Delete Account"/><br>
		<input name="logout" type="submit" id="logout_btn" value="Logout"/><br>
	</form>


	</div>

<div class="scroll-data">
								<?php
								
									echo '<table border="0" width="100%">
										 <tr>
											<td><hr color="purple"></td>
										</tr>
										 <tr align="center" bgcolor="#81ecec">
											 <td><h2>Book Details</h2></td>
										</tr>
										<tr></TR>
										
									 </table>
									
									<table border="0"  width="100%" bgcolor="#81ecec">
										<tr> 
											
											<td width="15%" rowspan="3">
												<img src="'.$row['b_img'].'" width="100">
											
											</td>
										</tr>
									
										<tr> 
											<td width="50%" height="100%">
												<table border="0"  width="100%" height="100%">
													<tr valign="top">
														<td align="right" width="10%"><strong>NAME</strong></td>
														<td width="6%">: </td>
														<td align="left">'.$row['b_nm'].'</td>
													</tr><br>

													
																			
													
													
													</table>
								
												
											</td>
										</tr><tr></tr>
									</table>
								
									<table border="0" width="100%">
										 <tr>
											<td><hr color="purple"></td>
										</tr>
										 <tr >
											 <td><h3>DESCRIPTION</h3></td>
										</tr>
													
									 </table>
								
								 '.$row['b_desc'].'
										

								 
								 <tr><td colspan=2><hr color="purple"></td></tr></table>
						 <p align = center><a target="blank" href="'.$row['b_pdf'].'" id="change_btn">Download eBook</a></p>'
							?>
</div>
  	<?php
		if(isset($_POST['Home'])){
			header('location:homepage.php');
		}	
	?>
	<?php 
		if(isset($_POST['logout'])){
			session_destroy();
			header('location:index.php');
		}
	?>
	<?php 
		if(isset($_POST['delete'])){
			require 'dbconfig/config.php';		
        	$result = mysqli_query($con, "DELETE from user WHERE id='" . $_SESSION["id"] . "'");
            if (!$result) {
		        printf("Error: %s\n", mysqli_error($con));
               	echo '<script type="text/javascript"> alert("ERROR OCCURED")</script>';
        		exit();
    		}
    		else {
        	echo '<script type="text/javascript"> alert("DELETED")</script>';
        	session_destroy();
			header('location:index.php');
			echo '<script type="text/javascript"> alert("DELETED")</script>';

    	}	
	}
	?>
	<?php
		if(isset($_POST['change_password'])){
			header('location:change_password.php');
		}	
	?>
</body>
</html>