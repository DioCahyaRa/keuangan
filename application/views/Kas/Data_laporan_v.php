            <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title"><?= $title?></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?= $title?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?= $title?></h4>
                                <h6 class="card-subtitle">Berikut adalah <?= $title?></h6>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a href="<?= base_url('Kas/Data_laporan/to_pdf_harian')?>"><div class="btn btn-success">Laporan Harian</div></a>
                                        <div class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Laporan Per Tanggal</div>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4 center">
                                        <h3>SALDO : <strong>Rp. <?= number_format($saldo).",-";?></strong></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-20">
                            <table id="example" class="table table-striped table-bordered text-center" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">NO KAS</th>
                                            <th scope="col">NO SURAT</th>
                                            <th scope="col">NAMA KAS</th>
                                            <th scope="col">DEBIT</th>
                                            <th scope="col">KREDIT</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                         foreach ($laporan as $row) :?>
                                        <tr>
                                            <th scope="row"><?= $no++;?></th>
                                            <td><?= $row['no_kas'];?></td>
                                            <td><?= $row['no_surat'];?></td>
                                            <td><?= $row['nama_kas'];?></td>
                                            <td>Rp. <?= number_format($row['debit']).",-";?></td>
                                            <td>Rp. <?= number_format($row['kredit']).",-";?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- <footer class="footer text-center">
                All Rights Reserved by Xtreme Admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
            </footer> -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Export Data Laporan to PDF</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('Kas/Data_laporan/pdf_perTanggal')?>" method="post">
            <div class="modal-body">
                    <h5>Dari Tanggal :</h5>
                    <input type="date" name="start_date" class="btn btn-primary" required>

                    <h5 class="mt-3">Sampai Tanggal :</h5>
                    <input type="date" name="end_date" class="btn btn-primary" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-oval"><i class="mdi mdi-file-pdf"> </i>To PDF</button>
            </div>
        </form>
        </div>
    </div>
    </div>

