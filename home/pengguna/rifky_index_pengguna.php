<?php
// session_start();
 require "../../rifky_koneksi.php";
 $rifky_pengguna = "SELECT 
                    rifky_tb_users.rifky_id_user,
                    rifky_tb_users.rifky_nama,
                    rifky_tb_users.rifky_username,
                    rifky_tb_users.rifky_password,
                    rifky_tb_outlet.rifky_nama AS outlet,
                    rifky_tb_users.rifky_role
                    FROM `rifky_tb_users` 
                    INNER JOIN rifky_tb_outlet ON rifky_tb_outlet.rifky_id_outlet = rifky_tb_users.rifky_id_outlet";
 $result = mysqli_query($dbConn, $rifky_pengguna);
?>
    <?php
        require "head_navbar.php";
    ?>
        <main class="container">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h5 class="border-bottom pb-2 mb-0">Pengguna</h5>
                    <div class="d-flex text-muted pt-3">
                        <a href="rifky_tambah_pengguna.php" class="btn btn-primary">Tambah Pengguna</a>
                    </div>
                    <div style="overflow-x:auto;">
                        <table class="table table-striped mt-2" style=" text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Outlet</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php $i = 1 ?>
                                <?php foreach($result as $rp) : ?>
                                    <tr>
                                        <td> <?= $i; ?> </td>
                                        <td> <?= $rp["rifky_nama"]; ?> </td>
                                        <td> <?= $rp["rifky_username"]; ?> </td>
                                        <td> <?= $rp["rifky_password"]; ?> </td>
                                        <td> <?= $rp["outlet"]; ?> </td>
                                        <td> <?= $rp["rifky_role"]; ?> </td>
                                        <td>
                                            <a href="rifky_edit_pengguna.php?id=<?= $rp['rifky_id_user'] ?>" class="btn btn-success">Edit</a> 
                                            <a href="rifky_hapus_pengguna.php?id=<?= $rp['rifky_id_user'] ?>" class="btn btn-danger"
                                            onclick="return confirm('Yakin Untuk Menghapus User?');">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ; ?>
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
