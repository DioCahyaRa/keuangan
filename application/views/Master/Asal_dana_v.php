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
                                <h4 class="card-title">Data Asal Dana</h4>
                                <h6 class="card-subtitle">Berikut adalah data Asal Dana</h6>
                                <?php if($user_ses['role'] == 'Account'):?>
                                <button class="btn btn-info mr-2" data-toggle="modal" data-target="#addModal"><i class="mdi mdi-plus-box-outline"></i> Tambah </button>
                                <?php endif;?>
                            </div>
                            <div class="table-responsive p-20">
                            <table id="example" class="table table-striped table-bordered text-center" style="width:100%">

                                    <thead>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nomor Telephone</th>
                                            <?php if($user_ses['role'] == 'Account'):?>
                                            <th scope="col">ACTION</th>
                                            <?php endif;?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                         foreach ($asal_dana as $row) :?>
                                        <tr>
                                            <th scope="row"><?= $no++;?></th>
                                            <td><?= $row['nama'];?></td>
                                            <td><?= $row['alamat'];?></td>
                                            <td><?= $row['no_telp'];?></td>
                                            <?php if($user_ses['role'] == 'Account'):?>
                                            <td>            
                                                <button data-toggle="modal" data-target="#editModal<?=$row['id'];?>" class="btn btn-success mr-2"><i class="mdi mdi-tooltip-edit"></i> Edit </button>
                                                <button data-toggle="modal" data-target="#deleteModal<?=$row['id'];?>" class="btn btn-danger"><i class="mdi mdi-delete-circle"></i> Delete</button>
                                            </td>
                                            <?php endif;?>
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
        <form action="<?= base_url('Master/Asal_dana/add')?>" method="post">
          <div class="form-group">
            <label class="col-form-label">Nama :</label>
            <input type="text" name="nama" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">Alamat :</label>
            <input type="text" name="alamat" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">Nomor Telephone :</label>
            <input type="number" name="no_telp" class="form-control" required>
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
    foreach ($asal_dana as $row): $no++;
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
        <form action="<?= base_url('Master/Asal_dana/edit')?>" method="post">

        <input type="hidden" name="id" class="form-control" value="<?= $row['id'];?>">
        
          <div class="form-group">
            <label class="col-form-label">Nama :</label>
            <input type="text" name="nama" class="form-control" value="<?= $row['nama'];?>" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">Alamat :</label>
            <input type="text" name="alamat" class="form-control" value="<?= $row['alamat'];?>" required>
          </div>

          <div class="form-group">
            <label class="col-form-label">No Telephone :</label>
            <input type="text" name="no_telp" class="form-control" value="<?= $row['no_telp'];?>" required>
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
    foreach ($asal_dana as $row): $no++;
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
        <form action="<?= base_url('Master/Asal_dana/delete')?>" method="post">

        <input type="hidden" name="id" class="form-control" value="<?= $row['id'];?>">
        <p>Apkah anda yakin Mneghapus data Asal Dana <strong> <?= $row['nama']?> </strong>, Alamat <strong> <?= $row['alamat']?> </strong> ?</p>
        
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