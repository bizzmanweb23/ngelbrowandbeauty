<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class OfferAndPackages_Model extends CI_Model
	{
		function getOfferAndPackages(){

			$this->db->select('nbb_packages.*');
			$this->db->from('nbb_packages');
			return $this->db->get()->result_array();
		}
	}
?>
