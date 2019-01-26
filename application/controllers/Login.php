<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{


	public function index()
	{      

		 if($this->session->userdata('user_id'))
		 {
		 	if($this->session->userdata('user_id')->userType=="admin")
				return redirect('Admincontroller/dashboard');
			else
				return redirect('Usercontroller/user_dashboard');
		 }
			else 
				return redirect('Welcome/index');
		// $this->load->helper('form');
		 //this->load->view('admin/login');
	}

	//Login User Verification Controller
	public function login_v(){
		if($this->session->userdata('user_id'))
			 {
		 		if($this->session->userdata('user_id')->userType=="admin")
					return redirect('Admincontroller/dashboard');
				else
					return redirect('Usercontroller/user_dashboard');
		 	}
		 	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','valid_email|trim');
		//$this->form_validation->set_rules('password','Password','trim');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run()==true)
		{
			$data = array(
				'username'=>$this->input->post("username"),
				'password'=>$this->input->post("password"),
			 );
			$this->load->model('loginvery');
			$login_id=$this->loginvery->login_verify($data);
			if($login_id->id)//cerate session for user if user validate
				{  
					if($login_id->userType=="user")
					{
						$this->session->set_userdata('user_id',$login_id);
						return redirect('Usercontroller/user_dashboard');
					}

				    if($login_id->userType=="admin")
				    {
						 $this->session->set_userdata('user_id',$login_id);
						 return redirect('Admincontroller/dashboard');	
				    }
				}
			else
				{

					$this->session->set_flashdata('login_fail','Invalid Username/Password');
					//die("hi");
					 return redirect('Welcome/index');
					//$this->load->view('admin/login');
				}

		}
		else
			$this->load->view('admin/login');
	}

	public function logout(){
	$this->session->unset_userdata('user_id');
	redirect('Login/index');	
	}
}
?>