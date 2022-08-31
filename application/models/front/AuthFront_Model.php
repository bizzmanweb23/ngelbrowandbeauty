<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthFront_Model extends CI_Model
{
	

	function logindata($data)
	{
		/*$this->db->select('*');
		$this->db->from('nbb_customer');
		$this->db->where('email', $data['email'])->or_where("contact",$data['contact']);
		//$this->db->where('contact', $data['email']);
		$this->db->where('password', $data['password']);

		$query=$this->db->get();*/
		$query = $this->db->query("SELECT * FROM nbb_customer WHERE password='".$data['password']."' AND email = '".$data['email']."' OR contact='".$data['contact']."'");
		//print_r($query);exit;
		if($query->num_rows() == 1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}	
	}

}
