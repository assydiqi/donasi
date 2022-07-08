<?php
    include '../koneksi.php';

    $nama = $_POST['nama'];

    mysqli_query($koneksi, "INSERT INTO program(program) VALUES ('$nama')");
    header("location: ../../program.php");
?>