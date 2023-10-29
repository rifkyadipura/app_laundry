<?php
    require "../../rifky_koneksi.php";
    session_start();
    $rifky_nama     = $_POST['nama'];
    $rifky_username = $_POST['username'];
    $rifky_password = md5($rp = $_POST['password']);
    $rifky_outlet   = $_POST['outlet'];
    $rifky_role     = $_POST['role'];

    // Enskripsi password	
    // $rifky_password = password_hash($rifky_password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO 
            `rifky_tb_users` 
            VALUES
            ('', '$rifky_nama', '$rifky_username', '$rifky_password', '$rifky_outlet', '$rifky_role') ";
    $query = mysqli_query($dbConn, $sql);
    if (!$query) {
        die("Tidak berhasil menambahkan data");
    }
        echo "  <script>
                alert('Tambah Data Berhasil!');
                document.location.href = 'rifky_index_pengguna.php';
            </script>";
    
?>