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
 
     <!-- Sweetalert CDN-->
	<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  
    <title>Login</title>
  </head>
  <body>
      <?php echo $this->session->flashdata('msg-succcess');?>
     	<?php
            if(isset($_SESSION['msg-succcess'])){
                unset($_SESSION['msg-succcess']);
            }
        ?>


  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= base_url('Assets/Login/')?>images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Login</h3>
              <p class="mb-4">Silahkan Login kedalam Sistem Keuangan</p>
            </div>
            <form action="<?= base_url('Login/action_login')?>" method="post">

            <?= form_error('username', '<small class="text-danger pl-1">', '</small>');?>
              <div class="form-group first border-2 border-primary m-2">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
              </div>

              <?= form_error('password', '<small class="text-danger pl-1">', '</small>');?>
              <div class="form-group last border-2 border-primary mb-4 m-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">
              
              <span class="d-block text-left mt-3 my-1 text-muted"> Belum Punya Akun ?</span>
            </form>
            <a href="<?= base_url('Login/Daftar')?>"><button class="btn btn-success" style="text-decoration: none;" >Daftar</button></a>
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

    <!-- sweetalert2 -->    
    <script src="<?= base_url('Assets/sweetalert2/dist/')?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('Assets/sweetalert2/myscript.js')?>"></script>     
  </body>
</html>