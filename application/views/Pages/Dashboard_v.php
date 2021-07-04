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
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Feeds</h4>
                                <div class="feed-widget">
                                    <ul class="list-style-none feed-body m-0 p-b-20">
                                        <li class="feed-item">
                                            <?php if($alert_count > 0):?>
                                                <div class="feed-icon bg-info"><i class="fa fa-bell"></i></div> Pemberitahuan menunggu <?=$alert_count?> Approved<span class="ml-auto font-12 text-muted">
                                            <?php else: ?>
                                                <div class="feed-icon bg-info"><i class="fa fa-bell"></i></div> Tidak ada Pemberitahuan<span class="ml-auto font-12 text-muted">
                                            <?php endif; ?>
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="mdi mdi-arrow-down-drop-circle"></i>
                                            </button>
                                            </span>
                                        </li>
                                        <li>
                                            <div class="collapse" id="collapseExample">
                                            <ul>
                                                <?php if($alert_penerimaan):?>
                                                    <li <?= $alert_penerimaan ?> class="p-1">Surat Penerimaan Perlu di Approve <a href="<?= base_url('Surat/Surat_penerimaan')?>"><button class="btn btn-success text-center">Check Penerimaan <i class="mdi mdi-arrow-right-bold-circle-outline"></i></button> </li></a>
                                                <?php endif;?>
                                                <?php if($alert_pembayaran):?>
                                                    <li <?= $alert_pembayaran ?> class="p-1">Surat Pembayaran Perlu di Approve <a href="<?= base_url('Surat/Surat_pembayaran')?>"><button class="btn btn-info text-center">Check Pembayaran <i class="mdi mdi-arrow-right-bold-circle-outline"></i></button> </li></a>
                                                <?php endif;?>
                                            </ul>
                                            </div>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-icon bg-success"><i class="ti-server"></i></div> Server #1
                                            overloaded.<span class="ml-auto font-12 text-muted">2 Hours ago</span>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-icon bg-warning"><i class="ti-shopping-cart"></i></div> New
                                            order received.<span class="ml-auto font-12 text-muted">31 May</span>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-icon bg-danger"><i class="ti-user"></i></div> New user
                                            registered.<span class="ml-auto font-12 text-muted">30 May</span>
                                        </li>
                                    </ul>
                                </div>
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