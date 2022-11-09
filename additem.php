<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
</head>
<body>
	<div style="text-align: center;">
		<h1>ADD ITEM</h1>
		<form action="" method="POST">
			<div>
				<label>Enter name:</label>
				<input type="text" name="name">
			</div>
			<br>
			<div>
				<label for="type">type:</label>
				<select name="type" id="type">
				  <option value="fruits">fruits</option>
				  <option value="vegetables">vegetables</option>
				  <option value="drinks">drinks</option>
				  <option value="meat">meat</option>
				</select>
			</div>
			<br>
			<div>
				<label>Description</label>
				<input type="description" name="description">
			</div>
			<br>
			<div>
				<button type="submit">Save</button>
			</div>
		</form>
	</div>
</body>
</html>
<?php
	include("model/User.php");
	require("connection/database.php");

	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$classification = $_POST['type'];
		$description = $_POST['description'];
		
		$saveUser = new User($conn);
		if ($saveUser->store($name, $classification,$description)) {
			echo "<script>alert('Successfully added!')</script>";
		}
	}


?>