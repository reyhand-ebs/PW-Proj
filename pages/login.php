<?php 
require_once('./class/class.user.php');	

if(isset($_POST['btnLogin'])){		
    
	$email = $_POST['email'];
	$password = $_POST['password'];	

    $objUser = new User(); 
	$objUser->hasil = true;
	$objUser->ValidateEmail($email);
		
	if($objUser->hasil){
		
		if($password == $objUser->password){
			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION["userid"]= $objUser->userid;
			$_SESSION["email"]= $objUser->email;
			$_SESSION["fname"]= $objUser->fname;
			$_SESSION["lname"]= $objUser->lname;		
			
			echo "<script>alert('Login sukses');</script>";		
				
			if($objUser->idrole == 'role1')
				echo '<script>window.location = "dashboardadmin.php";</script>';
			else if($objUser->idrole == 'role2')
				echo '<script>window.location = "dashboardmember.php";</script>';
		}
		else {
			echo "<script>alert('Password tidak match');</script>";
		}
	} else {
		echo "<script>alert('Email tidak terdaftar');</script>";
	} 	
}
?>
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
				<input type="password" class="form-control mt-2" placeholder="Password" name="password">
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