<?php
require_once('./class/class.user.php');

if (isset($_POST['btnLogin'])) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	$objUser = new User();
	$objUser->ValidateEmail($email);

	if ($objUser->hasil) {

		$ismatch = password_verify($password, $objUser->password);

		if ($ismatch) {
			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION["userid"] = $objUser->userid;
			$_SESSION["email"] = $objUser->email;
			$_SESSION["fname"] = $objUser->fname;
			$_SESSION["lname"] = $objUser->lname;
			$_SESSION["idrole"] = $objUser->idrole;

			echo "<script>alert('Login sukses');</script>";

			if ($objUser->idrole == 'role1') {
				echo '<script>window.location = "dashboardadmin.php";</script>';
			} else if ($objUser->idrole == 'role2') {
				echo '<script>window.location = "dashboardmember.php";</script>';
			}
		} else {
			echo "<script>alert('Password tidak match');</script>";
		}
	} else {
		echo "<script>alert('Email tidak terdaftar');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tubirit | Login</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<div class="container py-5">
		<div class="col-md-6">
			<h1 class="title pb-5"><strong>LOGIN</strong></h1>
			<form action="" class="row g-3 justify-content-center" method="POST">
				<div class="col-md-10">
					<label for="email">Email: </label>
					<input type="email" class="form-control mt-2" placeholder="Enter E-mail" name="email" required>
				</div>
				<div class="col-md-10">
					<label for="password">Password: </label>
					<input type="password" class="form-control mt-2" placeholder="Password" name="password"><br>
					<p>Belum punya akun? <a href="index.php?p=register" style="color: #4285F4">Register</a></p>
				</div>
				<div class="col-md-3 d-grid">
					<button class="btn btn-primary" name="btnLogin" type="submit" value="Login">Login</button>
				</div>
				<div class="col-md-3 d-grid">
					<button class="btn btn-danger" name="btnCancel"><a href="index.php" style="color: #fff; text-decoration: none;">Cancel</a></button>
				</div>
			</form>
		</div>
	</div>
</body>

</html>