<?php
require "../../rifky_koneksi.php";
$rifky_id = $_GET['id'];
$rifky_result = mysqli_query($dbConn, "SELECT * FROM rifky_tb_outlet WHERE rifky_id_outlet = $rifky_id");

while ($data = mysqli_fetch_array($rifky_result)) {
    $rifky_nama = $data['rifky_nama'];
    $rifky_alamat = $data['rifky_alamat'];
    $rifky_telp = $data['rifky_telp'];
}

if (isset($_POST['update'])) {
    $rifky_id = $_POST['rifky_id_outlet'];
    $rifky_nama = $_POST['rifky_nama'];
    $rifky_alamat = $_POST['rifky_alamat'];
    $rifky_telp = $_POST['rifky_telp'];

    $sql = ("UPDATE 
            `rifky_tb_outlet`
            SET
            rifky_nama = '$rifky_nama',
            rifky_alamat = '$rifky_alamat',
            rifky_telp = '$rifky_telp'
            WHERE
            rifky_id_outlet = '$rifky_id'");

    $query = mysqli_query($dbConn, $sql);
    if (!$query) {
        die("Edit Gagal!!!");
    }
    header("Location: rifky_index_outlet.php");
}
?>
<?php
    require "head_navbar.php";
?>
<main class="container">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h5 class="border-bottom pb-2 mb-0">Edit Outlet</h5>
    <form action="" method="POST">
        <table>
            <div class="row mt-2">
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input  type="text" name="rifky_nama" id="nama" value = "<?php echo $rifky_nama ?>" class="form-control" required>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input  type="text" name="rifky_alamat" id="alamat" value = "<?php echo $rifky_alamat ?>" class="form-control" required>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <label for="no_telp" class="form-label">No Telp</label>
                    <input type="number" name="rifky_telp" id="no_telp" value = "<?php echo $rifky_telp ?>" class="form-control" required>
                </div>
            </div>

            <div class="mt-2">
                <input type="hidden" name="rifky_id_outlet" value="<?php echo $_GET['id'] ?>" >
                <a href="rifky_index_outlet.php" class="btn btn-success">Kembali</a>
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
            </div>
        </table>
    </form>
    </div>
        </main>
<?php
    require "foot.php";
?>