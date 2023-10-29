<?php
    require "../../rifky_koneksi.php";
    $rifky_id_paket = $_GET['id'];
    $rifky_result = mysqli_query($dbConn, "SELECT * FROM rifky_tb_paket WHERE rifky_id_paket = '$rifky_id_paket'");
    $rifky_outlet = mysqli_query($dbConn, "SELECT rifky_id_outlet, rifky_nama FROM rifky_tb_outlet");
    
    while ($data = mysqli_fetch_array($rifky_result)) {
        $rifky_id_paket = $data['rifky_id_paket'];
        $rifky_id_outlet = $data['rifky_id_outlet'];
        $rifky_jenis = $data['rifky_jenis'];
        $rifky_nama_paket = $data['rifky_nama_paket'];
        $rifky_harga = $data['rifky_harga'];
    }
    if (isset($_POST['update'])) {
        $rifky_id_paket_update = $_POST['rifky_id_paket_update'];
        $rifky_id_outlet = $_POST['rifky_id_outlet'];
        $rifky_jenis = $_POST['rifky_jenis'];
        $rifky_nama_paket = $_POST['rifky_nama_paket'];
        $rifky_harga = $_POST['rifky_harga'];

        $sql = "UPDATE
                `rifky_tb_paket`
                SET
                rifky_id_outlet = '$rifky_id_outlet',
                rifky_jenis = '$rifky_jenis',
                rifky_nama_paket = '$rifky_nama_paket',
                rifky_harga = '$rifky_harga'
                WHERE
                rifky_id_paket = '$rifky_id_paket_update'";

        $query = mysqli_query($dbConn, $sql);
        if (!$query) {
            die ("Gagal Update Paket!!!");
        }
            echo "<script>
                    alert('Berhasil Menambahkan Data');
                    document.location.href = 'rifky_index_paket.php';
                    </script>";
    }
                    
    // $sql = "SELECT rifky_id_outlet, rifky_nama FROM rifky_tb_outlet";
    // $rifky_outlet = mysqli_query($dbConn, $sql);
    // session_start();
?>
<?php
    require "head_navbar.php";
?>
<main class="container">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h5 class="border-bottom pb-2 mb-0">Edit Paket</h5>
    <form action="" method="post">
        <table>
            <div class="row mt-2">
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <label for="rifky_id_outlet" class="form-label">Outlet</label>
                    <select name="rifky_id_outlet" id="rifky_id_outlet" class="form-select" aria-label="Default select example">
                        <?php foreach ($rifky_outlet as $ro) { ?>                                    
                            <option value="<?= $ro['rifky_id_outlet'];?>" <?php if ("$rifky_id_outlet" == $ro['rifky_id_outlet']) {echo "selected";} ?> ><?= $ro['rifky_nama'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <label for="rifky_jenis" class="form-label">Jenis</label>
                        <select name="rifky_jenis" id="rifky_jenis" class="form-select" aria-label="Default select example">
                            <option value="kiloan" <?php if ($rifky_jenis == 'kiloan') {echo "selected";}?> >Kiloan</option>
                            <option value="selimut" <?php if ($rifky_jenis == 'selimut') {echo "selected";} ?> >Selimut</option>
                            <option value="bed_cover" <?php if ($rifky_jenis == 'bed_cover') {echo "selected";} ?> >Bed Cover</option>
                            <option value="kaos" <?php if ($rifky_jenis == 'kaos') {echo "selected";} ?> >Kaos</option>
                            <option value="lain" <?php if ($rifky_jenis == 'lain') {echo "selected";} ?> >Lain</option>
                        </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <label for="rifky_nama_paket" class="form-label">Nama Paket</label>
                    <input  type="text" name="rifky_nama_paket" id="rifky_nama_paket" value="<?php echo "$rifky_nama_paket"; ?>" class="form-control" required>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                <label for="rifky_harga" class="form-label">Harga</label>
                    <input type="number" name="rifky_harga" id="rifky_harga" value="<?php echo "$rifky_harga"; ?>" class="form-control" required>
                </div>
            </div>
            <div class="mt-2">
                <a href="rifky_index_paket.php" class="btn btn-success">Kembali</a>
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                <input type="hidden" name="rifky_id_paket_update" value="<?php echo $rifky_id_paket ?>">
            </div>
        </table>
    </form>
    </div>
        </main>
<?php
    require "foot.php";
?>