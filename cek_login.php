<?php
session_start();

$query = new mysqli('localhost', 'root', '', 'db_smpv');

$username = $_POST['username'];
$password = $_POST['password'];
$enpass = md5($password); // new 

$data = mysqli_query($query, "select * from data_login where username='$username' and password='$enpass'")
    or die(mysqli_error($query));
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $login = mysqli_fetch_assoc($data);

    if ($login) {

        $_SESSION['username'] = $username;
        header("location:halaman_admin.php?nip=$login[nip];");
    }
} else {
    header("location:login.php?pesan=gagal");
}
