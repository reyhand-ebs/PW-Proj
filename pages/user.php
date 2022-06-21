<?php 
require_once('./class/class.user.php'); 	
require_once('./class/class.mail.php'); 
require_once('./class/class.Role.php');		

$objUser = new User(); 
$objRole = new Role();
$objRole->SelectAllRole();

if(isset($_POST['btnSubmit'])){	
    $objUser->fname = $_POST['fname'];
    $objUser->lname = $_POST['lname'];
	$objUser->email = $_POST['email'];	
    $objUser->nohp = $_POST['nohp'];
    $objUser->idrole = $_POST['role'];
	$password = $_POST['password'];	
	$currentpassword = $_POST['currentpassword'];	
	$passworddefault = '12345678';
	
	if($password == ''){ //jika password dikosongkan
    	if(isset($_GET['userid'])) //jika sedang diedit, passwordnya adalah current password
			$password = $currentpassword; 
		else //jika sedang ditambah, password adalah password default
			$password = $passworddefault;		
	}
	$objUser->password = password_hash($password, PASSWORD_DEFAULT);	
	$objUser->idrole = $_POST['role'];
	
	if(isset($_GET['userid'])){		
		$objUser->userid = $_GET['userid'];
		$objUser->UpdateUser();
	}
	else{	
		$objUser->AddUser();
	}			
	echo "<script> alert('$objUser->message'); </script>";
	if($objUser->hasil){
		if(!isset($_GET['userid'])){ //jika user ditambahkan, maka kirim email
			$message =  file_get_contents('templateemail.html');  	
			$subject = "Anda ditambahkan sebagai user Tubirit";				 
			$header = "Anda ditambahkan sebagai user Tubirit";
			$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Selamat <b>' .$objUser->name.'</b>, anda telah didaftarkan pada Tubirit.<br>
					Berikut ini informasi akun Anda:<br>
					</span>
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Username : '.$objUser->email.'<br>
						Password : '.$password.'<br>
                        Role     : '.$objUser->idrole.'
					</span>';
			$footer ='Silakan login untuk mengakses sistem';
										
			$message = str_replace("#header#",$header,$message);
			$message = str_replace("#body#",$body,$message);
			$message = str_replace("#footer#",$footer,$message);
			
			Mail::SendMail($objUser->email, $objUser->name, $subject, $message);	
		}
		echo '<script> window.location="dashboardadmin.php?p=userlist"; </script>';		
	}
}
else if(isset($_GET['userid'])){	
	$objUser->userid = $_GET['userid'];	
	$objUser->SelectOneUser();
	
}
$userList = $objUser->SelectAllUserByUserid($objUser->userid);
?>

<head>
    <title>Tubirit | User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<div class="container py-5 pb-5">  
<div class="col-md-6">			
  <h2 class="pb-5"><span class="text"><strong>User</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
	<tr>
	<td>First Name</td>
	<td>:</td>
	<td>
    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $objUser->fname; ?>" required>
	</td>
	</tr>
    <tr>
	<td>Last Name</td>
	<td>:</td>
	<td>
    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $objUser->lname; ?>">
	</td>
	</tr>		
	<tr>
	<td>Email</td>
	<td>:</td>
	<td>
	<input type="text" class="form-control" id="email" name="email" value="<?php echo $objUser->email; ?>" required></td>
	</tr>	
    <tr>
	<td>No. Handphone</td>
	<td>:</td>
	<td>
	<input type="number" class="form-control" id="nohp" name="nohp" value="<?php echo $objUser->nohp; ?>"></td>
	</tr>	
	<tr>
	<td>Password</td>
	<td>:</td>
	<td>
	<input type="password" class="form-control" id="password" name="password">
	<input type="hidden" name="currentpassword" value="<?php echo $objUser->password; ?>" required>
	<span><i>Enter a new password or leave blank to keep current password</i> </span>
	</td>
	</tr>	
	<tr>
	<td>Role</td>
	<td>:</td>
	<td>
	<?php
	$role = array("role1"=>"Admin", "role2"=>"Member");
	foreach($role as $key => $value) {	
		if($objUser->idrole == $key)					
			echo '<label class="radio-inline"><input type="radio" name="role" checked value="'.$key.'"> '.$value.'</label>';
		else
			echo '<label class="radio-inline"><input type="radio" name="role" value="'.$key.'"> '.$value.'</label>';
	}
	?>	
	</select>	
	</td>
	</tr>	
	<tr>
	<td></td>
	<td></td>
	<td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
	    <a href="dashboardadmin.php?p=userlist" class="btn btn-danger">Cancel</a></td>
	</tr>	
	</table>    
</form>	
</div>  
</div>