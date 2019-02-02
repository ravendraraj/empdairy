<?php
class Salarycontroller extends CI_Controller{

	public function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('user_id'))
		{
			redirect('Login/index');
		}
		if($this->session->userdata('user_id')->userType!="admin")
		{
			redirect('Login/index');
		}
		$this->load->helper('form');
		$this->load->model('salary');
	}

	public function add_emp_salary_info_form()
	{
		$this->load->view('admin/salary_form');
	}
//To check register employee
	public function get_emp_details($id){
		$this->load->model('usermodel');
		$res=$this->usermodel->employees_details($id);
		echo json_encode($res);
	}

    //Save salary data in database
	public function add_emp_salary_info_indb()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('emp_id','Username','numeric|trim|required|is_unique[emp_salary_info.emp_id]');
		$this->form_validation->set_rules('emp_pf','emp_pf','numeric|trim');
		$this->form_validation->set_rules('emp_total_pay','emp_total_pay','numeric|trim');
		$this->form_validation->set_rules('emp_account','emp_account','numeric|trim');
		$this->form_validation->set_rules('emp_bank','emp_bank','trim');
		$this->form_validation->set_rules('emp_ifsc_code','emp_ifsc_code','trim');
		$this->form_validation->set_rules('emp_bank_add','emp_bank_add','trim');
		$this->form_validation->set_error_delimiters("<p class='text-primary'>","</p>");

		if($this->form_validation->run()==true)
		{
		$data=array(
			'emp_id' =>$this->input->post('emp_id') ,
			'emp_total_pay'=>$this->input->post('emp_total_pay'),
			'emp_pf'=>$this->input->post('emp_pf'),
			'emp_bank_acc'=>$this->input->post('emp_account'),
			'emp_bank_name'=>$this->input->post('emp_bank'),
			'emp_bank_ifsc'=>$this->input->post('emp_ifsc_code'),
			'emp_bank_address'=>$this->input->post('emp_bank_add'));

		$count_row = $this->db->insert('emp_salary_info',$data); 

			if($count_row)
			{
				echo "<script>alert('Successfully Added')</script>";
			}
		}
	}
   
	public function paid_emp_sal_month()
	{
		$result=$this->salary->paid_salary_month(18);
		$people=[1,2,3,4,5,6,7,8,9,10,11,12];
		
		foreach($result as $r)
		{
			if (in_array($r['month'], $people))
			echo $r['month'];
		}
	}
	//Generate Payslip page
	public function generate_payslip(){
		$this->load->model('usermodel');
		$res['chunk']=$this->usermodel->add_salary_info_employees();
		$this->load->view('admin/generate_payslip',$res);
	}

	//Generate Payslip of employee
	public function final_generate_payslip(){

		//load model of salary
		//$this->load->model('salary');
		$employee_id=$this->input->post('emp_id');
		$emp_salary_info=$this->salary->employee_salay_details($employee_id);
		$salary_func=$this->salary->salary_functionality();
		//these function of salary
			$total_salary=0;
	 		$hra=0;
	 		$ta=0;
	 		$ma=0;
	 		$sa=0;
	 		$basic_salary=0;
	 		$emp_pf=0;
	 	if($this->input->post('salary_month'))
	 	{
			$total_salary=$emp_salary_info->emp_total_pay;
	 		$hra=($salary_func->emp_hra*$total_salary)/100;
	 		$ta=($salary_func->emp_ta*$total_salary)/100;
	 		$ma=($salary_func->emp_ma*$total_salary)/100;
	 		$sa=($salary_func->emp_sa*$total_salary)/100;
	 		$basic_salary=$total_salary-($hra+$ta+$ma+$sa);
            
	 	}
	 	else{
	 	    $total_salary=($emp_salary_info->emp_total_pay)/30*$this->input->post('by_no_of_days');
	 		$hra=($salary_func->emp_hra*$total_salary)/100;
	 		$ta=($salary_func->emp_ta*$total_salary)/100;
	 		$ma=($salary_func->emp_ma*$total_salary)/100;
	 		$sa=($salary_func->emp_sa*$total_salary)/100;
	 		$basic_salary=$total_salary-($hra+$ta+$ma+$sa);

	 	}

	 	//substract pf ammount from total salary
	 	if($emp_pf)
	 		{
	 			$emp_pf=($emp_salary_info->emp_pf*$total_salary)/100;
	 			$total_salary-=$emp_pf;
	 	    }

	 		//now these are not manage
	 	    $leave_dect=0;
	 	    $expense_ammount=0;
	 	    $emp_bonus=0;
	 	    $emp_over_time=0;
            $year=date('y');
			$month=date('m');
			
			//check is it already generated 
			if(!$this->salary->check_exist_payslip($employee_id,$month,$year))
			{
			 //insert in database after all caluclation
	 	    if($total_salary!=0 && $basic_salary!=0)
	 	    {
	 	    $data = array(
	 	    	'emp_id' => $employee_id,
	 	    	'leave_dect_ammount'=>$leave_dect,
	 	    	'expensess_ammount'=>$expense_ammount,
	 	    	'paid_ammount'=>$total_salary,
	 	    	'year'=>$year,
				'month'=>$month,
				'basic_salary'=>$basic_salary,
	 	    	'emp_hra'=>$hra,
	 	    	'emp_ta'=>$ta,
	 	    	'emp_ma'=>$ma,
	 	    	'emp_sa'=>$sa,
	 	    	'emp_bonus'=>$emp_bonus,
	 	    	'emp_over_time'=>$emp_over_time,
	 	    	'emp_pf'=>$emp_pf
	 	    );
	
            $count_row = $this->db->insert('salary_paid_info',$data); 
			if($count_row)
			{
				echo "<script>alert('Successfully Added')</script>";
			}
	 		//echo $basic_salary." hra".$hra." ta".$ta." ma".$ma." sa".$sa." total".$total_salary." year ".$year." month ".$month." paid ".$paid_date;
	 		//die();
	 	}
	 	else
	 	{
	 		echo "<script>alert('Somthing wronng')</script>";
		 }
		}
		else{
			echo "<script>alert('Already Generated')</script>";
		}
		$this->generate_payslip();
	}
}