<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Header_Model extends CI_Model
{
	function getAllchild_category(){
		$this->db->select('nbb_child_category.*');
		$this->db->from('nbb_child_category');
		$this->db->where('nbb_child_category.parent_category_id', '1');
		return $this->db->get()->result_array();
	}
	function getAllProduct_category(){
		$this->db->select('nbb_child_category.*');
		$this->db->from('nbb_child_category');
		$this->db->where('nbb_child_category.parent_category_id', '2');
		return $this->db->get()->result_array();
	}
	function getAllCourse_category(){
		$this->db->select('nbb_child_category.*');
		$this->db->from('nbb_child_category');
		$this->db->where('nbb_child_category.parent_category_id', '3');
		return $this->db->get()->result_array();
	}
	function getAllservicesList($id){
		$this->db->select('nbb_service.*');
		$this->db->from('nbb_service');
		$this->db->where('nbb_service.service_category', $id); 
		return $result = $this->db->get()->result_array(); 	
	}
	function getactiveServices($id){
		$this->db->select('nbb_service.*');
		$this->db->from('nbb_service');
		$this->db->where('nbb_service.service_category', $id);
		$this->db->limit(1);  
		return $result = $this->db->get()->result_array(); 	
	}
	function getAllproductList($id){
		
		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.product_category_id = '".$id."'";
		$product_query = $this->db->query($all_product_sql);
		return $product_data = $product_query->result_array();

	}
	function getSearchService($id){

		$this->db->select("nbb_service.*");
		$this->db->from("nbb_service");
		$this->db->where('nbb_service.id', $id);
		return $this->db->get()->result_array();
	}
	function getAlluserData($id){
		$this->db->select("nbb_customer.*,
		nbb_shipping_address.shipping_contactno,
		nbb_shipping_address.shipping_address,
		nbb_shipping_address.shipping_city,
		nbb_shipping_address.shipping_state,
		nbb_shipping_address.shipping_postalcode,
		nbb_shipping_address.shipping_country,
		nbb_billing_address.billing_firstname,
		nbb_billing_address.billing_lastname,
		nbb_billing_address.billing_contactno,
		nbb_billing_address.billing_address,
		nbb_billing_address.billing_postal_code,
		nbb_billing_address.billing_city,
		nbb_billing_address.billing_state,
		nbb_billing_address.billing_country");
		$this->db->from("nbb_customer");
		$this->db->join('nbb_shipping_address', 'nbb_shipping_address.user_id = nbb_customer.id', 'LEFT');
		$this->db->join('nbb_billing_address', 'nbb_billing_address.user_id = nbb_customer.id', 'LEFT');
		$this->db->where('nbb_customer.id', $id);
		return $this->db->get()->result_array();
	}

	function getPackageServices(){
		
		$this->db->select("nbb_packages.*");
		$this->db->from("nbb_packages");
		return $this->db->get()->result_array();

	}
}
?>
