<!DOCTYPE html>
<html lang="en">
<?php include('script.php')?>
  <body id="page-top">

    <?php include('topnav.php');?>
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include('sidebar.php');?>

      <div id="content-wrapper">

        <div class="container-fluid">
          <style>
            table{
              width:85% !important;
              margin-left:20px !important;
            }
            .diff_row
            {
              background:#ADDFFF;
            }
            </style>
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Salary Details</li>
          </ol>
          <!-- Icon Cards-->
          <div class="container">
            <center>
          <div class="row">
            <div class="col-xl-12 col-sm-12">
              <?php
            $i=1;
            
            foreach($salary as $sal)
            {
            ?>
            <div style="text-align:center;width:85%;padding:10px;margin:5px 0px 5px 0px;" class="diff_row"><h5>Payslip for the month of <?php echo date("F",mktime(0,0,0,$sal->month,10))." ".$sal->year;?></h5></div>
            <table class="table">
            <tbody>
                <tr>
                    <td>Employe ID<br>Name</td>
                    <td><?php echo $sal->emp_id?><br/><?php echo $sal->fname." ".$sal->lname?></td>
                    <td>Payment Date<br>Leave C/F</td>
                    <td><?php echo $sal->paid_date?><br><?php echo $sal->emp_id?></td>
                </tr>
                <tr>
                    <td>designation <br>Date of Joining</td>
                    <td><?php echo $sal->desigation?><br/><?php echo $sal->dateofjoining?></td>
                    <td>Earned Leave <br/>Leave Taken</td>
                    <td><?php echo $sal->emp_id?><br/><?php echo $sal->emp_id?></td>
                </tr>
                 <tr>
                     <td>Bank Account<br/>Bank Name</td>
                     <td><?php echo $sal->emp_bank_acc?><br/><?php echo $sal->emp_bank_name?></td>
                     <td>Late/Early <br>Leave Adjusted</td>
                     <td><?php echo $sal->emp_id?><br/><?php echo $sal->emp_id?></td>
                </tr>
                <tr>
                  <td>PAN</td>
                  <td><?php echo $sal->emp_id?></td>
                  <td>Leave Balance</td>
                  <td><?php echo $sal->emp_id?></td>
              </tbody>
              </table>
              <br>
              <table class="table">
              <tbody>
                <tr class="diff_row">
                  <th cols="2">Earning</th>
                  <th cols="2">Amount</th>
                </tr>
                <tr>
                  <td cols="2">Basic Pay</td>
                  <td cols="2"><?php echo $sal->basic_salary?></td>
                </tr>
                <tr>
                  <td cols="2">House Rent Allowance</td>
                  <td cols="2"><?php echo $sal->emp_hra?></td>
                </tr>
                <tr>
                  <td cols="2">Medical Allowance</td>
                  <td cols="2"><?php echo $sal->emp_ma?></td>
                </tr>
                <tr>
                  <td cols="2">Transport Allowance</td>
                  <td cols="2"><?php echo $sal->emp_ta?></td>
                </tr>
                <tr>
                  <td cols="2">Special Allowance</td>
                  <td cols="2"><?php echo $sal->emp_sa?></td>
                </tr>
                <tr>
                  <td cols="2">Bounce</td>
                  <td cols="2"><?php echo $sal->emp_bonus?></td>
                </tr>
                <tr>
                  <td cols="2"><b>Total Earning</b></h5></td>
                  <td cols="2"><b><?php echo $sal->paid_ammount?></b></td>
                </tr>
                </tbody>
            </table>
            <br>
            <div style="text-align:left!important;width:85%;padding:30px 10px 10px 10px;margin:50px 0px 5px 0px;" class="diff_row">
                  <b>Net Payable :<?php echo $sal->paid_ammount?></b>
            </div>
            <td><a class="btn btn-sm btn-danger" href="<?php echo base_url('Createpdf/pdf').'?req='.$sal->payslip_id;?>">Save</a></td>
            <?php
            }
           ?>

            </div>     
        </div>
          </center>
        </div>
        <!-- /.container-fluid -->
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
