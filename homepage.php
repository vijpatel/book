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
	<div>
		<form action="" method="post"><p>Category:
		<?php

	require 'dbconfig/config.php';
	$result = mysqli_query($con,"SELECT * FROM category");

	echo "<select name='cat'>";
	echo "<option name='cat' value='None' selected>--</option> ";
	while ($row = mysqli_fetch_assoc($result)) {
    	echo "<option name='cat' value='" . $row['cat_nm'] . "'>" . $row['cat_nm'] . "</option>";
	}
	echo "</select>";
?>
<input type="submit" name="submit" value="Show">
</p></form>
	</div>
	<?php
	require 'dbconfig/config.php';

    echo "<table>";
    echo "<tr>";
    echo "<th>Sr No</th>";
    echo "<th>Book Cover</th>";
    echo "<th>Book Title</th>";
    echo "<th>Price</th>";
    
    echo "</tr>";
    if (isset($_POST['cat']) and $_POST['cat'] !== "None") {

    $cat_name = $_POST['cat'];
    
    $q = "SELECT * FROM book where b_cat = (SELECT cat_id from category where cat_nm = '$cat_name')";
	$query = mysqli_query($con,$q)  or die(mysqli_error($con));

    $sr_no = 1;
	while($row = mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td>";
            echo "$sr_no";
            $sr_no++;
            echo "</td>";
            echo "<td><img src='$row[b_img]'/></td>";
//            echo "<td><a href='detail.php?id=".$row[b_id]."'>" . $row['b_nm'] . "</a></td>";
            echo '<td><a target=blank href="detail1.php?id='.$row['b_id'].'">'.$row['b_nm'].'</a></td>';
            echo '<td>' . $row['b_price'] . '</td>';
            
            echo '</tr>';
	}
}
else {
    $q = "SELECT * FROM book";
	$query = mysqli_query($con,$q)  or die(mysqli_error($con));

    $sr_no = 1;
	while($row = mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td>";
            echo "$sr_no";
            $sr_no++;
            echo "</td>";
            echo "<td><img src='$row[b_img]'/></td>";
//            echo "<td><a href='detail.php?id=".$row[b_id]."'>" . $row['b_nm'] . "</a></td>";
            echo '<td><a target=blank href="detail1.php?id='.$row['b_id'].'">'.$row['b_nm'].'</a></td>';
          //  echo '<td>' . $row['b_desc'] . '</td>';
            echo '<td>' . $row['b_price'] . '</td>';
            echo '</tr>';
	}

}
	  echo "</table>";
	
	?>
</div>
</body>
</html>