<?php 
class Leavemgt extends CI_Model{
    //leave request
    public function leave_request()
    {
        $this->db->select('*');
		$this->db->from('emp_leave_request');
		$query = $this->db->get();
		return $query->result();
    }

    //check approved leave
    public function check_approved_leave($data)
    {
        $this->db->select('*');
		$this->db->from('emp_approved_leave');         
        $this->db->where(array('emp_id'=>$data['emp_id'],'leave_year'=>$data['leave_year'],'leave_month'=>$data['leave_month']));
		$query = $this->db->get();
        return $query->row();
    }

 //update staus of leave request
    public function upadte_req_status($req_id){
        $this->db->set('status',1);
        $this->db->where('req_id',$req_id);
        $this->db->update('emp_leave_request');
        if($this->db->affected_rows()>0)  
        return true;
       else
         return false;
    }

  //Update leave if emp one time already apply in current month
    public function grant_leave_if_take_once($data)
    { 
        //update present row 
        $this->db->set('not_approved',$data['not_approved']);
        $this->db->set('leave_days',$data['leave_days']);
        $this->db->where(array('emp_id'=>$data['emp_id'],'leave_year'=>$data['leave_year'],'leave_month'=>$data['leave_month']));
        $result= $this->db->update('emp_approved_leave');
        if($this->db->affected_rows()>0)  
         $this->upadte_req_status($data['req_id']);
        else
          return false;
    }

  //Insert new row at leave approval if emp not take leave in cruuent month
      public function grant_leave_at_new_req($data)
      { 
          //insert new row
          $count_row=$this->db->insert('emp_approved_leave',$data);
          if($count_row>0)  
          $this->upadte_req_status($data['req_id']);
         else
           return false;

      }
    public function earn_leave($data)
    {
        $this->db->select('*');
		$this->db->from('emp_approved_leave');         
        $this->db->where(array('emp_id'=>$data['emp_id'],'leave_year'=>$data['year'],'leave_month'=>$data['month']));
		$query = $this->db->get();
        return $query->row();
    }

    //Get From Leave Setting 
    public function paid_leave()
    {
        $this->db->select('days');
		$this->db->from('leave_mgt');         
        $this->db->where('leavename','Paid Leave');
		$query = $this->db->get();
        return $query->result();
    }
}