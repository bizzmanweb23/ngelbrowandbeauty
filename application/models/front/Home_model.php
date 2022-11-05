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
	function getAllSemiservicesList(){
		$this->db->select('nbb_service.*');
		$this->db->from('nbb_service');
		$wheredata = array(
			'nbb_service.status' 		=> 1,
			'nbb_service.service_category' 		=> 19,
		);
		$this->db->where($wheredata);
		return $result = $this->db->get()->result_array(); 	
	}
	function getactiveSemiServices(){
		$this->db->select('nbb_service.*');
		$this->db->from('nbb_service');
		$wheredata = array(
			'nbb_service.status' 		=> 1,
			'nbb_service.service_category' 		=> 19,
		);
		$this->db->where($wheredata);
		$this->db->limit(1);  
		return $result = $this->db->get()->result_array(); 	
	}
	function getShipping_address($user_id){
		$this->db->select('nbb_shipping_address.*');
		$this->db->from('nbb_shipping_address');
		$this->db->where('nbb_shipping_address.user_id', $user_id);
		$this->db->limit(1);  
		return $result = $this->db->get()->result_array(); 	
	}
	function getHomeproductList(){
		
		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.status = 1
		ORDER BY nbb_product.id DESC
		LIMIT 30";
		$product_query = $this->db->query($all_product_sql);
		return $product_data = $product_query->result_array();

	}
}
?>
