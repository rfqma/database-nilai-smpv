<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?pesan=belum_login");
}

include "koneksi_smpv.php";
$nis = $_GET['nis'];
$query = mysqli_query($koneksi, "DELETE FROM data_nilai WHERE nis = $nis");

if (!$query) {
    echo '<script>';
    echo 'alert("Hapus data nilai gagal!");';
    echo 'window.location.href = "view_nilai.php";';
    echo '</script>';
} else {
    echo '<script>';
    echo 'alert("Hapus data nilai berhasil!");';
    echo 'window.location.href = "view_nilai.php";';
    echo '</script>';
}
