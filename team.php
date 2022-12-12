<?php

session_start();
require 'functions.php';

$data = query("SELECT PEMAIN.ID_PEMAIN, PEMAIN.NAMA_PEMAIN, INFO_POSISI.NAMA_POSISI FROM PEMAIN JOIN INFO_POSISI ON PEMAIN.ID_POSISI = INFO_POSISI.ID_POSISI WHERE PEMAIN.ID_TIM = 1 AND NOT PEMAIN.ID_POSISI = 1");
// $data = query("SELECT PEMAIN.ID_PEMAIN, PEMAIN.NAMA_PEMAIN, INFO_POSISI.NAMA_POSISI FROM PEMAIN JOIN INFO_POSISI ON PEMAIN.ID_POSISI = INFO_POSISI.ID_POSISI WHERE PEMAIN.ID_TIM = 1");
// $data = query("SELECT PEMAIN.ID_PEMAIN, PEMAIN.NAMA_PEMAIN, INFO_POSISI.NAMA_POSISI FROM PEMAIN JOIN POSITIONING ON PEMAIN.ID_PEMAIN = POSITIONING.ID_PEMAIN JOIN INFO_POSISI ON POSITIONING.ID_POSISI = INFO_POSISI.ID_POSISI WHERE PEMAIN.ID_TIM = 1");
// var_dump($data);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Welcome, Manager</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <h4 style="color: white;" class="p-2">Coin</h4>
                    <h4 style="color: white;" class="p-2">Level</h4>
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="akunseting.php">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="overview.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Overview
                            </a>
                            <a class="nav-link active" href="team.php">
                                <div class="sb-nav-link-icon"><i class="fab fa-atlassian"></i></div>
                                Tim
                            </a>
                            <a class="nav-link" href="gameplay.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                                Gameplay
                            </a>
                            <a class="nav-link" href="toko.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Shop
                            </a>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Tim
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.php">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.php">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Shop
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="register.php">Register</a>
                                            <a class="nav-link" href="password.php">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.php">401 Page</a>
                                            <a class="nav-link" href="404.php">404 Page</a>
                                            <a class="nav-link" href="500.php">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row mb-5">
                            <div class="col-1"><img class="mt-4" width="80 rem" src="assets/img/sby.png" alt="Klub"></div>
                            <div class="col-11 my-auto">
                                <div class="row mt-3"><h1>Persebaya</h1></div>
                                <div class="row breadcrumb">
                                    <div class="breadcrumb-item">Lvel 1 (nilai exhi)</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pemain
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Shooting</th>
                                            <th>Agility</th>
                                            <th>Passing</th>
                                            <th>Defense</th>
                                            <th>Physics</th>
                                            <th>Handling</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $pemain) :?>
                                        <tr>
                                            <td><?= $pemain['NAMA_PEMAIN'] ?></td>
                                            <td><?= $pemain['NAMA_POSISI'] ?></td>
                                            <?php
                                                $id_pemain = (int)$pemain['ID_PEMAIN'];
                                                // var_dump($id_pemain);
                                                $stats = [];
                                                // $stats = query("SELECT ID_STATISTIK, VALUE FROM stats_pemain WHERE ID_PEMAIN = '$id_pemain'");
                                                $stats[] = query("SELECT VALUE FROM stats_pemain WHERE ID_PEMAIN = $id_pemain AND ID_STATISTIK = 1")[0]['VALUE'];
                                                $stats[] = query("SELECT VALUE FROM stats_pemain WHERE ID_PEMAIN = $id_pemain AND ID_STATISTIK = 2")[0]['VALUE'];
                                                $stats[] = query("SELECT VALUE FROM stats_pemain WHERE ID_PEMAIN = $id_pemain AND ID_STATISTIK = 3")[0]['VALUE'];
                                                $stats[] = query("SELECT VALUE FROM stats_pemain WHERE ID_PEMAIN = $id_pemain AND ID_STATISTIK = 4")[0]['VALUE'];
                                                $stats[] = query("SELECT VALUE FROM stats_pemain WHERE ID_PEMAIN = $id_pemain AND ID_STATISTIK = 5")[0]['VALUE'];
                                                $stats[] = query("SELECT VALUE FROM stats_pemain WHERE ID_PEMAIN = $id_pemain AND ID_STATISTIK = 6")[0]['VALUE'];
                                                // var_dump($stats);
                                            ?>
                                            <td><?= $stats[0] ?></td>
                                            <td><?= $stats[1] ?></td>
                                            <td><?= $stats[2] ?></td>
                                            <td><?= $stats[3] ?></td>
                                            <td><?= $stats[4] ?></td>
                                            <td><?= $stats[5] ?></td>
                                        </tr>    
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
