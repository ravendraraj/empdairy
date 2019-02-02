<!DOCTYPE html>
<html lang="en">
<?php include('user/script.php');?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Forgot your password?</h4>
            <p>Enter your email address and we will send you instructions on how to reset your password.</p>
          </div>
  <!--Start Forget Password form-->
            <?php echo form_open('Welcome/recover-pass')?>
            <div class="form-group">
              <div class="form-label-group">
                <?php
                 echo form_input(array('type'=>'email', 'class'=>'form-control','placeholder'=>'Enter Your Email','required'=>'required','autofocus'=>'autofocus','id'=>'inputEmail','name'=>'username'));
                ?>
                <label for="inputEmail">Enter email address</label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
          <?php echo form_close()?>
          <div class="text-center">
          <!--  <a class="d-block small mt-3" href="register.html">Register an Account</a>-->
            <a class="d-block small" href="<?php echo base_url('Login/login_page');?>">Home</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
