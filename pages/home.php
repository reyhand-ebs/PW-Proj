<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tubirit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- HERO -->
    <div class="container col-xxl-11 px-3 py-5 mb-5">
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
    <div class="container col-xxl-11 px-3 py-5 mb-5">
        <div class="feature">
            <div class="row mb-5">
                <h1>Membaca semakin mudah</h1>
                <p>Membaca semakin mudah. Baca buku, soft file buku, dan berbagi rekomendasi buku bacaan. Di mana pun, kapan pun dengan nyaman bersama setiap orang.</p>
            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="service card-effect align-middle text-center rounded-4 h-100 shadow">
                        <div class="iconbox mx-auto">
                            <i class='bx bx-signal-5 mb-4 fs-1'></i>
                        </div>
                        <h4 class="mb-2">Berbagi dan Bersosialisasi</h4>
                        <p>Temukan dan jalin pertemanan. Dapatkan aktifitas kerabatmu.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service card-effect align-middle text-center rounded-4 h-100 shadow">
                        <div class="iconbox mx-auto">
                            <i class='bx bxs-file-blank mb-4 fs-1'></i>
                        </div>
                        <h4 class="mb-2">Syarat Pendaftaran Mudah</h4>
                        <p>Cukup beberapa detik untuk bergabung dan merasakan website tubirit.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service card-effect align-middle text-center rounded-4 h-100 shadow">
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
    <!-- Cara Kerja -->
    <div class="container mb-5">
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <h1>Bagaimana cara kerja Tubirit</h1>
                <p>Temukan rekomendasi anda melalui komunitas dan teknologi di Tubirit</p>
            </div>
        </div>
        <div class="accordion" id="accordionWorks">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <strong>Buat List Rekomendasimu sendiri</strong>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionWorks">
                    <div class="accordion-body">
                        Anda dapat membuat daftar rekomendasi Anda sendiri, dan Anda dapat membagikannya dengan orang lain sehingga mereka dapat melihat daftar Anda.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <strong>Mengajukan Rekomendasi</strong>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionWorks">
                    <div class="accordion-body">
                        Anda dapat mengajukan rekomendasi buku sesuai keinginan Anda agar orang lain dapat membaca rekomendasi yang Anda kirimkan.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <strong>Pengurutan berdasarkan Genre</strong>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionWorks">
                    <div class="accordion-body">
                        Anda dapat mengurutkan buku berdasarkan genre atau buku baru yang telah diunggah.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT -->
    <div class="container mb-5">
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <h6 class="text-primary">CONTACT</h6>
                <h1>Get In Touch</h1>
                <p>Lorem ipsum dolor sit amet consectetur nisi necessitatibus repellat distinctio eveniet eaque fuga
                    in cumque optio consectetur harum vitae debitis sapiente praesentium aperiam aut</p>
            </div>
        </div>
        <form action="" class="row g-3 justify-content-center">
            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Full Name" name="nama">
            </div>
            <div class="col-md-5">
                <input type="email" class="form-control" placeholder="Enter E-mail" name="email" required>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Enter Subject" name="subject">
            </div>
            <div class="col-md-10">
                <textarea cols="30" rows="5" class="form-control" placeholder="Enter Message" name="pesan"></textarea>
            </div>
            <div class="col-md-8 d-grid">
                <button class="btn btn-primary" name="btnSend"><a href="../index.php" style="color: #fff; text-decoration: none;">Send</a></button>
            </div>
        </form>
    </div>
</body>

</html>