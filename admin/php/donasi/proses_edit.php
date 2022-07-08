<?php
include '../koneksi.php';

$id_donasi = $_POST['id_donasi'];
$jumlah = $_POST['jumlah'];
$status = $_POST['status'];

$target_dir = "../../upload_bukti/";
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
        $query = mysqli_query($koneksi, "UPDATE donasi SET jumlah ='$jumlah', bukti ='$namagambar', status = '$status' WHERE id = '$id_donasi'");

        header('location: ../../donasi.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
