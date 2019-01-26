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
          
        <center><h5>Add New Employee</h5><p id="warning"></p></center></div>
        <div id="notfound"></div>
        <div class="card-body">
          <?php echo form_open('Salarycontroller/add_emp_salary_info_indb')?>
                      <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'number','id'=>'emp_id','class'=>'form-control','placeholder'=>'Employee ID','required'=>'required','name'=>'emp_id','value'=>set_value('emp_id'),'autofocus'=>'autofocus'))?>
                    <label for="emp_id">Employee ID</label>
                    <?php echo form_error('emp_id')?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'emp_name','class'=>'form-control','placeholder'=>'Employee Name','readonly'=>'readonly','name'=>'emp_name','value'=>set_value('emp_name'),'autofocus'=>'autofocus'))?>
                    <label for="emp_name">Employee Name</label>
                    <?php echo form_error('emp_name')?>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'emp_post','class'=>'form-control','placeholder'=>'Provided Fund in %','required'=>'required','name'=>'emp_post','value'=>set_value('emp_post'),'autofocus'=>'autofocus','step'=>0.001))?>
                    <label for="emp_post">Desigation</label>
                    <?php echo form_error('emp_post')?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'emp_depart','class'=>'form-control','placeholder'=>'Department Name','readonly'=>'readonly','name'=>'emp_depart','value'=>set_value('emp_depart'),'autofocus'=>'autofocus'))?>
                    <label for="emp_depart">Department name</label>
                    <?php echo form_error('emp_depart')?>
                  </div>
                </div>
              </div>
            </div>
             <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'number','id'=>'emp_total_pay','class'=>'form-control','placeholder'=>'Basic Pay','required'=>'required','name'=>'emp_total_pay','autofocus'=>'autofocus','value'=>set_value('emp_total_pay')))?>
                    <label for="emp_total_pay">Total Pay</label>
                    <?php echo form_error('emp_total_pay')?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'number','id'=>'emp_pf','class'=>'form-control','placeholder'=>'Provided Fund in %','required'=>'required','name'=>'emp_pf','value'=>set_value('emp_pf'),'autofocus'=>'autofocus','step'=>0.001))?>
                    <label for="emp_pf">Provided Fund in %</label>
                    <?php echo form_error('emp_pf')?>
                  </div>
                </div>
              </div>
            </div>
            <br/>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                    <h5>Bank Detail</h5>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <?php echo form_input(array('type'=>'number','id'=>'emp_account','class'=>'form-control','placeholder'=>'Account Number','required'=>'required','name'=>'emp_account','autofocus'=>'autofocus','value'=>set_value('emp_account')))?>
                <label for="emp_account">Account Number</label>
                <?php echo form_error('emp_account')?>
              </div>
              <br/>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'emp_bank','class'=>'form-control','placeholder'=>'Bank Name','required'=>'required','name'=>'emp_bank','autofocus'=>'autofocus','value'=>set_value('emp_bank')))?>
                    <label for="emp_bank">Bank Name</label>
                    <?php echo form_error('emp_bank')?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'emp_ifsc_code','class'=>'form-control','placeholder'=>'IFSC CODE','required'=>'required','name'=>'emp_ifsc_code','autofocus'=>'autofocus','value'=>set_value('emp_ifsc_code')))?>
                    <label for="emp_ifsc_code">IFSC CODE</label>
                    <?php echo form_error('emp_ifsc_code')?>
                  </div>
                </div>
              </div>
            </div>
              <div class="form-group">
              <div class="form-label-group">
                <span>Bank Address</span>
                <?php echo form_textarea(array('id'=>'emp_bank_add','class'=>'form-control','required'=>'required','name'=>'emp_bank_add','autofocus'=>'autofocus','rows'=>'3','value'=>set_value('emp_bank_add')))?>
                <?php echo form_error('emp_bank_add')?>
              </div>
              </div>
            <br/>
            <button class="btn btn-primary btn-block" id="add_salary" type="submit">ADD</button>
            <a class="btn btn-danger btn-block" href="<?php echo base_url('Login/index');?>">RESET</a>
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
