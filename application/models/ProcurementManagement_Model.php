<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ProcurementManagement_Model extends CI_Model
{
	function getAllsupplier()
    {
      $this->db->select('*');
      $this->db->from('nbb_supplier');
      return $this->db->get()->result_array();
    }

	function getSupplierData($supplierId)
	{
			$this->db->select('nbb_supplier.*');
			$this->db->from('nbb_supplier');
			$where = array(
				'nbb_supplier.id'   => $supplierId
				);
			$this->db->where($where);
			$supplier_query = $this->db->get()->result_array();
			$data = array();			

			foreach($supplier_query as $row){				

				$data = array(
					'id' 				=> $supplierId,
					'supplier_code' 			=> $row['supplier_code'],
					'supplier_name' 			=> $row['supplier_name'],
					'email' 	=> $row['email'],
				);	

			}
			return $data;
	}
	function getSupplierForAppovel($orderId)
	{
		$this->db->select('nbb_supplier_order.*,nbb_supplier.supplier_name');
		$this->db->from('nbb_supplier_order');
		$this->db->join('nbb_supplier', 'nbb_supplier.id = nbb_supplier_order.supplier_id', 'LEFT');
		$where = array(
			'nbb_supplier_order.id'   => $orderId
			);
		$this->db->where($where);
		$supplier_query = $this->db->get()->result_array();
		$data = array();			

		foreach($supplier_query as $row){				

			$data = array(
				'orderId' 			=> $orderId,
				'created_at' 		=> $row['created_at'],
				'supplier_name' 	=> $row['supplier_name'],
				'order_code' 		=> $row['order_code'],
				'order_details' 	=> $row['order_details'],
				'status' 			=> $row['status'],
			);	

		}
		return $data;
	}
	function getAllSupplier_order()
	{
		$this->db->select('nbb_supplier_order.*,nbb_supplier.supplier_name');
		$this->db->from('nbb_supplier_order');
		$this->db->join('nbb_supplier', 'nbb_supplier.id = nbb_supplier_order.supplier_id', 'LEFT');
		return $this->db->get()->result_array();
	}
	function getSupplierOrderProduct($id){
		$this->db->select('nbb_supplier_order_product.*,nbb_product.name as p_name');
		$this->db->from('nbb_supplier_order_product');
		$this->db->join('nbb_product', 'nbb_product.id = nbb_supplier_order_product.product_id', 'LEFT');
		$where = array(
			'nbb_supplier_order_product.supplier_order_id'   => $id
			);
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getEditSupplier($id){
		$this->db->select('nbb_supplier.*');
		$this->db->from('nbb_supplier');
		$where = array(
			'nbb_supplier.id'   => $id
			);
		$this->db->where($where);
		$supplier_query = $this->db->get()->result_array();
		$data = array();			

		foreach($supplier_query as $row){				

			$data = array(
				'id' 				=> $id,
				'supplier_code' 	=> $row['supplier_code'],
				'supplier_name' 	=> $row['supplier_name'],
				'email' 			=> $row['email'],
				'supplier_address' 	=> $row['supplier_address'],
				'status' 			=> $row['status'],
			);	

		}
		return $data;
	}

}
?>
