<?php
    include '../koneksi.php';

    $id = $_GET['id'];

    $delete = mysqli_query($koneksi, "DELETE FROM program WHERE id = $id");
    header("location: ../../program.php");
?>