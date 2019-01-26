<?php
class Createpdf extends CI_Controller{

    public function pdf()
    {
        $this->load->model('salary');
        $this->load->model('leavemgt');
        $this->load->library('Pdf');
        $pay_id=$_REQUEST['req'];
        $data['salary']=$this->salary->single_pay_detail($pay_id);
        $salary_details=$this->salary->single_pay_detail($pay_id);
        $data1=array('emp_id'=>$data['salary'][0]->id,'leave_year'=>$data['salary'][0]->year,'leave_month'=>$data['salary'][0]->month);
        $aprove_leave=$this->leavemgt->check_approved_leave($data1);
        //print_r($aprove_leave);
        $paid_leave_comp=$this->leavemgt->paid_leave();
       // echo $aprove_leave->leave_days-($paid_leave_comp[0]->days/12);
        //if(empty($aprove_leave))
       // {
         //  print_r($data);
       // }
       // else
          //  echo $aprove_leave->approved." not_approved".$aprove_leave->not_approved;
        
        $this->load->model('settingdata');
        $comp_profile=$this->settingdata->company_profile();
        $full_data['full_data']=array('salary'=>$salary_details,'comp_profile'=>$comp_profile);
        //print_r($full_data['full_data']['salary']);
        //die();
        $this->load->view('pdfreport',$full_data);        
    }    
}