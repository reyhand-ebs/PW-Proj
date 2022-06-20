<?php
require_once('./class/class.request.php'); 	
require_once('./class/class.buku.php'); 	

if(isset($_GET['reqid'])){	
	$objRequest = new Request(); 
	$objRequest->reqid = $_GET['reqid'];
	//$objRequest->reqemail = $_GET['reqemail'];	
	$objRequest->UpdateSetujuRequest();

	//$objBuku->idbuku = $_POST['idbuku'];
	$objBuku = new Buku();
	$objBuku->judul = $_POST['reqjudul'];	
    $objBuku->penulis = $_POST['reqpenulis'];
	$objBuku->penerbit = $_POST['reqpenerbit'];	
    $objBuku->halaman = $_POST['reqhalaman'];
    $objBuku->tahun = $_POST['reqtahun'];	
    $objBuku->summary = $_POST['reqsummary'];
    $objBuku->idgenre = $_POST['idgenre'];	 
	$objBuku->AddBuku();

	/*if ($objBuku->hasil) {
		$message =  file_get_contents('templateemail.html');
		$header = "Request Rekomendasi Buku";
		$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
				Halo Member Tubirit! Hasil request rekomendasi buku Anda :<br>
				<b>Disetujui</b>
				Berikut ini informasi request buku Anda<br>
				</span>
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					ID Buku : ' . $objBuku->idbuku . '<br>
					Judul : ' . $objBuku->judul . '<br>
					Penulis : ' . $objBuku->penulis . '<br>
					Genre : ' . $objBuku->idgenre . '<br>
					Penerbit : ' . $objBuku->penerbit . '<br>
					Halaman : ' . $objBuku->halaman . '<br>
					Tahun : ' . $objBuku->tahun . '<br>
					Summary : ' . $objBuku->summary . '<br>
				</span>';
		$footer = 'Silakan login untuk mengakses sistem.';

		$message = str_replace("#header#", $header, $message);
		$message = str_replace("#body#", $body, $message);
		$message = str_replace("#footer#", $footer, $message);


		Mail::SendMail($objRequest->reqemail, 'Registrasi Berhasil', $message);
		echo '<script> alert("Email berhasil terkirim!"); </script>';
		echo '<script> window.location="dashboardadmin.php?p=requestedlist"</script>';
	}*/

	echo "<script> alert('$objRequest->message'); </script>";
	echo "<script>window.location = 'dashboardadmin.php?p=requestedlist'</script>";					
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>

