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
    <title>Data Nilai Siswa</title>

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


    <div class="container">
        <div class="row">
            <div class="col-lg-15 col-xl-14 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-dark fs-3">Data Nilai Siswa</h5>
                        <hr>
                        <table class="table caption-top">
                            <caption>
                                <?php
                                include "koneksi_smpv.php";
                                $jumlah = mysqli_query($koneksi, "SELECT COUNT(nis) as jumlahData FROM data_nilai ");
                                while ($jmlData = mysqli_fetch_array($jumlah)) {
                                    echo "Total Data = ";
                                    echo $jmlData['jumlahData'];
                                }
                                ?>
                            </caption>
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">NIS</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Kelas</th>
                                    <th scope="col" class="text-center">Nilai Matematika</th>
                                    <th scope="col" class="text-center">Nilai Bahasa Indonesia</th>
                                    <th scope="col" class="text-center">Nilai Bahasa Inggris</th>
                                    <th scope="col" class="text-center">Nilai IPA</th>
                                    <th scope="col" class="text-center">Transkrip Nilai</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * from data_nilai");
                                while ($data = mysqli_fetch_array($query)) {
                                    $denama = str_rot13(base64_decode($data['namaSiswa']));

                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $data['nis']; ?> </td>
                                        <td class="text-center"><?php echo $denama ?> </td>
                                        <td class="text-center"><?php echo $data['kelasSiswa']; ?> </td>
                                        <td class="text-center"><?php echo $data['nilaiMatematika']; ?> </td>
                                        <td class="text-center"><?php echo $data['nilaiBindonesia']; ?> </td>
                                        <td class="text-center"><?php echo $data['nilaiBinggris']; ?> </td>
                                        <td class="text-center"><?php echo $data['nilaiIpa']; ?> </td>
                                        <td class="text-center"><img src="assets/uploads/<?php echo $data['file']; ?>" class="rounded-6" width="100" height="100"></td>
                                        <td class=" text-center">

                                            <a href="delete_siswa.php?nis=<?php echo $data['nis']; ?>" class="btn btn-danger btn-sm mb-1 p-2" role="button" aria-pressed="true" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>

                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>