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
            &nbsp | &nbsp
              <a class="btn-sm btn-default" href="<?php echo base_url('Expeness/new_added_expense_rows')?>"/>Today Created Expense</a>
            </li>
          </ol>
          <!-- Icon Cards-->
          <div class="container-fluid">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Expense Name</th>
        <th>Recipt No</th>
        <th>Expense Date</th>
        <th>Expense Amount</th>
        <th>Expense Remark</th>
        <th>Expense Remark</th>
      </tr>
    </thead>
    <tbody>
          <?php
          if(count($new_res)>0)
          {
          foreach($new_res as $sec)
          {
            ?>
            <tr>
            <td><?php echo $sec->exp_typ?></td>
            <td><?php echo $sec->exp_bill_no?></td>
            <td><?php echo $sec->exp_date?></td>
            <td><?php echo $sec->exp_amt?></td>
            <td><?php echo $sec->exp_remark?></td>
            <td><?php echo $sec->created?></td>
            </tr>
            <?php
          }
        }
        else
        {
            ?>
            <tr><td colspan="6" style="text-align: center">Today Not Created any Entry</td></tr>
            <?php
          }
            ?>
        </tbody>
      </table>
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
