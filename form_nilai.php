<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Siswa</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/style/pages.css">
    <link rel="icon" href="assets/imgs/logo_absensi.png" type="image/png">
</head>

<body>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo '<script> alert("Login gagal! username dan password salah") </script>';
        } else if ($_GET['pesan'] == "logout") {
            echo '<script> alert("Anda telah logout") </script>';
        } else if ($_GET['pesan'] == "belum_login") {
            echo '<script> alert("Anda belum melakukan login") </script>';
        }
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow-5-strong">

        <div class="container">

            <a class="navbar-brand me-2 text-white" href="halaman_admin.php">
                <img src="assets/imgs/tut-wuri-handayani.png" height="60" alt="" loading="lazy" style="margin-top: -1px;" />
                SMP 'V'
            </a>
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item text-white">
                        <a class="nav-link active text-white" aria-current="page">
                            <?php
                            date_default_timezone_set("Asia/Bangkok");
                            $date = date('l, d/m/Y (H:i:s)');
                            echo " $date";
                            ?>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="view_nilai.php">List Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="form_nilai.php">Tambah Data Siswa</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center p-3">
                    <a type="button" class="btn btn-primary me-0" href="logout.php"> Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-5 m-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-dark fs-5">Input Nilai Siswa</h5>

                        <form method="POST" action="proses-form-nilai.php" enctype="multipart/form-data">

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="nis" name="nis" required autofocus>
                                <label for="nis">NIS</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="namaSiswa" name="namaSiswa" required autofocus>
                                <label for="namaSiswa">Nama Lengkap</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="kelasSiswa" name="kelasSiswa" required autofocus>
                                <label for="kelasSiswa">Kelas</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="nilaiMatematika" name="nilaiMatematika" required autofocus>
                                <label for="nilaiMatematika">Nilai Matematika</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="nilaiBindonesia" name="nilaiBindonesia" required autofocus>
                                <label for="nilaiBindonesia">Nilai Bahasa Indonesia</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="nilaiBinggris" name="nilaiBinggris" required autofocus>
                                <label for="nilaiBinggris">Nilai Bahasa Inggris</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="nilaiIpa" name="nilaiIpa" required autofocus>
                                <label for="nilaiIpa">Nilai IPA</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="file" name="file" required autofocus>
                                <label class="form-label" for="file">Berkas Nilai</label>
                            </div>

                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Submit</button>
                            </div>

                            <hr class="my-4">
                        </form>

                        <div>
                            <a href="halaman_admin.php">
                                <button class="btn btn-dark btn-sm" aria-pressed="true">Kembali</button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>