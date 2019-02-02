<?php
class Salary extends CI_Model{

	public function employee_salay_details($id1)
	{
		$this->db->select('*');
		$this->db->from('emp_salary_info');
		//$this->db->join('user_full_info', 'user_full_info.id = user.id','inner');            
		$this->db->where('emp_id', $id1);
		$query = $this->db->get();
        return $query->row();
	}

	public function salary_functionality(){
		$this->db->select('*');
		$this->db->from('salary_factionality');
		$query = $this->db->get();
        return $query->row();	
	}

	public function paid_salary_month($emp_id){
		$this->db->select('month');
		$this->db->from('salary_paid_info');           
		$this->db->where(array('emp_id'=> $emp_id,'year'=>date('y')));
		$query = $this->db->get();
		return $query->result_array();
	}
   //check last pay of month 
	public function check_last_pay($emp_id)
	{
		$this->db->select('*');
		$this->db->from('salary_paid_info');           
		$this->db->where('emp_id', $emp_id);
		$this->db->limit(1);  // Produces: LIMIT 10
		$query = $this->db->get();
		return $query->row();
	}

//if new join then check joining date user_full_info
	public function check_joining($emp_id)
	{
        $this->db->select('*');
		$this->db->from('user_full_info');           
		$this->db->where('emp_id', $emp_id);
		$query = $this->db->get();
		return $query->row();
	}

	//check payslip isn't alerady generate relative month

	public function check_exist_payslip($emp_id,$month,$year)
	{
        $this->db->select('*');
		$this->db->from('salary_paid_info');           
		$this->db->where(array('emp_id'=> $emp_id,'month'=>$month,'year'=>$year));
		$query = $this->db->get();
		return $query->row();
	}

	/*-------------------User Section------------------*/
	//check last pay of month 
	public function paid_salary_details($emp_id)
	{
		$this->db->select('*');
		$this->db->from('salary_paid_info');           
		$this->db->where('emp_id', $emp_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function single_pay_detail($pay_id)
	{
		$this->db->select('*');
		$this->db->from('user_full_info');
		$this->db->join('emp_salary_info', 'emp_salary_info.emp_id = user_full_info.id','inner');
		$this->db->join('salary_paid_info', 'salary_paid_info.emp_id = user_full_info.id','inner');
		$this->db->join('user', 'user.id = user_full_info.id','inner');
		$this->db->where('salary_paid_info.payslip_id', $pay_id);
		$query = $this->db->get();
		return $query->result();
	}
}
?>