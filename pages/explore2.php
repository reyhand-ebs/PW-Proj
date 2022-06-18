<?php
include('./inc.koneksi.php');
require_once('./class/class.buku.php'); 		
	
$objBuku = new Buku();
if(isset($_POST['btnUpdate'])){
		$objBuku->idbuku = $_POST['idbuku'];	 
		$objBuku->cover = $_POST['cover'];	 
		$isSuccessUpload = false;
		
		if(file_exists($_FILES['cover']['tmp_name']) || is_uploaded_file($_FILES['cover']['tmp_name'])){			
			$lokasifile = $_FILES['cover']['tmp_name'];
			$nama_file =  $_FILES['cover']['name'];
			$extension  = pathinfo( $_FILES["cover"]["name"], PATHINFO_EXTENSION ); 
			$objBuku->cover = $objBuku->idBuku . '.' . $extension;
			$folder = './img/books/';
			$isSuccessUpload = move_uploaded_file($lokasifile, $folder.$objBuku->cover);
		}
		else
			$isSuccessUpload = true;
		
		if($isSuccessUpload){	
			$objBuku->idbuku=$_SESSION["idbuku"];
            $objBuku->judul = $_POST['judul'];			
			$objBuku->penulis = $_POST['penulis'];		
			$objBuku->penerbit = $_POST['penerbit'];	
			$objBuku->rating = $_POST['rating'];
            $objBuku->halaman = $_POST['halaman'];
            $objBuku->tahun = $_POST['tahun'];	
			$objBuku->summary = $_POST['summary'];
			$objBuku->idgenre = $_POST['idgenre'];
            $objBuku->cover = $_POST['cover'];
			$objBuku->UpdateBuku();		
	
			echo "<script> alert('$objBuku->message'); </script>";	
			echo '<script> window.location = "'.$_SERVER['REQUEST_URI'].'";</script>';
		}
}
else if(isset($_SESSION['idbuku'])){	
	$objBuku->idbuku = $_SESSION['idbuku'];	
	$objBuku->SelectAllBuku();
}	
?>