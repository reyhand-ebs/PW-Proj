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
            <h1>What book do you want to read today?</h1>
            <div class="btn-group p-4">
                <button id="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown">
                    Sort/ Group by
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a class="dropdown-item">A-Z</a></li>
                    <?php
                    include('./inc.koneksi.php');
                    require_once('./class/class.genre.php');
    
                    $objGenre = new Genre();
                    $arrayResult = $objGenre->SelectAllGenre();
                    foreach ($arrayResult as $dataGenre) {
                        echo '<li>'.'<a class="dropdown-item" href="'.$dataGenre->idgenre'.">."'$dataGenre->genre'."</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!--RECOMMENDATION LIST-->
        <div class="container">
            <div class="row">
                <?php
                include('./inc.koneksi.php');
                require_once('./class/class.buku.php');

                $objBuku = new Buku();
                $arrayResult = $objBuku->SelectAllBuku();

                if (count($arrayResult) == 0) {
                    echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
                } else {
                    $no = 1;
                    foreach ($arrayResult as $dataBuku) {
                ?>
                <div class='col card mb-3 mx-2'>
                    <div class='row g-0'>
                        <div class='col-md-6 py-2'>
                            <img src="<?php echo $dataBuku->cover;?>" class='img-fluid rounded-start' alt='<?php echo $dataBuku->judul;?>'>
                        </div>
                        <div class='col-md-6'>
                            <div class='card-body'>
                                <h5 class='card-title'><?php echo $dataBuku->judul; ?></h5>
                                <h6 class='card-title'><?php echo $dataBuku->penulis; ?></h6>
                                <br>
                                <p><?php echo $dataBuku->genre;?></br><?php echo $dataBuku->penerbit;?></br><?php echo $dataBuku->halaman?> pages</br><?php echo $dataBuku->tahun;?></p>
                            </div>
                        </div>
                        <p class='card-text'><?php echo $dataBuku->summary;?></p>
                        <div class='card-body'>
                            <div class='float-right btn-group btn-group-sm'>
                                <a href='#' class='btn btn-primary tooltips' data-placement='top' data-toggle='tooltip' data-original-title='dit'><i class='bx bx-pencil'></i></a>
                                <a href='#' class='btn btn-secondary tooltips' data-placement='top' data-toggle='tooltip' data-original-title='Delete'><i class='bx bx-trash'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $no++;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>