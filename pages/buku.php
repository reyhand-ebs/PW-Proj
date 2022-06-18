<?php 
include('./inc.koneksi.php');
require_once('./class/class.buku.php');
$objBuku = new Buku(); 
$bukuList = $objBuku->SelectAllBuku();

if(isset($_POST['btnSubmit'])){	
    $objBuku->idBuku = $_POST['idbuku'];	 
	$objBuku->judul = $_POST['judul'];	
    $objBuku->penulis = $_POST['penulis'];
	$objBuku->penerbit = $_POST['penerbit'];	
    $objBuku->halaman = $_POST['halaman'];	
    $objBuku->tahun = $_POST['tahun'];	
    $objBuku->summary = $_POST['summary'];
    $objBuku->idgenre = $_POST['idgenre'];		 
				
	if(isset($_GET['idbuku'])){		
		$objBuku->idbuku = $_GET['idbuku'];
		$objBuku->UpdateBuku();
	}
	else{	
		$objBuku->AddBuku();	
	}	
	
	echo "<script> alert('$objBuku->message'); </script>";
	if($objBuku->hasil){
		echo '<script> window.location = "dashboardadmin.php?p=exploreadmin";</script>';
	}				
}
else if(isset($_GET['idbuku'])){	
	$objBuku->idbuku = $_GET['idbuku'];	
	$objBuku->SelectOneBuku();

}
?>

<head>
    <title>Tubirit | Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">  
<div class="col-md-6">			
  <h4 class="title"><span class="text"><strong>Edit Profil Buku</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="judul" value="<?php echo $objBuku->judul; ?>"></td>
        </tr>	
        <tr>
            <td>Penulis</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="penulis" value="<?php echo $objBuku->penulis; ?>"></td>
        </tr>	
        <tr>
            <td>Genre</td>
            <td>:</td>
            <td>
            <select name="genre" class="form-control">
                <option value="">--Please select genre--</option>
                <?php		
                    foreach ($bukuList as $buku){ 								
                        if($objBuku->idgenre == $genre->idgenre)				
                            echo '<option selected="true" value='.$genre->idgenre.'>'.$genre->namagenre.'</option>';
                        else
                            echo '<option value='.$genre->idgenre.'>'.$genre->namagenre.'</option>';
                    } 
                ?>	
                </select>	
            </td>
        </tr>	
        
        <tr>
        <td colspan="2"></td>	
        <td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
            <a href="dashboardadmin.php?p=exploreadmin" class="btn btn-danger">Cancel</a></td>
        </tr>	
	</table>    
</form>	
</div>  
</div>
</div>
<br>
</body>