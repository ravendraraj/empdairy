<!DOCTYPE html>
<html>
<head>
	<title>Walkins in your city</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css')?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>"/>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
  
	<?php include "header.php";
    if($error=$this->session->flashdata('login_fail'))
    {
  ?>
      <div class="alert alert-dismissible alert-primary">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Oh snap!</strong> <a href="#" class="alert-link"><?php echo $error;?></a> and try submitting again.
     </div>
  <?php }?>

<div class="login-form">
    <?php echo form_open('Login/login_v');?>
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <!--<input type="text" class="form-control" placeholder="Username" required="required">-->
        <?php echo form_input(array('type'=>'text','name' =>'username','class'=>'form-control','required'=>'required','value'=>set_value('username')));
        echo form_error('username');
            ?>
        </div>
        <div class="form-group">
            <?php echo form_input(array('type'=>'password','name' =>'password','class'=>'form-control','required'=>'required','value'=>set_value('password')));
            echo form_error('password');
            ?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    <?php echo form_close();?>
    <p class="text-center"><a href="#">Create an Account</a></p>
</div>

</body>
</html>
