<?php 
require_once('./class/class.genre.php');
require_once('./class/class.request.php');
require_once('./class/class.user.php');
$objRequest = new Request();
$objGenre = new Genre();
$objUser = new User();
$objUser->SelectOneUser();
$objGenre->SelectAllGenre();

if(isset($_POST['btnSubmit'])){
    $requestdate = $_POST['reqdate'];
    $objRequest->reqdate = $requestdate;
	$objRequest->reqjudul = $_POST['reqjudul'];	
    $objRequest->reqpenulis = $_POST['reqpenulis'];
	$objRequest->reqpenerbit = $_POST['reqpenerbit'];	
    $objRequest->reqhalaman = $_POST['reqhalaman'];
    $objRequest->reqtahun = $_POST['reqtahun'];	
    $objRequest->reqsummary = $_POST['reqsummary'];
    $objRequest->idgenre = $_POST['genre'];
    $objRequest->userid = $_SESSION['userid'];
				
	if(isset($_GET['reqid'])) {
		$objRequest->reqid = $_GET['reqid'];
		$objRequest->UpdateSetujuRequest();
	} else {	
		$objRequest->AddRequest();
	}
	echo "<script> alert('$objRequest->message'); </script>";
	if($objRequest->hasil) {
	    echo '<script> window.location = "dashboardmember.php?p=explore";</script>';
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
	<table class="table" border="0" method="POST">
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="email" class="form-control" name="reqemail" readonly value="<?php echo $objUser->userid=$_SESSION['email']; ?>"></td>
        </tr>	
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><input type="date" class="form-control" readonly name="reqdate" value="<?php echo date('Y-m-d'); ?>"></td>
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
                <option value="">--Pilih Genre--</option>
                <?php		
                $genrebuku = array("1"=>"History", "2"=>"Adventure", "3"=>"Fantasy", "4"=>"Science-Fiction", "5"=>"Humor", "6"=>"Horror", "7"=>"Romance", "8"=>"Thriller", "9"=>"Other");
                    foreach ($genrebuku as $key => $value){
                        if($objRequest->idgenre == $key)
                            echo '<option selected="true" value="'.$key.'">'.$value.'</option>';
                        else
                            echo '<option value="'. $key .'">'.$value.'</option>';
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
            <td><input type="number" class="form-control" name="reqhalaman" value="<?php echo $objRequest->reqhalaman; ?>"></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><input type="number" class="form-control" name="reqtahun" value="<?php echo $objRequest->reqtahun; ?>"></td>
        </tr>	
        <tr>
            <td>Summary</td>
            <td>:</td>
            <td><textarea class="form-control" name="reqsummary"><?php echo $objRequest->reqsummary; ?></textarea></td>
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