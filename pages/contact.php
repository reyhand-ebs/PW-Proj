<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require './vendor/PHPMailer/PHPMailer/src/Exception.php';
require './vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require './vendor/PHPMailer/PHPMailer/src/SMTP.php';

if (isset($_POST['btnSubmit'])) {
           //sesuaikan name dengan di form nya ya 
          $email = $_POST['email'];
          $subject = $_POST['subject'];
          $message = $_POST['message'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username = "chikal.m21@gmail.com";
	$mail->Password = "bdbxovyuebdputlz";                              //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //pengirim
    $mail->setFrom('chikal.m21@gmail.com', 'tubirit.com');
    $mail->addAddress($email);     //Add a recipient
 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = '';
    //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
    //$mail->addAttachment(''); 

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
          //redirect ke halaman index.php
        echo "<script> alert('pesan terkirim'); </script>";
		echo '<script> window.location="index.php?p=contact"; </script>';
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tubirit | Contact</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<div class="container">
		<div class="section-title text-center py-5">
			<h1>Contact Us</h1>
			<p>Saran dan kritik bisa disampaikan disini</p>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="contact py-5">
					<form class="form" method="POST" action="" >
						<div class="row">
							<div class="form-group col-md-6 py-2">
								<input type="email" name="email" class="form-control" placeholder="Email Tujuan" required="required">
							</div>
							<div class="form-group col-md-12 py-2">
								<input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
							</div>
							<div class="form-group col-md-12 py-2">
								<textarea rows="6" name="message" class="form-control" placeholder="Your Message" required="required"></textarea>
							</div>
							<div class="form-group col-md-12 py-5 text-center">
								<button type="submit" value="Send message" name="btnSubmit" id="submitButton" class="btn btn-contact-bg btn-primary" title="Submit Your Message!">Send Message</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!--- END COL -->
			<div class="col-lg-4">
				<div class="single_address">
					<div class="row">
						<div class="col-1">
							<i class='bx bx-map text-primary'></i>
						</div>
						<div class="col px-3">
							<h4>Our Address</h4>
						</div>
					</div>
					<p>Jl. TB Simatupang</p>
				</div>
				<div class="single_address">
					<div class="row">
						<div class="col-1">
							<i class='bx bx-envelope text-primary'></i>
						</div>
						<div class="col px-3">
							<h4>Send your message</h4>
						</div>
					</div>
					<p>chiekal.mulia@students.esqbs.ac.id</p>
				</div>
				<div class="single_address">
					<div class="row">
						<div class="col-1">
							<i class='bx bx-phone text-primary'></i>
						</div>
						<div class="col px-3">
							<h4>Call us on</h4>
						</div>
					</div>
					<p>(+62) 517 397 7100</p>
				</div>
				<div class="single_address">
					<div class="row">
						<div class="col-1">
							<i class='bx bx-time text-primary'></i>
						</div>
						<div class="col px-3">
							<h4>Work Time</h4>
						</div>
					</div>
					<p>Everyday: 00.01 - 23.59 WIB</p>
				</div>
			</div>
			<!--- END COL -->
		</div>
		<!--- END ROW -->
	</div>
</body>

</html>
