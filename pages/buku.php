<?php 
require_once('./class/class.buku.php');
$objBuku = new Buku();

if(isset($_POST['btnSubmit'])){
	$objBuku->judul = $_POST['judul'];	
    $objBuku->penulis = $_POST['penulis'];
	$objBuku->penerbit = $_POST['penerbit'];	
    $objBuku->halaman = $_POST['halaman'];
    $objBuku->tahun = $_POST['tahun'];	
    $objBuku->summary = $_POST['summary'];
    $objBuku->genrebuku = $_POST['genrebuku'];	 
				
	if(isset($_GET['idbuku'])) {
		$objBuku->idbuku = $_GET['idbuku'];
		$objBuku->UpdateBuku();
	} else {	
		$objBuku->AddBuku();
	}

	echo "<script> alert('$objBuku->message'); </script>";
	if($objBuku->hasil) {
	    echo '<script> window.location = "dashboardadmin.php?p=exploreadmin";</script>';
	}			
} else if(isset($_GET['idbuku'])) {
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
  <h4 class="title py-4"><span class="text"><strong>Profil Buku</strong></span></h4>
    <form action="" method="post">
	<table class="table" border="0">
        <tr>
            <td>Cover</td>
            <td>:</td>
            <td><?php
                    if ($objBuku->cover != null)
                        echo '<img class="img-rounded img-responsive" src="img/books/' . $objBuku->cover . '">';
                    else
                        echo '<img class="img-rounded img-responsive" src="img/books/defaultbook.jpg">';
                    ?>
                    <input type="hidden" name="photo" value="<?php echo $objBuku->cover; ?>">
                    <br><br>
                    <span>Browse Picture</span>
                    <input type="file" name="cover"></input></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="judul" value="<?php echo $objBuku->judul; ?>"></td>
        </tr>	
        <tr>
            <td>Genre</td>
            <td>:</td>
            <td>
                <select name="genrebuku" class="form-control">
                    <option value="">---Please select genre---</option>
                    <?php		
                        $genrebuku = array("1"=>"History", "2"=>"Adventure", "3"=>"Fantasy", "4"=>"Science-Fiction", "5"=>"Humor", "6"=>"Horror", "7"=>"Romance", "8"=>"Thriller", "9"=>"Other");
                        foreach ($genrebuku as $key => $value){
                            if($objBuku->genrebuku == $key)
                                echo '<option selected="true" value="'.$key.'">'.$key.' - '.$value.'</option>';
                            else
                                echo '<option value="'. $key .'">'.$key.' - '.$value.'</option>';
                        } 
                    ?>	
                </select>	
            </td>
        </tr>
        <tr>
            <td>Penulis</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="penulis" value="<?php echo $objBuku->penulis; ?>"></td>
        </tr>
        <tr>
            <td>Penerbit</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="penerbit" value="<?php echo $objBuku->penerbit; ?>"></td>
        </tr>
        <tr>
            <td>Halaman</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="halaman" value="<?php echo $objBuku->halaman; ?>"></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><input type="text" class="form-control" name="tahun" value="<?php echo $objBuku->tahun; ?>"></td>
        </tr>	
        <tr>
            <td>Summary</td>
            <td>:</td>
            <td><textarea class="form-control" name="summary"><?php echo $objBuku->summary; ?></textarea></td>
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