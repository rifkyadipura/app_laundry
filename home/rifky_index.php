<?php
require "../rifky_koneksi.php";
    session_start();

    if (!isset($_SESSION['status'])) {
        if ($_SESSION['status'] != 'login') {
            echo "  <script>
                        alert('Anda harus login terlebih dahulu sebelum mengakses halaman ini!');
                        document.location.href = '../rifky_login.php';
                    </script>";
        }
    }
    $sql = "SELECT * FROM `rifky_tb_users`";
  
    $result = mysqli_query($dbConn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Offcanvas navbar template · Bootstrap v5.3</title>

    <link href="bootstrap-5.3.0-alpha1-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="offcanvas-navbar.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Laundry Rifky</a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="rifky_index.php">Dashboard</a>
        </li>
        <?php
            if($_SESSION['rifky_role'] != 'owner'){ ?>
              <li class="nav-item">
                <a class="nav-link" href="pelanggan/rifky_registrasi_pelanggan.php">Registrasi Pelanggan</a>
            </li>
        <?php
          }
        ?>
        <?php
            if($_SESSION['rifky_role'] != 'kasir' && $_SESSION['rifky_role'] != 'owner'){ ?>
              <li class="nav-item">
                <a class="nav-link" href="outlet/rifky_index_outlet.php">Outlet</a>
              </li>
        <?php
          }
        ?>
        <?php
            if($_SESSION['rifky_role'] != 'kasir' && $_SESSION['rifky_role'] != 'owner'){ ?>
              <li class="nav-item">
                <a class="nav-link" href="paket/rifky_index_paket.php">Paket</a>
              </li>
        <?php
          }
        ?>
        <?php
            if($_SESSION['rifky_role'] != 'kasir' && $_SESSION['rifky_role'] != 'owner'){ ?>
              <li class="nav-item">
                <a class="nav-link" href="pengguna/rifky_index_pengguna.php">Pengguna</a>
              </li>
        <?php
          }
        ?>
        <?php
            if($_SESSION['rifky_role'] != 'owner'){ ?>
              <li class="nav-item">
                <a class="nav-link" href="transaksi/rifky_index_transaksi.php">Transaksi</a>
              </li>
        <?php
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="laporan/rifky_laporan.php">Laporan</a>
        </li>
      </ul>
      <div class="d-flex">
        <a href="rifky_logout.php" class="btn btn-outline-danger" onclick="return confirm('Yakin Untuk Keluar?');">Logout</a>
      </div>
    </div>
  </div>
</nav>

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <img class="me-3" src="../assets/brand/bootstrap-logo-white.svg" alt="" width="48" height="38">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">Laundry</h1>
      <small>Since 2011</small>
    </div>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Login</h6>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">@username</strong>
        Some representative placeholder content, with some information about this user. Imagine this being some sort of status update, perhaps?
      </p>
    </div>
    <small class="d-block text-end mt-3">
      <a href="#">All updates</a>
    </small>
  </div>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="offcanvas-navbar.js"></script>
  </body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Login Yang Anda Lakukan Berhasil</h2>
    <nav>
        <div>
            <a href="pelanggan/rifky_registrasi_pelanggan.php">Registrasi Pelanggan</a>
        </div>
        <div>
            <a href="outlet/rifky_index_outlet.php">Outlet</a>
        </div>
        <div>
            <a href="paket/rifky_index_paket.php">Paket</a>
        </div>
        <div>
            <a href="pengguna/rifky_index_pengguna.php">Pengguna</a>
        </div>
    </nav> 
    <br>
    <a href="rifky_logout.php">Logout</a>
</body>
</html> -->