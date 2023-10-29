<?php
    require 'koneksi_rifky.php';

    $kode_user = autoIncrement('kode_user_rifky', 'user_rifky', 'KU');
    $username = $_POST['username_rifky'];
    $password = $_POST['password_rifky'];
    $namaUser = $_POST['nama_rifky'];
    $alamat = $_POST['alamat_rifky'];
    $priv = $_POST['priv_user_rifky'];

    $sql = "INSERT INTO `user_rifky` 
            (`kode_user_rifky`, `username_rifky`, `password_rifky`, `nama_rifky`, `alamat_rifky`, `priv_user_rifky`) 
            VALUES 
            ('$kode_user', '$username', '$password', '$namaUser', '$alamat', '$priv');";
    $query = mysqli_query($dbConn, $sql);

    if (!$query) {
        die("Tidak berhasil menambahkan data");
    }

    echo "  <script>
                alert('Tambah Data Berhasil!');
                document.location.href = 'login_rifky.php';
            </script>";
?>