<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('Assets/Login/')?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('Assets/Login/')?>css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('Assets/Login/')?>css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('Assets/Login/')?>css/style.css">

    <title>Daftar</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= base_url('Assets/Login/')?>images/pict2.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Daftar</h3>
              <p class="mb-4">Silahkan Daftarkan diri anda kedalam Sistem Keuangan</p>
            </div>
            <form action="<?= base_url('Login/Regis')?>" method="post">

            <?= form_error('username', '<small class="text-danger pl-1">', '</small>');?>
              <div class="form-group first border-2 border-primary m-2">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control " id="username"> 
              </div>
            
            <?= form_error('nama', '<small class="text-danger pl-1">', '</small>');?>
              <div class="form-group first border-2 border-primary m-2">
                <label for="name">Name</label>
                <input type="text" name="nama" class="form-control " id="name">
              </div>

            <?= form_error('email', '<small class="text-danger pl-1">', '</small>');?>
              <div class="form-group first border-2 border-primary m-2">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control " id="email">
              </div>

            <?= form_error('password', '<small class="text-danger pl-1">', '</small>');?>
              <div class="form-group last border-2 border-primary mb-4 m-2">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
              </div>

            <?= form_error('password2', '<small class="text-danger pl-1">', '</small>');?>
              <div class="form-group last border-2 border-primary mb-4 m-2">
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" class="form-control" id="password2">
              </div>
              
              <input type="submit" value="Daftar" class="btn btn-block btn-success">
                            
            </form>
            <span class="d-block text-left mt-3 my-1 text-muted"> Sudah Punya Akun ?</span>
              <a href="<?= base_url('Login')?>"><input type="button" value="Login" class="btn btn-block btn-primary"></a>

            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="<?= base_url('Assets/Login/')?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('Assets/Login/')?>js/popper.min.js"></script>
    <script src="<?= base_url('Assets/Login/')?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('Assets/Login/')?>js/main.js"></script>
  </body>
</html>