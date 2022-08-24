<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeadManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library('Csvimport');
		//$this->db2 = $this->load->database('database2', TRUE);

	}
	public function all_leads()
    {
       
       	$data['allLead'] = $this->LeadManagement->getAllLead();
	  	$data['name'] = $this->session->userdata('name');
       	$this->layout->view('all_lead',$data); 
    }
	public function add_lead()
    {
       
	   $data['here_about_us_query'] = $this->LeadManagement->getAllhere_about_us();
	   $data['AdminUser'] = $this->Auth->getAllAdminUser();
       	$data['name'] = $this->session->userdata('name');
       $this->layout->view('add_lead',$data); 
    }
	public function post_add_lead(){
		//extract($_POST);
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $this->input->post('dob'),
			'age' => $this->input->post('age'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'country' => $this->input->post('country'),
			'zip_code' => $this->input->post('zip_code'),
			'comment' => $this->input->post('comment'),
			'reference_name' => $this->input->post('reference_name'),
			'source' => $this->input->post('here_about_us'),
			'source_link' => $this->input->post('source_link'),
			'membership' => $this->input->post('membership'),
			'status' => '1',
			'created_by' => $this->session->userdata('id'),
			'created_at' => date("Y-m-d H:i:s"));

				$insert = $this->Main->insert('nbb_lead',$data); 
				$insert_id = $this->db->insert_id();
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
						$uploadPath = 'uploads/lead_img/';
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
						$update=$this->Main->update('id',$insert_id, $uploadImgData,'nbb_lead');         
					} 

				}
				else
				{
					$errorUploadType = 'Some problem occurred, please try again.';
				}                   
		if($insert == true){
			
			redirect('leads');   
		}	
		              
    }
	public function edit_lead()
    {
		$leadId = $this->uri->segment(4);
		$data['leadData'] = $this->LeadManagement->getAllEditLead($leadId);
	   	$data['here_about_us_query'] = $this->LeadManagement->getAllhere_about_us();
	   	$data['AdminUser'] = $this->Auth->getAllAdminUser();
       	$data['name'] = $this->session->userdata('name');
       	$this->layout->view('edit_lead',$data); 
    }
	public function post_edit_lead(){
		//extract($_POST);
		$lead_id = $this->input->post('lead_id');
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $this->input->post('dob'),
			'age' => $this->input->post('age'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'country' => $this->input->post('country'),
			'zip_code' => $this->input->post('zip_code'),
			'comment' => $this->input->post('comment'),
			'reference_name' => $this->input->post('reference_name'),
			'source' => $this->input->post('here_about_us'),
			'source_link' => $this->input->post('source_link'),
			'membership' => $this->input->post('membership'),
			'created_by' => $this->session->userdata('id'));

			$update = $this->Main->update('id',$lead_id, $data,'nbb_lead');  
			
					$this->load->library('upload');
					if($_FILES['profile_picture']['name'] != '')
					{
		
						$_FILES['file']['name']       = $_FILES['profile_picture']['name'];
						$_FILES['file']['type']       = $_FILES['profile_picture']['type'];
						$_FILES['file']['tmp_name']   = $_FILES['profile_picture']['tmp_name'];
						$_FILES['file']['error']      = $_FILES['profile_picture']['error'];
						$_FILES['file']['size']       = $_FILES['profile_picture']['size'];
		
						// File upload configuration
						$uploadPath = 'uploads/lead_img/';
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
						$update2 =$this->Main->update('id',$lead_id, $uploadImgData,'nbb_lead');         
					} 
                
		if($update == true || $update2 == true){
			
			redirect('leads');   
		}	
		              
    }
	public function viewleadDetails(){
		$leadId = $this->uri->segment(4);
		$data['leadData'] = $this->LeadManagement->getAllEditLead($leadId);
	   	$data['here_about_us_query'] = $this->LeadManagement->getAllhere_about_us();
	   	$data['AdminUser'] = $this->Auth->getAllAdminUser();
       	$data['name'] = $this->session->userdata('name');
       	$this->layout->view('view_lead',$data); 
	}
	public function import_csv() {
        
        //Check file is uploaded in tmp folder
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            //validate whether uploaded file is a csv file
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileArr = explode('.', $_FILES['file']['name']);
            $ext = end($fileArr);
            if (($ext == 'csv') && in_array($mime, $csvMimes)) {
                $file = $_FILES['file']['tmp_name'];
                $csvData = $this->csvimport->get_array($file);
                $headerArr = array("first_name", "last_name", "email", "contact","address","city","state","country","zip_code","comment","source");
                if (!empty($csvData)) {
                    //Validate CSV headers
                    $csvHeaders = array_keys($csvData[0]);
                    $headerMatched = 1;
                    foreach ($headerArr as $header) {
                        if (!in_array(trim($header), $csvHeaders)) {
                            $headerMatched = 0;
                        }
                    }
                    if ($headerMatched == 0) {
                        $this->session->set_flashdata("error_msg", "CSV headers are not matched.");
                        redirect('leads');
                    } else {
                        foreach ($csvData as $row) {
                            $lead_data = array(
								'first_name' 	=> $row['first_name'],
								'last_name' 	=> $row['last_name'],
								'email' 		=> $row['email'],
								'contact' 		=> $row['contact'],
								'address' 		=> $row['address'],
								'city' 			=> $row['city'],
								'state' 		=> $row['state'],
								'country' 		=> $row['country'],
								'zip_code' 		=> $row['zip_code'],
								'comment' 		=> $row['comment'],
								'source' 		=> $row['source'],
								'status'   =>  '1',
							);
                            $table_name = "nbb_lead";
                            $this->Main->insert($table_name, $lead_data);
                        }
                        $this->session->set_flashdata("success_msg", "CSV File imported successfully.");
                        redirect('leads');
                    }
                }
            } else {
                $this->session->set_flashdata("error_msg", "Please select CSV file only.");
                redirect('leads');
            }
        } else {
            $this->session->set_flashdata("error_msg", "Please select a CSV file to upload.");
            redirect('leads');
        }
    }
	public function delete_lead()
	{
		if($this->session->has_userdata('id')!=false)
		{
			$leadId = $this->uri->segment(4);
			/*$get_leadImg =$this->LeadManagement->getAllEditLead($leadId);
			$profile_picture = 0;
		foreach($get_leadImg as $get_leadImg_row){
			$profile_picture  = $get_leadImg_row['profile_picture'];	
		}

		unlink(base_url("uploads/lead_img/".$profile_picture));*/
			$result=$this->Main->delete('id',$leadId,'nbb_lead');

		}
		redirect('leads');
	}
}
?>
