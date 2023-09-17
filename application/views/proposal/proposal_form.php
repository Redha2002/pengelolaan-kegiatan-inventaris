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
         <?php echo form_open_multipart($action);?>

      <div class="col">
        <div class="container">
          <!-- <div class="row"> -->
          <div class="col-xl-12  col-lg-8">
            <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-danger"> <b> UPLOAD PROPOSAL </b></h5>
              </div>
            <form action="<?php echo $action; ?>" method="post">
              <div class="card-body">
                <!-- <div class="form-group">
                    <label for="letchar">Kode Proposal <?php echo form_error('kode_proposal') ?></label>
                    <input type="text" class="form-control" name="kode_proposal" id="kode_proposal" placeholder="Kode Proposal" value="<?php echo $kode_proposal; ?>" />
                </div> -->

                <div class="form-group">
                    <!-- <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label> -->
                    <input type="text" class="form-control" name="nama_lengkap" id="varchar" placeholder="Nama Lengkap" value="<?php echo $_SESSION['nama_lengkap']; ?>"  hidden/>
                    <!-- <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" /> -->
                </div>
                <div class="row">
                  <div class="col-sm-6">
                <div class="form-group">
                    <label>Jenis Kegiatan</label>
                    <!-- <div class="input-group-prepend col"> -->
                    <select class="form-control" id="Jenis_kegiatan" name="Jenis_kegiatan" placeholder="Jenis Kegiatan" >
                    <option selected> ---Pilih Pilar--- </option>
                    <option value = "Pilar Sosial" id="Jenis_kegiatan" name="Jenis_kegiatan" placeholder="Jenis Kegiatan"  > Pilar Sosial</option>
                    <option value = "Pilar Ekonomi" id="Jenis_kegiatan" name="Jenis_kegiatan" placeholder="Jenis Kegiatan"  > Pilar Ekonomi</option>    
                    <option value = "Pilar Lingkungan" id="Jenis_kegiatan" name="Jenis_kegiatan" placeholder="Jenis Kegiatan"  > Pilar Lingkungan</option>    
                    <option value = "Pilar Hukum dan Tata Kelola" id="Jenis_kegiatan" name="Jenis_kegiatan" placeholder="Jenis Kegiatan"  > Pilar Hukum dan Tata Kelola</option>    
                </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="varchar">Rekening Pospay<?php echo form_error('rekening_pospay') ?></label>
                    <!-- <input type="text" class="form-control" name="rekening_pospay" id="varchar" placeholder="Rekening Pospay" value="<?php echo $_SESSION['rekening_pospay']; ?>"  hidden/> -->
                    <!-- <input type="text" class="form-control" maxlength="10" name="rekening_pospay" id="rekening_pospay" placeholder="Rekening Pospay" value="<?php echo $rekening_pospay; ?>" /> -->
                    <input onkeypress="return isNumberKey(event)" maxlength="10" class="form-control" type="text"name="rekening_pospay" id="rekening_pospay" value="<?php echo $rekening_pospay; ?>" required>
                    </div>
                  </div>
               
                  </div>
                 
                  <!-- <div class="form-group">
                      <label for="timestamp">Tanggal Terima <?php echo form_error('tanggal_terima') ?></label>
                      <input type="datetime" class="form-control" name="tanggal_terima" id="tanggal_terima" placeholder="Tanggal Terima" value="<?php echo $tanggal_terima; ?>" />
                  </div> -->
                
                  
                  <div class="row">
                  <div class="col-sm-6">
                <div class="form-group">
                <label for="file">Proposal <?php echo form_error('proposal') ?></label>
                <input type="file" class="form-control" name="proposal" id="proposal" placeholder="Proposal" value="<?php echo $proposal; ?>" />
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                <label for="file">Surat Pengantar <?php echo form_error('surat_pengantar') ?></label>
                <input type="file" class="form-control" name="surat_pengantar" id="surat_pengantar" placeholder="surat_pengantar" value="<?php echo $surat_pengantar; ?>" />
                </div>
                </div>
                </div>
<!-- 
                <div class="col-sm-6">
                    <div class="form-group">
                    <label for="varchar">Pospay<?php echo form_error('status') ?></label>
                    <input type="text" class="form-control" maxlength="10" name="status" id="status" placeholder="status" value="<?php echo $rekening_pospay; ?>" />
                    </div>
                  </div>
                  </div> -->
                <br>
               
                <input type="hidden" name="id_proposal" value="<?php echo $id_proposal; ?>" /> 
                <button type="submit" class="btn btn-primary" onclick="showSuccessMessage()"><?php echo $button ?></button> 
                <!-- <a href="<?php echo site_url('proposal') ?>" class="btn btn-default">Cancel</a> -->
                <?php echo form_close();?>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
      <!-- end:: content -->
    </div>
    <!-- end:: main content -->
  </div>
</div>
<script>
  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 &&
      (charCode < 48 || charCode > 57))
      return false;
    return true;
  }


  function isNumericKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 &&
      (charCode < 48 || charCode > 57))
      return true;
    return false;
  }
</script>
<script>
  function showSuccessMessage() {
     alert("Data Berhasil Simpan!")
      }



</script>

</html>