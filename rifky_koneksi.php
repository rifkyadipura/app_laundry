<?php

    $hostName = "localhost";
    $username = "root";
    $password = "";
    $database = "rifky_laundry";

    $dbConn = mysqli_connect($hostName, $username, $password, $database);

    if (!$dbConn) {
        echo "Terjadi error pada koneksi";
        die;
    }
    function kode($fieldkey, $table, $tag){
        global $dbConn;

        $querycount = "SELECT count($fieldkey) AS LastID FROM `$table`";
        $result = mysqli_query($dbConn, $querycount) or die(mysqli_error($dbConn));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $id = $row['LastID'];

        $num = $id + 1; switch (strlen($num)) {
            case 1: $NoTrans = "$tag" . "000" . $num;break;
            case 2: $NoTrans = "$tag" . "00"  . $num;break;
            case 3: $NoTrans = "$tag" . "0"   . $num;break;
            default: $NoTrans = $num; break;
        }
        return $NoTrans;
    };
?>