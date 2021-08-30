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
                                        <div class="btn btn-info">Laporan Per Tanggal</div>
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

