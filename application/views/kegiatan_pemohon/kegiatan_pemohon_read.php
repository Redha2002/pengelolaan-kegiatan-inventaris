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
        <h2 style="margin-top:0px">Kegiatan_pemohon Read</h2>
        <table class="table">
	    <tr><td>Tgl Kegiatan</td><td><?php echo $tgl_kegiatan; ?></td></tr>
	    <tr><td>Jenis Kegiatan</td><td><?php echo $Jenis_kegiatan; ?></td></tr>
	    <tr><td>Laporan Kegiatan</td><td><?php echo $laporan_kegiatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kegiatan_pemohon') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>