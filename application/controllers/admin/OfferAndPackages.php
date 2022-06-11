<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OfferAndPackages extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('M_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	public function package_list(){

		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		$data['name'] = $this->session->userdata('name');
		$data['productPackages'] = $this->OfferAndPackages->getOfferAndPackages();
	  
       	$this->layout->view('all_packageList',$data); 
	}
	public function add_packageproduct()
    {
		$data['name'] = $this->session->userdata('name');
		$data['serviceName'] = $this->ServiceCategory->getAllServicesPackages();
       	$this->layout->view('add_Packages',$data); 
    }
	public function post_add_package(){

		$data = array(
			'package_name' => $this->input->post('package_name'),
			'package_detail' => $this->input->post('package_detail'),
			'package_price' => $this->input->post('package_price'),
			'package_credits' => $this->input->post('package_credits'),
			'status' => $this->input->post('status'));

			$insert = $this->Main->insert('nbb_packages',$data); 
			$insert_id = $this->db->insert_id();

		$productName = $this->input->post('productName');
		
		$total = count($productName);
		if($productName){
			for($i=0; $i<$total; $i++ ){
				$productName_data = array( 
					'package_id'    =>  $insert_id, 
					'service_id'=>  $productName[$i]
				);
				$insert2 = $this->Main->insert('nbb_service_packages',$productName_data);
			}
		}
		if($insert || $insert2){
			redirect('admin/offerAndPackages/package_list');
		}
	}
	public function fetchMultiProduct(){

		$package_id = $_GET['package_id'];
		
		$nbb_packages_sql  = "SELECT nbb_service_packages.*,nbb_service.service_name AS p_name 
		FROM nbb_service_packages 
		LEFT JOIN nbb_service ON nbb_service.id = nbb_service_packages.service_id 
		WHERE nbb_service_packages.package_id =  $package_id"; 
		$nbb_packages_query = $this->db->query($nbb_packages_sql);
		$nbb_packages_array = $nbb_packages_query->result_array();
		foreach($nbb_packages_array as $packages_row){
			echo $package_productName = "<li>".$packages_row['p_name']."</li>";
		}
	}
	public function edit_packages(){
		$data['name'] = $this->session->userdata('name');
		$allservice_id = array();
		$id = $this->uri->segment(4);	
		$data['productPackages'] = $this->OfferAndPackages->geteditPackages($id);
		
		$data['AllPackageProductName'] = $this->OfferAndPackages->getAllPackageProductName($id);
		$get_productID = $this->OfferAndPackages->getAllPackageProductName($id);
		/*$nbb_packages_sql  = "SELECT nbb_service_packages.service_id FROM nbb_service_packages  WHERE nbb_service_packages.package_id =  $id"; 
		$nbb_packages_query = $this->db->query($nbb_packages_sql);
		$nbb_packages_array = $nbb_packages_query->result_array();*/
		foreach($get_productID as $packages_row){
			array_push($allservice_id, $packages_row['service_id']);
			
		}
		$data['productName'] = $this->ServiceCategory->getPackageServiceName($allservice_id);

       	$this->layout->view('edit_Packages',$data); 
	}
	public function post_update_package(){

		$package_id = $this->input->post('package_id');
		$data = array(
			'package_name' => $this->input->post('package_name'),
			'package_detail' => $this->input->post('package_detail'),
			'package_price' => $this->input->post('package_price'),
			'package_credits' => $this->input->post('package_credits'),
			'status' => $this->input->post('status'));

			$update = $this->Main->update('id',$package_id, $data,'nbb_packages');    

		$productName = $this->input->post('productName');
		
		$this->db->where('package_id', $package_id);
        $this->db->delete('nbb_service_packages');

		$total = count($productName);
		if($productName){
			for($i=0; $i<$total; $i++ ){
				$productName_data = array( 
					'package_id'    =>  $package_id, 
					'service_id'=>  $productName[$i]
				);
				$insert2 = $this->Main->insert('nbb_service_packages',$productName_data);
			}
		}
		if($update || $insert2){
			redirect('admin/offerAndPackages/edit_packages/'.$package_id);
		}
	}
	public function coupons_list(){

		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		$data['name'] = $this->session->userdata('name');
		$data['AllCoupons'] = $this->OfferAndPackages->getAllCoupons();
	  
       	$this->layout->view('all_Coupons',$data); 
	}
	public function add_Coupon(){
		$data['name'] = $this->session->userdata('name');
       	$this->layout->view('add_Coupons',$data); 
	}
	public function post_add_coupon(){

		$coupon_data = array(
			'coupon_code' => $this->input->post('coupon_code'),
			'description' => $this->input->post('description'),
			'discount' => $this->input->post('discount'),
			'start_date' => $this->input->post('start_date'),
			'expiry_date' => $this->input->post('expiry_date'),
			'coupon_loyalty_points' => $this->input->post('loyalty_points'),
			'status' =>$this->input->post('status')
			);
			
			$this->db->insert('nbb_coupons',$coupon_data); 
			$insert_id = $this->db->insert_id();
			
			$this->load->library('upload');
				if($_FILES['couponFiles']['name'] != '')
				{
					$_FILES['file']['name']       = $_FILES['couponFiles']['name'];
					$_FILES['file']['type']       = $_FILES['couponFiles']['type'];
					$_FILES['file']['tmp_name']   = $_FILES['couponFiles']['tmp_name'];
					$_FILES['file']['error']      = $_FILES['couponFiles']['error'];
					$_FILES['file']['size']       = $_FILES['couponFiles']['size'];
	
					// File upload configuration
					$uploadPath = 'uploads/coupon_img/';
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
						$uploadImgData['banner_icon'] = $imageData['file_name'];
					}
					$update=$this->Main->update('id',$insert_id, $uploadImgData,'nbb_coupons');         
				} 
			redirect('admin/offerAndPackages/coupons_list');

	}
	public function edit_coupon(){
		$data['name'] = $this->session->userdata('name');
		$id = $this->uri->segment(4);	
		$data['editCoupons'] = $this->OfferAndPackages->geteditCoupons($id);
       	$this->layout->view('edit_Coupons',$data); 
	}
	public function post_edit_coupon(){

		$coupon_id = $this->input->post('coupon_id');
		$coupon_data = array(
			'coupon_code' => $this->input->post('coupon_code'),
			'description' => $this->input->post('description'),
			'discount' => $this->input->post('discount'),
			'start_date' => $this->input->post('start_date'),
			'expiry_date' => $this->input->post('expiry_date'),
			'coupon_loyalty_points' => $this->input->post('loyalty_points'),
			'status' =>$this->input->post('status')
			);
		
			$update = $this->Main->update('id',$coupon_id, $coupon_data,'nbb_coupons'); 

			$this->load->library('upload');
				if($_FILES['couponFiles']['name'] != '')
				{
					$_FILES['file']['name']       = $_FILES['couponFiles']['name'];
					$_FILES['file']['type']       = $_FILES['couponFiles']['type'];
					$_FILES['file']['tmp_name']   = $_FILES['couponFiles']['tmp_name'];
					$_FILES['file']['error']      = $_FILES['couponFiles']['error'];
					$_FILES['file']['size']       = $_FILES['couponFiles']['size'];
	
					// File upload configuration
					$uploadPath = 'uploads/coupon_img/';
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
						$uploadImgData['banner_icon'] = $imageData['file_name'];
					}
					$update=$this->Main->update('id',$coupon_id, $uploadImgData,'nbb_coupons');         
				} 
			redirect('admin/offerAndPackages/edit_coupon/'.$coupon_id);
	}
	public function deleteCoupon()
	{
		$coupon_id = $this->uri->segment(4);
			$result=$this->Main->delete('id',$coupon_id,'nbb_coupons');
			$CouponsData = $this->OfferAndPackages->geteditCoupons($coupon_id);
			foreach($CouponsData as $CouponImageRow){
			$Coupon_image = $CouponImageRow['image'];
				if(file_exists($Coupon_image)){
					unlink(base_url("uploads/coupon_img/".$Coupon_image));
				}
			}
	}
	public function deletePackage()
	{
	   if($this->session->has_userdata('id')!=false)
	   {
		   $packageId = $this->uri->segment(4);
		   $result=$this->Main->delete('id',$packageId,'nbb_packages');


		$nbb_packages_sql  = "SELECT nbb_service_packages.* FROM nbb_service_packages  WHERE nbb_service_packages.package_id =  $packageId"; 
		$nbb_packages_query = $this->db->query($nbb_packages_sql);
		$nbb_packages_array = $nbb_packages_query->result_array();
		foreach($nbb_packages_array as $packages_row){
			    $packages_product = $packages_row['id'];

				$result2 =$this->Main->delete('id',$packages_product,'nbb_service_packages');
		}

		   if($result==true || $result2 == true)
		   {
			redirect('admin/offerAndPackages/package_list');
		   }
	   }
	}

}

?>
