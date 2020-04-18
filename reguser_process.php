<?php
  if (isset($_POST['save'])) {
      $db = mysqli_connect('localhost', 'root', '', 'bookstore');

    $name = $_POST['name'];
    $gen = $_POST['gender'];
  	$username = $_POST['username'];
  	$password = $_POST['password'];
    $balance = 200;
echo '<script type="text/javascript"> alert("inserting into dbn $name")</script>';
      $query = "INSERT INTO user(name,username,password,gender,balance) 
            VALUES ('$name','$username', '$password','$gen','$balance')";
      $results = mysqli_query($db, $query);
      if($results)
      {
        echo 'Saved!';

      }
      else
      {
        echo "Error: " . "<br>" .  mysqli_error($conn);
      }
      
  }
?>