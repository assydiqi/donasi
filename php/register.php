<?php
    include 'koneksi.php';
    
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $password = $_POST['password'];

    $enkripsi_password = md5($password);

    $query = mysqli_query($koneksi, "INSERT INTO donatur (nama, email, alamat, telepon, password) VALUES ('$nama', '$email', '$alamat', '$telepon', '$enkripsi_password')");
    header('location: ../halamanlogin.php');
?>