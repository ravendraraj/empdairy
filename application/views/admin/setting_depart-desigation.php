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
              <span class="btn btn-default">Departments</span>&nbsp<a class="btn btn-default" href="#desiga">Desigation</a>
            </li>
          </ol>
          <!--Department add-->
  <!-- Trigger the modal with a button -->
  <div class="container">
    <table class="table">
    <thead>
      <tr>
        <th>Department ID</th>
        <th>Department Name</th>
        <th>Create Depart Day</th>
      </tr>
    </thead>
    <tbody>
         <?php  
     if(is_array($chunk['depart']) && count($chunk['depart'])>0)
             {
        foreach($chunk['depart'] as $sec)  
        {  
          ?>
          <tr>  
            <td><?php echo $sec->deptID;?></td>  
            <td><?php echo $sec->deptName;?></td>  
            <td><?php echo $sec->addDate;?></td>  
          </tr>  
        <?php }
       }
       else{       
        ?>  
        <span>Please Configure your Department Section</span>
        <?php
         }
        ?>
      </tbody>  
   </table>
  </div>
  <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#department">+ New Depart</button>

  <!-- Modal -->
  <div class="modal fade" id="department" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h6>Add New Department</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <?php echo form_open('Setting/department')?>
            <div class="container-fluid">
                        <div class="form-group">
              <div class="form-row">
               <!--<div class="col-md-6">
                  <div class="form-label-group">
                    <?php //echo form_input(array('type'=>'text','name'=>'DepartmentID','id'=>'deptid','class'=>'form-control','placeholder'=>'Department ID','required'=>'required','autofocus'=>'autofocus','value'=>set_value('DepartmentID')));?>
                    <label for="deptid">Department Id</label>
                    <?php //echo form_error('DepartmentID');?>
                  </div>
                </div>-->
                 <div class="col-md-12">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','name'=>'DepartmentName','id'=>'dept','class'=>'form-control','placeholder'=>'Department Name','required'=>'required','autofocus'=>'autofocus','value'=>set_value('DepartmentName')));?>
                    <label for="dept">Department Name</label>
                    <?php echo form_error('DepartmentName');?>
                  </div>
                </div>
              </div>
            </div>
             </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-sm" style="float: right" type="submit">+ DEPARTMENT</button>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <?php echo form_close();?>
        </div>
      </div>
      
    </div>
          </div>
          <br/><br/>
          <!--Configure Your Organization Desigation-->
          <div class="container_fulid" id="desiga">
             <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <span>Desigation</span>
            </li>
          </ol>  
                      <div class="container">
    <table class="table">
    <thead>
      <tr>
        <th>Desigation ID</th>
        <th>Desigation Name</th>
        <th>Department</th>
        <th>Config Day</th>
      </tr>
    </thead>
    <tbody>
         <?php  
     if(is_array($chunk['desig']) && count($chunk['desig'])>0)
             {
        foreach($chunk['desig'] as $sec)  
        {  
          ?>
          <tr>  
            <td><?php echo $sec->id;?></td>  
            <td><?php echo $sec->designationName;?></td>  
            <td><?php echo $sec->deptName;?></td>
            <td><?php echo $sec->addDate;?></td>
          </tr>  
        <?php }
       }
       else{       
        ?>  
        <span>Please Configure your Department Section</span>
        <?php
         }
        ?>
      </tbody>  
   </table>
  </div><br/>
      <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#desigation">+ New Post</button>

  <!-- Modal -->
  <div class="modal fade" id="desigation" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h6>Add New Desigation</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <?php echo form_open('Setting/desigation_config')?>
            <div class="container-fluid">
                        <div class="form-group">
              <div class="form-row">
               <div class="col-md-12">
                  <div class="form-label-group">
                    <select class="form-control" name="depart" required="required">
                      <option value="null">Select Department</option>
                      <?php  
                        if(is_array($chunk['depart']) && count($chunk['depart'])>0)
                        {
                        foreach($chunk['depart'] as $desi)  
                          {  
                      ?>
                        <option value="<?php echo $desi->deptID;?>"><?php echo $desi->deptName;?></option>
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
              </div>
              <br/>
              <div class="form-row">
                 <div class="col-md-12">
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','name'=>'DesigationName','id'=>'desig','class'=>'form-control','placeholder'=>'Department Name','required'=>'required','autofocus'=>'autofocus','value'=>set_value('DesigationName')));?>
                    <label for="desig">Desigation Name</label>
                    <?php echo form_error('DesigationName');?>
                  </div>
                </div>
              </div>
            </div>
             </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-sm" style="float: right" type="submit">Add Post</button>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <?php echo form_close();?>
        </div>
      </div>
      
    </div>
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
