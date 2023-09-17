<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>/assets/i/pos.jpg">
        <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.png">
        <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js
"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css
" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIPPOS</title>
        <link rel="icon" href="<?php echo base_url() ?>/assets/i/pos.jpg" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-warning bg-warning">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">SIPPOS</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->

           <!-- Navbar Items -->
        <ul class="navbar-nav ms-auto ">
            <li class="nav-item dropdown">
               
                   
                    <!-- Notification Bell -->
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge"><?php echo $this->session->userdata('notif')?></span>
                    </a>
                    <!-- Dropdown Menu for Notifications -->
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="<?php echo site_url()?>/proposal">
                        <span class="dropdown-item dropdown-header"><?php echo $_SESSION['notif']?> Notifications</span>
                        <div class="dropdown-divider"></div>
                        <!-- Sample Notification Item -->
                        <!-- <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-end text-muted text-sm">3 mins</span>
                        </a> -->
                        <!-- ... (other notification items) ... -->
                        <!-- <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                        </a>
                </div>
            </li>
                <li>
                <h6 class=" mt-2 mr-3 font-weight-bold text-dark text-dark"><span class="icon "></span>
                <a href="#"><i class="fas fa-user-circle mr-lg-2 text-lg ml-2"></i></a><?php echo $_SESSION['username']; ?>
                </h6>
                </li> 

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?php echo site_url()?>/login/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Navigation</div>
                            <a class="nav-link" href="<?php echo site_url()?>/Dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            
                            <?php if ($_SESSION['hak_akses'] == 'Admin'){
                            ?>
                            <li>
                            <a class="nav-link" href="<?php echo site_url()?>/User">
                                <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                                Kelola User
                            </a>
                            <?php
                            }
                            ?>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> -->
                            <div class="sb-sidenav-menu-heading">Interface</div>
                              
                           
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <?php if ($_SESSION['hak_akses'] == 'Vice President' or $_SESSION['hak_akses'] == 'Admin'){
                            ?>
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Kelola Proposal
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                <?php
                                    }
                                    ?>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <?php if ($_SESSION['hak_akses'] == 'Vice President' or $_SESSION['hak_akses'] == 'Admin'){
                            ?>
                            <li>
                                <a class="nav-link" href="<?php echo site_url()?>proposal">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Proposal
                                </a>
                                <?php
                                    }
                                    ?>
                                <?php if ($_SESSION['hak_akses'] == 'Vice President' or $_SESSION['hak_akses'] == 'Admin'){
                            ?>
                                <a class="nav-link" href="<?php echo site_url()?>pembuatan_disposisi">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Pembuatan Disposisi
                                </a>
                                <?php
                                    }
                                    ?>
                                </nav>
                            </div>
                            
                            <?php if ($_SESSION['hak_akses'] == 'Pemohon'){
                            ?>
                            <a class="nav-link" href="<?php echo site_url()?>proposal/create">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Upload Proposal
                            </a>
                            <?php
                                    }
                                    ?>
                            
                            <?php if ($_SESSION['hak_akses'] ==  'Pemohon'){
                            ?>
                            <a class="nav-link" href="<?php echo site_url()?>perencanaan_kegiatan">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Perencanaan Kegiatan
                            </a>
                            <?php
                                    }
                                    ?>

                             
                            <?php if ($_SESSION['hak_akses'] ==  'Admin'){
                            ?>
                            <a class="nav-link" href="<?php echo site_url()?>perencanaan_kegiatan">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Perencanaan Kegiatan
                            </a>
                            <?php
                                    }
                                    ?>
                            
                            <!-- <?php if ($_SESSION['hak_akses'] ==  'Pemohon'){
                            ?>
                            <a class="nav-link" href="<?php echo site_url()?>/laporan_kegiatan/create_action">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Upload Kegiatan Pemohon
                            </a>
                            <?php
                                    }
                                    ?> -->
                            <!--                              
                             <?php if ($_SESSION['hak_akses'] ==  'Pemohon'){
                            ?>
                            <a class="nav-link" href="<?php echo site_url()?>/kegiatan_pemohon/create_action">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Kegiatan Pemohon
                            </a>
                            <?php
                                    }
                                    ?> -->
                            
                            <?php if ($_SESSION['hak_akses'] == 'Vice President' or $_SESSION['hak_akses'] == 'Admin'){
                            ?>
                            <a class="nav-link" href="<?php echo site_url()?>/laporan_kegiatan">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Laporan Kegiatan
                            </a>
                            <?php
                                    }
                                    ?>
                    </div>
                
                </nav>
            </div>
            
            
            <!-- Main content -->           
            <div id="layoutSidenav_content">
              <main>
            <?php $this->load->view($page); ?>  
            </main>
            
                <!-- /.content -->
                </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url()?>assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url()?>assets/js/datatables-simple-demo.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap@5.2.3.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </body>
</html>
