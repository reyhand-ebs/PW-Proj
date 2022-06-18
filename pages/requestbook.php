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
	$objBuku->SelectOneBuku();
}	
?>

<head>
    <title>Tubirit | Request Book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container py-5 pb-5">
        <h2 class="pb-5"><strong>Request Book</strong></h2>
        <div class="row">
			<div class="col-lg-8">
                <form class="form" method="POST" action="contact.php" onsubmit="return validation();">
                    <div class="row">
                        <div class="form-group col-md-6 py-2">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="required">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required="required">
                        </div>
                        <div class="dropdown dropright col-md-6 py-2">
                            <button class="btn dropdown-toggle" type="button" data-toggle-bs="dropdown">Genre
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">History</a></li>
                                <li><a class="dropdown-item" href="#">Adventure</li>
                                <li><a class="dropdown-item" href="#">Fantasy</li>
                                <li><a class="dropdown-item" href="#">Science-Fiction</li>
                                <li><a class="dropdown-item" href="#">Humor</li>
                                <li><a class="dropdown-item" href="#">Horror</li>
                                <li><a class="dropdown-item" href="#">Thriller</li>
                                <li><a class="dropdown-item" href="#">Romance</li>
                                <li><a class="dropdown-item" href="#">Others..</li>
                            </ul>
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <input type="text" name="title" class="form-control" placeholder="Title Book" required="required">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <input type="text" name="writer" class="form-control" placeholder="Writer Name" required="required">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <input type="text" name="publisher" class="form-control" placeholder="Publisher Name" required="required">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <input type="text" name="pages" class="form-control" placeholder="Pages" required="required">
                        </div>
                        <div class="form-group col-md-6 py-2">
                            <input type="text" name="year" class="form-control" placeholder="Year" required="required">
                        </div>
                        <div class="form-group col-md-12 py-2">
                            <textarea rows="6" name="message" class="form-control" placeholder="Summary Book"></textarea>
                        </div>
                        <div class="form-group col-md-12 py-5 text-center">
                            <button type="submit" value="Send message" name="submit" id="submitButton" class="btn btn-success btn-primary" title="Submit Your Message!">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>