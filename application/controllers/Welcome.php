<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller{
	public function index()
	{
		if($this->session->userdata('user_id'))
			 {
		 		if($this->session->userdata('user_id')->userType=="admin")
					return redirect('Admincontroller/dashboard');
				else
					return redirect('Usercontroller/user_dashboard');
		 	}
		$this->load->helper('form');
		$this->load->view('admin/login');
	}
	public function forgot_password(){
		$this->load->helper('form');
		$this->load->view('forgot-password');
	}
	public function recover_pass(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','valid_email|trim');
	}
}
