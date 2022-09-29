<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	function getstate(){

		$this->db->select("nbb_state.*");
		$this->db->from("nbb_state");
		return $this->db->get()->result_array();
	}
	function getmembership(){

		$this->db->select("nbb_membership.*");
		$this->db->from("nbb_membership");
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
	function getAllservicesList(){
		$this->db->select('nbb_service.*');
		$this->db->from('nbb_service');
		$this->db->where('nbb_service.status', '1'); 
		return $result = $this->db->get()->result_array(); 	
	}
	function getactiveServices(){
		$this->db->select('nbb_service.*');
		$this->db->from('nbb_service');
		$this->db->where('nbb_service.status', '1');
		$this->db->limit(1);  
		return $result = $this->db->get()->result_array(); 	
	}
	function getShipping_address($user_id){
		$this->db->select('nbb_shipping_address.*,
		nbb_state.name AS stateName');
		$this->db->from('nbb_shipping_address');
		$this->db->where('nbb_shipping_address.user_id', $user_id);
		$this->db->join('nbb_state', 'nbb_state.id = nbb_shipping_address.shipping_state', 'LEFT');
		$this->db->limit(1);  
		return $result = $this->db->get()->result_array(); 	
	}
}
?>
