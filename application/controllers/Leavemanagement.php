<?php
class Leavemanagement extends CI_Controller{
    public function __construct()
    {

        parent:: __construct();
        if(!$this->session->userdata('user_id'))
        {
            redirect('Login/index');
        }
        /*
        if($this->session->userdata('user_id')->userType!="user")
        {
            redirect('Login/index');
        }*/
        $this->load->library('form_validation');
        $this->load->model('Leavemgt');
    }
    
    public function leave_request(){
       // $this->load->library('form_validation');
        $this->load->helper('form');
        $res['chunk']=$this->Leavemgt->leave_request();
        $this->load->view('user/leave_request',$res);
    }

    public function leave_request_post(){
        $this->form_validation->set_rules('from','from','trim|required');
		$this->form_validation->set_rules('to','to','required|trim');
        $this->form_validation->set_rules('LeaveDays','LeaveDays','trim|required');
        $this->form_validation->set_rules('leaveDescripton','leaveDescripton','trim|required');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run()==true)
		{
			$data = array('emp_id'=>$this->input->post('emp_id'),'leave_from' =>$this->input->post('from'),'leave_to' =>$this->input->post('to'),'leave_days'=>$this->input->post('LeaveDays'),'description'=>$this->input->post('leaveDescripton'),'status'=>'0','seen'=>'0');
			//print_r($data);
			$count_row = $this->db->insert('emp_leave_request',$data); 
        	if($count_row>0)
        		{
        			return redirect('Leavemanagement/leave_request');
        		}
        		else{
        			echo "<script>Somthing Worng</script>";
        		}
		}
    }

    public function leave_req_grant()
    {
        $this->form_validation->set_rules('from','from','trim|required');
		$this->form_validation->set_rules('to','to','required|trim');
        $this->form_validation->set_rules('LeaveDays','LeaveDays','trim|required');
        $this->form_validation->set_rules('leaveDescripton','leaveDescripton','trim|required');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if($this->form_validation->run()==true)
		{
        $from=explode('-',$this->input->post('from'));
        $data = array(
        'req_id'=>$this->input->post('req_id'),
        'emp_id'=>$this->input->post('emp_id'),
        'leave_days'=>$this->input->post('LeaveDays'),
        'leave_date' =>$this->input->post('from'),
        'leave_month'=>$from[1],
        'leave_year'=>$from[0],
        'approved'=>0,
        'not_approved'=>0
        );
        $count_row=0;
        $approved_days_comp=$this->Leavemgt->paid_leave();
        $leave_days_by_comp=$approved_days_comp[0]->days/12;
        $approved_leave=$this->Leavemgt->check_approved_leave($data);
        if(empty($approved_leave))
        {
            if($data['leave_days']>=$leave_days_by_comp)
            {
            $data['not_approved']=$data['leave_days']-$leave_days_by_comp;
            $data['approved']=$leave_days_by_comp;
            }
            else{
                $data['approved']=$data['leave_days'];
            }
           // print_r($data);
            $count_row= $this->Leavemgt->grant_leave_at_new_req($data);
        }
        else
        {
           // echo $approved_leave->not_approved;
        //print_r($approved_leave);
            $data['not_approved']=$data['leave_days']+ $approved_leave->not_approved;
            $data['leave_days']=$data['not_approved']+$leave_days_by_comp;
            $data['approved']= $approved_leave->approved;
            $count_row=$this->Leavemgt->grant_leave_if_take_once($data);
        }
       }
    }

}