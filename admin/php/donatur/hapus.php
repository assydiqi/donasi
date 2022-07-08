<?php
    include '../koneksi.php';

    $id = $_GET['id'];

    $delete = mysqli_query($koneksi, "DELETE FROM donatur WHERE id = $id");
    header("location: ../../donatur.php");
?>