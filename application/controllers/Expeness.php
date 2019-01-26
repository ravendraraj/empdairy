<?php
class Expeness extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		if(!$this->session->userdata('user_id'))
			redirect('Login/index');
		$this->load->model('Compexpenes');
	}

    public function expeness_form(){

    	$expense_cat= $this->Compexpenes->get_expense_cat();
    	$msg='';
    	$data['exp_form_data'] = array('expense_cat' =>$expense_cat ,'msg'=>$msg);
        $this->load->helper('form');
        $this->load->view('admin/expeness_form',$data);
    }
     
    public function get_expense_setting(){
    	$expense_setting=$this->Compexpenes->get_expense_cat();
    	echo json_encode($expense_setting);
    }
    
    public function expense_cat_delete($id){
    	if($this->Compexpenes->check_use_exp_cat($id)==0)
    	{
        	$this->db->delete('expense_cat', array('id' => $id));
        	echo "Successfully Removed";
        }
        else
        {
         	echo "You can't reomved,this category is used";	
        }
    }
    
    public function expense_cat_edit($id){
    	$data = array('expense_cat' =>strtolower($this->input->post('expense_name')));
       // print_r($id);die();
    	if($this->Compexpenes->check_use_exp_cat($id)==null)
    	{
        	$this->db->update('expense_cat', $data, array('id' => $id));
        	echo "Successfully Updated";
        }
        else
        {
         	echo "You can't update,this category is used";	
        }
    }

    public function expense_entry()
    {
    	$this->load->library('form_validation');
        $this->form_validation->set_rules('exp_typ','Exp_type','trim|required');
		$this->form_validation->set_rules('exp_date','date','required|trim');
        $this->form_validation->set_rules('exp_amt','exp_amtount','numeric|trim|required');
        $this->form_validation->set_rules('exp_desc','exp_description','trim|required');

        if($this->input->post('reciept')=='reciept_img')
        	$this->form_validation->set_rules('exp_bill_img','exp_bill_img','required|trim');
        else
        	$this->form_validation->set_rules('exp_bill_no','exp_bill_no','required|trim');

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run()==true)
		{
            $date=new DateTime();
			$msg="";
			$data=array(
				'exp_typ'=>$this->input->post('exp_typ'),
				'exp_date'=>$this->input->post('exp_date'),
				'exp_amt'=>$this->input->post('exp_amt'),
				'exp_remark'=>$this->input->post('exp_desc'),
				'exp_bill_no'=>$this->input->post('exp_bill_no'),
				'exp_bill_img'=>$this->input->post('exp_bill_img'),
                'created'=>date('Y-m-d'),
                'modified'=>$date->format('Y-m-d')
			);
			$Comp_exp_checked=$this->Compexpenes->comp_expense_exist($data);
			if($Comp_exp_checked==0)
			{
				$count_row = $this->db->insert('comp_expense',$data); 
				if($count_row)
					$msg="Successfully Add";
				else
					$msg="Something wrong please try again";
		    }
		    else
		    {
		   		$msg="Already exist";
		    }

		       	$expense_cat= $this->Compexpenes->get_expense_cat();
    	        $data['exp_form_data'] = array('expense_cat' =>$expense_cat ,'msg'=>$msg);
    	        $this->load->view('admin/expeness_form',$data);
		}
		else
		{
			$this->expeness_form();
		}

    }

    public function new_added_expense_rows()
    {
       $data['new_res']= $this->Compexpenes->new_added_expense_model();
       $this->load->view('admin/new_expense_entry',$data);
    }

    //yesterday add all category expense 
    public function yesterday_expense()
    {
        $data['pre_day_exp']= $this->Compexpenes->yesterday_expense_model();
        $this->load->view('admin/new_expense_entry',$data);   
    }
}