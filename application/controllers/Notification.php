<?php
class Notification extends CI_Controller{

    //Notification for Admin
    public function leave_request_notify(){
       $this->load->model('notify');
       $result=$this->notify->leave_request_notification();
       if($result!=0)
       echo $result;
    }

    //Notification view for admin
    public function notification_view(){
        $this->load->helper('form');
        $this->load->model('notify');
        $result['chunk']=$this->notify->leave_request_view();
        $this->load->view('admin/notification_view',$result);
    }

    //Update Seen Request
    public function leave_request_seen()
    {
        $this->db->set('seen',1);
        $this->db->where('req_id',$this->input->post('standard'));
        $this->db->update('emp_leave_request');
    }
}