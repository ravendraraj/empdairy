<?php
class Usermodel extends CI_Model{
	public function employees(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_full_info', 'user_full_info.id = user.id','inner');
		$query = $this->db->get();
		return $query->result();
	}

	public function employees_details($id1)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_full_info', 'user_full_info.id = user.id','inner');            
		$this->db->where('user.id', $id1);
		$query = $this->db->get();
        return $query->result();
	}

	public function department_details($id1)
	{
		$this->db->select('*');
		$this->db->from('designation');
		$this->db->join('department', 'department.deptID=designation.departID');            
		$this->db->where('deptName', $id1);
		$query = $this->db->get();
        return $query->result();
	}
}
?>