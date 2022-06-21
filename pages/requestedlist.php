<?php
require_once('./class/class.request.php');
require_once('./class/class.buku.php'); 

	if (isset($_POST['btnSetuju'])) {
        $objRequest = new Request();
        $objRequest->reqid = $_POST[$dataRequest->reqid];
        
        $objBuku = new Buku();
        $objBuku->judul = $_POST[$dataRequest->reqjudul];
        $objBuku->penulis = $_POST[$dataRequest->reqpenulis];
        $objBuku->genrebuku = $_POST[$dataRequest->idgenre];
        $objBuku->penerbit = $_POST[$dataRequest->reqpenerbit];
        $objBuku->halaman = $_POST[$dataRequest->reqhalaman];
        $objBuku->tahun = $_POST[$dataRequest->reqtahun];
        $objBuku->summary = $_POST[$dataRequest->reqsummary];      
        $objBuku->AddBuku();

    } else if (isset($_POST['btnTolak'])){
        $objRequest = new Request();
        $objRequest->reqid = $_POST[$dataRequest->reqid];
    }?>

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
                    <th scope="col" style="width:50px">Req ID</th>
                    <th scope="col" style="width:100px">Tanggal</th>
                    <th scope="col" style="width:70px">Genre</th>
                    <th scope="col" style="width:100px">Judul</th>
                    <th scope="col" style="width:100px">Penulis</th>
                    <th scope="col" style="width:100px">Penerbit</th>
                    <th scope="col" style="width:50px">Halaman</th>
                    <th scope="col" style="width:50px">Tahun</th>
                    <th scope="col" style="width:300px">Summary</th>
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
                        echo '<td class="text-center align-middle">' . $dataRequest->reqdate . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->idgenre . ' - ' .$dataRequest->namagenre.'</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqjudul . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqpenulis . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqpenerbit . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqhalaman . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqtahun . '</td>';
                        echo '<td class="align-middle fs-6">' . $dataRequest->reqsummary . '</td>';
                        echo '<td class="text-center align-middle"><a class="btn btn-success btn-sm" name="btnSetuju"  href="dashboardadmin.php?p=updaterequest&reqid=' . $dataRequest->reqid . '"
                            onclick="return confirm(\'Apakah anda yakin ingin menyetujuinya?\')">Setujui</a> |
   					        <a class="btn btn-danger btn-sm" name="btnTolak"  href="dashboardadmin.php?p=tolakrequest&reqid=' . $dataRequest->reqid . '" 
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