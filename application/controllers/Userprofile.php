<?php
class Userprofile extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		if(!$this->session->userdata('user_id'))
			redirect('Login/index');
	//	$this->load->library('form_validation');
		$this->load->model('Usermodel');
	//	$this->load->helper('form');
	}

	public function change_password(){

	}

	public function user_profile(){

	}
	public function employee_data(){
		$data['emp']=$this->Usermodel->employees();
		$this->load->view('admin/index',$data);
	}
	//echo "not in use right now"
}