<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('string');
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
		$this->load->view('front/header');
        $this->load->view('front/login');
		$this->load->view('front/footer');
		
	}
	function register()
	{
		$this->load->view('front/header');
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
					  'unique_id' => $check->id,
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
	public function signup(){
		 //Validation Rules
		 $this->form_validation->set_rules('first_name','First Name','trim|required');
		 $this->form_validation->set_rules('last_name','Last Name','trim|required');
		 $this->form_validation->set_rules('email','Email','trim|required|valid_email');
		 $this->form_validation->set_rules('contact','Contact','trim|required|min_length[10]');
		 $this->form_validation->set_rules('password', 'Password', 'required');
		 $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
 

		if($this->form_validation->run() == FALSE){
			//redirect('home');
			$data['successmsg'] = "<p class='error'>Form has been not submitted Please fillup properly.</p>";

        } else {
            //Create Data Array
            $data = array(
                'first_name'    => $this->input->post('first_name'),
                'last_name'     => $this->input->post('last_name'),
                'email'      => $this->input->post('email'),
                'contact'      => $this->input->post('contact'),
                'password'      => md5($this->input->post('password')),
				'status' => '0'
            );

            //Table Insert
            $result = $this->Main->insert('nbb_customer',$data);
			$insert_id = $this->db->insert_id();
				if($result==true)
				{
					$ref_number = 'NBB'. random_string('alnum',5);
					$otp_number = random_string('alnum',5);

					$data2 = array(
						'referreduser_id'=>$ref_number,
						'otp' => $otp_number
					);

					$this->db->where('id' , $insert_id);
					$this->db->update('nbb_customer', $data2);
				}

			if($this->input->post('email') != ''){
	
				$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
				<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
				<meta content="width=device-width, initial-scale=1" name="viewport">
			 
			  <style type="text/css">
				  body{
					width:100% !important;
				  }
				  .ReadMsgBody{
					width:100%;
				  }
				  .ExternalClass{
					width:100%;
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
					/*@editable*/background-color:#FAFAFA;
				  }
			   
				  #templateContainer{
					/*@editable*/border:1px none #DDDDDD;
				  }
				
				  h1,.h1{
					/*@editable*/color:#202020;
					display:block;
					/*@editable*/font-family:Arial;
					/*@editable*/font-size:24px;
					/*@editable*/font-weight:bold;
					/*@editable*/line-height:100%;
					margin-top:20px;
					margin-right:0;
					margin-bottom:20px;
					margin-left:0;
					/*@editable*/text-align:center;
				  }
				
				  h2,.h2{
					/*@editable*/color:#202020;
					display:block;
					/*@editable*/font-family:Arial;
					/*@editable*/font-size:30px;
					/*@editable*/font-weight:bold;
					/*@editable*/line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					/*@editable*/text-align:center;
				  }
				
				  h3,.h3{
					/*@editable*/color:#202020;
					display:block;
					/*@editable*/font-family:Arial;
					/*@editable*/font-size:26px;
					/*@editable*/font-weight:bold;
					/*@editable*/line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					/*@editable*/text-align:center;
				  }
				
				  h4,.h4{
					/*@editable*/color:#202020;
					display:block;
					/*@editable*/font-family:Arial;
					/*@editable*/font-size:22px;
					/*@editable*/font-weight:bold;
					/*@editable*/line-height:100%;
					margin-top:0;
					margin-right:0;
					margin-bottom:10px;
					margin-left:0;
					/*@editable*/text-align:center;
				  }
				
				  #templatePreheader{
					/*@editable*/background-color:#FAFAFA;
				  }
				
				  .preheaderContent div{
					/*@editable*/color:#505050;
					/*@editable*/font-family:Arial;
					/*@editable*/font-size:10px;
					/*@editable*/line-height:100%;
					/*@editable*/text-align:left;
				  }
				
				  .preheaderContent div a:link,.preheaderContent div a:visited,.preheaderContent div a .yshortcuts {
					/*@editable*/color:#336699;
					/*@editable*/font-weight:normal;
					/*@editable*/text-decoration:underline;
				  }
				  .preheaderContent img{
					display:inline;
					height:auto;
					margin-bottom:10px;
					max-width:280px;
				  }
				
				  #templateHeader{
					/*@editable*/background-color:#FFFFFF;
					/*@editable*/border-bottom:0;
				  }
				
				  .headerContent{
					/*@editable*/color:#202020;
					/*@editable*/font-family:Arial;
					/*@editable*/font-size:34px;
					/*@editable*/font-weight:bold;
					/*@editable*/line-height:100%;
					/*@editable*/padding:0;
					/*@editable*/text-align:left;
					/*@editable*/vertical-align:middle;
					background-color: #FAFAFA;
					  padding-bottom: 14px;
				  }
				
				  .headerContent a:link,.headerContent a:visited,.headerContent a .yshortcuts {
					/*@editable*/color:#336699;
					/*@editable*/font-weight:normal;
					/*@editable*/text-decoration:underline;
				  }
				  #headerImage{
					height:auto;
					max-width:400px !important;
				  }
				
				  #templateContainer,.bodyContent{
					/*@editable*/background-color:#FFFFFF;
				  }
			   
				  .bodyContent div{
					/*@editable*/color:#505050;
					/*@editable*/font-family:Arial;
					/*@editable*/font-size:14px;
					/*@editable*/line-height:150%;
					/*@editable*/text-align:left;
				  }
				
				  .bodyContent div a:link,.bodyContent div a:visited,.bodyContent div a .yshortcuts {
					/*@editable*/color:#336699;
					/*@editable*/font-weight:normal;
					/*@editable*/text-decoration:underline;
				  }
				  .bodyContent img{
					display:inline;
					height:auto;
					margin-bottom:10px;
					max-width:280px;
				  }
				
				  #templateFooter{
					/*@editable*/background-color:#FFFFFF;
					/*@editable*/border-top:0;
				  }
				
				  #social{
					/*@editable*/background-color:#FAFAFA;
					/*@editable*/border:0;
				  }
				  #social div{
					/*@editable*/text-align:left;
				  }
				  #utility{
					/*@editable*/background-color:#FFFFFF;
					/*@editable*/border:0;
				  }
				
				  #utility div{
					/*@editable*/text-align:left;
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
												<a class="buttonText" href="'.site_url('/home/'.$this->input->post('email')).'" target="_blank" style="color: #4A90E2;text-decoration: none;font-weight: normal;display: block;border: 2px solid #585858;padding: 10px 80px;font-family: Arial;">Verify</a>
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
				$mail->AddAddress($this->input->post('email'));	
				$mail->AddAddress("ciprojectbizz@gmail.com");
				$mail->Subject = "Welcome To N'gel brow & beauty";
				$mail->WordWrap   = 80;
				$mail->MsgHTML($message);
				
					if(!$mail->Send()) {
	
						$data['successmsg'] = "<p class='error'>Problem in Sending Mail.</p>";
					} else {
						/*$this->session->set_flashdata('msg', 'Please check your Mail for confirmation');
						redirect('register');*/
						$data['successmsg'] = "<p class='error'>Please check your Mail for confirmation.</p>";
					}
				}
				
        }
		echo json_encode($data);
		//redirect('login');
	}
	public function all_home(){ 
       
		$this->load->view('front/header');
//$this->load->view('front/login-signup-model', $this->get_roles());
        $this->load->view('front/home');
		$this->load->view('front/footer');
		 
    }
    public function about(){
     
		$this->load->view('front/header');
		$this->load->view('front/login-signup-model', $this->get_roles());
        $this->load->view('front/about');
		$this->load->view('front/footer');
		 
    }
    public function services(){
   	 
   		$this->db->select('*');
   		$this->db->from('nbb_child_category a');
   		$this->db->join('nbb_parentcategory b','b.id = a.parent_category_id');
   		$result = $this->db->get(); 
   		$data['data'] = $result->result_array(); 
  		 

		$this->load->view('front/header');
		$this->load->view('front/login-signup-model', $this->get_roles());
        $this->load->view('front/services', $data);
		$this->load->view('front/footer');
		 
    }
    public function services_details(){
     
		$this->load->view('front/header');
		$this->load->view('front/login-signup-model', $this->get_roles());
        $this->load->view('front/services-details');
		$this->load->view('front/footer');
		 
    }
    public function setvices_list()
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

   		 
		$this->load->view('front/header');
		$this->load->view('front/login-signup-model', $this->get_roles());
        $this->load->view('front/services-details', $data);
		$this->load->view('front/footer');

    }
    public function products(){ 
      
		$this->load->view('front/header');$this->load->view('front/login-signup-model', $this->get_roles());
        $this->load->view('front/products');
		$this->load->view('front/footer');
		 
    }  
    public function courses(){
    	 
		$this->load->view('front/header');$this->load->view('front/login-signup-model', $this->get_roles());
        $this->load->view('front/courses');
		$this->load->view('front/footer');
		 
    }
    public function contact_us(){ 
     
		$this->load->view('front/header');$this->load->view('front/login-signup-model', $this->get_roles());
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
		
		$this->load->view('front/header');$this->load->view('front/login-signup-model', $this->get_roles());
        $this->load->view('front/checkout');
		$this->load->view('front/footer');
		 
    }


}
?>
