<?php
    require "../../rifky_koneksi.php";
    $sql = "SELECT rifky_id_outlet, rifky_nama FROM rifky_tb_outlet";
    $rifky_outlet = mysqli_query($dbConn, $sql);
    // session_start();
?>
    <?php
        require "head_navbar.php";
    ?>
        <main class="container">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h5 class="border-bottom pb-2 mb-0">Tambah Pengguna</h5>
                <form action="rifky_proses_tambah_pengguna.php" method="POST">
                    <table>
                        <div class="row mt-2">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input  type="text" name="nama" class="form-control" id="nama" required>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="username" class="form-label">Username</label>
                                <input  type="text" name="username" class="form-control" id="username" required>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="password" class="form-label">Password</label>
                                <input  type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="outlet" class="form-label">Outlet</label>
                                    <select name="outlet" id="outlet" class="form-select" aria-label="Default select example">
                                        <?php foreach ($rifky_outlet as $ro) { ?>                                    
                                        <option value="<?= $ro['rifky_id_outlet'];?>"><?= $ro['rifky_nama'];?></option>
                                        <?php } ?>
                                    </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select" aria-label="Default select example">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="owner">Owner</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="rifky_index_pengguna.php" class="btn btn-success">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </table>
                </form>
            </div>
        </main>
        <?php
            require "foot.php";
        ?>