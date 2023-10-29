<?php
require "../../rifky_koneksi.php";
    session_start();
    $sql = "SELECT * FROM `rifky_tb_users`";
  
    $query = mysqli_query($dbConn, $sql);
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
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/"> -->
    <link href="../bootstrap-5.3.0-alpha1-examples/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../offcanvas-navbar.css" rel="stylesheet">
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
                            <a class="nav-link" aria-current="page" href="../rifky_index.php">Dashboard</a>
                        </li>
                        <?php
                          if($_SESSION['rifky_role'] != 'owner'){ ?>
                            <li class="nav-item">
                              <a class="nav-link" href="../pelanggan/rifky_registrasi_pelanggan.php">Registrasi Pelanggan</a>
                          </li>
                        <?php
                          }
                        ?>
                        <?php
                            if($_SESSION['rifky_role'] != 'kasir' && $_SESSION['rifky_role'] != 'owner'){ ?>
                              <li class="nav-item">
                                <a class="nav-link" href="../outlet/rifky_index_outlet.php">Outlet</a>
                              </li>
                        <?php
                          }
                        ?>
                        <?php
                            if($_SESSION['rifky_role'] != 'kasir' && $_SESSION['rifky_role'] != 'owner'){ ?>
                              <li class="nav-item">
                                <a class="nav-link active" href="../paket/rifky_index_paket.php">Paket</a>
                              </li>
                        <?php
                          }
                        ?>
                        <?php
                            if($_SESSION['rifky_role'] != 'kasir' && $_SESSION['rifky_role'] != 'owner'){ ?>
                              <li class="nav-item">
                                <a class="nav-link" href="../pengguna/rifky_index_pengguna.php">Pengguna</a>
                              </li>
                        <?php
                          }
                        ?>
                        <?php
                          if($_SESSION['rifky_role'] != 'owner'){ ?>
                            <li class="nav-item">
                              <a class="nav-link" href="../transaksi/rifky_index_transaksi.php">Transaksi</a>
                            </li>
                        <?php
                          }
                        ?>
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="laporan/rifky_laporan.php">Laporan</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="../rifky_logout.php" class="btn btn-outline-danger" onclick="return confirm('Yakin Untuk Keluar?');">Logout</a>
                    </div>
                </div>
            </div>
        </nav>