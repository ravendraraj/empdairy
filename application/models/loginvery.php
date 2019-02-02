<?php 
class Loginvery extends CI_Model{

	public function __construct()   //Parent construct
        {
                parent::__construct();
        }

	public function login_verify($data) //Login verfication 
	{
		$name=$data['username'];
		$pass=$data['password'];
	$query=$this->db->where(array('uname'=>$name,'pass'=>$pass))
					->get('user');
		if($query->num_rows())
		{
			return $query->row();
		}
		else
			return false;
	}
 }
 ?>
