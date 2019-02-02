<!DOCTYPE html>
<html lang="en">
<?php include('script.php');?>
  <body id="page-top">
    <?php include('topnav.php');?>
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include('sidebar.php');?>
      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a class="btn-sm btn-default" href="<?php echo base_url('Expeness/expeness_form')?>">
              Expense Entry
            </a>
            &nbsp|&nbsp
            <a class="btn-sm btn-default" href="<?php echo base_url('Expeness/new_added_expense_rows')?>"/>
            Today Created Expense
           </a>
            </li>
          </ol>
          <!-- Icon Cards-->
          <div class="container-fluid">
            <center><h5><?php echo $exp_form_data['msg']?></h5></center>
            <div style="width:700px;margin:auto">
              <?php echo form_open('Expeness/expense_entry')?>
            <div style="background-color: #e9ecef;padding: 10px;">
              <div class="form-row">
                <div class="col-md-6">
                 <label for="exp_typ">Expense Category</label>
                 <div class="form-group">
                    <select name="exp_typ" name="exp_typ" class="form-control" required="required">
                      <option value="">Select Category</option>
                      <?php
                      if(count($exp_form_data['expense_cat'])!=0)
                      {
                        foreach($exp_form_data['expense_cat'] as $exp_cat)
                        {
                      ?>
                          <option value="<?php echo $exp_cat->expense_cat?>"><?php echo $exp_cat->expense_cat ?></option>
                      <?php
                         }
                      }
                      else{
                        echo "<option>Not Configure</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="exp_date">Expense Date</label>
                  <?php echo form_input(array('type'=>'date','id'=>'exp_date','class'=>'form-control','required'=>'required','name'=>'exp_date','value'=>set_value('exp_date')))?>
                  <span><?php echo form_error('exp_date')?></span>
                </div>
                </div>
                </div>

                <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                   <label for="exp_amt">Expense Amount</label>
                  <?php echo form_input(array('type'=>'text','id'=>'exp_amt','class'=>'form-control','name'=>'exp_amt','value'=>set_value('exp_amt'),'autofocus'=>'autofocus'));?>
                  <span><?php echo form_error('exp_amt')?></span>
                </div>
                </div>
                <div class="col-md-6">
                  <label for="exp_desc">Expense Remark</label>
                <div class="form-group">
                  <?php echo form_textarea(array('id'=>'exp_desc','class'=>'form-control','required'=>'required','name'=>'exp_desc','autofocus'=>'autofocus','rows'=>'2','value'=>set_value('exp_desc')))?>
                  <span><?php echo form_error('exp_desc')?></span>
                </div>
                </div>
              </div>

                <div class="form-row">
                <div class="col-md-12">
               <label for="reciept_no">Reciept No</label>
                 <input type="radio" name="reciept"  id="reciept_no" value="reciept_no" checked/>&nbsp&nbsp
                <label for="reciept_img">Reciept Image</label>
                 <input type="radio" name="reciept" id="reciept_img" value="reciept_img"/>
                <div class="form-group">
                  <?php echo form_input(array('type'=>'text','id'=>'exp_bill_no','class'=>'form-control','name'=>'exp_bill_no','value'=>set_value('exp_bill_no'),'autofocus'=>'autofocus'))?>
                  <?php echo form_input(array('type'=>'file','id'=>'exp_bill_img','class'=>'form-control','name'=>'exp_bill_img','value'=>set_value('exp_bill_img'),'autofocus'=>'autofocus'))?>
                  <?php echo form_error('exp_bill_no')?>
                  <?php echo form_error('exp_bill_img')?>
              </div>
              </div>
            </div>
          </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" id="add_more" class="btn btn-danger">Reset</button>
              <?php echo form_close();?>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url('Login/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/chart.js/Chart.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.js')?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin.min.js')?>"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url('assets/js/demo/datatables-demo.js')?>"></script>
    <script src="<?php echo base_url('assets/js/demo/chart-area-demo.js')?>"></script>

  </body>

</html>
