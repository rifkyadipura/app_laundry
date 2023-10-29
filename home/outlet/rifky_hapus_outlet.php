<?php
    require "../../rifky_koneksi.php";

    $rifky_id = $_GET['id'];

    $sql = ("DELETE FROM 
            rifky_tb_outlet 
            WHERE 
            rifky_id_outlet = '$rifky_id'");
    $hapus = mysqli_query($dbConn, $sql);

    if($hapus){
        echo "<script>
                alert('data berhasil dihapus');
                </script>";
        header('location: rifky_index_outlet.php');
    } else{
        echo "<script>
                alert('data gagal dihapus');
                </script>";
        header('location: rifky_index_outlet.php');
    }
?>