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
              <h4>Leave Request</h4>
            </li>
          </ol>
          <!-- Icon Cards-->
          <table class="table">
    <thead>
      <tr>
        <th>Leave Date</th>
        <th>No of Days</th>
        <th>Description</th>
        <th>Status</th>
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
            <td><?php echo $row->leave_from;?> &nbsp<?php echo $row->leave_to;?></td>  
            <td><?php echo $row->leave_days	;?></td>  
            <td><?php echo substr($row->description,0,40);?></td>  
            <td><?php echo $row->status;?></td> 
          </tr>
        <?php }
       }        
        ?>  
      </tbody>  
   </table>
<button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#myModal">Add New Leave</button>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h6>New Leave Request</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php $emp_id=$this->session->userdata("user_id")->id;?>
        <div class="modal-body">
          <?php echo form_open('Leavemanagement/leave_request_post')?>
          <div class="container-fluid">
            <input type="hidden" name="emp_id" value="<?php echo $emp_id;?>" required/>
            <div class="form-group ">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'date','name'=>'from','id'=>'from','class'=>'form-control','placeholder'=>'Leave Category','required'=>'required','autofocus'=>'autofocus','value'=>set_value('LeaveCategory')));?>
                    <label for="from">From</label>
                    <?php echo form_error('from')?>
                  </div>
               </div>
                  <div class="col-md-6">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'date','name'=>'to','id'=>'to','class'=>'form-control','placeholder'=>'Leave Category','required'=>'required','autofocus'=>'autofocus','value'=>set_value('LeaveCategory')));?>
                    <label for="to">To</label>
                    <?php echo form_error('to')?>
                  </div>
                </div>
              </div>
              <div class="form-row" style="margin-top:8px;">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','name'=>'LeaveDays','id'=>'nofday','class'=>'form-control','placeholder'=>'No Of Days','required'=>'required','autofocus'=>'autofocus','value'=>set_value('LeaveDays')));?>
                    <label for="nofday">No fo Days</label>
                    <?php echo form_error('LeaveDays')?>
                  </div>
                </div>
              </div><br>
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <?php echo form_textarea(array('name' => 'leaveDescripton','value'=>set_value('leaveDescripton'),'class'=>'form-control'));?>
                    <?php echo form_error('leaveDescripton')?>
                  </div>
                </div>
              </div>
            </div>
             </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" style="float: right" type="submit">Request</button>
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
