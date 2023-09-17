<!DOCTYPE html>
<html>
<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <!-- Add Bootstrap CSS here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 15px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dc3545;
        }

        .card-body {
            background-color: #f8f9fa;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-primary:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        /* Radio button styles */
        .form-check-input[type="radio"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="col">
        <div class="container">
            <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-danger"><b>DATA PERENCANAAN KEGIATAN</b></h5>
                    </div>
                    <div class="card-body">
                    <?php echo form_open_multipart('perencanaan_kegiatan/create_action');?>
                        <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                                <label for="id_proposal">Kode Proposal <?php echo form_error('id_proposal') ?></label>
                                <select name="id_proposal" id="id_proposal" onchange="get_rekening_pospay()" class="form-control">
                                    <option value="">--Pilih Kode Proposal--</option>
                                    <?php if ($list_proposal): ?>
                                        <?php foreach ($list_proposal as $lp): ?>
                                            <option value="<?php echo $lp->id_proposal ?>">
                                                <?php echo "TJSL" ?> - <?php echo $lp->id_proposal ?></option>
                                            <!-- <option value="<?php echo $lp->id_proposal ?>"><?php echo $lp->id_proposal ?></option> -->
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
                                <input type="text" id="nama_lengkap" class="form-control" readonly>
                                <input type="hidden" name="nama_lengkap_hidden" id="nama_lengkap_hidden" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tempat_kegiatan">Tempat Kegiatan <?php echo form_error('tempat_kegiatan') ?></label>
                                <input type="text" class="form-control" name="tempat_kegiatan" id="tempat_kegiatan" placeholder="Tempat Kegiatan" value="<?php echo $tempat_kegiatan; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="tgl_kegiatan">Tanggal Kegiatan<?php echo form_error('tgl_kegiatan') ?></label>
                                <input type="date" class="form-control" name="tgl_kegiatan" id="tgl_kegiatan" placeholder="Tgl Kegiatan" value="<?php echo $tgl_kegiatan; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="biaya_approve">Biaya Approve <?php echo form_error('biaya_approve') ?></label>
                                <input type="text" class="form-control" name="biaya_approve" id="biaya_approve"  placeholder="Biaya Approve" value="<?php echo $biaya_approve; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="rekening_pospay">Rekening Pospay <?php echo form_error('rekening_pospay') ?></label>
                                <input type="text" id="rekening_pospay" class="form-control" readonly>
                                <input type="hidden" name="rekening_pospay_hidden" id="rekening_pospay_hidden" class="form-control">
                                
                                <!-- <input type="text" class="form-control" name="rekening_pospay" id="rekening_pospay" placeholder="Rekening Pospay" value="<?php echo $rekening_pospay; ?>" /> -->
                            </div>
                            <div class="form-group">
                                <label for="rapat_kegiatan">Rapat Kegiatan <?php echo form_error('rapat_kegiatan') ?></label>
                                <input type="file" class="form-control" name="rapat_kegiatan" id="rapat_kegiatan" placeholder="Rapat Kegiatan" value="<?php echo $rapat_kegiatan; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Status Kegiatan <?php echo form_error('status_kegiatan') ?></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_kegiatan" id="disetujui" value="Approve" checked>
                                    <label class="form-check-label" for="disetujui">Disetujui</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_kegiatan" id="tidak_disetujui" value="Tidak">
                                    <label class="form-check-label" for="tidak_disetujui">Tidak Disetujui</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tempat_kegiatan">Keterangan <?php echo form_error('keterangan') ?></label>
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="keterangan" value="<?php echo $keterangan; ?>" />
                            </div>

                            <br>
                            
                            <input type="hidden" name="id_perencanaan" value="<?php echo $id_perencanaan; ?>" /> 
                            <button type="submit" name="submit" class="btn btn-success" onclick="showSuccessMessage()"><?php echo $button ?></button> 
                            <a href="<?php echo site_url('perencanaan_kegiatan/create_action') ?>" class="btn btn-danger">Cancel</a>

                            <?php echo form_close();?>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
//         function format_num(biaya_approve) {
//   var number = document.getElementById(biaya_approve).value;
//           number += '';
//           number = number.replace(",","");
//           x = number.split('.');
//           x1 = x[0];
//           x2 = x.length > 1 ? '.' + x[1] : '';
//           var rgx = /(\d+)(\d{3})/;
//           while (rgx.test(x1)) {
//               x1 = x1.replace(rgx, '$1' + ',' + '$2');
//           }
//           document.getElementById(biaya_approve).value = x1 + x2;
//       }

function get_rekening_pospay() {
    var id_proposal = $('#id_proposal').val();

    var formdata = new FormData();
    formdata.append('id_proposal', id_proposal);

    $.ajax({
        type: 'POST',
        url: "<?= base_url('perencanaan_kegiatan/get_rekening_pospay'); ?>",
        data: formdata,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function (response) {
            $('#nama_lengkap').val(response.nama_lengkap);
            $('#nama_lengkap_hidden').val(response.nama_lengkap);
            $('#rekening_pospay').val(response.rekening_pospay);
            $('#rekening_pospay_hidden').val(response.rekening_pospay);
            
        },
    });
}

      function formatNumberWithThousandSeparator(number) {
        // Convert the number to a string
        const numString = number.toString();
        
        // Split the number into the whole part and the decimal part (if any)
        const [wholePart, decimalPart] = numString.split('.');
        
        // Add thousand separators to the whole part
        const formattedWholePart = wholePart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        
        // Combine the whole part and the decimal part (if any) back into a formatted string
        return decimalPart ? `${formattedWholePart}.${decimalPart}` : formattedWholePart;
        }

        // Test the function
        const inputNumber = 5000;
        const formattedNumber = formatNumberWithThousandSeparator(inputNumber);
        console.log(formattedNumber); // Output: "5.000"


        //buat dibawah sini Redhaa....
        function showSuccessMessage() {
        alert("Data Berhasil Simpan!")
        }

    </script>
</body>
</html>



