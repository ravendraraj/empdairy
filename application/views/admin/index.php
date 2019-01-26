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
        <!--Expense Header-->
        <div class="container-fluid">
          <div class="row breadcrumb">
            <div class="col-md-6">
              <div class="expense_header_inner">
                <span class="heading">Welcome :</span>
                <span><?php echo $data->fname ." ". $data->lname;?></span>
              </div>
            </div>
            <div class="col-md-6">
                  <div class="expense_header_inner">
                    <span class="heading"> Yesterday Expense</span>:
                    <span>&#x20B9</span><span><?php 
                    if(count($page_data['pre_day_exp']))
                    {
                      echo $page_data['pre_day_exp'][0]->exp_amt;
                    }
                    else
                      {
                        echo "No Expense";
                      }?></span>
                  </div>
            </div>
          </div>
        </div>
        <!--End Expense Header-->
          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">26 New Messages!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('Expeness/expeness_form')?>">
                  <span class="float-left">Expeness</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">11 New Tasks!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">123 New Orders!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">Company Profile</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
             <span class="heading"> Monthly Expense Chart </span></div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Active Employees List :- <?php echo count($page_data['emp']);?> </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Emp_ID</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Department</th>
                    <!--  <th>Age</th>-->
                      <th>Start date</th>
                    <!--  <th>CTC</th>-->
                      <th>Exp in Years</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Emp_ID</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Department</th>
                      <!--<th>Age</th>-->
                      <th>Start date</th>
                     <!-- <th>CTC</th>-->
                      <th>Exp in Years</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php  
                      if(is_array($page_data['emp']) && count($page_data['emp'])>0)
                      {
                        foreach($page_data['emp'] as $row)  
                        {  
                    ?>
                    <tr>  
                        <td><?php echo $row->id;?></td>  
                        <td><?php echo $row->fname;?> <?php echo $row->lname;?></td>  
                        <td><?php echo $row->desigation;?></td>  
                        <td><?php echo $row->depart;?></td>  
                      <!--  <td><?php //echo "insert age"?></td>-->
                        <td><?php echo $row->dateofjoining;?></td>
                      <!---  <td><?php //echo $row->CTC;?></td>-->
                        <td><?php echo $row->Experience;?></td>
                    </tr>  
                  <?php
                       }
                      }        
                    ?>
                 </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
