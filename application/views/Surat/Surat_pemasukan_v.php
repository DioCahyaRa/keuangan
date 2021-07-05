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
                                <h4 class="card-title">Data Surat Perintah Menerima</h4>
                                <h6 class="card-subtitle">Berikut adalah data Surat Perintah Menerima</h6>
                                <button class="btn btn-info mr-2" data-toggle="modal" data-target="#addModal"><i class="mdi mdi-plus-box-outline"></i> Tambah </button>
                            </div>
                            <div class="table-responsive p-20">
                            <table id="example" class="table table-striped table-bordered text-center" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">NO SURAT</th>
                                            <th scope="col">JENIS BIAYA</th>
                                            <th scope="col">Asal Dana</th>
                                            <th scope="col">URAIAN</th>
                                            <th scope="col">DATE</th>
                                            <th scope="col">STATUS</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                         foreach ($surat as $row) :?>
                                        <tr>
                                            <th scope="row"><?= $no++;?></th>
                                            <td><?= $row['no_surat'];?></td>
                                            <td><?= $row['jns_biaya'];?></td>
                                            <td><?= $row['asal_dana'];?></td>
                                            <td><?= $row['uraian'];?></td>
                                            <td><?= date('d-M-Y',$row['date']);?></td>
                                            <td> <button class="btn
                                             
                                            <?php if($row['status'] == 'CANCELED'){?> 
                                              btn-danger
                                            <?php }elseif($row['status'] == 'UNAPPROVED KETUA' || $row['status'] == 'UNAPPROVED KABAG'){?>
                                             btn-warning
                                            <?php } else{?>
                                              btn-success
                                            <?php };?>
                                             " disabled><?= $row['status'];?></button></td>
                                            <td>            
                                                <button data-toggle="modal" data-target="#detail<?=$row['id'];?>" class="btn btn-primary mr-2"><i class="mdi mdi-details"></i> Detail </button>
                                            </td>
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
            <footer class="footer text-center">
                <!-- All Rights Reserved by Xtreme Admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>. -->
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>



    <!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Surat/Surat_penerimaan/addSurat')?>" method="post">
          <div class="form-group">
            <label class="col-form-label">No Surat :</label>
            <input type="text" name="no_surat" class="form-control" value="<?= $no_surat;?>" required readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Jenis Biaya :</label>
            <select class="form-control" name="jns_biaya" id="msk_klr" required>
              <option value="" selected disabled >- Pilih -</option>
              <?php foreach($jns_biaya as $jns):?>
                <option value="<?= $jns['jns_biaya'];?>"><?= $jns['jns_biaya'];?></option>
              <?php endforeach;?>
					  </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Asal Dana :</label>
            <select class="form-control" name="asal_dana" required>
              <option value="" selected disabled >- Pilih Asal Dana -</option>
            <?php foreach($asal_dana as $data):?>
              <option value="<?= $data['nama'];?>"><?= $data['nama'];?></option>
            <?php endforeach;?>
					  </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Cara Pembayaran :</label>
            <select class="form-control" name="cr_pem" required>
              <option value="" selected disabled >- Pilih -</option>
              <option value="Tunai">Tunai</option>
              <option value="Non Tunai">Non Tunai</option>
					  </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Nominal :</label>
            <input id="terbilang-input" class="mata-uang" type="number" name="nominal" class="form-control" onkeyup="inputTerbilang();" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">Terbilang :</label>
            <input id="terbilang-output" type="text" name="terbilang" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">Uraian :</label>
            <input type="text" name="uraian" class="form-control" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    $no = 1;
    foreach ($surat as $row): $no++;
  ?>
    <!-- Modal detail -->
    <div class="modal fade" id="detail<?=$row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Surat/Surat_penerimaan/to_PDF')?>" method="post">

        <input type="hidden" name="id" class="form-control" value="<?= $row['id'];?>">
        
          <div class="form-group">
            <label class="col-form-label">No surat :</label>
            <input type="text" name="no_surat" class="form-control" value="<?= $row['no_surat']?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Jenis Biaya :</label>
            <input type="text" name="jns_biaya" class="form-control" value="<?= $row['jns_biaya']?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Asal Dana :</label>
            <input type="text" name="asal_dana" class="form-control" value="<?= $row['asal_dana']?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Cara Pembayaran</label>
            <input type="text" name="pos" class="form-control" value="<?= $row['cara_pembayaran']?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Nominal</label>
            <input type="text" name="nominal" class="form-control" value="Rp. <?= number_format($row['nominal']).",-";?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Terbilang</label>
            <input type="text" name="terbilang" class="form-control" value="<?= $row['terbilang']?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Uraian</label>
            <input type="text" name="uraian" class="form-control" value="<?= $row['uraian']?>" readonly>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger btn-oval"><i class="mdi mdi-file-pdf"> </i>To PDF</button>
            <?php if($row['status'] == 'UNAPPROVED KABAG' && $user_ses['role'] == 'Kabag'):?>
              <a href="<?php echo base_url().'Surat/Surat_penerimaan/Approved_kabag'.'/'.$row['id']; ?>">
                <button type="button" class="btn btn-success mt-2 mb-2"><i class="mdi mdi-checkbox-marked-circle-outline"></i> Approved</button>
              </a>
              <a href="<?php echo base_url().'Surat/Surat_penerimaan/Canceled_kabag'.'/'.$row['id']; ?>">
              <button type="button" class="btn btn-danger"><i class="mdi mdi-close-octagon"></i> CANCELED</button>
            <?php endif;?>

            <?php if($row['status'] == 'UNAPPROVED KETUA' && $user_ses['role'] == 'Ketua'):?>
              <a href="<?php echo base_url().'Surat/Surat_penerimaan/Approved_ketua'.'/'.$row['id']; ?>">
                <button type="button" class="btn btn-success mt-2 mb-2"><i class="mdi mdi-checkbox-marked-circle-outline"></i> Approved</button>
              </a>
              <a href="<?php echo base_url().'Surat/Surat_penerimaan/Canceled_ketua'.'/'.$row['id']; ?>">
              <button type="button" class="btn btn-danger"><i class="mdi mdi-close-octagon"></i> CANCELED</button>
            <?php endif;?>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>


