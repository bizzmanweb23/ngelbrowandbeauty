<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceCategoryCtl extends CI_Controller {

	public function __construct() {

		parent::__construct();

		//$this->db2 = $this->load->database('database2', TRUE);

	}
    
	public function all_parentCategory()
    {
       $data['parentCategory'] = $this->ServiceCategory->getAllParentCategory();
       $this->layout->view('all_Parentcategory',$data); 
    }
	public function add_parentCategory(){
        if(empty($this->session->has_userdata('id'))){
         redirect('admin');
       }
        $data['name'] = $this->session->userdata('name');
        
        $this->layout->view('add_ParentCategory',$data);
    }
	public function post_add_ParentCategory(){
		
		$Category_data = array(
			'name' => $this->input->post('name'),
			'details' => $this->input->post('details')
		);
		$result = $this->Main->insert('nbb_parentcategory',$Category_data);
		
		if($result == true)
			{
				redirect('admin/ServiceCategoryCtl/all_parentCategory');
			} 
	}
	public function edit_parentCategory(){
		$data['name'] = $this->session->userdata('name');
		$parentCategoryId = $this->uri->segment(4);
		$data['ParentCategoryEdit'] = $this->ServiceCategory->getAllParentCategoryEdit($parentCategoryId);
		$this->layout->view('edit_ParentCategory',$data);
	}
	public function post_edit_ParentCategory(){

		$category_id = $this->input->post('category_id');
		$Category_data = array(
			'name' => $this->input->post('name'),
			'details' => $this->input->post('details')
		);
		
		$result = $this->Main->update('id',$category_id, $Category_data,'nbb_parentcategory');
		if($result == true)
			{

				redirect('admin/ServiceCategoryCtl/all_parentCategory');
			} 
	}
	public function deleteParentCategory()
    {
       if($this->session->has_userdata('id')!=false)
       {
           $parentId=$this->uri->segment(4);
           $result=$this->Main->delete('id',$parentId,'nbb_parentcategory');
           if($result==true)
           {
               redirect('admin/ServiceCategoryCtl/all_parentCategory');
           }
       }
    }
	public function all_category()
    {
       $data['category'] = $this->ServiceCategory->getAllCategory();
       $this->layout->view('all_category',$data); 
    }

	public function add_category(){
        if(empty($this->session->has_userdata('id'))){
         redirect('admin');
       }
        $data['name'] = $this->session->userdata('name');
		$data['parentCategory'] = $this->ServiceCategory->getAllParentCategory();
        
        $this->layout->view('add_nbbCategory',$data);
    }

	public function post_add_category()
	{
		$Category_data = array(
			'parent_category_id' => $this->input->post('parent_category'),
			'category_name' => $this->input->post('name'),
			'category_details' => $this->input->post('details'),
			'status' => $this->input->post('status')
			
		);
		$result = $this->Main->insert('nbb_child_category',$Category_data);
		$insert_id = $this->db->insert_id();
		if($result ==true)
		{
			$this->load->library('upload');
			if($_FILES['product_cat_image']['name'] != '')
			{

				$_FILES['file']['name']       = $_FILES['product_cat_image']['name'];
				$_FILES['file']['type']       = $_FILES['product_cat_image']['type'];
				$_FILES['file']['tmp_name']   = $_FILES['product_cat_image']['tmp_name'];
				$_FILES['file']['error']      = $_FILES['product_cat_image']['error'];
				$_FILES['file']['size']       = $_FILES['product_cat_image']['size'];

				// File upload configuration
				$uploadPath = 'uploads/category_image/';
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
					$uploadImgData['product_cat_image'] = $imageData['file_name'];
				}
				$update=$this->Main->update('id',$insert_id, $uploadImgData,'nbb_child_category');         
			} 

		}
		
		if($result == true)
			{
				redirect('admin/ServiceCategoryCtl/all_category');
			} 

  	}

	public function edit_category(){
			if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		$data['name'] = $this->session->userdata('name');
		$serviceCategoryId = $this->uri->segment(4);
		$data['category'] = $this->ServiceCategory->getAllCategoryEdit($serviceCategoryId);
		$data['parentCategory'] = $this->ServiceCategory->getAllParentCategory();
		$this->layout->view('edit_serviceCategory',$data);
	}
	public function post_edit_servicecategory()
	{
		$servicecategory_id = $this->input->post('servicecategory_id');

			$service_data = array(
				'parent_category_id' => $this->input->post('parent_category'),
				'category_name' => $this->input->post('name'),
				'category_details' => $this->input->post('details'),
				'status' => $this->input->post('status')
			);
			$result = $this->Main->update('id',$servicecategory_id, $service_data,'nbb_child_category');

			if($result ==true)
		{
			$this->load->library('upload');
			if($_FILES['product_cat_image']['name'] != '')
			{

				$_FILES['file']['name']       = $_FILES['product_cat_image']['name'];
				$_FILES['file']['type']       = $_FILES['product_cat_image']['type'];
				$_FILES['file']['tmp_name']   = $_FILES['product_cat_image']['tmp_name'];
				$_FILES['file']['error']      = $_FILES['product_cat_image']['error'];
				$_FILES['file']['size']       = $_FILES['product_cat_image']['size'];

				// File upload configuration
				$uploadPath = 'uploads/category_image/';
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
					$uploadImgData['product_cat_image'] = $imageData['file_name'];
				}
				$update=$this->Main->update('id',$servicecategory_id, $uploadImgData,'nbb_child_category');         
			} 

		}
			
		if($result == true)
			{
				
				redirect('admin/ServiceCategoryCtl/all_category');
			}  
	}
  	public function deleteCategory()
    {
       if($this->session->has_userdata('id')!=false)
       {
           $categoryId=$this->uri->segment(4);
           $result=$this->Main->delete('id',$categoryId,'nbb_child_category');
           if($result==true)
           {
               redirect('allcategory');
           }
           else
           {
               redirect('allcategory');
           }
       }
    }
	public function all_subChildCategory()
    {
       $data['category'] = $this->ServiceCategory->getAllsubChildCategory();
       $this->layout->view('all_subChildCategory',$data); 
    }

	public function add_subChildCategory(){
		$data['ChildCategory'] = $this->ServiceCategory->getAllCategory();
        $this->layout->view('add_sub_childcategory',$data);
    }
	public function post_add_subChildCategory()
	{
		$Category_data = array(
			'child_category' => $this->input->post('child_category'),
			'sub_child_category' => $this->input->post('sub_child_category'),
			'details' => $this->input->post('details'),
			'status' => $this->input->post('status')
			
		);
		$result = $this->Main->insert('nbb_sub_child_category',$Category_data);
		
		if($result == true)
			{
				redirect('admin/ServiceCategoryCtl/all_subChildCategory');
			} 

  	}

	public function edit_subChildcategory(){
		
		$subChildCategoryId = $this->uri->segment(4);
		$data['subchildcategory'] = $this->ServiceCategory->getAllSubChildCategoryEdit($subChildCategoryId);
		$data['ChildCategory'] = $this->ServiceCategory->getAllCategory();
		$this->layout->view('edit_subChildcategory',$data);
	}
	public function post_edit_subChildcategory()
	{
		$servicecategory_id = $this->input->post('subChildcategory_id');

		$Category_data = array(
			'child_category' => $this->input->post('child_category'),
			'sub_child_category' => $this->input->post('sub_child_category'),
			'details' => $this->input->post('details'),
			'status' => $this->input->post('status')
			
		);
			$result = $this->Main->update('id',$servicecategory_id, $Category_data,'nbb_sub_child_category');
			
		if($result == true)
			{
				
				redirect('admin/ServiceCategoryCtl/all_subChildCategory');
			}  
	}
  	public function deletesubChildCategory()
		{
		
			$categoryId=$this->uri->segment(4);
			$result=$this->Main->delete('id',$categoryId,'nbb_sub_child_category');
			if($result==true)
			{
				redirect('admin/ServiceCategoryCtl/all_subChildCategory');
			}
			
		
		}

	public function service()
    {

       $data['service'] = $this->ServiceCategory->getAllServices();
    
       $this->layout->view('all_service',$data);
    }
	public function add_service()
    {
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      	}
       $data['name'] = $this->session->userdata('name');
       $data['category'] = $this->ServiceCategory->getAllParentCategory();
       $this->layout->view('add_nbbservice',$data);
    }
	public function post_add_service()
	{
	  $errorUploadType = "";
	  $statusMsg = "";
		if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
			{
				  $service_name = $this->input->post('service_name');
				  $main_category = $this->input->post('main_category');
				  $service_category = $this->input->post('service_category');
				  $sub_child_category = $this->input->post('sub_child_category');
				  $description = $this->input->post('description');
				  $lowest_price = $this->input->post('lowest_price');
				  $service_price = $this->input->post('service_price');
				  $duration = $this->input->post('duration');
				  $therapist_commission = $this->input->post('therapist_commission');
				  $discountPercentage = $this->input->post('discountPercentage');
				  $discounted_price = $this->input->post('discounted_price');
				  $package_session = $this->input->post('package_session');
				  $package_times_price = $this->input->post('package_times_price');
				  $rating = $this->input->post('rating');
				  $amount = $this->input->post('amount');
				  $priority = $this->input->post('priority');
				  $loyalty_points = $this->input->post('loyalty_points');
				  $status = $this->input->post('status');
				  $filesCount = count($_FILES['files']['name']);
				  for($i = 0; $i < $filesCount; $i++)
				  {
					  $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
					  $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
					  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
					  $_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
					  $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
					  $uploadPath = 'uploads/service_img'; 
					  $config['upload_path'] = $uploadPath; 
					  $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
					  $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
					  $config['max_height'] = "";
					  $config['max_width'] = "";
					  $this->load->library('upload', $config); 
					  $this->upload->initialize($config);

					  if($this->upload->do_upload('file'))
					  {
						  $fileData = $this->upload->data(); 
						  $uploadData[$i]['service_icon'] = $fileData['file_name']; 
						  //$uploadData[$i]['type']=$fileData['file_type'];
						  $uploadData[$i]['service_name'] = $service_name;
						  $uploadData[$i]['main_category_id'] = $main_category;
						  $uploadData[$i]['service_category'] = $service_category;
						  $uploadData[$i]['sub_child_category'] = $sub_child_category;
						  $uploadData[$i]['description'] = $description;
						  $uploadData[$i]['lowest_price'] = $lowest_price;
						  $uploadData[$i]['service_price'] = $service_price;
						  $uploadData[$i]['duration'] = $duration;
						  $uploadData[$i]['therapist_commission'] = $therapist_commission;
						  $uploadData[$i]['commission_amount'] = $amount;
						  $uploadData[$i]['priority'] = $priority;
						  $uploadData[$i]['loyalty_points'] = $loyalty_points;
						  $uploadData[$i]['discount_price'] = $discounted_price;
						  $uploadData[$i]['discount_percent'] = $discountPercentage;
						  $uploadData[$i]['package_session'] = $package_session;
						  $uploadData[$i]['package_times_price'] = $package_times_price;
						  $uploadData[$i]['rating'] = $rating;
						  $uploadData[$i]['status'] = $status;
						  $uploadData[$i]['created_by'] = $this->session->userdata('id');
						  $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
						  $uploadData[$i]['status'] = '1';
						  
					  }
					  else
					  {
						  $errorUploadType .= $_FILES['file']['name'].' | ';
					  }

					  $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
				  }

					  if(!empty($uploadData))
					  {
						  $insert = $this->ServiceCategory->insertService($uploadData); 
						  if($insert==true)
						  {
							  redirect('allservice');
						  }
						  else
						  {
							  $errorUploadType = 'Some problem occurred, please try again.';
						  }                   
					  }
					  else
					  {
						  $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
					  }
			  }
			  else
			  {
				  echo "Please Select File to Upload";
			  }
  	}
	
	public function editService(){
		if(empty($this->session->has_userdata('id'))){
		  redirect('admin');
		}
		$serviceId = $this->uri->segment(4);
		$data['serviceDataEdit'] = $this->ServiceCategory->getServiceDataEdit($serviceId);
		$data['category'] = $this->ServiceCategory->getAllParentCategory();
		$data['ChildCategory'] = $this->ServiceCategory->getAllChildCategory();
		$data['subChildCategory'] = $this->ServiceCategory->getAllsubChildCategory();
		$this->layout->view('edit_service',$data);
   	}
	public function post_edit_service()
	{
		$service_id = $this->input->post('service_id');
			$service_data = array(
				'service_name' => $this->input->post('service_name'),
				'service_category' => $this->input->post('service_category'),
				'sub_child_category' => $this->input->post('sub_child_category'),
				'description' => $this->input->post('description'),
				'lowest_price' => $this->input->post('lowest_price'),
				'service_price' => $this->input->post('service_price'),
				'duration' => $this->input->post('duration'),
				'therapist_commission' => $this->input->post('therapist_commission'),
				'commission_amount' => $this->input->post('amount'),
				'priority' => $this->input->post('priority'),
				'loyalty_points' => $this->input->post('loyalty_points'),
				'discount_percent' => $this->input->post('discountPercentage'),
				'discount_price' => $this->input->post('discounted_price'),
				'package_session' => $this->input->post('package_session'),
				'package_times_price' => $this->input->post('package_times_price'),
				'rating' => $this->input->post('rating'),
				'status' => $this->input->post('status'),
			);
			$result = $this->Main->update('id',$service_id, $service_data,'nbb_service');
			
			$this->load->library('upload');
			if($_FILES['servicefiles']['name'] != '')
			{

				$_FILES['file']['name']       = $_FILES['servicefiles']['name'];
				$_FILES['file']['type']       = $_FILES['servicefiles']['type'];
				$_FILES['file']['tmp_name']   = $_FILES['servicefiles']['tmp_name'];
				$_FILES['file']['error']      = $_FILES['servicefiles']['error'];
				$_FILES['file']['size']       = $_FILES['servicefiles']['size'];

				// File upload configuration
				$uploadPath = 'uploads/service_img';
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
					$uploadImgData['service_icon'] = $imageData['file_name'];
				}
				if(!empty($uploadImgData)){
					$update=$this->Main->update('id',$service_id, $uploadImgData,'nbb_service');
							
				}
			}
			if($update==true || $result == true)
				{
					redirect('allservice');
				}     
	}
	public function deleteService()
	{
		if($this->session->has_userdata('id')!=false)
		{
			$serviceId=$this->uri->segment(4);
			$result=$this->Main->delete('id',$serviceId,'nbb_service');
			if($result==true)
			{
				redirect('allservice');
			}
			else
			{
				redirect('allservice');
			}
		}
	}
	public function appointment()
    {
		$data['therapist'] = $this->ServiceCategory->getAllTherapist();
		$data['service'] = $this->ServiceCategory->getAppointmentServices();
       //	$data['appointment'] = $this->ServiceCategory->getAllTodayAppointment();
	   	$data['allAppointment'] = $this->ServiceCategory->getAllAppointment();
     
       $this->layout->view('appointment',$data);
  	}
	  
	public function add_appointment(){
		if(empty($this->session->has_userdata('id'))){
		 redirect('admin');
	   }
		$data['therapist'] = $this->ServiceCategory->getAllTherapist();
		$data['name'] = $this->session->userdata('name');
		$data['service'] = $this->ServiceCategory->getAllServices();
		$data['addon']  = $this->ServiceCategory->getAllAddon();
		$this->layout->view('add_appointment',$data);
	}
	public function post_add_appointment(){

        extract($_POST);
        $data = array(
			'therapist_id' =>$therapist,
			'customer_number' => $customer_number,
			'customer_name' => $customer_name,
			'services' => implode(',',$service),
			'start_date' => $date,
			'start_time' => $Start_duration,
			'end_date' => $date,
			'end_time' => $End_duration,
			'amount' => $amount,
			'created_by' => $this->session->userdata('id')

            /*'customer_number' => $customer_number,
            'customer_id' => $customer_id,
            'customer_name' => $customer_name,
            'email' => $email,
            'services' => implode(',',$service),
            'therapists' => $therapist,
            'time_slot' => $selected_timeslot,
            'total_amount' => $amount,
            'appointment_date' => $date,
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s")*/
		);  
           // $insert = $this->ServiceCategory->storeAppointment($data); 
			$insert = $this->Main->insert('nbb_dashboard',$data); 
            if($insert == true)
            {
                return redirect('appointment');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }      
    }
	public function update_appointmentStatus()
	{
		$status_appointtmentid = $this->input->post('status_appoinmentid');
		$appointtmentStatus = $this->input->post('status');

		$this->db->where('id' , $status_appointtmentid);
		$this->db->update('nbb_dashboard', array('status'=>$appointtmentStatus));

		redirect('admin/ServiceCategoryCtl/appointment');

	}
	public function deleteAppointment()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $appointmentId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$appointmentId,'nbb_dashboard');
            if($result==true)
            {
                redirect('appointment');
            }
            else
            {
                redirect('appointment');
            }
        }
     }
	public function all_therapists()
		{

			$data['therapist'] = $this->ServiceCategory->getAllTherapist();
			$this->layout->view('all_therapists',$data);
		}

	public function add_therapists(){
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		$data['name'] = $this->session->userdata('name');
		$data['service'] = $this->ServiceCategory->getAllServices();
		$this->layout->view('add_nbbtherapist',$data);
		
	}

    public function post_add_therapist()
      {
        $errorUploadType = "";
        $statusMsg = "";
        if($_POST!=NULL)
        {
            if($this->session->has_userdata('id')!=false)
            {
                if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
                {
                    $name = $this->input->post('name');
                    $age =  $this->input->post('age');
                    $gender = $this->input->post('gender');
                    $service = $this->input->post('service');
                    $checkin = $this->input->post('checkin');
                    $mobile = $this->input->post('mobile');
                    $filesCount = count($_FILES['files']['name']);
                    for($i = 0; $i < $filesCount; $i++)
                    {
                        $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                        $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                        $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                        $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                        $uploadPath = 'uploads/'; 
                        $config['upload_path'] = $uploadPath; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
                        $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        $config['max_height'] = "";
                        $config['max_width'] = "";
                        $this->load->library('upload', $config); 
                        $this->upload->initialize($config);

                        if($this->upload->do_upload('file'))
                        {
                            $fileData = $this->upload->data(); 
                            $uploadData[$i]['image'] = $fileData['file_name']; 
                            $uploadData[$i]['name'] = $name;
                            $uploadData[$i]['age'] = $age;
                            $uploadData[$i]['gender'] = $gender;
                            $uploadData[$i]['service_id'] = $service;
                            $uploadData[$i]['checkin'] = $checkin;
                            $uploadData[$i]['mobile'] = $mobile;
                            $uploadData[$i]['created_by'] = $this->session->userdata('id');
                            $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
                            $uploadData[$i]['updated_at'] = date("Y-m-d H:i:s");
                            
                        }
                        else
                        {
                            $errorUploadType .= $_FILES['file']['name'].' | ';
                        }

                        $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    }

                        if(!empty($uploadData))
                        {
                            $insert = $this->ServiceCategory->insert_therapists($uploadData); 
                            if($insert==true)
                            {
                                redirect('alltherapists');
                            }
                            else
                            {
                                $errorUploadType = 'Some problem occurred, please try again.';
                            }                   
                        }
                        else
                        {
                            $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                        }
                }
                else
                {
                    echo "Please Select File to Upload";
                }
            }
            else
            {
                redirect('admin');
            }
        }
        else
        {
            redirect('admin');
        }
    }

    public function deleteTherapist()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $therapistId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$therapistId,'nbb_therapists');
            if($result==true)
            {
                redirect('alltherapists');
            }
            else
            {
                redirect('alltherapists');
            }
        }
    }

	public function customer()
	 {
	
		$data['customer'] = $this->Auth->getAllCustomer();
	  
		$this->layout->view('customers',$data); 
	 }
	 
	 public function add_customer(){
		if(empty($this->session->has_userdata('id'))){
		 redirect('admin');
	   }
		$data['name'] = $this->session->userdata('name');
		
		$this->layout->view('add_customer',$data);
	 
	 }
	 
	 public function post_add_customer(){
			 extract($_POST);
			 $data = array(
				 'first_name' => $first_name,
				 'last_name' => $last_name,
				 'dob' => $dob,
				 'age' => $age,
				 'email' => $email,
				 'contact' => $contact,
				 'address' => $address,
				 'created_by' => $this->session->userdata('id'),
				 'created_at' => date("Y-m-d H:i:s"));
				 $insert = $this->Auth->storeCustomer($data); 
				 echo json_encode($insert);				 
	 }
   
	public function getCustomerByID(){
		 $data=$this->ServiceCategory->getCustomerByID($this->input->get('contact'));
		 echo json_encode($data);
	}

	public function searchAppointmentData()
    {

       $appointment_date = $_GET['appointment_date'];
	   $therapistID = $_GET['therapistID'];
	   $serviceID = $_GET['serviceID'];
	   $statusID = $_GET['statusID'];

		$data['allAppointment'] = $this->ServiceCategory->searchGetAppointmentData($appointment_date,$therapistID,$serviceID,$statusID); 
      
       $this->load->view('appointmentSearchFile',$data); 

    }

}
