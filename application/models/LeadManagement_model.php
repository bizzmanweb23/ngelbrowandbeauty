<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class LeadManagement_model extends CI_Model
{
	function getAllLead()
	{
		$this->db->select('nbb_lead.*,nbb_here_about_us.name as source_name,nbb_users.first_name as admin_name');
		$this->db->from('nbb_lead');
		$this->db->join('nbb_here_about_us', 'nbb_here_about_us.id = nbb_lead.source', 'LEFT');
		$this->db->join('nbb_users', 'nbb_users.id = nbb_lead.reference_name', 'LEFT');
		$this->db->where('nbb_lead.status','1');
		return $this->db->get()->result_array();
	}
	function getAllhere_about_us()
	{
		$this->db->select('nbb_here_about_us.*');
		$this->db->from('nbb_here_about_us');
		return $this->db->get()->result_array();
	}
	function getAllEditLead($Id)
	{
		$this->db->select('nbb_lead.*,nbb_here_about_us.name as source_name,nbb_users.first_name as admin_name');
		$this->db->from('nbb_lead');
		$this->db->join('nbb_here_about_us', 'nbb_here_about_us.id = nbb_lead.source', 'LEFT');
		$this->db->join('nbb_users', 'nbb_users.id = nbb_lead.reference_name', 'LEFT');
		$where = array(
			'nbb_lead.id'   => $Id
			);
		$this->db->where($where);
		$lead_query = $this->db->get()->result_array();
		$data = array();			

		foreach($lead_query as $row){				

			$data = array(
				'id' 			=> $Id,
				'first_name' 	=> $row['first_name'],
				'last_name' 	=> $row['last_name'],
				'dob' 			=> $row['dob'],
				'age' 			=> $row['age'],
				'email' 		=> $row['email'],
				'contact' 		=> $row['contact'],
				'profile_picture' => $row['profile_picture'],
				'address' 		=> $row['address'],
				'city' 			=> $row['city'],
				'state' 		=> $row['state'],
				'country' 		=> $row['country'],
				'admin_name' 		=> $row['admin_name'],
				'zip_code' 		=> $row['zip_code'],
				'created_at' 		=> $row['created_at'],
				'created_by' 		=> $row['created_by'],
				'medical_information' 		=> $row['medical_information'],
				'transactional_records' 		=> $row['transactional_records'],
				'skin_conditions' 		=> $row['skin_conditions'],
				'membership' 		=> $row['membership'],
				'comment' 		=> $row['comment'],
				'reference_name' 		=> $row['reference_name'],
				'source' 		=> $row['source'],
				'source_name' 		=> $row['source_name'],
				'source_link'   => $row['source_link'],
			);	

		}
		return $data;
	}
	
}
?>
