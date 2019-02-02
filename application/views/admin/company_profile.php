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
              <h4>Company Profile</h4>
            </li>
          </ol>
          <!-- Icon Cards-->
          <div class="container-fluid">
          <div class="row">
          <div class="col-sm-6">
          <?php echo form_open_multipart('Setting/do_upload');?>
          <div class="form-group">
        <label for="comp_name">Company Logo Name</label>
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'comp_logo_name','class'=>'form-control','placeholder'=>'Company Logo Name','required'=>'required','name'=>'comp_logo_name','autofocus'=>'autofocus','value'=>set_value('comp_logo_name')))?>
                    <?php echo form_error('comp_logo_name')?>
                </div>
                <br>        
          <label for="comp_name">Company Name</label>
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'comp_name','class'=>'form-control','placeholder'=>'Company Name','required'=>'required','name'=>'comp_name','autofocus'=>'autofocus','value'=>set_value('comp_name')))?>
                    <?php echo form_error('comp_name')?>
                </div>
                <br>
                <label for="reg_addr">Register Company Address</label>
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'reg_addr','class'=>'form-control','placeholder'=>'Register Company Address','required'=>'required','name'=>'reg_addr','autofocus'=>'autofocus','value'=>set_value('reg_addr')))?>
                    <?php echo form_error('reg_addr')?>
              </div>
              <br>
              <label for="corp_addr">Corporate Company Address</label>
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','id'=>'corp_addr','class'=>'form-control','placeholder'=>'Corporate Company Address','required'=>'required','name'=>'corp_addr','autofocus'=>'autofocus','value'=>set_value('corp_addr')))?>
                    <?php echo form_error('corp_addr')?>
                  </div>
              <br>
                  
                  <label for="comp_logo">Company Logo</label>
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'file','id'=>'comp_logo','class'=>'form-control','placeholder'=>'Company Logo','required'=>'required','name'=>'userfile','autofocus'=>'autofocus','value'=>set_value('comp_logo')))?>
                    <?php echo form_error('comp_logo')?>
                  </div>
                  <br>
                  <button type="submit" value="upload"  class="btn btn-primary float-right">SAVE</button>
                  <?php echo form_close();?>
            </div>
            </div>
          <div class="col-sm-6">
          <?php if(empty($comp_profile)){
                echo "<h6>Configure Your Company Profile Before Generate Any Doc</h6>";
          }
          else{?>
          <table>
          <tr>
          <td><b>Company Name</b></td>
          <td><?php echo $comp_profile->comp_name;?></td>
          </tr>
          <tr>
          <td><b>Register Office Address</b></td>
          <td><?php echo $comp_profile->regis_address;?></td>
          </tr>
          <tr>
          <td><b>Coprated Office Address</b></td>
          <td><?php echo $comp_profile->copr_address;?></td>
          </tr>
          <tr>
          <td><b>Company Logo</b></td>
          <td><img src=" <?php echo base_url('uploads/').$comp_profile->comp_logo;?>" style="width:100px;height:100px"/></td>
          </tr>
          </table>
          <?php }?>
          </div>
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
