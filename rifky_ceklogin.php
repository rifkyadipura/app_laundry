<?php
    require 'rifky_koneksi.php';
    session_start();

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($ps = $_POST['password']);
    
        $sql = "SELECT * FROM `rifky_tb_users` 
                WHERE `rifky_username` = '$username' 
                AND `rifky_password` = '$password';";
        $query = mysqli_query($dbConn, $sql);
    
        if (!$query) {
            echo "SQL Error";
            die;
        }
    
        $row = mysqli_num_rows($query);
    
        if ($row == 1) {
            $data = mysqli_fetch_assoc($query);
            $_SESSION['status'] = 'login';
            $_SESSION['rifky_id_user'] = $data['rifky_id_user'];
            $_SESSION['rifky_nama'] = $data['rifky_nama'];
            $_SESSION['rifky_role'] = $data['rifky_role'];  
            echo "  <script>
                        alert('Berhasil Masuk!');
                        document.location.href = 'home/rifky_index.php';
                    </script>";
        }
        else if($row == 0){
            echo "  <script>
                        alert('Mohon Ulangin Username atau Password Yang Anda Masukan Salah!!!');
                        document.location.href = 'rifky_login.php';
                    </script>";
        }
    }else {
        echo "Belum Login";
    }
    
?>