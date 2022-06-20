<!DOCTYPE html>

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
                <button id="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" name="selectgenre">
                    Sort/ Group by
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a class="dropdown-item" href="#">A-Z</a></li>
                    <?php
                    require_once('./class/class.genre.php');

                    $objGenre = new Genre();
                    $arrayResult = $objGenre->SelectAllGenre();

                    foreach ($arrayResult as $dataGenre) {
                        ?>
                        <li><a class="dropdown-item" href="#"><?php echo $dataGenre->namagenre; ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>

        <form action="explore.php" method="get">
            <label>Search :</label>
            <input type="text" name="cari">
            <input type="submit" value="Search">
        </form>

        <?php 
            if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : ".$cari."</b>";
            }
        ?>

        <!--RECOMMENDATION LIST-->
        <div class="container-fluid mx-5 ms-5">
            <div class="row">
                <?php
 
                if(isset($_GET['cari'])){
                 $cari = $_GET['cari'];
                 $sql = ("select * from buku where judul like '%".$cari."%'");    
                }else{
                 $sql = ("select * from buku");  
                }

                require_once('./class/class.buku.php');

                $objBuku = new Buku();
                $arrayResult = $objBuku->SelectAllBuku();

                if (count($arrayResult) == 0) {
                    echo '<p>Tidak ada data!</p>';
                } else {
                    $no = 1;
                    foreach ($arrayResult as $dataBuku) {
                ?>
                        <div class="col-3 card mb-3 mx-2">
                            <div class="row g-0">
                                <div class="col-sm-6 py-2">
                                    <img class="img-fluid rounded" alt="<?php echo $dataBuku->judul; ?>" src="./img/books/<?php echo $dataBuku->cover; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $dataBuku->judul; ?></h5>
                                        <h6 class="card-title"><?php echo $dataBuku->penulis; ?></h6>
                                        <br>
                                        <p><?php echo $dataBuku->namagenre; ?><br><?php echo $dataBuku->penerbit; ?><br><?php echo $dataBuku->halaman; ?> halaman<br><?php echo $dataBuku->tahun; ?></p>
                                    </div>
                                </div>
                                <p class="card-text"><?php echo $dataBuku->summary; ?></p><br>
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
</body>

</html>