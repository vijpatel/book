  	<?php
		if(isset($_POST['Home'])){
			header('location:homepage.php');
		}	
	?>
	<?php 
		if(isset($_POST['logout'])){
			session_start();
 			unset($_SESSION['id']);
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