<?php
    require "../../rifky_koneksi.php";
    if (isset($_POST['submit'])) {
        $rifky_id_outlet = $_POST['rifky_id_outlet'];
        $rifky_jenis = $_POST['rifky_jenis'];
        $rifky_nama = $_POST['rifky_nama_paket'];
        $rifky_harga = $_POST['rifky_harga'];

        $sql = ("INSERT INTO
                rifky_tb_paket
                VALUES
                ('', '$rifky_id_outlet', '$rifky_jenis', '$rifky_nama', '$rifky_harga')");
        $query = mysqli_query($dbConn, $sql);

        if (!$query) {
            die("Tidak Berhasil Menambahkan Data!!!");
        } echo " <script>
                alert('Tambah Data Berhasil!');
                document.location.href = 'rifky_index_paket.php';
            </script>";
    }
?>