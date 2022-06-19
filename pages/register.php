<?php
require_once('./class/class.user.php'); 		
require_once('./class/class.mail.php'); 		

if(isset($_POST['btnSubmit'])){
	$inputemail=$_POST["email"];	
	$objUser = new User();
	$objUser->ValidateEmail($inputemail);		
	$objUser->hasil = false;
	if($objUser->hasil){			
		echo "<script>alert('Email sudah terdaftar'); </script>";			
	}
	else
	{	
		$objUser->email=$_POST["email"];
		$password = $_POST['password'];	
		$objUser->password = password_hash($password, PASSWORD_DEFAULT);		
		$objUser->name=$_POST["name"];
		$objUser->AddUser();		
		
		if($objUser->hasil){			
			$message =  file_get_contents('templateemail.html');  					 
			$header = "Registrasi berhasil";
			$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Selamat <b>' .$objUser->name.'</b>, anda telah terdaftar pada Tubirit.<br>
					Berikut ini informasi akun Anda:<br>
					</span>
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Username : '.$objUser->email.'<br>
						Password : '.$password.'
					</span>';
			$footer ='Silakan login untuk mengakses sistem.';
										
			$message = str_replace("#header#",$header,$message);
			$message = str_replace("#body#",$body,$message);
			$message = str_replace("#footer#",$footer,$message);
					 						
			
			Mail::SendMail($objUser->email, $objUser->name, 'Registrasi berhasil.', $message);	
			echo "<script> alert('Registrasi berhasil'); </script>";
			echo '<script> window.location="index.php?p=login"; </script>'; 				
		}					
	}	
}
?>
<div class="container py-5">
	<div class="col-md-6">
		<h1 class="title pb-5"><span class="text"><strong>REGISTRASI</strong></span></h1>
		<form action="" method="post">
			<table class="table" border="0">
                <tr>
					<td>Nama Depan</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="fname" name="fname" maxlength="30" required="required"></td>
				</tr>
                <tr>
					<td>Nama Belakang</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="lname" name="lname" maxlength="30" required="required"></td>
				</tr>
                <tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="email" class="form-control" id="email" name="email" maxlength="30" required="required"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="password" class="form-control" id="password" maxlength="30" name="password" required="required"></td>
				</tr>
				<tr>
				<tr>
					<td>Sudah punya akun? <a href="login.php" style="color: #4285F4">Login</a></td>
				</tr>
				<td></td>
				<td></td>
				<td><input type="submit" class="btn btn-primary rounded-pill" value="Register" name="btnSubmit">
					<a href="./index.php" class="btn btn-danger rounded-pill">Cancel</a>
				</td>
				</tr>
			</table>
		</form>
	</div>
</div>