<?php
require_once('./class/class.request.php'); 	
require_once('./class/class.buku.php'); 	

if(isset($_GET['reqid'])){	
	$objRequest = new Request(); 
	$objRequest->reqid = $_GET['reqid'];	
	$objRequest->UpdateSetujuRequest();

	$objBuku->idbuku = $_POST['idbuku'];
	$objBuku->judul = $_POST['reqjudul'];	
    $objBuku->penulis = $_POST['reqpenulis'];
	$objBuku->penerbit = $_POST['reqpenerbit'];	
    $objBuku->halaman = $_POST['reqhalaman'];
    $objBuku->tahun = $_POST['reqtahun'];	
    $objBuku->summary = $_POST['reqsummary'];
    $objBuku->idgenre = $_POST['idgenre'];	 
	$objBuku->AddBuku();

	echo "<script> alert('$objRequest->message'); </script>";
	echo "<script>window.location = 'dashboardadmin.php?p=requestedlist'</script>";					
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>

