<?php
	session_start();
	require 'dbconfig/config.php';
	$user_id = $_SESSION['id'];
	$book_id=$_GET['id'];	
	$q="select * from book where b_id=$book_id";
	$res=mysqli_query($con,$q) or die("Can't Execute Query..");
	$row=mysqli_fetch_assoc($res);
	$upload_id = $row['uploaded_by_id'];
	$p = "SELECT * FROM user WHERE id = $upload_id";
	$result = mysqli_query($con,$p) or die("Can't Execute Query..");
	$row1=mysqli_fetch_assoc($result);
	$r = "SELECT * FROM purchase WHERE book_id = '$book_id' and user_id = '$user_id'";
	$result1 = mysqli_query($con,$r) or die("Can't Execute Query..");
	$rowcount = mysqli_num_rows($result1);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $row['b_nm'];?></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link href="bootstrap.css" rel="stylesheet" id="bootstrap-css">
	<link rel = "stylesheet" href = "style1.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  </head>

  <body>
	
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-4">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="<?php echo $row['b_img']; ?>" /></div>
						</div>						
					</div>
					<div class="details col-md-8">
						<h3 class="product-title"><?php echo $row['b_nm'];?></h3>
						<h5 class="sizes">Uploaded By :
							<span class="size" data-toggle="tooltip" title="small"><?php echo $row1['name'];?></span>
						</h5>

						<p class="product-description"><?php echo $row['b_desc']; ?></p>
						<h4 class="price">Current Price: <span>Rs <?php echo $row['b_price'] ;?></span></h4>
						<div class="action">
							<?php
							if ($rowcount == 0) {?>
								<form onsubmit="return confirm('Are you sure you want to purchase the book <?php echo $row['b_nm'];?> ?');" method="post" action="purchase.php">
									<input type="hidden" name="book_id" value="<?php echo $row['b_id']; ?>"/>
									<input type="hidden" name="upload_id" value="<?php echo $row1['id']; ?>"/>
									<input type="hidden" name="price" value="<?php echo $row['b_price']; ?>"/>
									<input type="submit" name="submit" class="add-to-cart btn btn-default" value="Buy Now"/>
								</form>
							<?php }
							else { 
							echo '<a target="blank" href="file_open.php?file='.$row['b_pdf'].'"><input type="submit" name="submit" class="add-to-cart btn btn-default" value="Download"/></a>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
