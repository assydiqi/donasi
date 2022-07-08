<?php
    include 'koneksi.php';
    session_start();
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $enkripsi_password = md5($password);

    $query = mysqli_query($koneksi, "SELECT id FROM donatur WHERE email = '$email' AND password = '$enkripsi_password'");
    if(mysqli_num_rows($query) > 0) {
        $id = mysqli_fetch_assoc($query);
        $_SESSION['idUser'] = $id; 
        
        header('location: ../halamanmenu.php');
    } else {
        header('location: ../halamanlogin.php?login=gagal');
    }
?>