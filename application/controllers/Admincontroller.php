<?php  
class Admincontroller extends My_Controller{
	public function __construct(){
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
		$this->load->model('settingdata');
	}

	public function dashboard(){
			$this->load->model('usermodel');
			$this->load->model('Compexpenes');
			$this->load->model('settingdata');
			$comp_profile=$this->settingdata->company_profile();
			$pre_day_exp= $this->Compexpenes->yesterday_expense_model();
			$emp=$this->usermodel->employees();
			$data['page_data']=array('pre_day_exp' =>$pre_day_exp,'emp'=>$emp,'comp_profile'=>$comp_profile);
		    $this->load->view('admin/index',$data);
	}

	public function add_new_userform(){
		$this->load->model('settingdata');
		$leave=$this->settingdata->leaveData();
		$depart=$this->settingdata->getDepart();
		$desigation=$this->settingdata->getDesigation_all();
		
		$data['chunk'] = array('leave' =>$leave,'depart'=>$depart,'desigation'=>$desigation);
		$this->load->view('admin/register',$data);
	}

	public function desigation_ajax( $arg ){
		//$query = $this->db->query("SELECT * FROM designation INNER JOIN department on department.deptID=designation.departID
		 //where deptName='$arg'");
		//$res =  $query->result();
		$this->load->model('usermodel');
		$res=$this->usermodel->department_details($arg);
		echo json_encode($res);
        
	}

	//Email via gmail smtp

			public function mail_msg($data12){
					$this->load->library('email');
		            $this->load->library('encrypt');
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['wordwrap'] = TRUE;
					$config['charset']    = 'utf-8';
					$config['newline']    = "\r\n";
					$config['mailtype'] = 'html'; // or html
					$this->email->set_header('MIME-Version', '1.0');
					$this->email->set_header('Content-type', 'text/html'); 
					$this->email->set_header('charset', 'UTF-8'); 
					$this->email->reply_to('ravendraksingh11@gmail.com','Ravendra');//set company email
					$this->email->initialize($config);
					$this->email->from('ravendraksingh11@gmail.com','Ravendra');//set company email
					$this->email->to($data12['uname']);
					$this->email->subject('Confirmation Email from Badhva.com');
					$this->email->message('Your account successfully created. And Account details mention below <br/> User name:'.$data12['uname'].'<br/> Password:'.$data12['pass']);
					$result=$this->email->send();
					if($result>0)
					{
						 echo '<script>alert("Congratulations You Have Successfully Register Please Verify Your Register Email");</script>';
						 return redirect('Admincontroller/dashboard');
					}
				    else
						echo '<script>alert("Your Email is not Correct Please Enter Valid Email id");</script>';
		//			redirect("/Welcome/login");
	                  
		}

	public function add_new_user(){
		$Passwo=substr(uniqid(rand(), true),-8);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstName','Username','alpha|trim');
		$this->form_validation->set_rules('lastName','lastName','alpha|trim');
		$this->form_validation->set_rules('DOB','DOB','trim');
		$this->form_validation->set_rules('qualification','qualification','trim');
		$this->form_validation->set_rules('uname', 'uname', 'valid_email|required|is_unique[user.uname]');
		$this->form_validation->set_rules('depart','depart','trim');
		$this->form_validation->set_rules('desigation','desigation','trim');
		$this->form_validation->set_rules('Previous','Previous','trim');
		$this->form_validation->set_rules('Experience','Experience','numeric|trim');
		$this->form_validation->set_rules('Corresponing','Corresponing','trim');
		$this->form_validation->set_rules('Prmanet','Prmanet','trim');
		//$this->form_validation->set_rules('password','Password','trim');
		$this->form_validation->set_error_delimiters("<p class='text-primary'>","</p>");
		if($this->form_validation->run()==true)
		{
			//here insert data im db;
			$data_user_login = array('uname' =>$this->input->post('uname'),'pass' =>$Passwo,'fname' =>$this->input->post('firstName'),'lname'=>$this->input->post('lastName'),'userType'=>'user');


			$data = array('DOB'=>$this->input->post('DOB'),'qualification' =>$this->input->post('qualification'),'depart' =>$this->input->post('depart'),'desigation' =>$this->input->post('desigation'),'Previous' =>$this->input->post('Previous'),'Experience' =>$this->input->post('Experience'),'Corresponing' =>$this->input->post('Corresponing'),'Prmanet' =>$this->input->post('Prmanet'),'dateofjoining' =>date("d/m/Y"));
			//print_r($data);
			$count_row1 = $this->db->insert('user',$data_user_login); 
			$count_row2 = $this->db->insert('user_full_info',$data);
			if($count_row1>0 && $count_row2>0)
        		{
        			$this->mail_msg($data_user_login);  //Here redirect mail function to send msg 
        		} 
		}
		else
		{
			$this->load->view('admin/register');
		}
	}
}
?>