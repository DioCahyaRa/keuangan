<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title><?= $title?></title>

    <!-- <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" /> -->

    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png"> -->

    <!-- Custom CSS -->
    <link href="<?= base_url('Assets/dashboard/');?>/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('Assets/')?>datatables/datatables.min.css"/>

    <!-- Sweetalert CDN-->
	<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
                <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon p-2">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <h2>Keuangan Apps</h2>
                        </b>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->

                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="<?= base_url('Assets/dashboard/')?>images/users/1.jpg" alt="users"
                                        class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="javascript:void(0)" class="" id="Userdd" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium"><?= $user_ses['nama'];?> <i
                                                class="fa fa-angle-down"></i></h5>
                                        <span class="op-5 user-email"><?= $user_ses['email']?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="<?= base_url('Page/Profile')?>"><i
                                                class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= base_url('Login/logout')?>"><i
                                                class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <!-- User Profile-->
                        <li class="sidebar-item ml-1"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item ml-1"> <a class="<?php if($title == "Profile"):?>Active <?php endif;?>sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('Page/Profile')?>" aria-expanded="false"><i
                                    class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a></li>
                        
                        <hr class="border border-primary m-3">
                        <span class="ml-3">Master</span>
                        <li class="sidebar-item ml-1"> <a class="<?php if($title == "Jenis Transaksi"):?>Active <?php endif;?> sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('Master/Jenis_transaksi')?>"><i class="mdi mdi-clipboard-text"></i><span
                                    class="hide-menu">Jenis Transaksi</span></a></li>

                        <li class="sidebar-item ml-1"> <a class="<?php if($title == "Bagian"):?>Active <?php endif;?> sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('Master/Bagian')?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span
                                    class="hide-menu">Bagian</span></a></li>
                                    
                                    
                        <hr class="border border-primary m-3">
                        <span class="ml-3">Surat</span>

                        <li class="sidebar-item ml-1"> <a class="<?php if($title == "Surat Pemasukan & Pengeluaran"):?>Active <?php endif;?> sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('Surat/Surat')?>" aria-expanded="false"><i class="mdi mdi-note-text"></i><span
                                    class="hide-menu">Surat</span></a></li>

                        <hr class="border border-primary m-3">
                        <li class="sidebar-item ml-1"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('Login/logout')?>" aria-expanded="false"><i class="fa fa-power-off"></i><span
                                    class="hide-menu">Logout</span></a></li>


                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->