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
                    <form action="rifky_proses_tambah_paket.php" method="post">
                        <table>
                            <div class="row mt-2">
                                <div class="col-md-6 col-sm-4 col-xs-12">
                                    <label for="rifky_id_outlet" class="form-label">Outlet</label>
                                        <select name="rifky_id_outlet" id="rifky_id_outlet" class="form-select" aria-label="Default select example">
                                            <?php foreach ($rifky_outlet as $ro) { ?>                                    
                                                <option value="<?= $ro['rifky_id_outlet'];?>"><?= $ro['rifky_nama'];?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="col-md-6 col-sm-4 col-xs-12">
                                    <label for="rifky_jenis" class="form-label">Jenis</label>
                                        <select name="rifky_jenis" id="rifky_jenis" class="form-select" aria-label="Default select example">
                                            <option value="kiloan">Kiloan</option>
                                            <option value="selimut">Selimut</option>
                                            <option value="bed_cover">Bed Cover</option>
                                            <option value="kaos">Kaos</option>
                                            <option value="lain">Lain</option>
                                        </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6 col-sm-4 col-xs-12">
                                    <label for="rifky_nama_paket" class="form-label">Nama Paket</label>
                                    <input type="text" name="rifky_nama_paket" id="rifky_nama_paket" class="form-control" required>
                                </div>
                                <div class="col-md-6 col-sm-4 col-xs-12">
                                    <label for="rifky_harga" class="form-label">Harga</label>
                                    <input type="number" name="rifky_harga" id="rifky_harga" class="form-control" required>
                                </div>
                            </div>

                            <div class="mt-2">
                                <a href="rifky_index_paket.php" class="btn btn-success">Kembali</a>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </table>
                    </form>
            </div>
    </main>
        <?php
            require "foot.php";
        ?>