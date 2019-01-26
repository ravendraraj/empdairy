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
              <h5>Expense Categories</h5>
            </li>
          </ol>
          <!--Department add-->
  <!-- Trigger the modal with a button -->
  <div class="container">
    <table class="table">
    <thead>
      <tr>
        <th>Expense ID</th>
        <th>Expense Name</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
         <?php  
     if(is_array($exp_cat) && count($exp_cat)>0)
             {
        foreach($exp_cat as $sec)  
        {  
          ?>
          <tr id="<?php echo $sec->id;?>">  
            <td><?php echo $sec->id;?></td>  
            <td><?php echo $sec->expense_cat;?></td>  
            <td><?php echo $sec->created;?></td>
            <td><?php echo $sec->modified;?></td>
            <td>
            <button type="button" class="edit btn-sm btn-primary" data-toggle="modal" data-target="#expense_cat_edit" data-id="<?php echo $sec->id;?>" data-name="<?php echo $sec->expense_cat;?>">Edit</button>
              <button class="delete btn-sm btn-danger" data-id="<?php echo $sec->id;?>" >Delete</button></td> 
          </tr>  
        <?php }
       }
       else{       
        ?>  
        <tr><td colspan="3" style="text-align: center">Please Configure Expense Category Section</td></tr>
        <?php
         }
        ?>
      </tbody>  
   </table>
  </div>
  <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#expense_cat_form">
    + New Expense
  </button>

  <!-- Modal -->
  <div class="modal fade" id="expense_cat_form" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h6>Add New Expense Category</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form methos="post" id="exp_cat_form">
            <div class="container-fluid">
              <div class="form-group">
              <div class="form-row">
                 <div class="col-md-12">
                  <label for="dept">Expense Name</label>
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','name'=>'expense_name','id'=>'expense_name','class'=>'form-control','placeholder'=>'Expense Name','required'=>'required','autofocus'=>'autofocus','value'=>set_value('expense_name')));?>
                    <?php echo form_error('expense_name');?>
                  </div>
                </div>
              </div>
            </div>
             </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-sm" style="float: right" type="submit" id="expense_cat_submit">+ ADD</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">- Close</button>
            <?php echo form_close();?>
        </div>
      </div> 
    </div>
    </div>

      <!-- Edit Modal -->
  <div class="modal fade" id="expense_cat_edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h6>Edit Expense Category</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form methos="post" id="exp_cat_edit_form">
          <input type="hidden" value="" id="hidden_id"?>
            <div class="container-fluid">
              <div class="form-group">
              <div class="form-row">
                 <div class="col-md-12">
                  <label for="exp_edit_name">Expense Name</label>
                  <div class="form-label-group">
                    <?php echo form_input(array('type'=>'text','name'=>'exp_edit_name','id'=>'exp_edit_name','class'=>'form-control','placeholder'=>'Expense Name','required'=>'required','autofocus'=>'autofocus','value'=>set_value('exp_edit_name')));?>
                    <?php echo form_error('exp_edit_name');?>
                  </div>
                </div>
              </div>
            </div>
             </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-sm" style="float: right" type="submit" id="expense_cat_submit">Edit</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancle</button>
            <?php echo form_close();?>
        </div>
      </div> 
    </div>
    </div>
  </div>
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
