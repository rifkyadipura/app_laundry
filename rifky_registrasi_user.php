<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h3>Tambah User</h3>
    <form action="proses_user_rifky.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="username_rifky" id="">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password_rifky" id="">
                </td>
            </tr>
            <tr>
                <td>Nama User</td>
                <td>
                    <input type="text" name="nama_rifky" id="">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <textarea name="alamat_rifky" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Privelege</td>
                <td>
                    <select name="priv_user_rifky" id="">
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="gudang">Gudang</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="SIMPAN" name="simpan">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>