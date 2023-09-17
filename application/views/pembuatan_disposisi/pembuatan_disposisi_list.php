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
                    <h5 class="mt-2 font-weight-bold text-danger"> <b> DATA PEMBUATAN DISPOSISI</b></h5>
                  </div>
                  
                  <!-- <div class="row" style="margin-bottom: 10px"> -->
                  <div class="col-lg-16 col-xl-6" style="text-align: right;">
                    <div class="col-md-14">
                        <!-- <?php echo anchor(site_url('pembuatan_disposisi/create'),'Create Disposisi', 'class="btn btn-primary"'); ?>  -->
                    </div> 
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                            </div>
                </form>
            </div>
        </div>
                </div>
              </div>
        <table id="example" class="table table-striped table-bordered" id="sortdisable" style="width:100%">
        <thead align="center" class="thead-dark">
        <tr>
                <th>No</th>
		<th>Kode Proposal</th>
		<th>Pengirim</th>
		<th>Kualifikasi</th>
		<th>Ditindak Lanjuti</th>
		<th>Catatan Khusus</th>
		<!-- <th>File Disposisi</th> -->
		<!-- <th>Biaya Approve</th> -->
		<!-- <th>Tanggal Kegiatan</th> -->
        <?php if ($_SESSION['hak_akses'] == '' or $_SESSION['hak_akses'] == 'Admin'){
                    ?>
		<th>Action</th>
        <?php
              }
             ?>
        </thead>
            </tr><?php
            foreach ($pembuatan_disposisi_data as $pembuatan_disposisi)
            {
                // $date_only = date('d-m-Y', strtotime($pembuatan_disposisi->tgl_kegiatan));
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td>TJSL <?php echo $pembuatan_disposisi->id_proposal ?></td>
			<td><?php echo $pembuatan_disposisi->pengirim ?></td>
			<td><?php echo $pembuatan_disposisi->kualifikasi ?></td>
			<td><?php echo $pembuatan_disposisi->ditindak_lanjuti ?></td>
			<td><?php echo $pembuatan_disposisi->catatan_khusus ?></td>
			<!-- <td><?php echo $pembuatan_disposisi->file_disposisi ?></td> -->
			<!-- <td>Rp. <?php
                  
                  $pembuatan_disposisi->biaya_approve; 
                 echo number_format($pembuatan_disposisi->biaya_approve, 0, '', '.');
            
              ?></td> -->
              <!-- <td><?php echo $date_only ?></td> -->
			<!-- <td><?php echo $pembuatan_disposisi->tgl_kegiatan ?></td> -->
            <?php if ($_SESSION['hak_akses'] == '' or $_SESSION['hak_akses'] == 'Admin'){
                    ?>
			<td style="text-align:center" width="200px">
    <?php
    // Ganti URL_ICON_UPDATE dengan URL atau nama class fontawesome untuk ikon update
    $url_icon_update = 'fas fa-pencil-alt'; // Contoh: Font Awesome kelas untuk ikon edit

    // Ganti URL_ICON_DELETE dengan URL atau nama class fontawesome untuk ikon delete
    $url_icon_delete = 'fas fa-trash'; // Contoh: Font Awesome kelas untuk ikon delete

    echo anchor(site_url('pembuatan_disposisi/update/'.$pembuatan_disposisi->id_disposisi),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning"  data-toggle="tooltip" title="Update"');
    echo'|';
    echo '<a href="#" onclick="showDeleteConfirmation('.$pembuatan_disposisi->id_disposisi.')" class="btn btn-xs btn-success" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
    ?>
</td>
<?php
              }
             ?>

		</tr>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end:: content -->

		</tr>
                <?php
            }
            ?>
        </tbody>
        </table>
        <!-- <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-success"'); ?>
	    </div> -->
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
        <script>new DataTable('#example');</script>
        
    </body>
</html>
<!-- Tambahkan script JavaScript di bawah ini -->
<script>
    function showDeleteConfirmation(disposisiId) {
        // Gunakan window.confirm() untuk menampilkan pemberitahuan konfirmasi
        if (window.confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            // Jika pengguna menekan tombol "OK" pada konfirmasi, arahkan ke halaman delete
            window.location.href = '<?php echo site_url('pembuatan_disposisi/delete/'); ?>' + disposisiId;
        }
    }
</script>
