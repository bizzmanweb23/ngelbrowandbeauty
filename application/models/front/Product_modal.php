<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_modal extends CI_Model
{
	function getAllproductList($id){
		
		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.product_category_id = '".$id."' AND nbb_product.status = 1 ";
		$product_query = $this->db->query($all_product_sql);
		return $product_data = $product_query->result_array();

	}
	function getAllproductrow_num($id){
		
		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.product_category_id = '".$id."' AND nbb_product.status = 1 ";
		$product_query = $this->db->query($all_product_sql);
		return $product_data = $product_query->num_rows();;

	}
	function getAllSubproductList($id){
		
		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.sub_child_category_id = '".$id."' AND nbb_product.status = 1 ";
		$product_query = $this->db->query($all_product_sql);
		return $product_data = $product_query->result_array();

	}
	function getAllSubProductrow_num($id){
		
		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.sub_child_category_id = '".$id."' AND nbb_product.status = 1 ";
		$product_query = $this->db->query($all_product_sql);
		return $product_data = $product_query->num_rows();;

	}
	function getproductDetails($id){
		
		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.id = '".$id."'";
		$product_query = $this->db->query($all_product_sql);
		$product_data = $product_query->result_array();

		$data = array();			

			foreach($product_data as $row){				

				$data = array(
					'id' 				=> $id,
					'pname' 			=> $row['name'],
					'colour' 			=> $row['colour'],
					'description' 		=> $row['description'],
					'short_description' => $row['short_description'],
					'weight' 			=> $row['weight'],
					'sku' 				=> $row['sku'],
					'p_image' 			=> $row['p_image'],
					'price' 			=> $row['price'],
					'discounted_price' 	=> $row['discounted_price'],
					'brand_name'        => $row['brand_name'],
					'stock'             => $row['stock'],
					'available_stock'   => $row['available_stock'],
					'supplier_id'       => $row['supplier_id'],
				);	

			}
			return $data;

	}
	
	function getSingleproduct($id){
		
		$all_product_sql = "SELECT nbb_product_image.image AS p_image 
		FROM nbb_product_image 
		WHERE nbb_product_image.product_id  = '".$id."' LIMIT 1 ";
		$product_query = $this->db->query($all_product_sql);
		return $product_data = $product_query->result_array();

	}
	function getAllproductimageList($id){
		
		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.product_category_id = '".$id."' AND nbb_product.status = 1 ";
		$product_query = $this->db->query($all_product_sql);
		return $product_data = $product_query->result_array();

	}
	function getcartProductDetails($user_id){

		$order_main_sql = "SELECT nbb_order_main.*,
		nbb_order_main.id AS order_id,
		nbb_order_product.id AS order_productId,
		nbb_order_product.product_id,
		nbb_order_product.total_quantity,
		nbb_order_product.total_price,
		nbb_order_product.product_price,
		nbb_product.name as p_name,
		nbb_product.colour,
		(SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_order_product.product_id LIMIT 1) as p_image
		FROM nbb_order_main 
		LEFT JOIN nbb_order_product ON nbb_order_product.order_id = nbb_order_main.id
		LEFT JOIN nbb_product ON nbb_product.id = nbb_order_product.product_id
		WHERE nbb_order_main.user_id = '".$user_id."' AND nbb_order_main.type_flag = 'C'";
		$order_main_query = $this->db->query($order_main_sql); 
		return $order_main_query->result_array();	
	}

	function getcartProducttotalPrice($user_id){

		$orderTotal_sql = "SELECT SUM(nbb_order_product.total_price) AS total_price,
			nbb_order_main.id AS order_id,
			nbb_order_main.user_id
			FROM nbb_order_product
			LEFT JOIN nbb_order_main ON nbb_order_main.id = nbb_order_product.order_id
			WHERE nbb_order_main.user_id = '".$user_id."' AND nbb_order_main.type_flag = 'C'";
		$orderTotal_query = $this->db->query($orderTotal_sql); 
		$orderTotal_result = $orderTotal_query->result_array();	
		$data = array();			

		foreach($orderTotal_result as $row){	
			$data = array(
				'total_price' 		=> $row['total_price'],
				'order_id' 		=> $row['order_id'],
			);	
			
		}
		return $data;
	}
	function getAllorderlist($user_id){

		$order_main_sql = "SELECT nbb_order_main.*
		FROM nbb_order_main 
		WHERE nbb_order_main.user_id = '".$user_id."' AND nbb_order_main.type_flag = 'o'";
		$order_main_query = $this->db->query($order_main_sql); 
		return $order_main_query->result_array();	
	}
	function getshipping_address($user_id){

		$shipping_address_sql = "SELECT nbb_shipping_address.*
		FROM nbb_shipping_address 
		WHERE nbb_shipping_address.user_id = '".$user_id."'";
		$shipping_address_query = $this->db->query($shipping_address_sql); 
		return $shipping_address_query->result_array();	
	}
	function productlistFilterdata($catId,$fromPriceRange,$toPriceRange,$page_num){
		$where = '';
		$limit_per_page = 3;
		$limit = '';
			
			$minusToPriceRange = $toPriceRange - 1;
			if($fromPriceRange != '' || $toPriceRange != ''){
				$where .= " AND nbb_product.price >= '".$fromPriceRange."' AND nbb_product.price <= '".$minusToPriceRange."'";
			}

			if ($page_num) {
				if (isset($page_num)) { $page  = $page_num; } else { $page=1; };  
				$start_from = ($page-1) * $limit_per_page;
				$limit .= " LIMIT $start_from, $limit_per_page";  
			}else{
				$limit .= " LIMIT 0, $limit_per_page";  
			}

			$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
			FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
			FROM nbb_product 
			WHERE nbb_product.product_category_id = '".$catId."' AND nbb_product.status = 1".$where.$limit;
			$product_query = $this->db->query($all_product_sql);
			return $product_data = $product_query->result_array();
				 
	}
	
	function paginationproductlistingdata($catId,$page_num){

		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.product_category_id = '".$catId."' AND nbb_product.status = 1 ";
		$product_query = $this->db->query($all_product_sql);
		$product_data = $product_query->result_array();
		$filterquery_rownum = $product_query->num_rows();

		//$filterproduct=$filterquery->result_array();
		return $filterquery_rownum;
	}
	function SubProductListFilterData($catId,$fromPriceRange,$toPriceRange,$page_num){
		$where = '';
		$limit_per_page = 3;
		$limit = '';
			
			$minusToPriceRange = $toPriceRange - 1;
			if($fromPriceRange != '' || $toPriceRange != ''){
				$where .= " AND nbb_product.price >= '".$fromPriceRange."' AND nbb_product.price <= '".$minusToPriceRange."'";
			}

			if ($page_num) {
				if (isset($page_num)) { $page  = $page_num; } else { $page=1; };  
				$start_from = ($page-1) * $limit_per_page;
				$limit .= " LIMIT $start_from, $limit_per_page";  
			}else{
				$limit .= " LIMIT 0, $limit_per_page";  
			}

			$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
			FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
			FROM nbb_product 
			WHERE nbb_product.sub_child_category_id = '".$catId."' AND nbb_product.status = 1".$where.$limit;
			$product_query = $this->db->query($all_product_sql);
			return $product_data = $product_query->result_array();
				 
	}
	
	function subPaginationProductListingData($catId,$page_num){

		$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.sub_child_category_id = '".$catId."' AND nbb_product.status = 1 ";
		$product_query = $this->db->query($all_product_sql);
		$product_data = $product_query->result_array();
		$filterquery_rownum = $product_query->num_rows();

		//$filterproduct=$filterquery->result_array();
		return $filterquery_rownum;
	}
	function getAllorderDateNumber($id){

		$this->db->select('nbb_order_main.order_number,
		nbb_order_main.order_status,
		nbb_order_main.create_date');
		$this->db->from('nbb_order_main');
		$this->db->where('nbb_order_main.id', $id);
		$order_result = $this->db->get()->result_array();	
		$data = array();			

		foreach($order_result as $row){	
			$data = array(
				'order_status'		=> $row['order_status'],
				'order_number' 		=> $row['order_number'],
				'create_date' 		=> $row['create_date'],
			);	
		}
		return $data;	
	}
	function orderProductlistingdata($order_id = '')
	{
		$order_product_sql  = "SELECT nbb_order_product.*, 
			nbb_product.sku,
			nbb_product.colour,
			nbb_product.name AS product_name,
			nbb_product.weight AS product_weight,
			(SELECT nbb_product_image.image 
			FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_order_product.product_id LIMIT 1) as p_image
			FROM nbb_order_product 
			LEFT JOIN nbb_product ON nbb_product.id = nbb_order_product.product_id 
			WHERE nbb_order_product.order_id = $order_id"; 
		$order_product_query = $this->db->query($order_product_sql);
		$orderProductResult = $order_product_query->result_array();
		return $orderProductResult;

	}
	function getProducttotalPrice($order_id){

		$orderTotal_sql = "SELECT SUM(nbb_order_product.total_price) AS total_price
			FROM nbb_order_product
			WHERE nbb_order_product.order_id = '".$order_id."'";
		$orderTotal_query = $this->db->query($orderTotal_sql); 
		$orderTotal_result = $orderTotal_query->result_array();	
		$data = array();			

		foreach($orderTotal_result as $row){	
			$data = array(
				'total_price' 		=> $row['total_price'],
			);	
			
		}
		return $data;
	}
	function getDelivery_details($order_id){

		$this->db->select('nbb_delivery_details.*,nbb_delivery_status.status_name');
		$this->db->from('nbb_delivery_details');
		$this->db->join('nbb_delivery_status', 'nbb_delivery_status.id = nbb_delivery_details.delivery_status', 'LEFT');
		$this->db->where('nbb_delivery_details.order_id', $order_id);
		$order_result = $this->db->get()->result_array();	
		$data = array();			

		foreach($order_result as $row){	
			$data = array(
				'courierName'			=> $row['courier'],
				'quantity' 				=> $row['quantity'],
				'courier_price' 		=> $row['courier_price'],
				'tacking_number' 		=> $row['tacking_number'],
				'traking_link' 			=> $row['traking_link'],
				'status_name' 			=> $row['status_name'],
				'tacking_details' 		=> $row['tacking_details'],
			);	
		}
		return $data;
	}
	function getBilling_address($user_id){

		$this->db->select('nbb_billing_address.*');
		$this->db->from('nbb_billing_address');
		$this->db->where('nbb_billing_address.user_id', $user_id);
		$order_result = $this->db->get()->result_array();	
		$data = array();			

		foreach($order_result as $row){	
			$data = array(
				'billing_firstname'			=> $row['billing_firstname'],
				'billing_lastname' 			=> $row['billing_lastname'],
				'billing_contactno' 		=> $row['billing_contactno'],
				'billing_country' 		=> $row['billing_country'],
				'billing_address' 			=> $row['billing_address'],
				'billing_postal_code' 			=> $row['billing_postal_code'],
				'billing_hse_blk_no' 		=> $row['billing_hse_blk_no'],
				'billing_unit_no' 		=> $row['billing_unit_no'],
				'billing_street' 		=> $row['billing_street'],
				'billing_hse_blk_no' 		=> $row['billing_hse_blk_no'],
			);	
		}
		return $data;
	}
	function getorderShipping_address($user_id){

		$this->db->select('nbb_shipping_address.*');
		$this->db->from('nbb_shipping_address');
		$this->db->where('nbb_shipping_address.user_id', $user_id);
		$order_result = $this->db->get()->result_array();	
		$data = array();			

		foreach($order_result as $row){	
			$data = array(
				'shipping_firstname'	=> $row['shipping_firstname'],
				'shipping_lastname' 	=> $row['shipping_lastname'],
				'shipping_contactno' 	=> $row['shipping_contactno'],
				'shipping_address' 		=> $row['shipping_address'],
				'shipping_country' 		=> $row['shipping_country'],
				'shipping_hse_blk_no' 	=> $row['shipping_hse_blk_no'],
				'shippingunit_no' 		=> $row['shippingunit_no'],
				'shipping_street' 		=> $row['shipping_street'],
				'shipping_postalcode' 	=> $row['shipping_postalcode'],
				
			);	
		}
		return $data;
	}
}
?>
