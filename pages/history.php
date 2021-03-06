<head>
    <title>Tubirit | History</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container py-5 pb-5">
        <h2 class="pb-5"><strong>History Request Book</strong></h2>
        <table class="table table-bordered me-ml-3 table-hover">
            <thead>
                <tr class="text-center align-middle">
                    <th scope="col">No.</th>
                    <th scope="col">Req ID</th>
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
                        echo '<th scope="row" class="text-center align-middle">' . $no . '</th>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqid . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqdate . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->idgenre . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqjudul . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqpenulis . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqpenerbit . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqhalaman . '</td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->reqtahun . '</td>';
                        echo '<td class="align-middle fs-6"><span class="label label-warning">' . $dataRequest->reqsummary . '</span></td>';
                        echo '<td class="text-center align-middle">' . $dataRequest->status . '</td>';
                        echo '</tr>';
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>