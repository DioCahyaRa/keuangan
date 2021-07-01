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
                                            <th scope="col">JENIS SURAT</th>
                                            <th scope="col">MASUK / KELUAR</th>
                                            <th scope="col">KEPADA</th>
                                            <th scope="col">POS ANGGARAN</th>
                                            <th scope="col">DATE</th>
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
                                            <td><?= $row['jns_surat'];?></td>
                                            <td><?= $row['masuk_keluar'];?></td>
                                            <td><?= $row['kepada'];?></td>
                                            <td><?= $row['pos_anggaran'];?></td>
                                            <td><?= $row['date'];?></td>
                                            <td>            
                                                <button data-toggle="modal" data-target="#editModal<?=$row['id'];?>" class="btn btn-warning mr-2"><i class="mdi mdi-details"></i> Detail </button>
                                                <button data-toggle="modal" data-target="#deleteModal<?=$row['id'];?>" class="btn btn-danger"><i class="mdi mdi-delete-circle"></i> Delete</button>
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
            <label class="col-form-label">Jenis Surat :</label>
            <input type="text" name="jns_surat" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">Masuk / Keluar :</label>
            <select class="form-control" name="msk_klr" id="msk_klr">
              <option value="" selected disabled >- Pilih -</option>
              <option value="Masuk">Masuk</option>
              <option value="Keluar">Keluar</option>
					  </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Kepada :</label>
            <input type="text" name="kepada" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">Pos Anggaran :</label>
            <select class="form-control" name="pos" id="msk_klr">
              <option value="" selected disabled >- Pilih Pos -</option>
            <?php foreach($jns_transaksi as $jns):?>
              <option value="<?= $jns['pos'];?>"><?= $jns['pos'];?></option>
            <?php endforeach;?>
					  </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Cara Pembayaran :</label>
            <select class="form-control" name="cr_pem" id="msk_klr">
              <option value="" selected disabled >- Pilih -</option>
              <option value="Masuk">Tunai</option>
              <option value="Keluar">Non Tunai</option>
					  </select>
          </div>

          <div class="form-group">
            <label class="col-form-label">Nominal :</label>
            <input type="number" name="nominal" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">Terbilang :</label>
            <input type="text" name="terbilang" class="form-control" required>
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
    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?=$row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Master/Surat/editSurat')?>" method="post">

        <input type="hidden" name="id" class="form-control" value="<?= $row['id'];?>">
        
          <div class="form-group">
            <label class="col-form-label">Bagian :</label>
            <input type="text" name="bagian" class="form-control" value="" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">Nama :</label>
            <input type="text" name="nama" class="form-control" value="" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>


<?php
    $no = 1;
    foreach ($surat as $row): $no++;
  ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal<?=$row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('Master/Bagian/deleteBagian')?>" method="post">

        <input type="hidden" name="id" class="form-control" value="<?= $row['id'];?>">
        <!-- <p>Apkah anda yakin Mneghapus data Jenis Transaksi <strong> <?= $row['bagian']?> </strong> nama pos <strong> <?= $row['nama']?> </strong> ?</p> -->
        
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php endforeach;?>