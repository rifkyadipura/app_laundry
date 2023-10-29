    <?php
        require "head_navbar.php";
    ?>
    <main class="container">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h5 class="border-bottom pb-2 mb-0">Tambah Outlet</h5>
    <form action="rifky_proses_tambah_outlet.php" method="post">
        <table>
            <div class="row mt-2">
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input  type="text" name="nama" id="nama" class="form-control"  required>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input  type="text" name="alamat" id="alamat" class="form-control" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <label for="no_telp" class="form-label">No Telp</label>
                    <input  type="number" name="no_telp" id="no_telp" class="form-control"  required>
                </div>
            </div>

            <div class="mt-2">
                <a href="rifky_index_outlet.php" class="btn btn-success">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </table>
    </form>
    </div>
        </main>
        <?php
            require "foot.php";
        ?>