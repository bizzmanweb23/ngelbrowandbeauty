<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthFront_Model extends CI_Model
{
	

	function logindata($data)
	{
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
	function getOtpdata($otp)
	{
		//$query = $this->db->query("SELECT * FROM nbb_customer WHERE otp = '".$otp."'");
		$this->db->select('nbb_customer.otp,nbb_customer.email,nbb_customer.referreduser_id,');
		$this->db->from('nbb_customer');
		$this->db->where('nbb_customer.otp', $otp);
		//return $this->db->get()->result_array();
		$customer_query = $this->db->get()->result_array();
		$data = array();			

		foreach($customer_query as $row){	
			$data = array(
				'otpData' => $row['otp'],
				'email' => $row['email'],
				'referreduser_id' => $row['referreduser_id'],
			);
		}
		return $data;
	}

}
