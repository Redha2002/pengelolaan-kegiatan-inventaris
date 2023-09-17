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
                    <h5 class="mt-2 font-weight-bold text-danger"> <b> DATA USER</b></h5>
                  </div>
                  <!-- <div class="row" style="margin-bottom: 10px"> -->
                  <div class="col-lg-16 col-xl-6" style="text-align: right;">
                    <div class="col-md-14">
                        <?php echo anchor(site_url('kegiatan_pemohon/create'),'Create Kegiatan', 'class="btn btn-primary"'); ?> 
                    </div> 
                    <div class="col-md-4 text-center">
                        <!-- <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div> -->
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('kegiatan_pemohon/index'); ?>" class="form-inline" method="get">
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
		<th>Tgl Kegiatan</th>
		<th>Jenis Kegiatan</th>
		<th>Laporan Kegiatan</th>
		<th>Action</th>
            </tr><?php
            foreach ($kegiatan_pemohon_data as $kegiatan_pemohon)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kegiatan_pemohon->tgl_kegiatan ?></td>
			<td><?php echo $kegiatan_pemohon->Jenis_kegiatan ?></td>
			<td><?php echo $kegiatan_pemohon->laporan_kegiatan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kegiatan_pemohon/read/'.$kegiatan_pemohon->id_k_pemohon),'Read'); 
				echo ' | '; 
				echo anchor(site_url('kegiatan_pemohon/update/'.$kegiatan_pemohon->id_k_pemohon),'Update'); 
				echo ' | '; 
				echo anchor(site_url('kegiatan_pemohon/delete/'.$kegiatan_pemohon->id_k_pemohon),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
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
        </div>
        </table>
        <div class="row">
            <div class="col-md-6">
                 <!-- <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a> 
		<?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-success"'); ?>  -->
	    </div>
            <div class="col-md-6 text-right">
            <!-- <?php echo $pagination ?> -->
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
        <script>new DataTable('#example');</script>
        
    </body>
</html>