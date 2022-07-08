<?php
include 'koneksi.php';

session_start();

$id_donasi = $_POST['id_donasi'];
$rekening = $_POST['rekening'];
$id_donatur = $_SESSION['idUser'];

$target_dir = "../upload_bukti/";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["gambar"]["tmp_name"]);
if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    $temp = explode(".", $_FILES["gambar"]["name"]);
    $namagambar = uniqid() . date('Ymd') . '.' . end($temp);
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_dir . $namagambar)) {
        $query = mysqli_query($koneksi, "INSERT INTO bukti (id_donasi, rekening, gambar) VALUES ('$id_donasi', '$rekening', '$namagambar')");
        $query = mysqli_query($koneksi, "UPDATE donasi SET bukti = '$namagambar', status = 'Sudah Konfirmasi' WHERE id = '$id_donasi'");

        header('location: ../halamanmenu.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
