<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->library('session');
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}

	public function post_add_customer(){
		//extract($_POST);

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $this->input->post('dob'),
			'age' => $this->input->post('age'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'medical_information' => $this->input->post('medical_information'),
			'transactional_records' => $this->input->post('transactional_records'),
			'skin_conditions' => $this->input->post('skin_conditions'),
			'reference_name' => $this->input->post('reference_name'),
			'membership' => $this->input->post('membership'),
			'status' => $this->input->post('status'),
			'created_by' => $this->session->userdata('id'),
			'created_at' => date("Y-m-d H:i:s"));

				$insert = $this->Auth->storeCustomer($data); 
				$insert_id = $this->db->insert_id();
				if($insert==true)
				{
					$ref_number = 'NBB'. random_string('alnum',5);

					$this->db->where('id' , $insert_id);
					$this->db->update('nbb_customer', array('referreduser_id'=>$ref_number));
				}

				if($insert==true)
				{
					$this->load->library('upload');
					if($_FILES['profile_picture']['name'] != '')
					{
		
						$_FILES['file']['name']       = $_FILES['profile_picture']['name'];
						$_FILES['file']['type']       = $_FILES['profile_picture']['type'];
						$_FILES['file']['tmp_name']   = $_FILES['profile_picture']['tmp_name'];
						$_FILES['file']['error']      = $_FILES['profile_picture']['error'];
						$_FILES['file']['size']       = $_FILES['profile_picture']['size'];
		
						// File upload configuration
						$uploadPath = 'uploads/profile_img/';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
						$config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
						$config['max_height'] = "";
						$config['max_width'] = "";
		
						// Load and initialize upload library
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
		
						// Upload file to server
						if($this->upload->do_upload('file')){
							// Uploaded file data
							$imageData = $this->upload->data();
							$uploadImgData['profile_picture'] = $imageData['file_name'];
						}
						$update=$this->Main->update('id',$insert_id, $uploadImgData,'nbb_customer');         
					} 

				}
				else
				{
					$errorUploadType = 'Some problem occurred, please try again.';
				}

				$shipping_data = array(
					'user_id' => $insert_id,
					'shipping_firstname' => $this->input->post('shipping_firstname'),
					'shipping_lastname' => $this->input->post('shipping_lastname'),
					'shipping_contactno' => $this->input->post('shipping_contactno'),
					'shipping_address' => $this->input->post('shipping_address'),
					'shipping_country' => $this->input->post('shipping_country'),
					'shipping_hse_blk_no' => $this->input->post('shipping_hse_blk_no'),
					'shippingunit_no' => $this->input->post('shippingunit_no'),
					'shipping_street' => $this->input->post('shipping_street'),
					'shipping_postalcode' => $this->input->post('shipping_postalcode')
					);
					$this->db->insert('nbb_shipping_address', $shipping_data);
					//used for billing address
					if($this->input->post('billing_shipping_different') != ''){
						$billing_data = array(
							'user_id' => $insert_id,
							'billing_firstname' => $this->input->post('shipping_firstname'),
							'billing_lastname' => $this->input->post('shipping_lastname'),
							'billing_contactno' => $this->input->post('shipping_contactno'),
							'billing_address' => $this->input->post('shipping_address'),
							'billing_country' => $this->input->post('shipping_country'),
							'billing_hse_blk_no' => $this->input->post('shipping_hse_blk_no'),
							'billing_unit_no' => $this->input->post('shippingunit_no'),
							'billing_street' => $this->input->post('shipping_street'),
							'billing_postal_code' => $this->input->post('shipping_postalcode')
						);

						$this->db->insert('nbb_billing_address', $billing_data);	
					}
				                   
			
		redirect('customer');                 
	}

	public function add_customer(){
		if(empty($this->session->has_userdata('id'))){
		 redirect('admin');
		   }
		 $data['AdminUser'] = $this->Auth->getAllAdminUser();
			$data['name'] = $this->session->userdata('name');
 
			$this->layout->view('add_customer',$data);
	 
	 }
	 
	 public function editCustomer(){
		 if(empty($this->session->has_userdata('id'))){
		   redirect('admin');
		 }
		 $customerId = $this->uri->segment(4);
		 $data['AdminUser'] = $this->Auth->getAllAdminUser();
		 $data['allstate'] = $this->CustomerManagement->getAllstate();
		 $data['customerDataForEdit'] = $this->Auth->getCustomerData($customerId);
		 $this->layout->view('edit_Customer',$data);
		}
	public function post_edit_customer(){
	 if(empty($this->session->has_userdata('id'))){
	   redirect('admin');
	 }
		 $customerid = $this->input->post('customerid');
		 $data = array(
			 'first_name' => $this->input->post('first_name'),
			 'last_name' => $this->input->post('last_name'),
			 'dob' => $this->input->post('dob'),
			 'age' => $this->input->post('age'),
			 'email' => $this->input->post('email'),
			 'contact' => $this->input->post('contact'),
			 'address' => $this->input->post('address'),
			 'medical_information' => $this->input->post('medical_information'),
			 'transactional_records' => $this->input->post('transactional_records'),
			 'skin_conditions' => $this->input->post('skin_conditions'),
			 'reference_name' => $this->input->post('reference_name'),
			 'membership' => $this->input->post('membership'),
			 'status' => $this->input->post('status')
 
		 );
		   $result=$this->Main->update('id',$customerid, $data,'nbb_customer');
 
		   $this->load->library('upload');
			 if($_FILES['profile_picture']['name'] != '')
			 {
 
				 $_FILES['file']['name']       = $_FILES['profile_picture']['name'];
				 $_FILES['file']['type']       = $_FILES['profile_picture']['type'];
				 $_FILES['file']['tmp_name']   = $_FILES['profile_picture']['tmp_name'];
				 $_FILES['file']['error']      = $_FILES['profile_picture']['error'];
				 $_FILES['file']['size']       = $_FILES['profile_picture']['size'];
 
				 // File upload configuration
				 $uploadPath = 'uploads/profile_img/';
				 $config['upload_path'] = $uploadPath;
				 $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
				 $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
				 $config['max_height'] = "";
				 $config['max_width'] = "";
 
				 // Load and initialize upload library
				 $this->load->library('upload', $config);
				 $this->upload->initialize($config);
 
				 // Upload file to server
				 if($this->upload->do_upload('file')){
					 // Uploaded file data
					 $imageData = $this->upload->data();
					 $uploadImgData['profile_picture'] = $imageData['file_name'];
				 }
				 if(!empty($uploadImgData)){
					 $update=$this->Main->update('id',$customerid, $uploadImgData,'nbb_customer');         
				 }
			 } 

			$shipping_address_sql="SELECT nbb_shipping_address.id as shipping_id FROM nbb_shipping_address WHERE nbb_shipping_address.user_id = '".$customerid."'";
            $shipping_address_query = $this->db->query($shipping_address_sql);
            $shipping_address_rownum = $shipping_address_query->num_rows();
			
			if($shipping_address_rownum > 0 ){
			$shipping_data = array(
					'shipping_firstname' => $this->input->post('shipping_firstname'),
					'shipping_lastname' => $this->input->post('shipping_lastname'),
					'shipping_contactno' => $this->input->post('shipping_contactno'),
					'shipping_address' => $this->input->post('shipping_address'),
					'shipping_country' => $this->input->post('shipping_country'),
					'shipping_hse_blk_no' => $this->input->post('shipping_hse_blk_no'),
					'shippingunit_no' => $this->input->post('shippingunit_no'),
					'shipping_street' => $this->input->post('shipping_street'),
					'shipping_postalcode' => $this->input->post('shipping_postalcode')
				 );

					$this->db->where('user_id', $customerid);
					$this->db->update('nbb_shipping_address', $shipping_data);
			}else{
				$shipping_data = array(
					'user_id' => $customerid,
					'shipping_firstname' => $this->input->post('shipping_firstname'),
					'shipping_lastname' => $this->input->post('shipping_lastname'),
					'shipping_contactno' => $this->input->post('shipping_contactno'),
					'shipping_address' => $this->input->post('shipping_address'),
					'shipping_country' => $this->input->post('shipping_country'),
					'shipping_hse_blk_no' => $this->input->post('shipping_hse_blk_no'),
					'shippingunit_no' => $this->input->post('shippingunit_no'),
					'shipping_street' => $this->input->post('shipping_street'),
					'shipping_postalcode' => $this->input->post('shipping_postalcode')
				);

					$this->db->insert('nbb_shipping_address', $shipping_data);
			}
		  
			 redirect('admin/CustomerManagement/editCustomer/'. $customerid);
	 } 
	
	public function deleteCustomer()
    {
        if($this->session->has_userdata('id')!=false)
        {
            $customerId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$customerId,'nbb_customer');
            if($result==true)
            {
                redirect('customer');
            }
            else
            {
                redirect('customer');
            }
        }
    } 
}
?>
