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
                    <li><a class="dropdown-item" href="<?php?>">A-Z</a></li>
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
            <div class="row">
                <div class="col card mb-3 mx-2">
                    
                    <?php
                        include('./inc.koneksi.php');
                        require_once('./class/class.buku.php');

                        $objBuku = new Buku();
                        $arrayResult = $objBuku->SelectAllBuku();

                        if (count($arrayResult) == 0) {
                            echo '<p>Tidak ada data!</p>';
                        } else {
                            $no = 1;
                            foreach ($arrayResult as $dataBuku) {
                                echo '<div class="row g-0">';
                                echo '<div class="col-md-6 py-2"><img class="img-fluid rounded-start w-20" src="./img/books/' . $dataBuku->cover . '"></div>';
                                echo '<div class="col-md-6"><div class="card-body">';
                                echo '<h5 class="card-title">' . $dataBuku->judul . '</h5>';
                                echo '<h6 class="card-title">' . $dataBuku->penulis . '</h6>';
                                echo '<p>' . $dataBuku->idgenre . '</p>';
                                echo '<p>' . $dataBuku->penerbit . '</p>';
                                echo '<p>' . $dataBuku->halaman . '</p>';
                                echo '<p>' . $dataBuku->tahun . '</p></div>';
                                echo '<p class="card-text">' . $dataBuku->summary . '</p>';
                                echo '<div class="card-body">
                                        <div class="float-right btn-group btn-group-sm">
                                            <a href="dashboardadmin.php?p=buku&idbuku='.$dataBuku->idbuku.'" class="btn btn-primary tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Edit"><i class="bx bx-pencil"></i></a>
                                            <a href="#" class="btn btn-secondary tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="bx bx-trash" ></i></a>
                                        </div>
                                    </div></div>';
                                $no++;
                            }
                        }
                    ?>
                        

                </div>
            </div>            
        </div>
    </div>
<body>
    