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
        <h2 style="margin-top:0px">Proposal Read</h2>
        <table class="table">
	    <tr><td>Kode Proposal</td><td><?php echo $kode_proposal; ?></td></tr>
	    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
	    <tr><td>Jenis Kegiatan</td><td><?php echo $Jenis_kegiatan; ?></td></tr>
	    <tr><td>Tanggal Terima</td><td><?php echo $tanggal_terima; ?></td></tr>
	    <tr><td>Proposal</td><td><?php echo $proposal; ?></td></tr>
	    <tr><td>Surat Pengantar</td><td><?php echo $surat_pengantar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('proposal') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>