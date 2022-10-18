<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ProductManagement_model extends CI_Model
{
	function getAllProductCategory()
		{
			$this->db->select('nbb_child_category.*');
			$this->db->from('nbb_child_category');
			return $this->db->get()->result_array();
		}
	function insert_productCategory($data = array())
		{
			$insert = $this->db->insert('nbb_product_category',$data); 
			return true;
		}
	function getProductCategoryData($id){
			$this->db->select('*');
			$this->db->from('nbb_child_category');
			$this->db->where('id',$id);
			return $this->db->get()->result_array();
		}
	function getAllProduct()
		{
			$this->db->select('nbb_product.*,
			nbb_child_category.category_name,
			nbb_supplier.supplier_name,
			nbb_supplier.supplier_name,
			nbb_supplier.supplier_code');
			$this->db->from('nbb_product');
			$this->db->join('nbb_child_category', 'nbb_child_category.id = nbb_product.product_category_id', 'LEFT');
			$this->db->join('nbb_supplier', 'nbb_supplier.id = nbb_product.supplier_id', 'LEFT');
			return $this->db->get()->result_array();
		}
	function getAllProductImage($product_id)
		{
			$this->db->select('nbb_product_image.image AS product_image');
			$this->db->from('nbb_product_image');
			$this->db->where('product_id',$product_id);

			return $this->db->get()->result_array();
		}
	function insertproduct($data = array())
		{
			$insert = $this->db->insert_batch('nbb_product_image',$data); 
			return true;
		}
	function getProductDataEdit($id){
			
		$child_category_sql = "SELECT nbb_product.*,nbb_parentcategory.name AS parentcategory_name
		FROM nbb_product 
		LEFT JOIN nbb_parentcategory ON nbb_parentcategory.id = nbb_product.categorie_id
		WHERE nbb_product.id ='".$id."'";
		$child_category_query = $this->db->query($child_category_sql); 
		return $child_category_query->result_array();	
	}
	function getAllProductName()
	{
		$this->db->select('nbb_product.name AS p_name,nbb_product.id');
		$this->db->from('nbb_product');
		$this->db->where('nbb_product.status','1');
		return $this->db->get()->result_array();
	}
	function getAllChildCategory()
	{
		$this->db->select('nbb_child_category.category_name as child_category_name,nbb_child_category.id');
		$this->db->from('nbb_child_category');
		$this->db->where('nbb_child_category.parent_category_id','2');
		return $this->db->get()->result_array();
	}
	
}
?>
