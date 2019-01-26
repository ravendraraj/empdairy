<?php
	class Usercontroller extends CI_Controller{
		public function __construct()
		{

			parent:: __construct();
			if(!$this->session->userdata('user_id'))
			{
				redirect('Login/index');
			}
			if($this->session->userdata('user_id')->userType!="user")
			{
				redirect('Login/index');
			}
			$this->load->model('salary');
		}

		public function user_dashboard(){
		    //$this->load->model('adminmodel');
			//$q=$this->adminmodel->articleslist();
			$this->load->view('user/index');
		}

		public function user_salaryslip()
		{
			$employee_id=$this->session->userdata('user_id')->id;
			$data['salary']=$this->salary->paid_salary_details($employee_id);
			$this->load->view('user/uesr_salaryslip',$data);
		}
		
		public function user_single_payslip(){
			
			$pay_id=$_REQUEST['req'];
			$data['salary']=$this->salary->single_pay_detail($pay_id);
			$this->load->view('user/single_pay_view',$data);
		}
	}
?>