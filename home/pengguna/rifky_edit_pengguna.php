<?php
require "../../rifky_koneksi.php";
$rifky_id_user = $_GET['id'];
    $rifky_result = mysqli_query($dbConn, "SELECT * FROM `rifky_tb_users` WHERE rifky_id_user=$rifky_id_user");
    $rifky_outlet = mysqli_query($dbConn, "SELECT rifky_id_outlet, rifky_nama FROM rifky_tb_outlet");
 
    while ($data = mysqli_fetch_array($rifky_result)) {
        $rifky_nama         = $data['rifky_nama'];
        $rifky_username     = $data['rifky_username'];
        $rifky_password     = $data['rifky_password'];
        $rifky_id_outlet    = $data['rifky_id_outlet'];
        $rifky_role         = $data['rifky_role'];
    }
    if(isset($_POST['update'])){
        $rifky_nama         = $_POST['rifky_nama'];
        $rifky_username     = $_POST['rifky_username'];
        $rifky_password     = md5($rp = $_POST['rifky_password']);
        $rifky_id_outlett   = $_POST['rifky_id_outlett'];
        $rifky_role         = $_POST['rifky_id_role'];
    $sql = "UPDATE
            `rifky_tb_users`
            SET
            rifky_nama      ='$rifky_nama',
            rifky_username  = '$rifky_username',
            rifky_password  = '$rifky_password',
            rifky_id_outlet = '$rifky_id_outlett',
            rifky_role      = '$rifky_role'
            WHERE
            rifky_id_user = '$rifky_id_user'
            ";

    $query = mysqli_query($dbConn, $sql);

        if(!$query){
            die("Gagal Update Data!!!");
        }
        echo "  <script>
                alert('Update Data Berhasil!');
                document.location.href = 'rifky_index_pengguna.php';
            </script>";
        // header("Location: rifky_index_pengguna.php");
    }
?>
<?php
    require "head_navbar.php";
?>
    <main class="container">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h5 class="border-bottom pb-2 mb-0">Edit Pengguna</h5>
                <form action="" method="POST">
                    <table>
                        <div class="row mt-2">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="nama" class="form-label">Nama</label>
                                <input  type="text" name="rifky_nama" id="nama" value="<?php echo $rifky_nama ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="username" class="form-label">Username</label>
                                <input  type="text" name="rifky_username" id="username" value="<?php echo $rifky_username ?>" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="password" class="form-label">Password</label>
                                <input  type="password" name="rifky_password" id="password" <?php echo $rifky_password ?> class="form-control" required>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="outlet" class="form-label">Outlet</label>
                                    <select name="rifky_id_outlett" id="outlet" class="form-select" aria-label="Default select example">
                                        <?php foreach ($rifky_outlet as $ro) { ?>
                                            <option value="<?= $ro['rifky_id_outlet'];?>" <?php if ("$rifky_id_outlet" == $ro['rifky_id_outlet'] ) { echo"selected"; }; ?>> <?= $ro['rifky_nama'] ?> </option>
                                        <?php } ?>
                                    </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <label for="role" class="form-label">Role</label>
                                <select name="rifky_id_role" id="role" class="form-select" aria-label="Default select example">
                                    <option value="admin" <?php if ("$rifky_role" == 'admin') { echo"selected"; }; ?>>Admin</option>
                                    <option value="kasir" <?php if ("$rifky_role" == 'kasir') { echo"selected"; }; ?>>Kasir</option>
                                    <option value="owner" <?php if ("$rifky_role" == 'owner') { echo"selected"; }; ?>>Owner</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="rifky_index_pengguna.php" class="btn btn-success">Kembali</a>
                            <button  type="submit" name="update" class="btn btn-primary">Update</button>
                            <input type="hidden" name="rifky_id_outlet" value="<?php echo $_GET['id'] ?>">
                        </div>
                    </table>
                </form>
            </div>
        </main>
<?php
    require "foot.php";
?>