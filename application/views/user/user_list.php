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
                        <?php echo anchor(site_url('user/create'),'Create User', 'class="btn btn-primary"'); ?> 
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
		<th>Nama Lengkap</th>
        <th>NIPPOS</th>
		<th>Username</th>
		<th>Password</th>
		<th>Jabatan</th>
		<th>Hak Akses</th>
		<th>Action</th>
            </tr></thead>
            <tbody><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $user->nama_lengkap ?></td>
            <td><?php echo $user->nippos ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->password ?></td>
			<td><?php echo $user->jabatan ?></td>
			<td><?php echo $user->hak_akses ?></td>
                <td style="text-align:center" width="200px">
                <?php  
                echo anchor(site_url('user/update/'.$user->id), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning"  data-toggle="tooltip" title="Update"');
                echo ' | ';
                echo '<a href="#" onclick="showDeleteConfirmation('.$user->id.')" class="btn btn-xs btn-success" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                ?>
            </td>

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

<!-- Tambahkan script JavaScript di bawah ini -->
<script>
    function showDeleteConfirmation(userId) {
        // Gunakan window.confirm() untuk menampilkan pemberitahuan konfirmasi
        if (window.confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            // Jika pengguna menekan tombol "OK" pada konfirmasi, arahkan ke halaman delete
            window.location.href = '<?php echo site_url('user/delete/'); ?>' + userId;
        }
    }
</script>