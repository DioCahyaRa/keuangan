
<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
         ALBERT CELL
        </a>
      </div>
      <div class="sidebar-wrapper">
      <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Dashboard');?>">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>

          <hr class="border border-primary m-3">
          <p class="ml-3">Master</p>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Data_barang')?>">
              <i class="material-icons">library_books</i>
              <p>Data Barang</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Data_supplier')?>">
              <i class="material-icons">library_books</i>
              <p>Data Supplier</p>
            </a>
          </li>

          <hr class="border border-primary m-3">
          <p class="ml-3">Transaksi</p>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Transaksi_penjualan');?>">
              <i class="material-icons">content_paste</i>
              <p>Transaksi Penjualan</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('Transaksi_pembelian');?>">
              <i class="material-icons">content_paste</i>
              <p>Transaksi Pembelian</p>
            </a>
          </li>

          <hr class="border border-primary m-3">
          <p class="ml-3">Laporan</p>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Laporan_penjualan');?>">
              <i class="material-icons">content_paste</i>
              <p>Laporan Penjualan</p>
            </a>
          </li>

          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('Laporan_pembelian');?>">
              <i class="material-icons">content_paste</i>
              <p>Laporan Pembelian</p>
            </a>
          </li>

          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('Jurnal_umum');?>">
              <i class="material-icons">content_paste</i>
              <p>Jurnal Umum</p>
            </a>
          </li>
          
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><?= $title?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url('Login/logout')?>">Log out</a>
                </div>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="row">
            <div class="col-md-12">
            <a href="<?= base_url('Laporan_pembelian')?>"><button class="btn btn-danger">Back</button></a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "><?= $title?></h4>
                  <p class="card-category">Berikut Data Detail Transaksi</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Nama Supplier</th>
                            <th>Id Barang</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total harga</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                        <tr>
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Nama Supplier</th>
                            <th>Id Barang</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total harga</th>
                        </tr>
                    </tfoot>
                    <tbody class="text-center">
                        <?php
                        $no=1;
                        foreach($data_pembelian as $data):
                        ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $data['no_invoice'];?></td>
                                <td><?= $data['nama_supplier'];?></td>
                                <td><?= $data['id_barang'];?></td>
                                <td><?= $data['nama_barang'];?></td>
                                <td><?= $data['qty'];?></td>
                                <td>Rp. <?= number_format($data['harga']).",-";?></td>
                                <td>Rp. <?= number_format($data['total_harga']).",-";?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                    </div>
                    <div class="row">
                        <div class="text-center col-sm-12">
                            <h5><strong>Subtotal Rp.<?= number_format($data['subtotal']).",-";?></strong></h5>
                        </div>  
                    </div>
                    
                </div>
              </div>
            </div>
            <!-- tutup Table -->
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
