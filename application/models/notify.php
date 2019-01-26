<?php

class notify extends CI_Model{

    /*For Admin*/
    public function leave_request_notification(){
        $this->db->select('*');
		$this->db->from('emp_leave_request');         
		$this->db->where('seen',0);
		$query = $this->db->get();
        return $query->num_rows();
    }

    public function leave_request_view(){
        $this->db->select('*');
		$this->db->from('emp_leave_request');         
		$this->db->where('status',0);
		$query = $this->db->get();
        return $query->result();
    }
}