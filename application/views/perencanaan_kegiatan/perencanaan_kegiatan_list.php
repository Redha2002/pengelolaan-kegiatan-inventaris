<!doctype html>
<html>
<head>
    <title>harviacode.com - codeigniter crud generator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css"/>
    <style>
        body{
            padding: 15px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #f0ad4e;
            border-bottom: 0;
            color: white;
            font-weight: bold;
        }
        .table {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="mt-2">STATUS PERENCANAAN KEGIATAN PEMOHON</h5>
                <?php if ($_SESSION['hak_akses'] ==  'Admin'){
                            ?>
                <a class="btn-primary btn" href="<?php echo base_url('perencanaan_kegiatan/create_action')?>">Create</a>
                                <?php
                                    }
                                    ?>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
            </div>
            <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead align="center" class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Kode Proposal</th>
                            <th>Tempat Kegiatan</th>
                            <th>Tanggal Kegiatan</th>
                            <?php if ($_SESSION['hak_akses'] ==  'Admin'){
                            ?>
                            <th>Biaya Approve</th>
                            <?php
                                    }
                                    ?>
                            <th>Rekening Pospay</th>
                            <?php if ($_SESSION['hak_akses'] ==  'Admin'){
                            ?>
                            <th>Rapat Kegiatan</th>
                            <?php
                                    }
                                    ?>
                            <th>Status Kegiatan</th>
                            <th>Keterangan</th>
                            <?php if ($_SESSION['hak_akses'] == 'Pemohon' or $_SESSION['hak_akses'] == 'Admin'){
                            ?>
                            <th>Action</th>
                            <?php
                                    }
                                    ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($perencanaan_kegiatan_data as $perencanaan_kegiatan)
                        {
                            $date_only = date('d-m-Y', strtotime($perencanaan_kegiatan->tgl_kegiatan));
                            ?>
                            <tr>
                                <td><?php echo ++$start ?></td>
                                <td><?php echo $perencanaan_kegiatan->nama_lengkap ?></td>
                                <td>TJSL <?php echo $perencanaan_kegiatan->id_proposal ?></td>
                                <td><?php echo $perencanaan_kegiatan->tempat_kegiatan ?></td>
                                <td><?php echo $date_only ?></td>
                                <!-- <td><?php echo $perencanaan_kegiatan->tgl_kegiatan ?></td> -->
                                <?php if ($_SESSION['hak_akses'] ==  'Admin'){
                                 ?>
                                <td>Rp. <?php  echo number_format($perencanaan_kegiatan->biaya_approve, 0, '', '.')?></td>
                                <?php
                                    }
                                    ?>
                                <td><?php echo $perencanaan_kegiatan->rekening_pospay ?></td>
                                <?php if ($_SESSION['hak_akses'] ==  'Admin'){
                                ?>
                                <td>
                                    <a target="_blank" href="<?= base_url('assets/perencanaan_kegiatan/' . $perencanaan_kegiatan->rapat_kegiatan) ?>">
                                        <i class="far fa-file-pdf"></i> <!-- Icon representing the proposal file (PDF) -->
                                    </a>
                                </td>
                                <?php
                                    }
                                    ?>
                                <td><?php echo $perencanaan_kegiatan->status_kegiatan ?></td>
                                <td><?php echo $perencanaan_kegiatan->keterangan ?></td>
                                <?php if ($_SESSION['hak_akses'] ==  'Admin'){
                                ?>
                                 <td style="text-align:center" width="200px">
                                    <?php  
                                    echo anchor(site_url('perencanaan_kegiatan/update/'.$perencanaan_kegiatan->id_perencanaan), '<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning"  data-toggle="tooltip" title="Update"');
                                    echo ' | ';
                                    echo '<a href="#" onclick="showDeleteConfirmation('.$perencanaan_kegiatan->id_perencanaan.')" class="btn btn-xs btn-success" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>';
                                    ?>
                                </td>
                                <?php
                                    }
                                    ?>
                                <?php if ($_SESSION['hak_akses'] == 'Pemohon') {
                                $query = $this->db->query("select * from laporan_kegiatan where id_perencanaan = '$perencanaan_kegiatan->id_perencanaan'")->row();
                                ?>
                                <td style="text-align:center" width="160px">
                                    <?php
                                     echo anchor(
                                        site_url('perencanaan_kegiatan/read/'.$perencanaan_kegiatan->id_perencanaan),
                                        '<i class="fa fa-eye"></i>',
                                        'class="btn btn-xs btn-warning" data-toggle="modal" data-target="#viewModal" title="View"'
                                    );
                                    echo ' | ';
                                    if ($query) {
                                    ?>
                                        <button class="btn btn-success" disabled>OK</button>
                                    <?php
                                    } else {
                                        if ($perencanaan_kegiatan->status_kegiatan == 'Approve') {
                                            echo anchor(site_url('Laporan_kegiatan/kegiatan/' . $perencanaan_kegiatan->id_perencanaan), 'Create Kegiatan', 'class="btn btn-success"');
                                        } else {
                                    ?>
                                            <button class="btn btn-danger" disabled>Ditolak</button>
                                    <?php
                                        }
                                    }
                                    ?>
                                </td>
                            <?php } ?>

                                   
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
                <?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-success"'); ?>
            </div> -->
            <!-- <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div> -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script>new DataTable('#example');</script>
    <!-- <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script> -->
</body>
</html>
<!-- Tambahkan script JavaScript di bawah ini -->
<script>
    function showDeleteConfirmation(perencanaanId) {
        // Gunakan window.confirm() untuk menampilkan pemberitahuan konfirmasi
        if (window.confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            // Jika pengguna menekan tombol "OK" pada konfirmasi, arahkan ke halaman delete
            window.location.href = '<?php echo site_url('perencanaan_kegiatan/delete/'); ?>' + perencanaanId;
        }
    }

    function disableCreateLaporanBtn() {
        var createLaporanBtn = document.getElementById('createLaporanBtn');
        createLaporanBtn.setAttribute('disabled', 'disabled');
    }
</script>

<!-- <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Detail Perencanaan Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
