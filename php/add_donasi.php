<?php
    include 'koneksi.php';
    session_start();

    $id_donatur = implode(" ", $_SESSION['idUser']);
    $id_program = $_POST['kode'];
    $jumlah = $_POST['jumlah'];
    $status = 0;

    $query = mysqli_query($koneksi, "INSERT INTO donasi (id_donatur, id_program, jumlah, tanggal, status) VALUES ('$id_donatur', '$id_program', '$jumlah', NOW(), '$status')");
    header('location: ../halamanmenu.php');
?>