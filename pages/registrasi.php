<?php
include('./inc.koneksi.php');
require_once('../class/class.mail.php');
require_once('./class/class.user.php');

if (isset($_POST['btnSubmit'])) {
	$name = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$subject = "Informasi Registrasi";
	$message =  file_get_contents('../general.html');
	$header = "Registrasi berhasil";
	$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
				  Selamat <b>' . $name . '</b>, berhasil registrasi pada sistem kami.<br>
				  Berikut ini informasi account Anda:<br>
				 </span>
				 <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Email : ' . $email . '<br>
					Password : <b>' . $password . '<b>
				</span>';

	$footer = 'Silakan login untuk mengakses sistem';

	$message = str_replace("#header#", $header, $message);
	$message = str_replace("#body#", $body, $message);
	$message = str_replace("#footer#", $footer, $message);
	Mail::SendMail($email, $name, $subject, $message);

	echo "<script>
				alert('Email berhasil dikirim');
				</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tubirit | Register</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<div class="container py-5">
		<div class="col-md-6">
			<h1 class="title pb-5"><span class="text"><strong>REGISTRASI</strong></span></h1>
			<form action="" method="post">
				<table class="table" border="0">
					<tr>
						<td>username</td>
						<td>:</td>
						<td><input type="text" class="form-control" id="nama" name="nama" maxlength="30" required></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" class="form-control" id="password" maxlength="30" name="password" required></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type="text" class="form-control" id="email" name="email" maxlength="30" required></td>
					</tr>
					<tr>
					<tr>
						<td>sudah punya account? <a href="login.php" style="color: #4285F4">login</a></td>
					</tr>
					<td></td>
					<td></td>
					<td><input type="submit" class="btn btn-primary rounded-pill" value="Register" name="btnSubmit">
						<a href="../index.php" class="btn btn-danger rounded-pill">cancel</a>
					</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>

</html>