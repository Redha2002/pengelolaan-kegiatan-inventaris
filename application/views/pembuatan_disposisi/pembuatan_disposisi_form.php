<!doctype html>
<html>
<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/> -->
    <style>
        body {
            padding: 15px;
        }
        /* Add any additional CSS styles here */
        .form-group {
            margin-bottom: 20px;
        }
    </style>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h5 class="m-0 font-weight-bold"><b>CREATE PEMBUATAN DISPOSISI</b></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <!-- <label for="varchar">Kode Proposal <?php echo form_error('id_proposal') ?></label> -->
                            <input type="text" name="id_proposal" class="form-control" value="<?php echo $hasil->id_proposal?>"hidden>
                            
                        </div>
                        <div class="form-group">
                            <!-- <label for="varchar">Pengirim <?php echo form_error('pengirim') ?></label> -->
                            <input type="text" name="pengirim" class="form-control" value="<?php echo $hasil->nama_lengkap?>" hidden>
                           
                        </div>
                        <div class="form-group">
                            <label for="enum">Kualifikasi <?php echo form_error('kualifikasi') ?></label>
                            <select class="custom-select" name="kualifikasi">
                                <option selected>Pilih Kualifikasi</option>
                                <option value="1">Biasa</option>
                                <option value="2">Rahasia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="enum">Ditindak Lanjuti <?php echo form_error('ditindak_lanjuti') ?></label>
                            <select class="custom-select" name="ditindak_lanjuti">
                                <option selected>Pilih Tindak Lanjut</option>
                                <option value="1">Man. Kemitraan UKM</option>
                                <option value="2">Man. Purel</option>
                                <option value="3">Man. BL dan Umum</option>
                                <option value="4">Man. Bisnis Partnership</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="text">Catatan Khusus <?php echo form_error('catatan_khusus') ?></label>
                            <input type="text" class="form-control" name="catatan_khusus" id="catatan_khusus" placeholder="Catatan Khusus" value="<?php echo $catatan_khusus; ?>" />
                        </div>
                        <!-- <div class="form-group">
                            <label for="varchar">Biaya Approve <?php echo form_error('biaya_approve') ?></label>
                            <input type="text" class="form-control" id="price" oninput="formatCurrency(this)" name="biaya_approve" id="biaya_approve" placeholder="RP." value="<?php echo $biaya_approve; ?>" />
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="timestamp">Tgl Kegiatan <?php echo form_error('tgl_kegiatan') ?></label>
                            <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan" placeholder="Tgl Kegiatan" value="<?php echo $tgl_kegiatan; ?>" />
                        </div> -->
                        <br>
                        <div class="form-group text-center">
                            <input type="hidden" name="id_disposisi" value="<?php echo $id_disposisi; ?>" /> 
                            <button type="submit" class="btn btn-primary" onclick="showSuccessMessage()"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('pembuatan_disposisi') ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add any additional content or scripts here -->
    <script>
        // Function to format input as "300.000" with periods as thousand separators
        function formatCurrency(input) {
            // Remove any existing non-numeric characters and leading zeros
            const value = input.value.replace(/[^\d]/g, '').replace(/^0+/, '');

            // Format the value with thousand separators
            const formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            // Update the input value with the formatted value
            input.value = formattedValue;
        }

        function showSuccessMessage() {
        alert("Data Berhasil Simpan!")
        }
    </script>
</body>
</html>
