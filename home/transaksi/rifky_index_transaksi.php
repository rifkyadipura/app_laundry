<?php
    require "../../rifky_koneksi.php";
    session_start();
    $tbTransaksi = "SELECT rifky_tb_transaksi.rifky_id_transaksi,
                        rifky_tb_outlet.rifky_nama AS nama_outlet,
                        rifky_tb_transaksi.rifky_kode_invoice,
                        rifky_tb_member.rifky_nama AS nama_member,
                        rifky_tb_transaksi.rifky_tgl,
                        rifky_tb_transaksi.rifky_batas_waktu,
                        rifky_tb_transaksi.rifky_tgl_bayar,
                        rifky_tb_transaksi.rifky_biaya_tambahan,
                        rifky_tb_transaksi.rifky_diskon,
                        rifky_tb_transaksi.rifky_pajak,
                        rifky_tb_transaksi.rifky_status,
                        rifky_tb_transaksi.rifky_dibayar,
                        rifky_tb_users.rifky_nama AS user
                    FROM `rifky_tb_transaksi`
                    INNER JOIN rifky_tb_outlet ON rifky_tb_transaksi.rifky_id_outlet = rifky_tb_outlet.rifky_id_outlet
                    INNER JOIN rifky_tb_member ON rifky_tb_transaksi.rifky_id_member = rifky_tb_member.rifky_id_member
                    INNER JOIN rifky_tb_users ON rifky_tb_transaksi.rifky_id_user = rifky_tb_users.rifky_id_user
                    ORDER BY rifky_id_transaksi DESC";
    $query = mysqli_query($dbConn, $tbTransaksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<a href="rifky_tambah_transaksi.php">Tambah Transaksi</a>
<body>
    <table border="1" cellscpacing="10" cellpadding="">
        <tr>
            <th>No</th>            
            <th>Kode</th>
            <th>Outlet</th>
            <th>Member</th>
            <th>Tanggal</th>
            <th>Batas Waktu</th>
            <th>Tanggal Bayar</th>
            <th>Biaya Tambahan</th>
            <th>Diskon</th>
            <th>Pajak</th>
            <th>Status</th>
            <th>Dibayar</th>
            <th>Kasir</th>
            <th>Cetak</th>
            <th></th>
        </tr>
        <?php $i = 1; ?>
            <?php foreach ($query as $tr): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $tr['rifky_kode_invoice'];?></td>
                    <td><?= $tr['nama_outlet'];?></td>
                    <td><?= $tr['nama_member'];?></td>
                    <td><?= $tr['rifky_tgl'];?></td>
                    <td><?= $tr['rifky_batas_waktu'];?></td>
                    <td><?= $tr['rifky_tgl_bayar'];?></td>
                    <td><?= $tr['rifky_biaya_tambahan'];?></td>
                    <td><?= $tr['rifky_diskon'];?></td>
                    <td><?= $tr['rifky_pajak'];?></td>
                    <td><?= $tr['rifky_status'];?></td>
                    <td><?= $tr['rifky_dibayar'];?></td>
                    <td><?= $tr['user'];?></td>
                    <td><a href="">Cetak</a></td>
                    <td><a href="">Detail Transaksi</a></td>
                </tr>
            <?php $i++;?>
        <?php endforeach ?>
    </table>
</body>
</html>