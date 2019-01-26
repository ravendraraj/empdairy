<?php
class Adminmodel extends CI_Model{
	public function articleslist(){
		//return "hello";
		$user_id=$this->session->userdata('user_id');
		//print_r($user_id);
	    $query=$this->db->get('user');
		return $query->result();
		//echo "<pre>";
		 //$data=$query->result();\
	//	$data_array();
	//	print_r($data);
	  //   die();
	}
}
?>