<?php
    require "../../rifky_koneksi.php";
    $rifky_pelanggan = "SELECT * FROM rifky_tb_member";
    $result = mysqli_query($dbConn, $rifky_pelanggan);
?>
<?php
    require "head_navbar.php";
?>
<main class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h5 class="border-bottom pb-2 mb-0">Lihat Pelanggan</h5>
        <div style="overflow-x:auto;">
            <table class="table table-striped mt-2" style=" text-align: center;">
                <?php $i = 1 ?>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No ID</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telp</th>
                </tr>
                <tr>
                    <?php foreach ($result as $r) : ?>
                        <td> <?= $i ?> </td>
                        <td> <?= $r['rifky_nama']; ?></td>
                        <td> <?= $r['rifky_id_member'] ?></td>
                        <td> <?= $r['rifky_alamat'] ?></td>
                        <td> <?php if ($r['rifky_jenis_kelamin'] == 'L') {
                                    echo "Laki-Laki";
                                } else {
                                    echo "Perempuan";
                                }
                                ?></td>
                        <td> <?= $r['rifky_telp'] ?></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
            </table>
        </div>
        <small class="d-block text-end mt-3">
            <a href="#">All updates</a>
        </small>
        <a href="rifky_registrasi_pelanggan.php" class="btn btn-info">Kembali</a>
    </div>
</main>
<?php
    require "foot.php";
?>