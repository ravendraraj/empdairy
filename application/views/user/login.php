<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">


    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin.css');?>" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
           <?php echo form_open('Login/login_v');?>
            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input(array('type'=>'text','name'=>'username','required'=>'required','class'=>'form-control','autofocus'=>'autofocus','placeholder'=>'Username','id'=>'inputEmail'))?>
                <label for="inputEmail">Username</label>
                <?php echo form_error('username')?>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input(array('type'=>'password','name'=>'password','required'=>'required','class'=>'form-control','autofocus'=>'autofocus','placeholder'=>'Password','id'=>'inputPassword'));?>
                <label for="inputPassword">Password</label>
                <?php echo form_error('password')?>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          <?php echo form_close()?>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.html">Register an Account</a>
            <a class="d-block small" href="<?php echo base_url('Welcome/forgot_password')?>">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assetsvendor/jquery-easing/jquery.easing.min.js')?>"></script>

  </body>

</html>
