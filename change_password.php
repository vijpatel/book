<?php
	session_start();
	require 'dbconfig/config.php';
if (count($_POST) > 0) {
    $result = mysqli_query($con, "SELECT * from user WHERE id='" . $_SESSION["id"] . "'");
        if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($con, "UPDATE user set password='" . $_POST["newPassword"] . "' WHERE id='" . $_SESSION["id"] . "'");
        $message = "Password Changed Successfully";
        echo '<script type="text/javascript"> alert("Password Changed Successfully")</script>';
    } else
        $message = "Current Password is not correct";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel = "stylesheet" href = "style.css">
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</head>
<body style = "background-color:#16a085 ">

	<div id= "main-wrapper">
		<center>
			<h2>Home Page</h2>
			<h3>Welcome 
			<?php 
				echo $_SESSION['name'];
			?></h3>
			<img src="img/icon.png" class = "icon">
		</center>
		<form class = "myform" action = "homepage.php" method = "post">
			<input name="Home" type="submit" id="home_btn" value="Home"/><br>
			<input name="change_password" type="submit" id="change_btn" value="Change Password"/><br>
			<input name="logout" type="submit" id="logout_btn" value="Logout"/><br>
		</form>

	</div>
	    <form name="frmChange" method="post" action="change_password.php"
        onSubmit="return validatePassword()">
        <div style="width: 500px;">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <table border="0" cellpadding="10" cellspacing="0"
                width="500" align="center" class="tblSaveForm">
                <tr class="tableheader">
                    <td colspan="2">Change Password</td>
                </tr>
                <tr>
                    <td width="40%"><label>Current Password</label></td>
                    <td width="60%"><input type="password"
                        name="currentPassword"/><span
                        id="currentPassword" class="required"></span></td>
                </tr>
                <tr>
                    <td><label>New Password</label></td>
                    <td><input type="password" name="newPassword"
                        class="txtField" /><span id="newPassword"
                        class="required"></span></td>
                </tr>
                <td><label>Confirm Password</label></td>
                <td><input type="password" name="confirmPassword"
                    class="txtField" /><span id="confirmPassword"
                    class="required"></span></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit"
                        value="Submit" class="btnSubmit"></td>
                </tr>
            </table>
        </div>
    </form>
	<?php
		if(isset($_POST['Home'])){
			header('location:homepage.php');
		}	
	?>
</body>
</html>