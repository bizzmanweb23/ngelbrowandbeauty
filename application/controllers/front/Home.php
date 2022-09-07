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

			if($email != ''){
	
				$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
				<meta content="width=device-width, initial-scale=1" name="viewport">
			 
			  <style type="text/css">
				  body{
					width:100% !important;
				  }
				  body{
					-webkit-text-size-adjust:none;
				  }
				  body{
					margin:0;
					padding:0;
				  }
				  img{
					border:0;
					height:auto;
					line-height:100%;
					outline:none;
					text-decoration:none;
				  }
				  table td{
					border-collapse:collapse;
				  }
				  #backgroundTable{
					height:100% !important;
					margin:0;
					padding:0;
					width:100% !important;
				  }
				
				  body,#backgroundTable{
					background-color:#FAFAFA;
				  }
			   
				  #templateContainer{
					border:1px none #DDDDDD;
				  }
				
				  #templatePreheader{
					background-color:#FAFAFA;
				  }
				
				  .preheaderContent div{
					color:#505050;
					font-family:Arial;
					font-size:10px;
					line-height:100%;
					text-align:left;
				  }
				
				  .preheaderContent div a:link,.preheaderContent div a:visited,.preheaderContent div a .yshortcuts {
					color:#336699;
					font-weight:normal;
					text-decoration:underline;
				  }
				  .preheaderContent img{
					display:inline;
					height:auto;
					margin-bottom:10px;
					max-width:280px;
				  }
				
				  #templateHeader{
					background-color:#FFFFFF;
					border-bottom:0;
				  }
				
				  .headerContent{
					color:#202020;
					font-family:Arial;
					font-size:34px;
					font-weight:bold;
					line-height:100%;
					padding:0;
					text-align:left;
					vertical-align:middle;
					background-color: #FAFAFA;
					padding-bottom: 14px;
				  }
				
				  .headerContent a:link,.headerContent a:visited,.headerContent a .yshortcuts {
					color:#336699;
					font-weight:normal;
					text-decoration:underline;
				  }
				  #headerImage{
					height:auto;
					max-width:400px !important;
				  }
				
				  #templateContainer,.bodyContent{
					background-color:#FFFFFF;
				  }
			   
				  .bodyContent div{
					color:#505050;
					font-family:Arial;
					font-size:14px;
					line-height:150%;
					text-align:left;
				  }
				
				  .bodyContent div a:link,.bodyContent div a:visited,.bodyContent div a .yshortcuts {
					color:#336699;
					font-weight:normal;
					text-decoration:underline;
				  }
				  .bodyContent img{
					display:inline;
					height:auto;
					margin-bottom:10px;
					max-width:280px;
				  }
				
				  #monkeyRewards img{
					display:inline;
					height:auto;
					max-width:280px;
				  }
			  
				.buttonText {
				  color: #4A90E2;
				  text-decoration: none;
				  font-weight: normal;
				  display: block;
				  border: 2px solid #585858;
				  padding: 10px 80px;
				  font-family: Arial;
				}
			  
				#supportSection, .supportContent {
				  background-color: white;
				  font-family: arial;
				  font-size: 12px;
				  border-top: 1px solid #e4e4e4;
				}
			  
				.bodyContent table {
				  padding-bottom: 10px;
				}
			  
				.headerContent.centeredWithBackground {
				  background-color: #F4EEE2;
				  text-align: center;
				  padding-top: 20px;
				  padding-bottom: 20px;
				}
					
				 @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
						h1 {
							font-size: 40px !important;
						}
						
						.content {
							font-size: 22px !important;
						}
						
						.bodyContent p {
							font-size: 22px !important;
						}
						
						.buttonText {
							font-size: 22px !important;
						}
						
						p {
							
							font-size: 16px !important;    
						}
						
						.mainContainer {
							padding-bottom: 0 !important;   
						}
					}
			  </style>
			</head>
			
			<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="width:100% ;-webkit-text-size-adjust:none;margin:0;padding:0;background-color:#FAFAFA;">
			  <center>
				<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable" style="height:100% ;margin:0;padding:0;width:100% ;background-color:#FAFAFA;">
				  <tr>
					<td align="center" valign="top" style="border-collapse:collapse;">
					  
					  <table border="0" cellpadding="10" cellspacing="0" width="450" id="templatePreheader" style="background-color:#FAFAFA;">
						<tr>
						  <td valign="top" class="preheaderContent" style="border-collapse:collapse;">
							
							<table border="0" cellpadding="10" cellspacing="0" width="100%">
							  <tr>
								<td valign="top" style="border-collapse:collapse;">
								</td>
							  </tr>
							</table>
						
						  </td>
						</tr>
					  </table>
					 
					  <table border="0" cellpadding="0" cellspacing="0" width="450" id="templateContainer" style="border:1px none #DDDDDD;background-color:#FFFFFF;">
						<tr>
						  <td align="center" valign="top" style="border-collapse:collapse;">
							
							<table border="0" cellpadding="0" cellspacing="0" width="450" id="templateHeader" style="background-color:#FFFFFF;border-bottom:0;">
							  <tr>
								<td class="headerContent centeredWithBackground" style="border-collapse:collapse;color:#202020;font-family:Arial;font-size:34px;font-weight:bold;line-height:100%;padding:0;text-align:center;vertical-align:middle;background-color:#F4EEE2;padding-bottom:20px;padding-top:20px;">
								  
								  <img width="130" src="'.site_url('/assets/img/LOGO.png').'" style="width:130px;max-width:130px;border:0;height:auto;line-height:100%;outline:none;text-decoration:none;" id="headerImage campaign-icon">
						
								</td>
							  </tr>
							</table>
						  </td>
						</tr>
						<tr>
						  <td align="center" valign="top" style="border-collapse:collapse;">
							
							<table border="0" cellpadding="0" cellspacing="0" width="450" id="templateBody">
							  <tr>
								<td valign="top" class="bodyContent" style="border-collapse:collapse;background-color:#FFFFFF;">
								
								  <table border="0" cellpadding="20" cellspacing="0" width="100%" style="padding-bottom:10px;">
									<tr>
									  <td valign="top" style="padding-bottom:1rem;border-collapse:collapse;" class="mainContainer">
										<div style="text-align:center;color:#505050;font-family:Arial;font-size:14px;line-height:150%;">
										  <h1 class="h1" style="color:#202020;display:block;font-family:Arial;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">Verify Your Email</h1>
			
										  <p>Please click the button below to verify your email And enter this OTP.&nbsp;&nbsp;<b>'.$otp_number.'</b></p>
										</div>
									  </td>
									</tr>
									<tr>
									  <td align="center" style="border-collapse:collapse;">
										<table border="0" cellpadding="0" cellspacing="0" style="padding-bottom:10px;">
										  <tbody>
											<tr align="center">
											  <td align="center" valign="middle" style="border-collapse:collapse;">
												<a class="buttonText" href="'.site_url('otpVerify').'" target="_blank" style="color: #4A90E2;text-decoration: none;font-weight: normal;display: block;border: 2px solid #585858;padding: 10px 80px;font-family: Arial;">Verify</a>
											  </td>
											</tr>
										  </tbody>
										</table>
									  </td>
									</tr>
								  </table>
								</td>
							  </tr>
							</table>
							
						  </td>
						</tr>
						
					  </table>
					  <br>
					</td>
				  </tr>
				</table>
			  </center>
			</body>
			
			</html>';
				//echo $message;exit;
				log_message('Debug', 'PHPMailer class is loaded.');
				//define('PATH', dirname(__FILE__));
				require_once(APPPATH.'libraries/phpmailer/class.phpmailer.php');
				require_once(APPPATH.'libraries/phpmailer/class.smtp.php');
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPDebug = 0;
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = "tls";
				$mail->Port     = 2525; //465 
				$mail->Username = "2a791aefbf3911";
				$mail->Password = "8cc9702ee73b22";
				$mail->Host     = "smtp.mailtrap.io";//s211.syd1.hostingplatform.net.au
				$mail->Mailer   = "smtp";
				$mail->SetFrom("ciprojectbizz@gmail.com", "Ngel brow & beauty");
				$mail->AddAddress($email);	
				$mail->AddAddress("ciprojectbizz@gmail.com");
				$mail->Subject = "N'gel brow & beauty confirmation";
				$mail->WordWrap   = 80;
				$mail->MsgHTML($message);
				
					if(!$mail->Send()) {
						$data = array('success' => true, 'msg'=> 'Problem in Sending Mail.');
					} else {
						$data = array('success' => true, 'msg'=> 'Please check your Mail for confirmation.');
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
	
					$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
					"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml"><head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"><meta content="width=device-width, initial-scale=1" name="viewport"><title>PropTech Kenya Welcome Email</title>
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
					<td class="" style="color:#444;
										">
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
					//echo $message;exit;
					log_message('Debug', 'PHPMailer class is loaded.');
					//define('PATH', dirname(__FILE__));
					require_once(APPPATH.'libraries/phpmailer/class.phpmailer.php');
					require_once(APPPATH.'libraries/phpmailer/class.smtp.php');
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPDebug = 0;
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = "tls";
					$mail->Port     = 2525; //465 
					$mail->Username = "2a791aefbf3911";
					$mail->Password = "8cc9702ee73b22";
					$mail->Host     = "smtp.mailtrap.io";//s211.syd1.hostingplatform.net.au
					$mail->Mailer   = "smtp";
					$mail->SetFrom("ciprojectbizz@gmail.com", "Ngel brow & beauty");
					$mail->AddAddress($email);	
					$mail->AddAddress("ciprojectbizz@gmail.com");
					$mail->Subject = "N'gel brow & beauty confirmation";
					$mail->WordWrap   = 80;
					$mail->MsgHTML($message);
					
						if(!$mail->Send()) {
							$data = array('success' => true, 'msg'=> 'Problem in Sending Mail.');
						} else {
							$data = array('success' => true, 'msg'=> 'Please check your Mail for confirmation.');
						}
					}
					redirect('login');
			}else{
				$this->session->set_flashdata('msg','Enter Proper OTP'); 
				redirect('otpVerify');
			}

	}
	public function all_home(){ 
       
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/home');
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
   	 
		$serviceId = $this->uri->segment(2);
		//echo $serviceId;exit;
		$data['allservices'] = $this->Header->getAllservicesList($serviceId);
		$data['activeServices'] = $this->Header->getactiveServices($serviceId);

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

    public function products(){ 
		$serviceId = $this->uri->segment(2);
		//echo $serviceId;exit;
		$data['allproducts'] = $this->Header->getAllproductList($serviceId);

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();

		$this->load->view('front/header',$datahader);
		/*$this->load->view('front/login-signup-model', $this->get_roles());*/
        $this->load->view('front/product_list',$data);
		$this->load->view('front/footer');
		 
    }  
    public function courses(){
    	 
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/courses');
		$this->load->view('front/footer');
		 
    }
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


			$billing_data = array(
				'billing_firstname' => $this->input->post('billing_firstname'),
				'billing_lastname' => $this->input->post('billing_lastname'),
				'billing_contactno' => $this->input->post('billing_contactno'),
				'billing_address' => $this->input->post('billing_address'),
				'billing_city' => $this->input->post('billing_city'),
				'billing_state' => $this->input->post('bill_state'),
				'billing_postal_code' => $this->input->post('billing_postal_code'),
				'billing_country' => $this->input->post('billing_country'),
				);
			$billing_address_query = $this->db->query("SELECT * FROM nbb_billing_address WHERE nbb_billing_address.user_id = '".$user_id."'");
			$billing_address_rownum = $billing_address_query->num_rows();
	
			if($billing_address_rownum > 0){
				$this->Main->update('id',$user_id, $billing_data,'nbb_billing_address');  
			}else{
				$this->db->insert('nbb_billing_address', $billing_data);
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
	
					$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
						<meta content="width=device-width, initial-scale=1" name="viewport"><title>PropTech Kenya Welcome Email</title>
					</head>
					<body bgcolor="#fff" class="body" style="padding:20px; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none">
						<h2>Registration link for N`gel brow & beauty</h2>
						<a href="'.$referalLink.'" target="_blank">'.$referalLink.'</a>
					</body>
					</html>';
					log_message('Debug', 'PHPMailer class is loaded.');
					require_once(APPPATH.'libraries/phpmailer/class.phpmailer.php');
					require_once(APPPATH.'libraries/phpmailer/class.smtp.php');
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPDebug = 0;
					$mail->SMTPAuth = true;
					$mail->SMTPSecure = "tls";
					$mail->Port     = 2525; //465 
					$mail->Username = "2a791aefbf3911";
					$mail->Password = "8cc9702ee73b22";
					$mail->Host     = "smtp.mailtrap.io";//s211.syd1.hostingplatform.net.au
					$mail->Mailer   = "smtp";
					$mail->SetFrom("ciprojectbizz@gmail.com", "Ngel brow & beauty");
					$mail->AddAddress($getemail);	
					$mail->AddAddress("ciprojectbizz@gmail.com");
					$mail->Subject = "N'gel brow & beauty";
					$mail->WordWrap   = 80;
					$mail->MsgHTML($message);
					
						if(!$mail->Send()) {
							$data = array('success' => true, 'msg'=> 'Problem in Sending Mail.');
						} else {
							$data = array('success' => true, 'msg'=> 'Please check your Mail for confirmation.');
						}
					}
					redirect('referdToFriend');

	}
	public function registerReferal(){ 
		$user_id=$this->session->userdata('id');
		$data['referal_code'] = $_POST['referal_code'];
		//$data['userReferal'] = $this->Home->getAllcustomerReferalCode($user_id);

		
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/referregister',$data);
		$this->load->view('front/footer');
		 
    }

}
?>
