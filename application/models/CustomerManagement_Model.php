<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerManagement_Model extends CI_Model
{
	function getAllstate(){
		$this->db->select('nbb_state.*');
		$this->db->from('nbb_state');
		return $this->db->get()->result_array();
	}

}
