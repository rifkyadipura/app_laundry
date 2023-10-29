<?php
    require "../../rifky_koneksi.php";
    $sql = "SELECT rifky_id_paket,
            rifky_tb_outlet.rifky_id_outlet,
            rifky_tb_outlet.rifky_nama AS rifky_nama_outlet,
            rifky_jenis,
            rifky_nama_paket,
            rifky_harga
            FROM rifky_tb_paket
            INNER JOIN rifky_tb_outlet ON rifky_tb_outlet.rifky_id_outlet = rifky_tb_paket.rifky_id_outlet";
    $result = mysqli_query($dbConn, $sql);
    // session_start();
?>
<?php
    require "head_navbar.php";
?>
<main class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h5 class="border-bottom pb-2 mb-0">Paket</h5>
            <div class="d-flex text-muted pt-3">
                <a href="rifky_tambah_paket.php" class="btn btn-primary">Tambah Paket</a>
            </div>
            <div style="overflow-x:auto;">
                <table class="table table-striped mt-2" style=" text-align: center;">
    <!-- <a href="rifky_tambah_paket.php">Tambah Paket</a>
    <table border="1" cellscpacing = "10" cellpadding = ""> -->
                    <?php $i = 1 ?>
                    <tr>
                        <th>No</th>
                        <th>Outlet</th>
                        <th>Jenis</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th></th>
                    </tr>
                    <tr>
                        <?php foreach ($result as $r): ?>
                        <td> <?= $i ?></td>
                        <td> <?= $r['rifky_nama_outlet']; ?></td>
                        <td> <?= $r['rifky_jenis']; ?></td>
                        <td> <?= $r['rifky_nama_paket']; ?></td>
                        <td> <?= $r['rifky_harga']; ?></td>
                        <td>
                            <a href="rifky_edit_paket.php?id=<?= $r['rifky_id_paket']; ?>" class="btn btn-success">Edit</a>
                            <a href="rifky_hapus_paket.php?id=<?= $r['rifky_id_paket']; ?>" class="btn btn-danger"
                            onclick = "return confirm('Yakin Untuk Hapus Paket');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </table>
    </div>
                <small class="d-block text-end mt-3">
                    <a href="#">All updates</a>
                </small>
                <a href="../rifky_index.php" class="btn btn-info">Kembali</a>
            </div>
        </main>
        <?php
            require "foot.php";
        ?>