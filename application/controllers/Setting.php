<?php
class Setting extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		if(!$this->session->userdata('user_id'))
			redirect('Login/index');
		$this->load->library('form_validation');
		$this->load->model('settingdata');
		$this->load->model('Compexpenes');
		$this->load->helper('form');
	}

	//Main function to upload setting pages when call 
	public function settingmaster(){
		//$data['setting_data']=array('leavedata' => $this->settingdata->leaveData(),'depart'=>$this->settingdata->getDepart());
		$leave=$this->settingdata->leaveData();
		$depart=$this->settingdata->getDepart();
		$data['chunk'] = array('leave' =>$leave,'depart'=>$depart);
		$this->load->view('admin/setting',$data);
	}

	public function setting_enable(){
		$this->load->helper('form');
		$this->load->view('admin/setting');
		}

	public function leave_setting(){
		$leave['chunk']=$this->settingdata->leaveData();
		$this->load->view('admin/setting_leave',$leave);
	}

	public function leave(){
			//$this->load->library('form_validation');
		//$this->form_validation->set_rules('username','Username','valid_email|trim');
	//	$this->form_validation->set_rules('LeaveCategory','LeaveCategory','trim');
		$this->form_validation->set_rules('LeaveDays','LeaveDays','numeric|trim');
		$this->form_validation->set_rules('leaveDescripton','leaveDescripton','trim');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run()==true)
		{
			//$data = array('leavename' =>$this->input->post('LeaveCategory'),'Days'=>$this->input->post('LeaveDays'),'description'=>$this->input->post('leaveDescripton'));
			$data = array('Days'=>$this->input->post('LeaveDays'),'description'=>$this->input->post('leaveDescripton'));
			//print_r($data);
			//$count_row = $this->db->insert('leave_mgt',$data); 
			$this->db->set('days',$this->input->post('LeaveDays'));
			$this->db->set('description',$this->input->post('leaveDescripton'));
			$this->db->where('leavename','Paid Leave');
		    $count_row=$this->db->update('leave_mgt');
			//print_r($this->db->update('leave_mgt'));die();
        	if($count_row>0)
        		{
        			return redirect('Setting/leave_setting');
        		}
        		else{
        			echo "<script>alert('Something Wrong please try again')</script>";
        		}
		}
		else
			return redirect('Setting/settingmaster');


	}

	public function setting_expense(){
	  $expense_setting['exp_cat']=$this->Compexpenes->get_expense_cat();
      $this->load->view('admin/setting_expense',$expense_setting);
	}

	public function expense_cat_data()
	{
		$date=new DateTime();
		$data = array('expense_cat' =>strtolower($this->input->post('expense_name')) , 'created'=>$date->format('Y-m-d H:i:s'));
		$count_row=$this->db->insert('expense_cat',$data);
	}

	public function depart_setting(){//cofigure departments 
		//$depart['chunk']=$this->settingdata->getDepart();
		$depart['chunk']= array('depart' => $this->settingdata->getDepart(),'desig'=> $this->settingdata->getDesigation());
		$this->load->view('admin/setting_depart-desigation.php',$depart);
	}

	public function department(){

		//$this->form_validation->set_rules('DepartmentID','DepartmentID','alphanumeric|trim');
		$this->form_validation->set_rules('DepartmentName','DepartmentName','trim');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run()==true)
		{
			$data = array('deptName'=>$this->input->post('DepartmentName'),'addDate'=>date("d/m/Y"));
			$count_row = $this->db->insert('department',$data); 
        	if($count_row>0)
        		{
        			return redirect('Setting/depart_setting');
        		}
        		else{
        			echo "Wrong";
        		}
		}
		else{
			return redirect('Setting/settingmaster');
		}

	}

	public function desigation_config(){
		$data = array
		(
			'designationName'=>$this->input->post('DesigationName'),
			'addDate'=>date("d/m/Y"),
			'departID'=>$this->input->post('depart')
		);
			$count_row = $this->db->insert('designation',$data); 
        	if($count_row>0)
        		{
        			return redirect('Setting/depart_setting');
        		}
        		else
        			echo "Wrong";
	}

       //salary functionality form
		public function salary_functionality_form()
		{
			$leave['chunk']=$this->settingdata->salary_function();
			$this->load->view('admin/saslary_function',$leave);
		}
	    //Salary Functionality 
		public function salary_functionality()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('emp_hra','emp_hra','numeric|trim');
			$this->form_validation->set_rules('emp_ma', 'emp_ma', 'numeric|trim');
			$this->form_validation->set_rules('emp_ta','emp_ta','numeric|trim');
			$this->form_validation->set_rules('emp_sa','emp_sa','numeric|trim');
			if($this->form_validation->run()==true)
			{
				$data= array(
				'emp_hra'=>$this->input->post('emp_hra'),
				'emp_ta'=>$this->input->post('emp_ta'),
				'emp_ma'=>$this->input->post('emp_ma'),
				'emp_sa'=>$this->input->post('emp_sa'),
				);
			//get data from salary functionality
			  $salary_function=$this->settingdata->salary_function();
           		if(!$salary_function)
          		 {
		   		 $count_row = $this->db->insert('salary_factionality',$data); 
					if($count_row)
					{
						echo "<script>alert('Successfully Added')</script>";
					}
		   		}
		   		else
		   			{
		   				echo "<script>alert('Sorry You have already configured')</script>";
		   			}
			}
			return redirect('Setting/salary_functionality_form');
	}

	//Company Profile
	public function company_profile_page(){
	//	$this->settingdata->salary_function();
		$data['comp_profile']=$this->settingdata->company_profile();
          $this->load->view('admin/company_profile',$data);
	}

	public function do_upload()
	{
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 100;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
            $form_data= array(
            'comp_logo_name'=>$this->input->post('comp_logo_name'),
			'comp_name'=>$this->input->post('comp_name'),
			'regis_address'=>$this->input->post('reg_addr'),
			'copr_address'=>$this->input->post('corp_addr'),
			'comp_logo'=>$this->input->post('userfile'),
			);
			//print_r($this->upload->data());
			if ( ! $this->upload->do_upload('userfile'))
			{
					$error = array('error' => $this->upload->display_errors());
					//$this->load->view('upload_form', $error);
					$this->company_profile_page();
			}
			else
			{
					$data = array('upload_data' => $this->upload->data());
					$upload_data = $this->upload->data();
					$form_data['comp_logo']=$upload_data['file_name'];
					if($form_data['comp_logo'])
					{  
						$count_row=0;
						$profile_comp=$this->settingdata->company_profile();
						//print_r($profile_comp);
						if(empty($profile_comp))
						{ 
							$count_row=$this->db->insert('company_profile',$form_data);
						}
						else
						{
							$id=$profile_comp->id;
							$count_row=$this->settingdata->company_profile_update($form_data,$id);
						}
						 $this->company_profile_page();
					}
					else{
						echo "<script>alert('Please Upload Right File')</script>";
					}

			}
	}

}
?>