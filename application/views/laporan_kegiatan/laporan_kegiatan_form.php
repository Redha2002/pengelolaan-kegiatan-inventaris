<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/> -->
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
     
        <!-- <h2 style="margin-top:0px">User <?php echo $button ?></h2> -->
         <!-- Begin Page Content -->
        

      <div class="col">
        <div class="container">
          <!-- <div class="row"> -->
          <div class="col-xl-12  col-lg-8">
            <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-danger"> <b> UPLOAD KEGIATAN PEMOHON</b></h5>
              </div>
              <div class="card-body">
         <?php echo form_open_multipart('laporan_kegiatan/kegiatan_action');?>

        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="id_perencanaan" id="varchar" placeholder="Nama Lengkap" value="<?php echo $id_perencanaan; ?>"  hidden/>      
        </div>
        <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('id_proposal') ?></label>
            <input type="text" class="form-control" name="id_proposal" id="varchar" placeholder="Nama Lengkap" value="<?php echo $_SESSION['nama_lengkap']; ?>"  readonly/>      
        </div> 
	    <div class="form-group">
            <label for="timestamp">Tanggal Kegiatan <?php echo form_error('tgl_kegiatan') ?></label>
            <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan" placeholder="Tgl Kegiatan" value="<?php echo $tgl_kegiatan; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Laporan Kegiatan <?php echo form_error('laporan_kegiatan') ?></label>
            <input type="file" class="form-control" name="laporan_kegiatan" id="laporan_kegiatan" placeholder="Laporan Kegiatan" value="<?php echo $laporan_kegiatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kegiatan <?php echo form_error('jenis_kegiatan') ?></label>
            <div class="form-group">
                    <!-- <div class="input-group-prepend col"> -->
                    <select class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Jenis_Kegiatan" >
                    <option selected> ---Pilih Pilar--- </option>
                    <option value = "Pilar Sosial" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Jenis Kegiatan"  > Pilar Sosial</option>
                    <option value = "Pilar Ekonomi" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Jenis Kegiatan"  > Pilar Ekonomi</option>    
                    <option value = "Pilar Lingkungan" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Jenis Kegiatan"  > Pilar Lingkungan</option>    
                    <option value = "Pilar Hukum dan Tata Kelola" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Jenis Kegiatan"  > Pilar Hukum dan Tata Kelola</option>    
                </select>
                      </div>
            <!-- <input type="text" class="form-control" name="jenis_kegiatan" id="jenis_kegiatan" placeholder="Jenis Kegiatan" value="<?php echo $jenis_kegiatan; ?>" /> -->
        </div>
        <br>
	    <input type="hidden" name="id_laporan" value="<?php echo $id_laporan; ?>" /> 
            <button type="submit" class="btn btn-primary" onclick="showSuccessMessage()"><?php echo $button ?></button> 
            <a href="<?php echo site_url('laporan_kegiatan/create') ?>" class="btn btn-danger">Cancel</a>
            <?php echo form_close();?>
              <!-- </form> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end:: content -->
    </div>
    <!-- end:: main content -->
  </div>
</div>
</html>

<script>
  function showSuccessMessage() {
     alert("Data Berhasil Simpan!")
      }



</script>

