<?php
include('./inc.koneksi.php');
require_once('./class/class.buku.php'); 		

if(isset($_GET['idbuku'])){	
	$objBuku = new Buku(); 
	$objBuku->idbuku = $_GET['idbuku'];	
	$objBuku->DeleteBuku();
	echo "<script> alert('$objBuku->message'); </script>";
	echo "<script>window.location = 'dashboardadmin.php?p=exploreadmin'</script>";					
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>

