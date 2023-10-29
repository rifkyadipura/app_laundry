<?php
    require "../../rifky_koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    session_start();

    $sql = "SELECT * FROM rifky_tb_transaksi";
    $transaksi = mysqli_query($dbConn, $sql);

    $sql2 = "SELECT * FROM rifky_tb_outlet";
    $outlet = mysqli_query($dbConn, $sql2);
    
    $sql3 = "SELECT * FROM rifky_tb_member";
    $member = mysqli_query($dbConn, $sql3);

    $id_user = $_SESSION['rifky_id_user'];
    $sql4 = "SELECT * FROM rifky_tb_users WHERE rifky_id_user = '$id_user'";
    $user = mysqli_query($dbConn, $sql4);

    $kode = kode('rifky_kode_invoice', 'rifky_tb_transaksi', 'PJ');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="rifky_kode_invoice">Kode</label>
                    <input type="text" name="rifky_kode_invoice" id="rifky_kode_invoice" value="<?= $kode ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_id_outlet">Outlet</label>
                    <select name="rifky_id_outlet" id="rifky_id_outlet">
                        <?php foreach ($outlet as $o): ?>
                            <option value="<?= $o['rifky_id_outlet'] ?>"> <?= $o['rifky_nama']; ?> </option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_id_member">Member</label>
                    <select name="rifky_id_member" id="rifky_id_member">
                        <?php foreach ($member as $m): ?>
                            <option value="<?= $m['rifky_id_member']; ?>"> <?= $m['rifky_nama']; ?> </option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_tgl">Tanggal Datang</label>
                    <input type="text" name="rifky_tgl" id="rifky_tgl" value="<?=date('Y-m-d H:i:s');?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_batas_waktu">Batas Waktu Bayar</label>
                    <input type="date" name="rifky_batas_waktu" id="rifky_batas_waktu" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_tgl_bayar">Tanggal Bayar</label>
                    <input type="date" name="rifky_tgl_bayar" id="rifky_tgl_bayar">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_biaya_tambahan">Biaya Tambahan(Optional)</label>
                    <input type="number" name="rifky_biaya_tambahan" id="rifky_biaya_tambahan">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_diskon">Diskon</label>
                    <input type="number" name="rifky_diskon" id="rifky_diskon">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_pajak">Pajak<label>
                    <input type="number" name="rifky_pajak" id="rifky_pajak">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_status">Status</label>
                    <select name="rifky_status" id="rifky_status">
                        <option value="baru">Baru</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        <option value="diambil">Diambil</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_dibayar">Pembayar</label>
                    <select name="rifky_dibayar" id="rifky_dibayar">
                        <option value="dibayar">Dibayar</option>
                        <option value="belum_dibayar">Belum Dibayar</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rifky_id_user">user<label>
                    <select name="rifky_id_user" id="rifky_id_user">
                        <?php foreach ($user as $u): ?>
                            <option value="<?= $u['rifky_id_user']; ?>"> <?= $u['rifky_nama']; ?> </option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        $rifky_id_outlet = $_POST['rifky_id_outlet'];
        $rifky_kode_invoice = $_POST['rifky_kode_invoice'];
        $rifky_id_member = $_POST['rifky_id_member'];
        $rifky_tgl = $_POST['rifky_tgl'] = date('Y-m-d H:i:s');
        $rifky_batas_waktu = $_POST['rifky_batas_waktu'];
        $rifky_tgl_bayar = $_POST['rifky_tgl_bayar'];
        $rifky_biaya_tambahan = $_POST['rifky_biaya_tambahan'];
        $rifky_diskon = $_POST['rifky_diskon'];
        $rifky_pajak = $_POST['rifky_pajak'];
        $rifky_status = $_POST['rifky_status'];
        $rifky_dibayar = $_POST['rifky_dibayar'];
        $rifky_id_user = $_POST['rifky_id_user'];

        $sql = "INSERT INTO rifky_tb_transaksi
                VALUES
                ('', '$rifky_id_outlet', '$rifky_kode_invoice', '$rifky_id_member', 
                '$rifky_tgl', '$rifky_batas_waktu', '$rifky_tgl_bayar', 
                '$rifky_biaya_tambahan', '$rifky_diskon', '$rifky_pajak', 
                '$rifky_status', '$rifky_dibayar', '$rifky_id_user')";
        // var_dump($sql);
        // die();
        $query = mysqli_query($dbConn, $sql);
        if (!$query) {
            die("Gagal Menambahkan Transaksi");
        } echo "<script>
                    alert('Berhasil Menambahkan Transaksi');
                    document.location.href = 'rifky_index_transaksi.php'; 
                </script>";
    }
?>