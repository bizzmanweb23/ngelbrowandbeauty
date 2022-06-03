<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class OfferAndPackages_Model extends CI_Model
	{
		function getOfferAndPackages(){

			$this->db->select('nbb_packages.*');
			$this->db->from('nbb_packages');
			return $this->db->get()->result_array();
		}
		function geteditPackages($id){
			$this->db->select('nbb_packages.*');
			$this->db->from('nbb_packages');
			$this->db->where('nbb_packages.id', $id);
			return $this->db->get()->result_array();
		}
		function getAllPackageProductName($id){

			$this->db->select('nbb_service.service_name AS p_name,nbb_service.id,nbb_service_packages.service_id');
			$this->db->from('nbb_service');
			$this->db->join('nbb_service_packages', 'nbb_service_packages.service_id = nbb_service.id', 'LEFT');
			$multiClause = array('nbb_service_packages.package_id' => $id, 'nbb_service.status' => 1 );
			$this->db->where($multiClause);
			return $this->db->get()->result_array();
		}
		function getAllCoupons(){
			$this->db->select('nbb_coupons.*');
			$this->db->from('nbb_coupons');
			return $this->db->get()->result_array();
		}
		function geteditCoupons($id){
			$this->db->select('nbb_coupons.*');
			$this->db->from('nbb_coupons');
			$multiClause = array('nbb_coupons.id' => $id, 'nbb_coupons.status' => 1 );
			$this->db->where($multiClause);
			return $this->db->get()->result_array();
		}
	}
?>
