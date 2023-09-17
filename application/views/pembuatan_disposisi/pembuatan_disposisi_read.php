<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pembuatan_disposisi Read</h2>
        <table class="table">
	    <tr><td>Kode Proposal</td><td><?php echo $kode_proposal; ?></td></tr>
	    <tr><td>Pengirim</td><td><?php echo $pengirim; ?></td></tr>
	    <tr><td>Kualifikasi</td><td><?php echo $kualifikasi; ?></td></tr>
	    <tr><td>Ditindak Lanjuti</td><td><?php echo $ditindak_lanjuti; ?></td></tr>
	    <tr><td>Catatan Khusus</td><td><?php echo $catatan_khusus; ?></td></tr>
	    <tr><td>Biaya Approve</td><td><?php echo $biaya_approve; ?></td></tr>
	    <tr><td>Tgl Kegiatan</td><td><?php echo $tgl_kegiatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pembuatan_disposisi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>