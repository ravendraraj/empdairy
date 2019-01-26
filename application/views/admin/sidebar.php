      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('Admincontroller/dashboard')?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Expense</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url('Expeness/expeness_form')?>">Expense Entry</a>
            <a class="dropdown-item" href="<?php echo base_url('Expeness/new_added_expense_rows')?>">Today Expense </a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Setting</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url('Setting/leave_setting')?>">Leave Setting</a>
            <a class="dropdown-item" href="<?php echo base_url('Setting/depart_setting')?>">Department</a>
            <a class="dropdown-item" href="<?php echo base_url('Setting/salary_functionality_form')?>">Salary Part</a>
            <a class="dropdown-item" href="<?php echo base_url('Setting/depart_setting')?>"> Desigation</a>
            <a class="dropdown-item" href="<?php echo base_url('Setting/company_profile_page')?>">Company Profile</a>
            <a class="dropdown-item" href="<?php echo base_url('Setting/setting_expense')?>">Company Profile</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Employee</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url('Admincontroller/add_new_userform')?>">Register Employee</a>
            <a class="dropdown-item" href="<?php echo base_url('Salarycontroller/add_emp_salary_info_form')?>">Add Salary Info</a>
            <a class="dropdown-item" href="<?php echo base_url('Salarycontroller/generate_payslip')?>">Generate Pay Slip</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>
      </ul>