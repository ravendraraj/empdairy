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
<div data-toggle="modal" data-target="#myModal"><i class="fa fa-calendar" style="color:blue;font-size:80px"><span id="showdays" style="font-size:20px;color:white;margin-left:-45px;"></span></i><span style="display:block;font-size:10px">Approved Leave</span></div>
          <table class="table" style="display:none">
    <thead>
      <tr>
        <th>Leave Category</th>
        <th>No of Days</th>
        <th>Description</th>
        <th>Create leave Day</th>
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
            <td><?php echo $row->leavename;?></td>  
            <td id="days"><?php echo $row->days;?></td>  
            <td id="desc"><?php echo $row->description;?></td>  
            <td><?php echo $row->adddate;?></td> 
          </tr>  
        <?php }
       }     
        ?>  
      </tbody>  
   </table>
   <script>
   $(document).ready(function(){
      $('#nofday').val($('#days').text());
      $('#description').val($('#desc').text());
      $('#showdays').text($('#days').text());
   });
   </script>
<!--<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#myModal">Add New Leave</button>-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h6>Add New Leave Category</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
                      <?php echo form_open('Setting/leave')?>
            <div class="container-fluid">
                        <div class="form-group ">
              <div class="form-row">
                <!--<div class="col-md-8">
                  <div class="form-label-group">
                    <?php //echo form_input(array('type'=>'text','name'=>'LeaveCategory','id'=>'lc','class'=>'form-control','placeholder'=>'Leave Category','required'=>'required','autofocus'=>'autofocus','value'=>'Approved Leave'));?>
                    <label for="lc">Leave Category</label>
                    <?php //echo form_error('LeaveCategory')?>
                  </div>
                </div>-->
                <div class="col-md-12">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','name'=>'LeaveDays','id'=>'nofday','class'=>'form-control','placeholder'=>'No Of Days','required'=>'required','autofocus'=>'autofocus','value'=>set_value('LeaveDays')));?>
                    <label for="nofday">No fo Days in One Year</label>
                    <?php echo form_error('LeaveDays')?>
                  </div>
                </div>
              </div><br>
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <?php echo form_textarea(array('name' => 'leaveDescripton','id'=>'description','value'=>set_value('leaveDescripton'),'class'=>'form-control'));?>
                    <?php echo form_error('leaveDescripton')?>
                  </div>
                </div>
              </div>
            </div>
             </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" style="float: right" type="submit">ADD LEAVE</button>
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
