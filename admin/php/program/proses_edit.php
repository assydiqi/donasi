<?php
    include '../koneksi.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];

    mysqli_query($koneksi, "UPDATE program SET program = '$nama' WHERE id = '$id'");
    header("location: ../../program.php");
?>