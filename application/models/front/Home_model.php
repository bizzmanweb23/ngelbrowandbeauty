<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	function getstate(){

		$this->db->select("nbb_state.*");
		$this->db->from("nbb_state");
		return $this->db->get()->result_array();
	}
	function getAllcustomerReferalCode($id){
		$this->db->select('nbb_customer.referreduser_id');
		$this->db->from('nbb_customer');
		$this->db->where('nbb_customer.id', $id);
		$customer_query = $this->db->get()->result_array();
		$data = array();			

		foreach($customer_query as $row){	
			$data = array(
				'referreduser_id' => $row['referreduser_id'],
			);
		}
		return $data;
	}
	
}
?>
