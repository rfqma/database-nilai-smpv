<?php
session_start();
if (empty($_SESSION['username'])) {
  header("location:login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/style/pages.css">
  <link rel="icon" href="assets/imgs/logo_absensi.png" type="image/png">
</head>

<body>
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

  <br><br><br>

  <div class="container shadow-2-strong rounded-5 p-4">
    <div class="card-body col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h3 class="card-title">Selamat Datang!</h3>
      <br>
      <p class="card-text">1. Melihat List Data Nilai Siswa SMP 'V': <a href="view_nilai.php">Lihat Data</a></p>
      <p class="card-text">2. Menambahkan Data Nilai Siswa SMP 'V': <a href="form_nilai.php">Tambahkan Data</a></p>
    </div>
  </div>


</body>

</html>