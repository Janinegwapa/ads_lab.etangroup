<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="global-container" style="width: 26%; margin:auto;margin-top: 90px;">
		<div class="card login-form">
				<div class="card-body">
					<h3 class="card-title text-center">Sign Up</h3>
					<div class="card-text">
					<form action="" method="POST" enctype="multipart/form-data">
						<div style="text-align: center;">
							<label>Enter your fullname:</label>
							<input type="text" name="fullname" class="form-control form-control-sm">
						</div>
						<br>
						<div style="text-align: center;">
							<label>Username:</label>
							<input type="text" class="form-control form-control-sm" name="username">
						</div>
						<br>
						<div style="text-align: center;">
							<label>Password:</label>
							<input type="password" class="form-control form-control-sm" name="password">
						</div>
						<div style="text-align: center;">
							<label>Upload image:</label>
							<input type="file" name="fileToUpload" id="fileToUpload">
						</div>
						<br>
						<div style="text-align: center;">
							<button type="submit" class="btn btn-primary btn-block">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>
<?php
	include("model/users.php");
	require("connection/database.php");

	if (isset($_POST['fullname'])) {
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = hash('md5',$_POST['password']);
		$image = "";

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
		    // echo "File is an image - " . $check["mime"] . ".";
		    // $uploadOk = 1;
		} else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
		    $image = $target_file;
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}
		
		
		$saveUser = new Users($conn);
		if ($saveUser->store($fullname, $username, $password, $image)) {
			echo "<script>alert('Successfully added!')</script>";
		}
	}


?>