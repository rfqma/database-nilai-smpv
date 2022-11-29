<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Siswa</title>
    <link rel="stylesheet" href="css_datamahasiswa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <?php
    include "koneksi_smpv.php";
    $nis = $_POST['nis'];
    $namaSiswa = $_POST['namaSiswa'];
    $ennama = base64_encode(str_rot13($namaSiswa));
    $kelasSiswa = $_POST['kelasSiswa'];
    $nilaiMatematika = $_POST['nilaiMatematika'];
    $nilaiBindonesia = $_POST['nilaiBindonesia'];
    $nilaiBinggris = $_POST['nilaiBinggris'];
    $nilaiIpa = $_POST['nilaiIpa'];
    $file = $_FILES['file'];

    $namafile = $_FILES['file']['name'];
    $target_dir = './assets/uploads/';
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    echo $namafile;
    // Memilih Tipe File
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Tipe File yang Valid
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    $move = __DIR__ . "/assets/uploads/" . $_FILES['file']['name'];

    move_uploaded_file($_FILES['file']['tmp_name'], $move);


    $query = mysqli_query($koneksi, "INSERT INTO data_nilai VALUES ('$nis','$ennama','$kelasSiswa','$nilaiMatematika', '$nilaiBindonesia', '$nilaiBinggris', '$nilaiIpa', '$namafile')")
        or die(mysqli_error($koneksi));

    if (!$query) {
        echo '<script> alert("Submit gagal!") </script>';
        header("location:form_nilai.php");
    } else {
        echo '<script> alert("Submit berhasil!") 
        window.location.href = "view_nilai.php";
        </script>';
    }

    ?>

</body>

</html>