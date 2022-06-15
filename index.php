<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    include('./pages/include/header.php');
    ?>
    <!-- HERO -->
    <div class="container-fluid col-xxl-11 px-3 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-md-8 col-lg-6">
                <img src="./img/hero.png" class="d-block mx-lg-auto img-fluid" alt="Website Responsive" width="700" height="500">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Halo, Kita adalah Tubirit</h1>
                <p class="lead">Platform membaca yang paling diminati di Indonesia</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-md px-4 me-md-2 rounded-pill">Mulai Membaca</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FITUR -->
    <div class="container-fluid col-xxl-11 px-3 py-5">
        <div class="feature">
            <div class="row mb-5">
                <h1>Membaca semakin mudah</h1>
                <p>Membaca semakin mudah. Baca buku, soft file buku, dan berbagi rekomendasi buku bacaan. Di mana pun, kapan pun dengan nyaman bersama setiap orang.</p>
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="service card-effect bg-secondary align-middle text-center rounded-4 text-white h-100">
                        <div class="iconbox mx-auto">
                            <i class='bx bx-signal-5 mb-4 fs-1'></i>
                        </div>
                        <h4 class="mb-2">Berbagi dan Bersosialisasi</h4>
                        <p>Temukan dan jalin pertemanan. Dapatkan aktifitas kerabatmu.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service card-effect bg-secondary align-middle text-center rounded-4 text-white h-100">
                        <div class="iconbox mx-auto">
                            <i class='bx bxs-file-blank mb-4 fs-1'></i>
                        </div>
                        <h4 class="mb-2">Syarat Pendaftaran Mudah</h4>
                        <p>Cukup beberapa detik untuk bergabung dan merasakan website tubirit.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service card-effect bg-secondary align-middle text-center rounded-4 text-white h-100">
                        <div class="iconbox mx-auto">
                            <i class='bx bxs-bookmarks mb-4 fs-1'></i>
                        </div>
                        <h4 class="mb-2">Buat dan Sebarkan Rekomendasimu</h4>
                        <p>Tambah dan bagikan rekomendasi untuk memotivasi yang lain untuk membaca.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT -->
    <!-- HERO -->
    <?php
    include('./pages/include/footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>