<!doctype html>
<html>
<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-U5A7wkzVE5fqk+uRO6E3Aqo9xXTZbiIGr4C3QJnySzn8pHPEo8pPjSpRL/JKGnBRC9cPUnwXNmmj/iW7KYwLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-cancel {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <h5 class="m-0 font-weight-bold">UPLOAD KEGIATAN</h5>
                    </div>
                    <div class="card-body">
                                    <form action="<?php echo $action; ?>" method="post">
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
                        <input type="hidden" name="id_k_pemohon" value="<?php echo $id_k_pemohon; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('kegiatan_pemohon') ?>" class="btn btn-default">Cancel</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
