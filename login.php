<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Login Page</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	 <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-4" id="mainNav">
        <div class="container"><a class="navbar-brand text-uppercase text-expanded" href="#">Etang group System</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav mx-auto">
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="registration.php">Register</a></li> -->
                </ul>
        </div>
        </div>
    </nav>
    <div class="global-container" style="width: 26%; margin:auto;margin-top: 90px;">
		<div class="card login-form">
				<div class="card-body">
					<h3 class="card-title text-center">Log in</h3>
					<div class="card-text">
						<!--
					<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
						<form method="POST">
							<!-- to error: add class "has-danger" -->
							<div class="form-group">
								<label for="exampleInputEmail1">Username</label>
								<input type="text" class="form-control form-control-sm" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
							</div>
							<br>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<br>
								<a href="#" style="float:right;font-size:12px;">Forgot password?</a>
								<input type="password" name="password" class="form-control form-control-sm" id="exampleInputPassword1">
							</div>
							<button type="submit" class="btn btn-primary btn-block">Sign in</button>
							<br>
							<div class="sign-up">
								Don't have an account? <a href="registration.php">Create One</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

</body>
</html>

<?php
	require ('connection/database.php');

	if (isset($_POST['username'])) {
		$user = $_POST['username'];
		$pass = hash('md5', $_POST['password']);

		$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
	}
?>