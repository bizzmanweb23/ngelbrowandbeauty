<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->library('session');
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}

	public function get_roles(){
		$this->db->select('*');
		$this->db->from('nbb_roles');
		$data = $this->db->get();
		$result['data'] = $data->result_array();
		return $result;
	}
	function login()
	{
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/login');
		$this->load->view('front/footer');
		
	}
	function register()
	{
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/register');
		$this->load->view('front/footer');
		
	}

	public function post_login(){

		if($_SERVER['REQUEST_METHOD']=='POST')
		{	
			$name = $this->input->post('email');
			$emailfield = '';
			$numberfield = '';
			if(is_numeric($name)){
				$numberfield = $this->input->post('email');
			} elseif (filter_var($name, FILTER_VALIDATE_EMAIL)) {
				$emailfield = $this->input->post('email');
			}
			$data = array(
				'email' => $emailfield,
				'contact' => $numberfield,
				'password' => md5($this->input->post('password')),
				);
	
				$check = $this->AuthFront->logindata($data);
				//print_r($check);exit;
				
				if($check == true){
	
					$user = array(
					'id' => $check->id,
					'email' => $check->email,
					);
				// print_r($user);exit;
				$this->session->sess_expiration = '14400';
				$this->session->set_userdata($user);
	
				redirect('home');
			}
			else
			{
				redirect('login');
			}
		}
	}
	public function logout(){
	    $this->session->sess_destroy();
	    redirect('home');
   	} 

	
	
	public function signup(){
			
		
		//Validation Rules
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('contact','Contact','trim|required|min_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

	if($this->form_validation->run() == FALSE){
		$data = array('success' => true, 'msg'=> 'Form has been not submitted Please fillup properly.');
	} else {
		$email = $this->input->post('email');
		
		if($email){
			$ref_number = 'NBB'.random_string('alnum',5);
			$otp_number = random_string('alnum',4);

			$data = array(
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'email'      => $email,
				'contact'      => $this->input->post('contact'),
				'password'      => md5($this->input->post('password')),
				'referreduser_id'=>$ref_number,
				'otp' => $otp_number,
				'status' => '0'
			);

			//Table Insert
			$result = $this->Main->insert('nbb_customer',$data);
			$insert_id = $this->db->insert_id();

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
			$message = '<html>';
			$message .= '<head> 
			<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
			<meta content="width=device-width, initial-scale=1" name="viewport">
			</head>'; 
			$message .= '<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="width:100% ;-webkit-text-size-adjust:none;margin:0;padding:0;background-color:#FAFAFA;">
					<center>
						<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
						<div style="margin:50px auto;width:70%;padding:20px 0">
							<div style="border-bottom:1px solid #eee">
							<a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">N`gel brow & beauty</a>
							</div>
							<p style="font-size:1.1em">Hi,</p>
							<p>Thank you for choosing Our Brand. Use the following OTP to complete your Sign Up procedures. OTP is valid for 5 minutes <h4 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;">'.$otp_number.'</h4></p>
							
							<a href = "'.site_url('otpVerify').'" style= "text-decoration: none;"><h2 style="background: #63d4d6;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">Verify Now</h2></a>
							
						</div>
						</div>
					</center>
				</body>'; 
			$message .= '</html>';
		
		

				$to = $email;
				$subject = "N'gel brow & beauty confirmation";
				$txt = $message;
				

				$retval = mail($to,$subject,$txt,$headers);
		
					if($retval) {
						$data = array('success' => true, 'msg'=> 'Please check your Mail for confirmation.');
					}else {
						$data = array('success' => true, 'msg'=> 'Problem in Sending Mail.');
					}
				
			}
			
			
	}
	echo json_encode($data);
	}
	public function duplicateEmailCheck(){
		
		$email = $_GET['email'];
		
		$emailCheck_sql  = "SELECT nbb_customer.email 
		FROM nbb_customer 
		WHERE nbb_customer.email = '".$email."'"; 
		
		$emailCheck_query = $this->db->query($emailCheck_sql);
		$emailCheck_rownum = $emailCheck_query->num_rows();
		echo json_encode( $emailCheck_rownum );

	}
	public function duplicateCoctactCheck(){
		
		$contact = $_GET['contact'];
		
		$contactCheck_sql  = "SELECT nbb_customer.contact 
		FROM nbb_customer 
		WHERE nbb_customer.contact = '".$contact."'"; 
		
		$contactCheck_query = $this->db->query($contactCheck_sql);
		$contactCheck_rownum = $contactCheck_query->num_rows();
		echo json_encode($contactCheck_rownum);

	}
	function otpadd()
	{
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/enterotp');
		$this->load->view('front/footer');
		
	}
	function add_post_otp(){

		$otp = $this->input->post('otp');
			$getotp = '';
			$getemail = '';
			$getreferreduser_id = '';
			$get_productID = $this->AuthFront->getOtpdata($otp);
			$getotp = $get_productID['otpData'];
			$getemail = $get_productID['email'];
			$getreferreduser_id = $get_productID['referreduser_id'];

			if($getotp == $otp){
				$this->db->where('otp' , $otp);
				$this->db->update('nbb_customer', array('status'=> '1'));

				if($getemail != ''){
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$message = '<html>
					<style type="text/css">
					  @import url(https://fonts.googleapis.com/css?family=Nunito);
					
					  /* Take care of image borders and formatting */
					
					  img {
						max-width: 600px;
						outline: none;
						text-decoration: none;
						-ms-interpolation-mode: bicubic;
					  }
					  html{
						margin: 0;
						padding:0;
					  }
					
					  a {
						text-decoration: none;
						border: 0;
						outline: none;
						color: #bbbbbb;
					  }
					
					  a img {
						border: none;
					  }
					
					  /* General styling */
					
					  td, h1, h2, h3  {
						font-family: Helvetica, Arial, sans-serif;
						font-weight: 400;
					  }
					
					  td {
						text-align: center;
					  }
					
					  body {
						-webkit-font-smoothing:antialiased;
						-webkit-text-size-adjust:none;
						width: 100%;
						height: 100%;
						color: #666;
						background: #fff;
						font-size: 16px;
						height: 100vh;
						width: 100%;
						padding: 0px;
						margin: 0px;
					  }
					
					   table {
						border-collapse: collapse !important;
					  }
					
					  .headline {
						color: #444;
						font-size: 36px;
					  }
					
					 .force-full-width {
					  width: 100% !important;
					 }
					
					
					  </style><style media="screen" type="text/css">
						  @media screen {
							td, h1, h2, h3 {
							  font-family: "Nunito", "Helvetica Neue", "Arial", "sans-serif" !important;
							}
						  }
					  </style><style media="only screen and (max-width: 480px)" type="text/css">
						/* Mobile styles */
						@media only screen and (max-width: 480px) {
					
						  table[class="w320"] {
							width: 320px !important;
						  }
						}
					  </style>
					  <style type="text/css"></style>
					  
					  </head>
					  <body bgcolor="#fff" class="body" style="padding:20px; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none">
					<table align="center" cellpadding="0" cellspacing="0" height="100%" width="100%">
					<tbody><tr>
					<td align="center" bgcolor="#fff" class="" valign="top" width="100%">
					<center class=""><table cellpadding="0" cellspacing="0" class="w320" style="margin: 0 auto;" width="600">
					<tbody><tr>
					<td align="center" class="" valign="top"><table cellpadding="0" cellspacing="0" style="margin: 0 auto;" width="100%">
					</table>
					<table bgcolor="#fff" cellpadding="0" cellspacing="0" class="" style="margin: 0 auto; width: 100%; margin-top: 100px;">
					<tbody style="margin-top: 15px;">
					  <tr class="">
					<td class="">
					<img alt="robot picture" class="" height="155" src="'.site_url('/assets/img/LOGO.png').'" width="155">
					</td>
					</tr>
					<tr class=""><td class="headline">Welcome to N`gel brow & beauty</td></tr>
					<tr>
					<td>
					<center class=""><table cellpadding="0" cellspacing="0" class="" style="margin: 0 auto;" width="75%"><tbody class=""><tr class="">
					<td class="" style="color:#444; font-weight: 400;"><br><br>
					 A property management application that helps you manage your real estate portfolio with ease and efficiency. <br><br>
					  You have successfully been registered to use PropTech as a <em>Landlord</em><br>
					 <br>
					  Your login credentials are provided below:
					<br>
					<span style="font-weight:bold;">Login ID: &nbsp;</span><span style="font-weight:lighter;">'.$getemail.'</span> 
					 <br>
					  <span style="font-weight:bold;">Referral code: &nbsp;</span><span style="font-weight:lighter;">'.$getreferreduser_id.'</span>
					<br><br>  
					<br></td>
					</tr>
					</tbody></table></center>
					</td>
					</tr>
					<tr>
					<td class="">
					<div class="">
					<a style="background-color:#674299;border-radius:4px;color:#fff;display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:normal;line-height:50px;text-align:center;text-decoration:none;width:350px;-webkit-text-size-adjust:none;" href="'.site_url('/home').'">Visit Account and Start Managing</a>
					</div>
					 <br>
					</td>
					</tr>
					</tbody>
					  
					  </table>
					
					<table bgcolor="#fff" cellpadding="0" cellspacing="0" class="force-full-width" style="margin: 0 auto; margin-bottom: 5px:">
					<tbody>
					<tr>
					<td class="" style="color:#444;">
					<p>The password was auto-generated, however feel free to change it 
					  
						<a href="" style="text-decoration: underline;">
						  here</a>
					  
					  </p>
					  </td>
					</tr>
					</tbody></table></td>
					</tr>
					</tbody></table></center>
					</td>
					</tr>
					</tbody></table>
					</body></html>';

				$to = $getemail;
				$subject = "N'gel brow & beauty confirmation";
				$txt = $message;
				

				$retval = mail($to,$subject,$txt,$headers);
		
					if( $retval) {
						redirect('login');
					}else {
						$data = array('success' => true, 'msg'=> 'Problem in Sending Mail.');
					}
				}
					//redirect('login');
			}else{
				$this->session->set_flashdata('msg','Enter Proper OTP'); 
				redirect('otpVerify');
			}

	}
	public function all_home(){ 

		$data['allservices'] = $this->Home->getAllservicesList();
		$data['activeServices'] = $this->Home->getactiveServices();
		$data['allproducts'] = $this->Home->getHomeproductList();

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/home',$data);
		$this->load->view('front/footer');
		 
    }
    public function about(){
     
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/about');
		$this->load->view('front/footer');
		 
    }
    public function services(){
   	 
		$catServiceId = $this->uri->segment(2);
		//echo $serviceId;exit;
		$data['allservices'] = $this->Header->getAllservicesList($catServiceId);
		$data['activeServices'] = $this->Header->getactiveServices($catServiceId);
		$datahader['catagoryName'] = $this->Services->getchild_categoryName($catServiceId);
		$data['packageServices'] = $this->Header->getPackageServices();

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();

		$this->load->view('front/header',$datahader);
        $this->load->view('front/service', $data);
		$this->load->view('front/footer');
		 
    }
	
	public function fetchSearchService(){
		$serviceId = $_POST['serviceid'];
		//echo $serviceId;exit;
		$data['ajaxallservices'] = $this->Header->getSearchService($serviceId);
		
        $this->load->view('front/searchService', $data);
	}
    public function services_details(){
     
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/services-details');
		$this->load->view('front/footer');
		 
    }
    /*public function setvices_list()
    {	
    	$id = $this->uri->segment(2);

    	$this->db->select('*');
   		$this->db->from('nbb_parentcategory b');
   		$this->db->join('nbb_child_category a','b.id = a.parent_category_id');
   		$result = $this->db->get(); 
   		$data['data'] = $result->result_array();  

   		$this->db->select('*');
   		$this->db->from('nbb_child_category');
   		$this->db->where('parent_category_id',$id);
   		$result = $this->db->get();
   		$data['services'] = $result->result_array();

		   $datahader['allchild_category'] = $this->Header->getAllchild_category();
		   $datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		   $datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		   $this->load->view('front/header',$datahader);
        $this->load->view('front/services-details', $data);
		$this->load->view('front/footer');

    }*/ 
   
    public function contact_us(){ 
     
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/contact-us');
		$this->load->view('front/footer');
		 
    }
    public function contact_form()
    {
    	$formData = $this->input->post();

    	$data = array(
    		'customer_name' => $this->input->post('contact-form-name'),
    		'customer_email'=>  $this->input->post('contact-form-email'),
    		'customer_phone'=>  $this->input->post('contact-form-email'),
    		'customer_message'=>  $this->input->post('contact-form-message'),
    	);
    	
    	$result = $this->db->insert('nbb_contact',$data);
    	$not =  array('not', 'Contact us Saved');

    	if($result){
    		$this->session->set_userdata('contact-us', 'Contact us saved');
    		redirect('contactus');

    	} 
    }
    public function contact_email()
    {
    	 
    	$formData = $this->input->post();
    	$data = array(
    		'contact_email'=> $this->input->post('contact-email'),
    	);
    	$result = $this->db->insert('nbb_contact_email',$data);
    	redirect('contactus');
    	 
    }
    public function checkout(){ 
		
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/checkout');
		$this->load->view('front/footer');
		 
    }
	public function my_profile(){ 
		$user_id=$this->session->userdata('id');
		$data['alluser'] = $this->Header->getAlluserData($user_id);
		$data['allMembership'] = $this->Home->getmembership();
		$data['allState'] = $this->Home->getstate();
		
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/user_profile', $data);
		$this->load->view('front/footer');
		 
    }
	public function post_edit_customer(){
		$user_id = $this->input->post('user_id'); 
		$password = $this->input->post('password');
		$new_password = $this->input->post('new_password');
		//echo $user_id; exit;
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $this->input->post('dob'),
			'age' => $this->input->post('age'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'created_by' => $this->session->userdata('id'),
			'created_at' => date("Y-m-d H:i:s"));

			$update =$this->Main->update('id',$user_id, $data,'nbb_customer');
			
			if($new_password != ''){
				$data2 = array(
					'password' => $new_password);
		
					$update =$this->Main->update('id',$user_id, $data2,'nbb_customer');
			}

			$billing_data = array(
				'user_id'  => $user_id,
				'billing_firstname' => $this->input->post('billing_firstname'),
				'billing_lastname' => $this->input->post('billing_lastname'),
				'billing_contactno' => $this->input->post('billing_contactno'),
				'billing_address' => $this->input->post('billing_address'),
				'billing_hse_blk_no' => $this->input->post('billing_hse_blk_no'),
				'billing_unit_no' => $this->input->post('billing_unit_no'),
				'billing_street' => $this->input->post('billing_street'),
				'billing_postal_code' => $this->input->post('billing_postal_code'),
				'billing_country' => $this->input->post('billing_country')
				);

				//print_r($billing_data);exit;
			$billing_address_query = $this->db->query("SELECT * FROM nbb_billing_address WHERE nbb_billing_address.user_id = '".$user_id."'");
			$billing_address_rownum = $billing_address_query->num_rows();
	
			if($billing_address_rownum > 0){
				$this->Main->update('user_id',$user_id, $billing_data,'nbb_billing_address');  
			}else{
				$this->db->insert('nbb_billing_address', $billing_data);
			}

			$shipping_address_query = $this->db->query("SELECT * FROM nbb_shipping_address WHERE nbb_shipping_address.user_id = '".$user_id."'");
			$shipping_address_rownum = $shipping_address_query->num_rows();

			if($this->input->post('billing_shipping_same') == ''){
				$shipping_data = array(
					'user_id' => $user_id,
					'shipping_firstname' => $this->input->post('billing_firstname'),
					'shipping_lastname' => $this->input->post('billing_lastname'),
					'shipping_contactno' => $this->input->post('billing_contactno'),
					'shipping_address' => $this->input->post('billing_address'),
					'shipping_country' => $this->input->post('billing_country'),
					'shipping_hse_blk_no' => $this->input->post('billing_hse_blk_no'),
					'shippingunit_no' => $this->input->post('billing_unit_no'),
					'shipping_street' => $this->input->post('billing_street'),
					'shipping_postalcode' => $this->input->post('billing_postal_code'),
				);
	
				if($shipping_address_rownum > 0){
					$this->Main->update('user_id',$user_id, $shipping_data,'nbb_shipping_address');  
				}else{
					$this->db->insert('nbb_shipping_address', $shipping_data);
				}
				
			}else{
				$shipping_data = array(
					'user_id' => $user_id,
					'shipping_firstname' => $this->input->post('shipping_firstname'),
					'shipping_lastname' => $this->input->post('shipping_lastname'),
					'shipping_contactno' => $this->input->post('shipping_contactno'),
					'shipping_address' => $this->input->post('shipping_address'),
					'shipping_country' => $this->input->post('shipping_country'),
					'shipping_hse_blk_no' => $this->input->post('shipping_hse_blk_no'),
					'shippingunit_no' => $this->input->post('shippingunit_no'),
					'shipping_street' => $this->input->post('shipping_street'),
					'shipping_postalcode' => $this->input->post('billing_postal_code'),
				);
	
				if($shipping_address_rownum > 0){
					$this->Main->update('user_id',$user_id, $shipping_data,'nbb_shipping_address');  
				}else{
					$this->db->insert('nbb_shipping_address', $shipping_data);
				}
			}
				
				
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
					$update1 =$this->Main->update('id',$user_id, $uploadImgData,'nbb_customer');         
				}
			if($update == true || $update1 == true){
				//$data = array('success' => true, 'msg'=> 'Profile update successfully.');
				$this->session->set_flashdata('status','Profile updated successfully.');
				redirect('myProfile');	
			}			 
	}

	public function ReferdToFriend(){ 
		$user_id=$this->session->userdata('id');
		$data['userReferal'] = $this->Home->getAllcustomerReferalCode($user_id);

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/referToFriend', $data);
		$this->load->view('front/footer');
		 
    }
	function sentReferalMail(){

		$referalLink = $this->input->post('referalLink');
		$getemail = $this->input->post('email');

				if($getemail != ''){

					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$message = '<html>
					<head>
					</head>
					<body bgcolor="#fff" class="body" style="padding:20px; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none">
						<h2>Registration link for N`gel brow & beauty</h2>
						<a href="'.$referalLink.'" target="_blank">'.$referalLink.'</a>
					</body>
					</html>';

					$to = $getemail;
					$subject = "N'gel brow & beauty Referred";
					$txt = $message;

					$retval = mail($to,$subject,$txt,$headers);

					if( $retval) {
						redirect('login');
					}else {
						$data = array('success' => true, 'msg'=> 'Problem in Sending Mail.');
					}
						
					}
					redirect('referdToFriend');

	}
	public function registerReferal(){ 
		$user_id=$this->session->userdata('id');
		//$data['userReferal'] = $this->Home->getAllcustomerReferalCode($user_id);

		
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/referregister');
		$this->load->view('front/footer');
		 
    }
	public function referredSignup(){
		//Validation Rules
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('contact','Contact','trim|required|min_length[10]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

	   if($this->form_validation->run() == FALSE){
		   $data = array('success' => true, 'msg'=> 'Form has been not submitted Please fillup properly.');
	   } else {
		   $email = $this->input->post('email');
		   $ref_number = 'NBB'.random_string('alnum',5);
		   $otp_number = random_string('alnum',4);

		   $data = array(
			   'first_name'    		=> $this->input->post('first_name'),
			   'last_name'     		=> $this->input->post('last_name'),
			   'email'      		=> $email,
			   'contact'      		=> $this->input->post('contact'),
			   'password'      		=> md5($this->input->post('password')),
			   'referred_by'      	=> $this->input->post('referred_by'),
			   'referreduser_id'	=>$ref_number,
			   'otp' 				=> $otp_number,
			   'status' 			=> '0'
		   );

		   //print_r($data);exit;

		   $result = $this->Main->insert('nbb_customer',$data);
		   $insert_id = $this->db->insert_id();

		   if($email != ''){
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			   $message = '<html>
		   
		   <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="width:100% ;-webkit-text-size-adjust:none;margin:0;padding:0;background-color:#FAFAFA;">
			 <center>
			 <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
			 <div style="margin:50px auto;width:70%;padding:20px 0">
			   <div style="border-bottom:1px solid #eee">
				 <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">N`gel brow & beauty</a>
			   </div>
			   <p style="font-size:1.1em">Hi,</p>
			   <p>Thank you for choosing Our Brand. Use the following OTP to complete your Sign Up procedures. OTP is valid for 5 minutes <h4 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;">'.$otp_number.'</h4></p>
			   
			   <a href = "'.site_url('otpVerify').'" style= "text-decoration: none;"><h2 style="background: #63d4d6;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">Verify Now</h2></a>
			   
			 </div>
		   </div>
			 </center>
		   </body>
		   
		   </html>';
			   
			  

				   $to = $email;
				   $subject = "N'gel brow & beauty confirmation";
				   $txt = $message;
	   
				   $retval = mail($to,$subject,$txt,$headers);
		
					   if( $retval == true ) {
						   $data = array('success' => true, 'msg'=> 'Please check your Mail for confirmation.');
					   }else {
						   $data = array('success' => true, 'msg'=> 'Problem in Sending Mail.');
					   }
					   
			   }
			   
	   }
	   echo json_encode($data);
   }


}
?>
