<?php
    require "../../rifky_koneksi.php";

    $id  = $_GET['id'];
    $sql = "DELETE FROM
            rifky_tb_users
            WHERE 
            rifky_id_user=$id";
    $hapus = mysqli_query($dbConn, $sql);
    if($hapus){
        echo "<script>
                alert('Data Berhasil Di Hapus');
                </script>";
        header("Location: rifky_index_pengguna.php");
    }else{
        echo "<script>
                alert('Data Gagal Di Hapus');
                </script>";
        header("Location: rifky_index_pengguna.php");
    }
?>