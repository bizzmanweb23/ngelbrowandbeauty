<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class POS_Model extends CI_Model
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
					'available_stock'   => $row['available_stock'],
					'supplier_id'       => $row['supplier_id'],
				);	

			}
			return $data;

	}
	function orderProductlistingdata($order_id = '')
	{
		$order_product_sql  = "SELECT nbb_order_product.*
			FROM nbb_order_product 
			WHERE nbb_order_product.order_id = $order_id"; 
		$order_product_query = $this->db->query($order_product_sql);
		$orderProductResult = $order_product_query->result_array();
		return $orderProductResult;

	}
}
?>
