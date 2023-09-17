<!DOCTYPE html>
<html>
<head>
    <title>Detail Status Perencanaan Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Detail Status Perencanaan Kegiatan</h2>
        <table class="table table-bordered mt-4">
            <tbody>
                <tr>
                    <td><strong>Nama Lengkap</strong></td>
                    <td><?php echo $nama_lengkap; ?></td>
                </tr>
                <tr>
                    <td><strong>Jenis Kegiatan</strong></td>
                    <td><?php echo $Jenis_kegiatan; ?></td>
                </tr>
                <tr>
                    <td><strong>Tempat Kegiatan</strong></td>
                    <td><?php echo $tempat_kegiatan; ?></td>
                </tr>
                <tr>
                    <td><strong>Biaya Approve</strong></td>
                    <td>Rp. <?php echo number_format($biaya_approve, 0, '', '.'); ?></td>
                </tr>
                <tr>
                    <td><strong>Rekening Pospay</strong></td>
                    <td><?php echo $rekening_pospay; ?></td>
                </tr>
                <tr>
                    <td><strong>Data Proposal</strong></td>
                    <td>
                        <?php if ($proposal): ?>
                            <a target="_blank" href="<?= base_url('assets/proposal/' . $proposal) ?>">
                                <i class="far fa-file-pdf"></i> 
                            </a>
                        <?php else: ?>
                            Tidak ada Data Proposal.
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Data Surat Pengantar</strong></td>
                    <td>
                        <?php if ($proposal): ?>
                            <a target="_blank" href="<?= base_url('assets/proposal/' . $surat_pengantar) ?>">
                                <i class="far fa-file-pdf"></i> 
                            </a>
                        <?php else: ?>
                            Tidak ada Data Surat Pengantar.
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Status Kegiatan</strong></td>
                    <td><?php echo $status_kegiatan; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="text-right mt-3">
            <a href="<?php echo site_url('perencanaan_kegiatan') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</body>
</html>
