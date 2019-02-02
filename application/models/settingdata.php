<?php
class Settingdata extends CI_Model{
	public function leaveData(){
		$query=$this->db->get('leave_mgt');
				return $query->result();
	}
	public function getDepart(){
		$query=$this->db->get('department');
				return $query->result();
	}
	public function getDesigation(){
		$this->db->select('*');
		$this->db->from('designation');
		$this->db->join('department', 'designation.departID=department.deptID','inner');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDesigation_all()
	{
		$query=$this->db->get('designation');
				return $query->result();
	}

	public function salary_function()
	{
		$query=$this->db->get('salary_factionality');
				return $query->result();	
	}

	public function company_profile(){
		$query=$this->db->get('company_profile');
				return $query->row();
	} 

	public function company_profile_update($data,$id){
		$this->db->set(array('comp_name'=>$data['comp_name'],'regis_address'=>$data['regis_address'],'copr_address'=>$data['copr_address'],'comp_logo'=>$data['comp_logo']));
        $this->db->where('id',$id);
		$this->db->update('company_profile');
		//die('call');
        if($this->db->affected_rows()>0)  
        return 1;
       else
         return 0;
	}
}
