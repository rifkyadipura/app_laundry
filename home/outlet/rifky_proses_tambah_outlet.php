<?php
require "../../rifky_koneksi.php";

session_start();
$rifky_nama = $_POST['nama'];
$rifky_alamat = $_POST['alamat'];
$rifky_telp = $_POST['no_telp'];

$sql = ("INSERT INTO 
        `rifky_tb_outlet`
        VALUE 
        ('', '$rifky_nama', '$rifky_alamat', '$rifky_telp')");
$query = mysqli_query($dbConn, $sql);
if (!$query) {
    die("Tidak Berhasil Menambahkan Data");
}
echo "  <script>
                alert('Tambah Data Berhasil!');
                document.location.href = 'rifky_index_outlet.php';
            </script>";
?>