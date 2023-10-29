<?php
    require "../../rifky_koneksi.php";
    $rifky_outlet = "SELECT * FROM rifky_tb_outlet";
    $rifky_result = mysqli_query($dbConn, $rifky_outlet);
    // session_start();
?>

<?php
    require "head_navbar.php";
?>
<main class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h5 class="border-bottom pb-2 mb-0">Outlet</h5>
        <div class="d-flex text-muted pt-3">
            <a href="rifky_tambah_outlet.php" class="btn btn-primary">Tambah Outlet</a>
        </div>
        <div style="overflow-x:auto;">
            <table class="table table-striped mt-2" style=" text-align: center;">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th></th>
                </tr>
                <tr>
                    <?php $i = 1 ?>
                    <?php foreach ($rifky_result as $rr) : ?>
                        <td><?= $i; ?></td>
                        <td><?= $rr['rifky_nama'] ?></td>
                        <td><?= $rr['rifky_alamat'] ?></td>
                        <td><?= $rr['rifky_telp'] ?></td>
                        <td>
                            <a href="rifky_edit_outlet.php?id=<?= $rr['rifky_id_outlet'] ?>"  class="btn btn-success">Edit</a>
                            <a href="rifky_hapus_outlet.php?id=<?= $rr['rifky_id_outlet'] ?>"  class="btn btn-danger" onclick="return confirm('Yakin Untuk Menghapus?');">Hapus</a>
                        </td>
                </tr>
                <?php $i++; ?>
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