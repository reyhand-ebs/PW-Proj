<head>
    <title>Tubirit | Requested List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container-fluid py-5 pb-5">
        <h2 class="pb-5"><strong>Requested List</strong></h2>
        <table class="table table-bordered me-ml-3">
            <thead>
                <tr class="text-center align-items-middle">
                <th scope="col">No</th>
	            <th scope="col">Requested ID</th>
	            <th scope="col">User ID</th>
	            <th scope="col">Date</th>
                <th scope="col">Genre</th>
	            <th scope="col">Judul</th>
	            <th scope="col">Penulis Buku</th>
	            <th scope="col">Penerbit Buku</th>
	            <th scope="col">Halaman</th>
	            <th scope="col">Tahun</th>
	            <th scope="col">Summary</th>
	            <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="">
            <?php
                include('./inc.koneksi.php');
                require_once('./class/class.request.php');

                $objRequest = new Request();
                $arrayResult = $objRequest->SelectAllRequest();

                if (count($arrayResult) == 0) {
                    echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
                } else {
                    $no = 1;
                    foreach ($arrayResult as $dataRequest) {
                        echo '<tr>';
                        echo '<th scope="row" class="text-center">' . $no . '</th>';
                        echo '<td class="text-center">' . $dataRequest->reqid . '</td>';
                        echo '<td>' . $dataRequest->userid . '</td>';
                        echo '<td>' . $dataRequest->reqdate . '</td>';
                        echo '<td>' . $dataRequest->idgenre . '</td>';
                        echo '<td>' . $dataRequest->reqjudul . '</td>';
                        echo '<td>' . $dataRequest->reqpenulis . '</td>';
                        echo '<td>' . $dataRequest->reqpenerbit . '</td>';
                        echo '<td>' . $dataRequest->reqhalaman . '</td>';
                        echo '<td>' . $dataRequest->reqtahun . '</td>';
                        echo '<td>' . $dataRequest->reqsummary . '</td>';
                        echo '<td class="text-center"><a class="btn btn-success btn-sm"  href="dashboardadmin.php?p=updaterequest&reqid=' . $dataRequest->reqid . '"
                            onclick="return confirm(\'Apakah anda yakin ingin menyetujuinya?\')">Setujui</a> |
   					        <a class="btn btn-danger btn-sm"  href="dashboardadmin.php?p=deleterequest&reqid=' . $dataRequest->reqid . '" 
							onclick="return confirm(\'Apakah anda yakin ingin menolaknya?\')">Tolak</a>
							</td>';
                        echo '</tr>';
                        $no++;
                    }
                }
            ?>
		</tbody>
</table>

</div>
</div>

