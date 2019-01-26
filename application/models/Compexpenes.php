<?php
class Compexpenes extends CI_Model{

	public function comp_expense_exist($data)
    {
        $this->db->select('*');
		$this->db->from('comp_expense');
		$this->db->where(array(
			'exp_typ'=> $data['exp_typ'],
			'exp_date'=> $data['exp_date'],
			'exp_amt'=> $data['exp_amt'],
			'exp_bill_no'=> $data['exp_bill_no'],
		    'exp_remark'=> $data['exp_remark']));
		$query = $this->db->get();
		return $query->num_rows();
    }

    public function get_expense_cat(){
        $this->db->select('*');
		$this->db->from('expense_cat');
		$query = $this->db->get();
		return $query->result();	
    }

    public function check_use_exp_cat($id)
    {
    	$this->db->select('expense_cat');
    	$query = $this->db->get_where('expense_cat', array('id' => $id));
    	$res=$query->result();

        $query2 = $this->db->get_where('comp_expense', array('exp_typ' => $res[0]->expense_cat));
       // die($query2->num_rows());
    	return $query2->num_rows();
    }


    public function new_added_expense_model()
    {
    	$date=new DateTime();
        $this->db->select('*');
		$this->db->from('comp_expense');
		$this->db->where('created',$date->format('Y-m-d'));
		$query = $this->db->get();
		return $query->result();
    }

    /*Yesterday Expense*/
    public function yesterday_expense_model(){
        $date=date("Y-m-d", mktime(0, 0, 0, date("m") , date("d")-1,date("Y")));
        $this->db->select_sum('exp_amt');
        $this->db->from('comp_expense');
        $this->db->where('created',$date);
        $query = $this->db->get();
        //echo $date;
        //die();
        return $query->result();       
    }
}
