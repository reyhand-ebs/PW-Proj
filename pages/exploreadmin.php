<head>
    <title>Tubirit | Explore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container-fluid py-5">
        <div class="container text-start">
            <h1>Hello Admin!</h1>
            <div class="card-body p-2">
                <a href="form_add.php" class="btn btn-success">Tambah</a>
            </div>
            <div class="btn-group p-2">
                <button id="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" name="selectgenre">
                    Sort/ Group by
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a class="dropdown-item" href="#">A-Z</a></li>
                    <li><a class="dropdown-item" href="#">History</a></li>
                    <li><a class="dropdown-item" href="#">Adventure</a></li>
                    <li><a class="dropdown-item" href="#">Fantasy</a></li>
                    <li><a class="dropdown-item" href="#">Sci-Fi</a></li>
                    <li><a class="dropdown-item" href="#">Humor</a></li>
                    <li><a class="dropdown-item" href="#">Horror</a></li>
                    <li><a class="dropdown-item" href="#">Romance</a></li>
                    <li><a class="dropdown-item" href="#">Thriller</a></li>
                </ul>
            </div>
        </div>

        <!--RECOMMENDATION LIST-->
        <div class="container">
                    <?php
                        include('./inc.koneksi.php');
                        require_once('./class/class.buku.php');

                        $objBuku = new Buku();
                        $arrayResult = $objBuku->SelectAllBuku();
                        //$arrayResult = $objBuku->SelectAllBukuByGenre();

                        if (count($arrayResult) == 0) {
                            echo '<p>Tidak ada data!</p>';
                        } /*else if(isset($_GET['selectgenre'])){	
                            $objBuku->selectgenre = $_GET['selectgenre'];	
                            $objBuku->SelectAllBukuByGenre();
                        
                        } */else {
                            $no = 1;
                            foreach ($arrayResult as $dataBuku) {
                                echo '<div class="row">';
                                echo '<div class="col-3 card mb-3 mx-2">';
                                echo '<div class="row g-0">';
                                echo '<div class="col-sm-6 py-2">';
                                echo '<img class="img-fluid rounded" alt="..." src="./img/books/' . $dataBuku->cover . '"></div>';
                                echo '<div class="col-sm-6">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $dataBuku->judul . '</h5>';
                                echo '<h6 class="card-title">' . $dataBuku->penulis . '</h6><br>';
                                echo '<p>' . $dataBuku->namagenre . '<br>'. $dataBuku->penerbit . '<br>'. $dataBuku->halaman . ' halaman<br>' . $dataBuku->tahun . '</p></div></div>';
                                echo '<p class="card-text">' . $dataBuku->summary . '</p>';
                                echo '<div class="card-body">
                                        <div class="float-right btn-group btn-group-sm">
                                            <a href="dashboardadmin.php?p=buku&idbuku='.$dataBuku->idbuku.'" name="btnSubmit" class="btn btn-primary tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="bx bx-pencil"></i></a>
                                            <a href="dashboardadmin.php?p=deletebuku&idbuku='.$dataBuku->idbuku.'" class="btn btn-secondary tooltips" 
                                            onclick="return confirm(\'Apakah anda yakin ingin menghapus?\')" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="bx bx-trash"></i></a>
                                        </div>
                                    </div></div></div></div>';
                                $no++;
                            }
                            } 
                    ?>           
        </div>
    </div>
<body>