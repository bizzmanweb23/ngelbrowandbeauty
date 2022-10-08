<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_modal extends CI_Model
{
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
		WHERE nbb_product.product_category_id = '".$id."'";
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
	function productlistFilterdata($catId,$fromPriceRange,$toPriceRange){
		$where = '';
			/*$limit_per_page = 12;
			$limit = '';*/
		
			
			$minusToPriceRange = $toPriceRange - 1;
			if($fromPriceRange != '' || $toPriceRange != ''){
				$where .= " AND nbb_product.price >= '".$fromPriceRange."' AND nbb_product.price <= '".$minusToPriceRange."'";
			}

			$all_product_sql = "SELECT DISTINCT nbb_product.*, (SELECT nbb_product_image.image 
			FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
			FROM nbb_product 
			WHERE nbb_product.product_category_id = '".$catId."'".$where;
			$product_query = $this->db->query($all_product_sql);
			return $product_data = $product_query->result_array();
				 
	}
}
?>
