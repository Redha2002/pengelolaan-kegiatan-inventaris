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
    </style>
</head>
<body>
    <h2 style="margin-top:0px"></h2>                  
    <div class="container">
        <div class="row">
            <div class="col-lg-30 col-xl-20">
                <div class="card shadow mb-8">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5 class="mt-2 font-weight-bold text-danger"> <b>LAPORAN KEGIATAN</b></h5>
                                <div class="col-md-12 text-right">
                                                    <a href="javascript:printLaporan()" class="btn btn-dark">Cetak </a>
                                                </div>
                                <!-- <a class="btn btn-dark" href="<?php echo base_url()?>/laporan_kegiatan">
                                <span class="icon ">
                                    <i class="fas fa-print mr-lg-2"></i>
                                </span>Cetak</a> -->

                                <!-- filter tanggal -->
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-9 text-center">
                                        <div class="row align-items-center justify-content-center">
                                            <form action="<?= site_url('Laporan_kegiatan/filter_function') ?>" method="POST" class="form-inline">
                                                <div class="form-group">
                                                    <label for="tgl_awal">Tanggal Awal</label>
                                                    <input type="date" class="form-control mx-2" name="start_date" id="tgl_awal" ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_akhir">Tanggal Akhir</label>
                                                    <input type="date" class="form-control mx-2" name="end_date" id="tgl_akhir" ">
                                                </div>
                                                <button type="submit" class="btn btn-primary mx-2">Filter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                    <!-- end filter tanggal -->
                   <div style="margin-top: 8px" id="message">
                       <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                   </div>
               </div>
                            </div>
                            <div class="col-lg-16 col-xl-6" style="text-align: right;">
                                <div class="col-md-4 text-center"></div>
                                <div class="col-md-1 text-right"></div>
                                <div class="col-md-3 text-right">
                                    <form action="<?php echo site_url('laporan_kegiatan/index'); ?>" class="form-inline" method="get">
                                        <div class="input-group"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead align="center" class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Kode Proposal</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Laporan Kegiatan</th>
                                <th>Jenis Kegiatan</th>
                                <!-- <th>Cetak List</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 1;
                            foreach ($laporan_kegiatan_data as $row) :
                                 $date_only = date('d-m-Y', strtotime($row->tgl_kegiatan));
                                ?>
                                <tr>
                                    <td width="80px"><?php echo $start++ ?></td>
                                    <td>TJSL <?php echo $row->id_proposal ?></td>
                                    <td><?php echo $date_only ?></td>
                                    <!-- <td><?php echo $laporan_kegiatan->tgl_kegiatan ?></td> -->
                                    <td><a target="_blank" href="<?=base_url('assets/laporan_kegiatan/'.$row->laporan_kegiatan)?>"><?php echo $row->laporan_kegiatan ?></a></td>
                                    <td><?php echo $row->jenis_kegiatan ?></td>
                                    <!-- <td style="text-align:center" width="200px">
                                        <?php 
                                        // echo anchor(site_url('laporan_kegiatan/read/'.$laporan_kegiatan->id_laporan),'Read'); 
                                        // echo ' | '; 
                                        // echo anchor(site_url('laporan_kegiatan/update/'.$laporan_kegiatan->id_laporan),'Update'); 
                                        // echo ' | '; 
                                        // echo anchor(site_url('laporan_kegiatan/delete/'.$laporan_kegiatan->id_laporan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                        ?>
                                        <a href="javascript:printLaporan('<?php echo $laporan_kegiatan->laporan_kegiatan; ?>')">Cetak</a>
                                    </td> -->
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script>new DataTable('#example');</script>

    <script>
    function printLaporan() {
        var printContents = document.documentElement.outerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
    <!-- <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        // function printLaporan(laporan) {
        //     var printContents = laporan;
        //     var originalContents = document.body.innerHTML;
        //     document.body.innerHTML = printContents;
        //     window.print();
        //     document.body.innerHTML = originalContents;
        // }
    </script> -->


</body>
</html>
