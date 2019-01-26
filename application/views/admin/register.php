<!DOCTYPE html>
<html lang="en">
<?php include('script.php');?>
  <body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          <a href="<?php echo base_url("Admincontroller/dashboard")?>" class="btn btn-default btn-sm">
          Home
          </a>
          <a href="<?php echo base_url("Salarycontroller/add_emp_salary_info_form")?>" class="btn btn-default btn-sm">
          ADD Salary Details
          </a>
        <center><h5>Add New Employee</h5></center></div>
        <div class="card-body">
          <?php echo form_open('Admincontroller/add_new_user')?>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'firstName','class'=>'form-control','placeholder'=>'First Name','required'=>'required','name'=>'firstName','value'=>set_value('firstName'),'autofocus'=>'autofocus'))?>
                    <label for="firstName">First name</label>
                    <?php echo form_error('firstName')?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'lastName','class'=>'form-control','placeholder'=>'Last Name','required'=>'required','name'=>'lastName','value'=>set_value('lastName'),'autofocus'=>'autofocus'))?>
                    <label for="lastName">Last name</label>
                    <?php echo form_error('lastName')?>
                  </div>
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'date','id'=>'DOB','class'=>'form-control','placeholder'=>'DOB','required'=>'required','name'=>'DOB','autofocus'=>'autofocus','value'=>set_value('DOB')))?>
                    <label for="DOB">DOB</label>
                    <?php echo form_error('DOB')?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'qualification','class'=>'form-control','placeholder'=>'Qualification','required'=>'required','name'=>'qualification','autofocus'=>'autofocus','value'=>set_value('qualification')))?>
                    <label for="qualification">Qualification</label>
                    <?php echo form_error('qualification')?>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input(array('type'=>'text','id'=>'inputEmail','class'=>'form-control','placeholder'=>'Email','required'=>'required','name'=>'uname','autofocus'=>'autofocus','value'=>set_value('uname')))?>
                <label for="inputEmail">Email address</label>
                <?php echo form_error('uname')?>
              </div>
              <br> 
             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_error('depart')?>
                    <select class="form-control" name="depart" required="required" id="depart">
                      <option value="null">Select Department</option>
                      <?php  
                        if(is_array($chunk['depart']) && count($chunk['depart'])>0)
                        {
                          foreach($chunk['depart'] as $sec)  
                          {  
                      ?>
            
                        <option value="<?php echo $sec->deptName;?>"><?php echo $sec->deptName;?></option>
                      <?php }
                      }
                    else{       
                    ?>  
                      <option>Please Configure your Department Section</option>
                    <?php
                  }
                ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_error('depart')?>
                    <select class="form-control" name="desigation" id="desigation" required="required">
                      <option value="null">Select Position</option>
                    </select>
                    <?php echo form_error('desigation')?>
                  </div>
                </div>
            </div>
            <br/>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'Previous','class'=>'form-control','placeholder'=>'Previous Company','required'=>'required','name'=>'Previous','autofocus'=>'autofocus','value'=>set_value('Previous')))?>
                    <label for="Previous">Previous Company</label>
                    <?php echo form_error('Previous')?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'Experience','class'=>'form-control','placeholder'=>'Experience','required'=>'required','name'=>'Experience','autofocus'=>'autofocus','value'=>set_value('Experience')))?>
                    <label for="Experience">Experience</label>
                    <?php echo form_error('Experience')?>
                  </div>
                </div>
              </div>
            </div>
            <br/>
            <div class="form-group">
              <div class="form-label-group">
                <span>Corresponing Address</span>
                <?php echo form_textarea(array('id'=>'Corresponing','class'=>'form-control','required'=>'required','name'=>'Corresponing','autofocus'=>'autofocus','rows'=>'3','value'=>set_value('Corresponing')))?>
                <?php echo form_error('Corresponing')?>
              </div>
              </div>
              <div class="form-group">
              <div class="form-label-group">
                <span>Permanet Address</span>
                <?php echo form_textarea(array('id'=>'Prmanet','class'=>'form-control','required'=>'required','name'=>'Prmanet','autofocus'=>'autofocus','rows'=>'3','value'=>set_value('Prmanet')))?>
                <?php echo form_error('Prmanet')?>
              </div>
              </div>
            <br/>
            <button class="btn btn-primary btn-block" type="submit">Register</button>
            <a class="btn btn-danger btn-block" href="<?php echo base_url('Login/index');?>">Cancel</a>
          <?php echo form_close();?>
          <div class="text-center">
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
