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
                                <h4 class="card-title">Data <?= $title?></h4>
                                <h6 class="card-subtitle">Berikut adalah data <?= $title?></h6>
                                <button class="btn btn-info mr-2" data-toggle="modal" data-target="#addModal"><i class="mdi mdi-plus-box-outline"></i> Tambah </button>
                            </div>
                            <div class="table-responsive p-20">
                            <table id="example" class="table table-striped table-bordered text-center" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">NO SURAT</th>
                                            <th scope="col">JENIS Biaya</th>
                                            <th scope="col">MASUK / KELUAR</th>
                                            <th scope="col">KEPADA</th>
                                            <th scope="col">POS ANGGARAN</th>
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
                                            <td><?= $row['masuk_keluar'];?></td>
                                            <td><?= $row['kepada'];?></td>
                                            <td><?= $row['pos_anggaran'];?></td>
                                            <td><?= date('d-M-Y',$row['date']);?></td>
                                            <td><?= $row['status'];?></td>
                                            <td>            
                                                <button data-toggle="modal" data-target="#detail<?=$row['id'];?>" class="btn btn-warning mr-2"><i class="mdi mdi-details"></i> Detail </button>
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
                All Rights Reserved by Xtreme Admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
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
        <form action="<?= base_url('Surat/Surat/addSurat')?>" method="post">
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
            <label class="col-form-label">Masuk / Keluar :</label>
            <select class="form-control" name="msk_klr" required>
              <option value="" selected disabled >- Pilih -</option>
              <option value="Masuk">Masuk</option>
              <option value="Keluar">Keluar</option>
					  </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Kepada :</label>
            <select class="form-control" name="kepada" required>
              <option value="" selected disabled >- Pilih Kepada -</option>
            <?php foreach($bagian as $bg):?>
              <option value="<?= "(".$bg['bagian'].")"." ".$bg['nama'];?>"><?= "(".$bg['bagian'].")"." ".$bg['nama'];?></option>
            <?php endforeach;?>
					  </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Pos Anggaran :</label>
            <select class="form-control" name="pos" required>
              <option value="" selected disabled >- Pilih Pos -</option>
            <?php foreach($jns_transaksi as $jns):?>
              <option value="<?= $jns['pos'];?>"><?= $jns['pos'];?></option>
            <?php endforeach;?>
					  </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Cara Pembayaran :</label>
            <select class="form-control" name="cr_pem" required>
              <option value="" selected disabled >- Pilih -</option>
              <option value="Masuk">Tunai</option>
              <option value="Keluar">Non Tunai</option>
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
        <form action="<?= base_url('Master/Surat')?>" method="post">

        <input type="hidden" name="id" class="form-control" value="<?= $row['id'];?>">
        
          <div class="form-group">
            <label class="col-form-label">No surat :</label>
            <input type="text" name="no_surat" class="form-control" value="<?= $row['no_surat']?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Jenis Biaya :</label>
            <input type="text" name="jns_surat" class="form-control" value="<?= $row['jns_biaya']?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Keterangan Masuk / Keluar :</label>
            <input type="text" name="masuk_keluar" class="form-control" value="<?= $row['masuk_keluar']?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Pos Anggaran</label>
            <input type="text" name="pos" class="form-control" value="<?= $row['pos_anggaran']?>" readonly>
          </div>

          <div class="form-group">
            <label class="col-form-label">Cara Pembayaran</label>
            <input type="text" name="pos" class="form-control" value="<?= $row['pos_anggaran']?>" readonly>
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
            <button type="submit" class="btn btn-success">OK</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
