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
	
	function getSearchService($id){

		$this->db->select("nbb_service.*");
		$this->db->from("nbb_service");
		$this->db->where('nbb_service.id', $id);
		return $this->db->get()->result_array();
	}
	function getAlluserData($id){
		$this->db->select("nbb_customer.*,
		nbb_shipping_address.shipping_firstname,
		nbb_shipping_address.shipping_lastname,
		nbb_shipping_address.shipping_contactno,
		nbb_shipping_address.shipping_address,
		nbb_shipping_address.shipping_hse_blk_no,
		nbb_shipping_address.shippingunit_no,
		nbb_shipping_address.shipping_street,
		nbb_shipping_address.shipping_postalcode,
		nbb_shipping_address.shipping_country,
		nbb_billing_address.billing_firstname,
		nbb_billing_address.billing_lastname,
		nbb_billing_address.billing_contactno,
		nbb_billing_address.billing_address,
		nbb_billing_address.billing_postal_code,
		nbb_billing_address.billing_hse_blk_no,
		nbb_billing_address.billing_unit_no,
		nbb_billing_address.billing_street,
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
	function getAllexpense_wallet($userId){
		
		$this->db->select('nbb_expense_wallet.*');
		$this->db->from('nbb_expense_wallet');
		$this->db->where('nbb_expense_wallet.user_id', $userId);
		return $result = $this->db->get()->result_array(); 

	}
	function getAllcredit_wallet($userId){
		
		$this->db->select('nbb_credit_wallet.*');
		$this->db->from('nbb_credit_wallet');
		$this->db->where('nbb_credit_wallet.user_id', $userId);
		return $result = $this->db->get()->result_array();
	}
	function getAllWishlistData($id){

		$Wishlist_sql = "SELECT nbb_wishlist.*,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_product.name AS p_name,
		nbb_product.price,
		nbb_product.available_stock,
		(SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_wishlist.product_id LIMIT 1) as p_image
		FROM nbb_wishlist 
		LEFT JOIN nbb_customer ON nbb_customer.id = nbb_wishlist.id
		LEFT JOIN nbb_product ON nbb_product.id = nbb_wishlist.product_id
		WHERE nbb_wishlist.userId = '".$id."'";
		$Wishlist_query = $this->db->query($Wishlist_sql); 
		return $Wishlist_query->result_array();	
	}
}
?>
