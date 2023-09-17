


<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px"></h2>                  
        <!-- <table border="border-left-info" class=" table table-striped table-bordered " id="sortdisable">
                <thead align="center" class="thead-dark"> -->

        <!-- begin:: content -->
        <div class="container">
        <div class="row">
          <div class="col-lg-30 col-xl-20">
            <div class="card shadow mb-8">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-danger"> <b> DATA PROPOSAL</b></h5>
                  </div>
                  <!-- <div class="row" style="margin-bottom: 10px"> -->
                  <div class="col-lg-16 col-xl-6" style="text-align: right;">
                  <!-- notifikasi -->
                  <!-- <button class="btn btn-link btn-xs" style="color: black;" data-bs-toggle="dropdown"><i class="fa fa-bell-o fa-lg"><input id="button_notif" style="background-color: red; width: 20px; height: 20px; border-color: red; font: 8px;"
                  value="<?php echo $brp_id->jumlah_total?>" readonly/>
                </i></button> -->


                    <!-- <div class="col-md-14">
                        <?php echo anchor(site_url('user/create'),'Create User', 'class="btn btn-primary"'); ?> 
                        
                    </div>  -->
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('proposal/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                            </div>
                </form>
            </div>
        </div>
                </div>
              </div>
              <div class="table-responsive">
              <!-- Add Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-F5tE9GmZ8f17a5BygKf2Qha0fK94EtbrpEAd0i3Vw2HeIaOdMO7nvGKn9Ard2WecC4oX2LZJIYl/HgV13gPjw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead align="center" class="thead-dark">
        <tr>
            <th>No</th>
            <th>Kode Proposal</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kegiatan</th>
            <th>Rekening Pospay</th>
            <th>Tanggal Terima</th>
            <th>Proposal</th>
            <th>Surat Pengantar</th>
            <th>Status</th>
            <?php if ($_SESSION['hak_akses'] == '' or $_SESSION['hak_akses'] == 'Admin'){
                    ?>
            <th>Action</th>
            <!-- <th>Aksi</th> -->
            <?php
                                    }
                                    ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($proposal_data as $proposal) {
            $date_only = date('d-m-Y', strtotime($proposal->tanggal_terima));
            ?>
            <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td id="proposalId">TJSL <?php echo $proposal->id_proposal  ?></td>
                <td><?php echo $proposal->nama_lengkap ?></td>
                <td><?php echo $proposal->Jenis_kegiatan ?></td>
                <td><?php echo $proposal->rekening_pospay ?></td>
                <td><?php echo $date_only ?></td>
                <td>
                    <a target="_blank" href="<?= base_url('assets/proposal/' . $proposal->proposal) ?>">
                        <i class="far fa-file-pdf"></i> <!-- Icon representing the proposal file (PDF) -->
                    </a>
                </td>
                <td>
                    <a target="_blank" href="<?= base_url('assets/proposal/' . $proposal->surat_pengantar) ?>">
                    <i class="far fa-file-pdf"></i> <!-- Icon representing the proposal file (PDF) -->
                    </a>
                </td>
                <!-- data status -->
                <td>
                    <?php echo $proposal->status?> 
                </td>
                <?php if ($_SESSION['hak_akses'] == '' or $_SESSION['hak_akses'] == 'Admin'){
                    ?>
                <td>
                    <?php if ($proposal->status == 'Belum Di Disposisi') : ?>
                        <?php echo anchor(site_url('pembuatan_disposisi/create/'.$proposal->id_proposal), 'Disposisikan', 'class="btn btn-danger"'); ?>
                    <?php else : ?>
                        <button class="btn btn-success" disabled>OK</button>
                    <?php endif; ?>
                </td>
               
                 <!-- <td style="text-align:center" width="200px">
                                    <?php 
                                    echo anchor(site_url('proposal/delete/'.$proposal->id_proposal),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                    ?> -->
                 <?php
                                    }
                                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

        </div>

        <!-- <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-success"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div> -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
        <script>new DataTable('#example');</script>
        
    </body>
</html>

<!-- Cek apakah ada flash data "message" -->
<?php if ($this->session->flashdata('message')): ?>
    <!-- Tampilkan SweetAlert 2 ketika flash data "message" ada -->
    <script>
        Swal.fire({
            title: 'Data Prosal Berhasil Di kirim!',
            text: '<?php echo $this->session->flashdata('message'); ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>


<script>
    // function getNomorOtomatis() {
    //     var xhr = new XMLHttpRequest();
    //     xhr.onreadystatechange = function() {
    //         if (xhr.readyState == 4 && xhr.status == 200) {
    //             var proposalIdElem = document.getElementById("proposalId");
    //             proposalIdElem.innerText = "TJSL " + xhr.responseText;
    //         }
    //     };
    //     xhr.open("GET", "<?php echo site_url('Proposal/get_nomor_otomatis'); ?>", true);
    //     xhr.send();
    // }

    // // Panggil fungsi getNomorOtomatis saat halaman selesai diload
    // window.onload = function() {
    //     getNomorOtomatis();
    // };
</script>


