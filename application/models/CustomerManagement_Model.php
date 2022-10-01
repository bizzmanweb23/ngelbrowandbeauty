<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerManagement_Model extends CI_Model
{
	function getAllstate(){
		$this->db->select('nbb_state.*');
		$this->db->from('nbb_state');
		return $this->db->get()->result_array();
	}
	function getpdfAllcustomerData($id){
        $this->db->select('nbb_customer.*,
		nbb_shipping_address.shipping_firstname,
		nbb_shipping_address.shipping_lastname,
		nbb_shipping_address.shipping_contactno,
		nbb_shipping_address.shipping_address,
		nbb_shipping_address.shipping_country,
		nbb_shipping_address.shipping_hse_blk_no,
		nbb_shipping_address.shippingunit_no,
		nbb_shipping_address.shipping_street,
		nbb_shipping_address.shipping_postalcode,
		nbb_billing_address.billing_firstname,
		nbb_billing_address.billing_lastname,
		nbb_billing_address.billing_contactno,
		nbb_billing_address.billing_country,
		nbb_billing_address.billing_address,
		nbb_billing_address.billing_postal_code,
		nbb_billing_address.billing_hse_blk_no,
		nbb_billing_address.billing_unit_no,
		nbb_billing_address.billing_street');
        $this->db->from('nbb_customer');
		$this->db->join('nbb_shipping_address','nbb_shipping_address.user_id = nbb_customer.id','LEFT');
		$this->db->join('nbb_billing_address','nbb_billing_address.user_id = nbb_customer.id','LEFT');
        $this->db->where('nbb_customer.id',$id);
        $customer_result = $this->db->get()->result_array();
		$data = array();
		foreach($customer_result as $row){				

			$data = array(
				'id' 				=> $id,
				'referreduser_id' 		=> $row['referreduser_id'],
				'first_name' 	=> $row['first_name'],
				'last_name' => $row['last_name'],
				'dob' 		=> $row['dob'],
				'age' 		=> $row['age'],
				'email' 		=> $row['email'],
				'contact' 		=> $row['contact'],
				'profile_picture' 		=> $row['profile_picture'],
				'created_at' 		=> $row['created_at'],
				'medical_information' 		=> $row['medical_information'],
				'transactional_records' 		=> $row['transactional_records'],
				'skin_conditions' 		=> $row['skin_conditions'],
				'membership' 		=> $row['membership'],
				'shipping_firstname' 		=> $row['shipping_firstname'],
				'shipping_lastname' 		=> $row['shipping_lastname'],
				'shipping_contactno' 		=> $row['shipping_contactno'],
				'shipping_address' 		=> $row['shipping_address'],
				'shipping_country' 		=> $row['shipping_country'],
				'shipping_hse_blk_no' 		=> $row['shipping_hse_blk_no'],
				'shippingunit_no' 		=> $row['shippingunit_no'],
				'shipping_street' 		=> $row['shipping_street'],
				'shipping_postalcode' 		=> $row['shipping_postalcode'],
				'billing_firstname' 		=> $row['billing_firstname'],
				'billing_lastname' 		=> $row['billing_lastname'],
				'billing_contactno' 		=> $row['billing_contactno'],
				'billing_country' 		=> $row['billing_country'],
				'billing_address' 		=> $row['billing_address'],
				'billing_postal_code' 		=> $row['billing_postal_code'],
				'billing_hse_blk_no' 		=> $row['billing_hse_blk_no'],
				'billing_unit_no' 		=> $row['billing_unit_no'],
				'billing_street' 		=> $row['billing_street'],
			);	

		}
		return $data;
    }
}
