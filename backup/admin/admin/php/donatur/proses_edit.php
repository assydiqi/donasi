<?php
    include '../koneksi.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    mysqli_query($koneksi, "UPDATE donatur SET nama = '$nama', email = '$email', alamat = '$alamat', telepon = '$telepon' WHERE id = '$id'");
    header("location: ../../donatur.php");
?>