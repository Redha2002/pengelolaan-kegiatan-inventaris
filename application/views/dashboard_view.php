<!doctype html>
<html>
<head>
    <title>Dashboard - Sistem Informasi Pengelolaan Kegiatan Divisi TJSL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-U5A7wkzVE5fqk+uRO6E3Aqo9xXTZbiIGr4C3QJnySzn8pHPEo8pPjSpRL/JKGnBRC9cPUnwXNmmj/iW7KYwLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 15px;
        }

        .card .card-body {
            font-size: 18px;
        }

        .card .card-footer {
            font-size: 14px;
            background-color: rgba(255, 255, 255, 0.2);
        }

        .mt-4 {
            margin-top: 30px;
        }

        .breadcrumb {
            background-color: transparent;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4 font-weight-bold text-primary">SELAMAT DATANG!</h1>
        <ol class="breadcrumb mb-4 font-weight-bold text-secondary">
            <li class="breadcrumb-item active">Sistem Informasi Pengelolaan Kegiatan Divisi TJSL</li>
        </ol>

        <!-- container pemohon -->
        <?php if ($_SESSION['hak_akses'] == 'Pemohon'){
        ?>
        <div class="row">
        <div class="row">
                <div class="col-lg-12 col-xs-12 ">
            <div class="jumbotron-fluid bg-1" >
            <div class="box box-warning">
                    <div class="box-header">
                        <div class="box-body pad">
                        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://4.bp.blogspot.com/-MDEDxcdq5Zc/Vxw6Jmw0lDI/AAAAAAAAXB8/JaI42iBz5JkIm33JZUkcCMymVVh19vYxQCLcB/s1600/Logo%2BPos%2BIndonesia.jpg"
                class="img-fluid" alt="Phone image">
            </div>
            </div>
            <?php
                  }
                 ?>
        <!-- end container pemohon -->
        <?php if ($_SESSION['hak_akses'] == 'Vice President' or $_SESSION['hak_akses'] == 'Admin'){
        ?>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total Proposal</div>
                    <div class="card-body">
                        <h2><?php echo $hitungProposal?></h2>
                    </div>
                    <?php if ($_SESSION['hak_akses'] == '' or $_SESSION['hak_akses'] == 'Admin'){
                    ?>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo site_url()?>/proposal">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                    <?php
                                    }
                                    ?>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Total Disposisi</div>
                    <div class="card-body">
                        <h2><?php echo $hitungPembuatan_disposisi?></h2>
                    </div>
                    <?php if ($_SESSION['hak_akses'] == '' or $_SESSION['hak_akses'] == 'Admin'){
                    ?>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo site_url()?>/pembuatan_disposisi">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                    <?php
                                    }
                                    ?>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Total Laporan Kegiatan</div>
                    <div class="card-body">
                        <h2><?php echo $hitungLaporan_kegiatan?></h2>
                    </div>
                    <?php if ($_SESSION['hak_akses'] == '' or $_SESSION['hak_akses'] == 'Admin'){
                    ?>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo site_url()?>/laporan_kegiatan">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                    <?php
                                    }
                                    ?>
                </div>
            </div>
        </div>
        <?php
                                    }
                                    ?>
    </div>
</body>
</html>
