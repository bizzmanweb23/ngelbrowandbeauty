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
}
?>
