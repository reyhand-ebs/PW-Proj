<?php 
include('./inc.koneksi.php');
require_once('./class/class.genre.php');
require_once('./class/class.request.php');
$objRequest = new Request();
$objGenre = new Genre();
$genreList = $objGenre->SelectAllGenre();

if(isset($_POST['btnSubmit'])){
    $objRequest->reqid = $_POST['reqid'];
	$objRequest->reqjudul = $_POST['reqjudul'];	
    $objRequest->reqpenulis = $_POST['reqpenulis'];
	$objRequest->reqpenerbit = $_POST['reqpenerbit'];	
    $objRequest->reqhalaman = $_POST['reqhalaman'];
    $objRequest->reqtahun = $_POST['reqtahun'];	
    $objRequest->reqsummary = $_POST['reqsummary'];
    $objRequest->namagenre->idgenre = $_POST['idgenre'];		 
				
	if(isset($_GET['reqid'])) {
		$objRequest->reqid = $_GET['reqid'];
		$objRequest->UpdateRequest();
	} else {	
		$objRequest->AddRequest();
	}
	echo "<script> alert('$objRequest->message'); </script>";
	if($objRequest->hasil) {
	    echo '<script> window.location = "dashboardadmin.php?p=explore";</script>';
	}			
} else if(isset($_GET['reqid'])) {
	$objRequest->reqid = $_GET['reqid'];
	$objRequest->SelectOneRequest();
}
?>

<head>
    <title>Tubirit | Request Book</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="container">  
<div class="col-md-6">			
  <h4 class="title py-4"><span class="text"><strong>Request Book</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><input type="date" class="form-control" name="date" value="<?php echo date("Y/m/d"); ?>"></td>
        </tr>
        <tr>
            <td>Request ID</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="reqid" readonly value="<?php echo $objRequest->reqid; ?>"></td>
        </tr>	
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="reqjudul" value="<?php echo $objRequest->reqjudul; ?>"></td>
        </tr>		
        <tr>
            <td>Genre</td>
            <td>:</td>
            <td>
            <select name="genre" class="form-control">
                <option value=""><?php echo $objRequest->namagenre?>--Pilih Genre--</option>
                <?php		
                    foreach ($genreList as $genre){
                        if($objRequest->namagenre->idgenre == $genre->idgenre)
                            echo '<option selected="true" value="'.$genre->idgenre.'">'.$genre->namagenre.'</option>';
                        else
                            echo '<option value="'.$genre->idgenre.'">'.$genre->namagenre.'</option>';
                    } 
                ?>	
                </select>	
            </td>
        </tr>
        <tr>
            <td>Penulis</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="reqpenulis" value="<?php echo $objRequest->reqpenulis; ?>"></td>
        </tr>
        <tr>
            <td>Penerbit</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="reqpenerbit" value="<?php echo $objRequest->reqpenerbit; ?>"></td>
        </tr>
        <tr>
            <td>Halaman</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="reqhalaman" value="<?php echo $objRequest->reqhalaman; ?>"></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="reqtahun" value="<?php echo $objRequest->reqtahun; ?>"></td>
        </tr>	
        <tr>
            <td>Summary</td>
            <td>:</td>
            <td><textarea class="form-control" name="reqsummary"><?php echo $objRequest->summary; ?></textarea></td>
        </tr>	

        <tr>
        <td colspan="2"></td>	
        <td><input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
            <a href="dashboardadmin.php?p=explore" class="btn btn-danger">Cancel</a></td>
        </tr>	
	</table>    
</form>	
</div>  
</div>
</div>
<br>
</body>