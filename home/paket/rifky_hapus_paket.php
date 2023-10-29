<?php
    require "../../rifky_koneksi.php";
    $rifky_id_paket = $_GET['id'];
    $sql = "DELETE FROM
            `rifky_tb_paket`
            WHERE
            rifky_id_paket = '$rifky_id_paket'";
    $hapus = mysqli_query($dbConn, $sql);
    if ($hapus) {
        echo "<script>
                alert('Data Berhasil Di Hapus');
                </script>";
        header("Location: rifky_index_paket.php");
    } else {
        echo "<script>
                alert('Data Gagal!!!');
                </script>";
        header("Location: rifky_index_paket.php");
    }
    
?>