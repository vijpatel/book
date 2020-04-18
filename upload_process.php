<?php 
	session_start();
	include 'dbconfig/config.php';
	$title = $_POST['title'];
	$category = $_POST['cat'];
	$description = $_POST['desc'];
	$price = $_POST['price'];
    $uploaded_by = $_SESSION['id'];
	$statusMsg = '';
	if(isset($_POST["submit"])){
		if(!empty($_FILES["file_image"]["name"]) and !empty($_FILES["file_pdf"]["name"])){
// File upload path
			$targetDir_cover = "upload_image/";
			$fileName_cover = basename($_FILES["file_image"]["name"]);
			$targetDir_book = "upload_ebook/";
			$fileName_book = basename($_FILES["file_pdf"]["name"]);
			$targetFilePath_image = $targetDir_cover . $fileName_cover;
			$targetFilePath_book = $targetDir_book . $fileName_book;
			$fileType_cover = pathinfo($targetFilePath_image,PATHINFO_EXTENSION);
			$fileType_book = pathinfo($targetFilePath_book,PATHINFO_EXTENSION);
    // Allow certain file formats
    		$allowTypes_cover = array('jpg','png','jpeg','gif');
    		$allowTypes_book = array('pdf');

    if(in_array($fileType_cover, $allowTypes_cover) and in_array($fileType_book, $allowTypes_book)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file_image"]["tmp_name"], $targetFilePath_image) and move_uploaded_file($_FILES["file_pdf"]["tmp_name"], $targetFilePath_book)){
            // Insert image file name into database
            $insert = $con->query("INSERT into book (b_nm, b_cat, b_desc, b_price, b_img, b_pdf, uploaded_by_id) VALUES ('$title','$category','$description','$price','".$targetFilePath_image."','".$targetFilePath_book."','$uploaded_by')");
            if($insert){
                $statusMsg = "The file ".$fileName_book. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
}

// Display status message
echo '<script type="text/javascript">alert("'.$statusMsg.'")</script>';
echo "<script>location.href='upload.php';</script>";
?>
