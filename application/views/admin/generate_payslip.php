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
              <h4>Leave Category</h4>
            </li>
          </ol>

          <!-- Icon Cards-->
          <table class="table">
    <thead>
      <tr>
        <th>Emp ID</th>
        <th>Emp Name</th>
        <th>Department</th>
        <th>Desigation</th>
        <th>Date of Joining</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
         <?php  
     if(is_array($chunk) && count($chunk)>0)
             {
        foreach($chunk as $row)  
        {  
          if(!$row->terminationdate)
          {
          ?>
          <tr>  
            <td><?php echo $row->id;?></td>  
            <td><?php echo $row->fname." ".$row->lname;?></td>  
            <td><?php echo $row->depart;?></td>  
            <td><?php echo $row->desigation;?></td> 
            <td><?php echo $row->dateofjoining;?></td>
            <td><button type="button" class="btn btn-primary float-right Generate_pay" id ="Generate_pay" value="<?php echo $row->id?>" data-toggle="modal" data-target="#myModal">Generate Pay Slip</button></td>
          </tr>  
        <?php
           }
         }
       }        
        ?>  
      </tbody>  
   </table>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h6>Generate Pay Slip</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                      <?php echo form_open('Salarycontroller/final_generate_payslip')?>
            <div class="container-fluid">
                        <div class="form-group ">
              <div class="form-row">
                <div class="col-md-12">
                  <label for="emp_id">Employee ID</label>
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','name'=>'emp_id','id'=>'emp_id','class'=>'form-control','placeholder'=>'Employee ID','readonly'=>'readonly','autofocus'=>'autofocus','value'=>set_value('LeaveCategory')));?>
                  </div>
                </div>
              </div><br>
              <div class="form-row">
                <div class="col-md-12">
                  <?php echo form_input(
                    array('type'=>'radio','name'=>'type','id'=>'radio1','readonly'=>'readonly','autofocus'=>'autofocus',
                    'checked'=>'checked','value'=>'days'));?>
                    <label for="radio1">By Month</label>
                    <?php echo form_input(
                    array('type'=>'radio','name'=>'type','id'=>'radio2','readonly'=>'readonly','autofocus'=>'autofocus','value'=>'month'));?>
                    <label for="radio2">By Number Of Days</label>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12">
                    <?php echo form_input(
                    array('type'=>'number','name'=>'by_no_of_days','id'=>'by_no_of_days','placeholder'=>'Number Of Days','autofocus'=>'autofocus','class'=>'form-control','value'=>set_value('by_no_of_days')));?>
                    
                    <?php echo form_input(
                    array('type'=>'number','name'=>'salary_month','id'=>'salary_month','placeholder'=>'Salary Month','autofocus'=>'autofocus','class'=>'form-control','value'=>set_value('by_no_of_days')));?>
                </div>
              </div>
            </div>
             </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" style="float: right" type="submit">DONE</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->

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
