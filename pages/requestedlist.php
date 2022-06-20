<?php
require_once('./class/class.mail.php');
require_once('./class/class.request.php');
//require_once('./class/class.user.php');
//require_once('./class/class.buku.php');


	if (isset($_POST['btnSetuju'])) {
		$name=$_POST[$dataRequest->iduser];	
		$email=$_POST['email'];	
        $judul = $_POST[$dataRequest->reqjudul];
        $penulis = $_POST[$dataRequest->reqpenulis];
        $genre = $_POST[$dataRequest->idgenre];
        $penerbit = $_POST[$dataRequest->reqpenerbit];
        $halaman = $_POST[$dataRequest->reqhalaman];
        $tahun = $_POST[$dataRequest->reqtahun];
        $summary = $_POST[$dataRequest->reqsummary];

		$subject = "Informasi Request Book Tubirit";
		$message =  file_get_contents('../general.html');  					 
		$header = "Rekomendasi Buku Anda disetujui!";
		$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
				  Halo <b>' .$name.'</b>, buku Anda telah kami setujui.<br>
				  Berikut ini informasi buku rekomendasi Anda:<br>
				 </span>
				 <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Judul : '.$judul.'<br>
					Genre : '.$genre.'<br>
                    Penulis : '.$penulis.'<br>
                    Penerbit : '.$penerbit.'<br>
                    Halaman : '.$halaman.'<br>
                    Tahun : '.$tahun.'<br>
                    Summary : '.$summary.'<br>
				</span>';
		 									
		$message = str_replace("#header#",$header, $message);
		$message = str_replace("#body#",$body, $message);					 									
		Mail::SendMail($name, $judul, $penulis, $genre, $penerbit, $halaman, $tahun, $summary, $message);	
		
		echo "<script>
				alert('Email berhasil dikirim');
				</script>";
	}
?>

<head>
    <title>Tubirit | Requested List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container py-5 pb-5">
        <h2 class="pb-5"><strong>Requested List</strong></h2>
        <table class="table table-bordered me-ml-3 table-hover">
            <thead>
                <tr class="text-center align-middle">
                    <th scope="col">Req ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Halaman</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                require_once('./class/class.request.php');

                $objRequest = new Request();
                $arrayResult = $objRequest->SelectAllRequest();

                if (count($arrayResult) == 0) {
                    echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
                } else {
                    //$no = 1;
                    foreach ($arrayResult as $dataRequest) {
                        echo '<tr>';
                        //echo '<th scope="row" class="text-center align-middle">' . $no . '</th>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqid . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqemail . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqdate . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->idgenre . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqjudul . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqpenulis . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqpenerbit . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqhalaman . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqtahun . '</td>';
                        echo '<td class="align-middle fs-6">' . $dataRequest->reqsummary . '</td>';
                        echo '<td class="text-center"><a class="btn btn-success btn-sm" name="btnSetuju"  href="dashboardadmin.php?p=updaterequest&reqid=' . $dataRequest->reqid . '"
                            onclick="return confirm(\'Apakah anda yakin ingin menyetujuinya?\')">Setujui</a> |
   					        <a class="btn btn-danger btn-sm" name="btnTolak"  href="dashboardadmin.php?p=deleterequest&reqid=' . $dataRequest->reqid . '" 
							onclick="return confirm(\'Apakah anda yakin ingin menolaknya?\')">Tolak</a>
							</td>';
                        echo '</tr>';
                        //$no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>