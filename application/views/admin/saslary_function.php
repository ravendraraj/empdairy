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
              <h4>Salary Function</h4>
            </li>
          </ol>

          <!-- Icon Cards-->
          <table class="table">
    <thead>
      <tr>
        <th>Home Allowance</th>
        <th>Transport Allowance</th>
        <th>Medical Allowance</th>
        <th>Special Allowance</th>
      </tr>
    </thead>
    <tbody>
         <?php  
     if(is_array($chunk) && count($chunk)>0)
             {
        foreach($chunk as $row)  
        {  
          ?>
          <tr>  
            <td><?php echo $row->emp_hra;?></td>  
            <td><?php echo $row->emp_ta;?></td>  
            <td><?php echo $row->emp_ma;?></td>  
            <td><?php echo $row->emp_sa;?></td> 
          </tr>  
        <?php }
       }        
        ?>  
      </tbody>  
   </table>
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Add New Leave</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h6>Add New Leave Category</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                      <?php echo form_open('Setting/salary_functionality')?>
            <div class="container-fluid">

            <div class="form-group ">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    Home Allowance
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'number','name'=>'emp_hra','id'=>'emp_hra','class'=>'form-control','required'=>'required','autofocus'=>'autofocus','value'=>set_value('emp_hra'),'step'=>0.001));?>
                    <?php echo form_error('emp_hra')?>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    Medical Allowance
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'number','name'=>'emp_ma','id'=>'emp_ma','class'=>'form-control','required'=>'required','autofocus'=>'autofocus','value'=>set_value('emp_ma'),'step'=>0.001));?>
                    <?php echo form_error('emp_ma')?>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    Transport Allowance
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'number','name'=>'emp_ta','id'=>'emp_ta','class'=>'form-control','required'=>'required','autofocus'=>'autofocus','value'=>set_value('emp_ta'),'step'=>0.001));?>
                    <?php echo form_error('emp_ta')?>
                  </div>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    Special Allowance
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'number','name'=>'emp_sa','id'=>'emp_sa','class'=>'form-control','required'=>'required','autofocus'=>'autofocus','value'=>set_value('emp_sa'),'step'=>0.001));?>
                    <?php echo form_error('emp_sa')?>
                  </div>
                </div>
              </div>
            </div>
             </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" style="float: right" type="submit">ADD +</button>
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
