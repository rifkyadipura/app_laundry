<?php
    require "../../rifky_koneksi.php";
    if (isset($_POST['submit'])) {
        $rifky_nama = $_POST['rifky_nama'];
        $rifky_alamat = $_POST['rifky_alamat'];
        $rifky_jenis_kelamanin = $_POST['rifky_jenis_kelamin'];
        $rifky_telp = $_POST['rifky_telp'];

        $sql = "INSERT INTO 
                    `rifky_tb_member`
                    VALUES
                    ('', '$rifky_nama', '$rifky_alamat', '$rifky_jenis_kelamanin', '$rifky_telp')";
        // var_dump($sql);
        $query = mysqli_query($dbConn, $sql);
        if (!$query) {
            die("Gagal Berhasil Registasi Pelanggal");
        }
        echo "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'rifky_registrasi_pelanggan.php';
            </script>";
    }
?>
<?php
    require "head_navbar.php";
?>
    <main class="container">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h5 class="border-bottom pb-2 mb-0">Pengguna</h5>
            <form action="" method="post">
                <table>
                    <div class="row mt-2">
                        <div class="col-md-6 col-sm-4 col-xs-12">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="rifky_nama" id="nama" class="form-control" required>
                        </div>
                        <div class="col-md-6 col-sm-4 col-xs-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="rifky_alamat" id="alamat" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 col-sm-4 col-xs-12">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="rifky_jenis_kelamin" id="jenis_kelamin" class="form-select" aria-label="Default select example">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                        </div>
                        <div class="col-md-6 col-sm-4 col-xs-12">
                            <label for="telp" class="form-label">No Telp</label>
                            <input type="number" name="rifky_telp" id="telp" class="form-control" required>
                        </div>
                    </div>

                    <div class="mt-2">
                        <a href="../rifky_index.php" class="btn btn-success">Kembali</a>
                        <a href="rifky_lihat_pelanggan.php" class="btn btn-secondary">Lihat Pelanggan</a>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </table>
            </form>
            <small class="d-block text-end mt-3">
                <a href="#">All updates</a>
            </small>
        </div>
    </main>
<?php
    require "foot.php";
?>