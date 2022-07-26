<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProcurementManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	public function all_supplier(){

        $data['all_Supplier']=$this->ProcurementManagement->getAllsupplier();
        $this->layout->view('all_Supplier',$data);

    }
	public function add_Supplier(){

        $data['id'] = $this->session->userdata('id');
        $this->layout->view('add_Supplier',$data);
    }
	public function post_add_Supplier(){

		$data = array(
			'supplier_code' => $this->input->post('supplier_code'),
			'supplier_name' => $this->input->post('supplier_name'),
			'email' => $this->input->post('email'),
			'supplier_address' => $this->input->post('supplier_address'),
			'status' => $this->input->post('status'));

			$insert = $this->Main->insert('nbb_supplier',$data); 
			if($insert){
				redirect('admin/ProcurementManagement/all_supplier');
			}	
	}
	public function deleteSupplier(){
		if($this->session->has_userdata('id')!=false)
	   	{
		   $SupplierId = $this->uri->segment(4);
		   $result = $this->Main->delete('id',$SupplierId,'nbb_supplier');
		   if($result==true)
		   {
			   redirect('admin/ProcurementManagement/all_supplier');
		   }
	  	}
	}
	public function sendEmailSupplier(){

		$data['id'] = $this->session->userdata('id');
		$supplierId = $this->uri->segment(4);
		$data['SupplierData'] = $this->ProcurementManagement->getSupplierData($supplierId);
		$data['product_data'] = $this->OrderManagement->getAllProduct();
        $this->layout->view('supplier_email',$data);
	}

	public function post_add_SendMail(){

		$supplier_code = $this->input->post('supplier_code');
		$supplier_name = $this->input->post('supplier_name');
		$email = $this->input->post('email');
		$mail_subject = $this->input->post('mail_subject');
		$ProductNameQuantity = $this->input->post('ProductNameQuantity');
		$supplier_id = $this->input->post('supplier_id');
		$session_id = $this->session->has_userdata('id');
		$mulproductid = $_POST['productID'];
		$quantity = $_POST['quantity'];
		$productname = $_POST['productname'];
		
		if($email != ''){

			$data = array(
				'supplier_id' => $supplier_id,
				'created_by' => $session_id,
				'order_details' => $ProductNameQuantity,
				'status' => '0');
	
				$insert = $this->Main->insert('nbb_supplier_order',$data); 
				$supplierOrderId = $this->db->insert_id();
				if($insert == true){
					$order_code = $this->generateOrderNumber($supplierOrderId);
					$this->db->where('id' , $supplierOrderId);
					$this->db->update('nbb_supplier_order', array('order_code'=>$order_code));
				}
				for($i=0;$i < count($mulproductid);$i++){

					$allproductID = $mulproductid[$i];
	
					$orderdata = array(
						'supplier_order_id' => $supplierOrderId,
						'product_id' => $allproductID,
						'quantity' => $quantity[$i],
					); 
					$result2 = $this->Main->insert('nbb_supplier_order_product',$orderdata);
					
				}	

			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

				<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
				<head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Welcome</title>
                <style type="text/css">
                body
                {
                    margin: 0;
                    background-color: #f6f6f6;
                    padding: 0;
                    font-family: poppins;
                }

                table
                {
                    border-spacing: 0;

                }

                td
                {
                    padding: 0;
                }

                img
                {
                    border: 0;
                }
                
                .wrapper
                {
                    width: 100%;
                    table-layout: fixed;
                    background-color: #fff;
                    padding-bottom: 60px;
                }
                .webkit
                {
                    background-color: #F6F6F6;
                    max-width: 600px;

                }
                .outer
                {
                    Margin: 0 auto;
                    width: 100%;
                    max-width: 600px;
                    border-spacing: 0;
                    font-family: sans-serif;
                    color: #464e5f;                    
                }
                @media screen and (max-width:600px) {
                    
                }
                @media screen and (max-width:400px){
                    
                }
                </style>
            </head>
            <body>
            <center class="wrapper">
                <div class="webkit">
                    <table class="outer" align="center">
                        <tr>
                            <td>
                                <table width= "100%" style="border-spacing: 0;">
                                    <tr>
                                        <td style="background-color: #F6F6F6; padding: 10px; text-align: center;">
                                            <a href="#"><img src="'.site_url('/assets/img/LOGO.png').'" alt="logo" width="200" title="logo"></a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
						<tr>
                            <td>
                            <table width="100%" style="border-spacing: 0;">
                                <tr>
                                    <td style="padding: 15px;background-color: #f6f6f6;">
                                    <p style="font-size:18px; font-weight: bold;">Hello &nbsp;'.$supplier_name.',</p>
                                    </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
						<tr>
							<td>
								<table width = "100%" style="border-spacing: 0;" role="presentation">
									<tr>
										<td style="padding: 15px;">
											<p style="font-family: poppins; color: #0C1E2F;">'.$ProductNameQuantity.'</p> 
										</td>
									</tr>
									<tr>
										<td style="padding: 10px;">
											<p style="font-family: poppins; color: #0C1E2F;"><b>Order Product list</b></p> 
										</td>
									</tr>
									<tr>
										<td style="padding: 10px;">
											<p style="font-family: poppins; color: #0C1E2F;"><b>Product Name</b></p> 
										</td>
										<td style="padding: 10px;">
											<p style="font-family: poppins; color: #0C1E2F;"><b>Quantity</b></p> 
										</td>
									</tr>';
										for($i=0;$i < count($mulproductid);$i++){
											$allproductID = $mulproductid[$i];
											$showQuantity = $quantity[$i];
											$showProductname = $productname[$i];
	
						$message .=	'<tr>
										<td style="padding: 10px;">
											<p style="font-family: poppins; color: #0C1E2F;">&nbsp;'.$showProductname.'</p> 
										</td>
										<td style="padding: 10px;">
											<p style="font-family: poppins; color: #0C1E2F;">&nbsp;'.$showQuantity.'</p> 
										</td>
										<td></td>
									</tr>';		
										}	
						$message .='<tr>
										<td>
											<a href="'.site_url('admin/ProcurementManagement/sendSupplierApprove/'.$supplierOrderId).'">If you want to approve then click this link</a>
										</td>
									</tr>
									<tr>
										<td>
											<p style="font-family: poppins; color: #0C1E2F;font-weight: bold;font-style: italic;text-transform: capitalize;">Ngel brow & beauty team</p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
                    </table>
                </div>
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
			$mail->Subject = '[Re:#'.$order_code.']'.' '.$mail_subject;
			$mail->WordWrap   = 80;
			$mail->MsgHTML($message);
			
				if(!$mail->Send()) {

				echo $data['successmsg'] = "<p class='error'>Problem in Sending Mail.</p>";

				} else {
				echo $data['successmsg'] = "<p class='success'>Mail Sent Successfully.</p>";
				redirect('admin/ProcurementManagement/all_supplier');
				}
			}
		}
	public function view_OrderProductList(){

			$supplierId = $this->uri->segment(4);
			$data['supplierOrderData'] = $this->ProcurementManagement->getSupplierOrderProduct($supplierId);
			$this->layout->view('view_SupplierOrderProduct',$data);
		}
	public function sendSupplierApprove(){

		$supplierId = $this->uri->segment(4);
		$data['supplierOrderData'] = $this->ProcurementManagement->getSupplierForAppovel($supplierId);
        $this->load->view('supplierApprove_page',$data);
	}
	public function sendSupplierApprovel(){

		$orderId = $this->uri->segment(4);
		$this->db->where('id' , $orderId);
		$this->db->update('nbb_supplier_order', array('status'=> '1'));

		redirect('admin/ProcurementManagement/sendSupplierApprove/'.$orderId);
	}
	public function sendSupplierRejection(){
		
		$orderId = $this->uri->segment(4);
		$this->db->where('id' , $orderId);
		$this->db->update('nbb_supplier_order', array('status'=> '2'));

		redirect('admin/ProcurementManagement/sendSupplierApprove/'.$orderId);
	}
	public function allOrderSupplier(){

		$data['id'] = $this->session->userdata('id');
		$data['OrderSupplierData'] = $this->ProcurementManagement->getAllSupplier_order();
        $this->layout->view('all_supplier_order',$data);
	}
	public function orderSupplierDetails(){

		$OrderSupplierid = $_GET['OrderSupplierid'];
		$order_details = '';
		$supplier_order_sql  = "SELECT nbb_supplier_order.*
		FROM nbb_supplier_order 
		WHERE nbb_supplier_order.id =  $OrderSupplierid"; 
		$supplier_order_query = $this->db->query($supplier_order_sql);
		$supplier_order_array = $supplier_order_query->result_array();
		foreach($supplier_order_array as $packages_row){
			 $order_details = $packages_row['order_details'];
		}
		echo $order_details;
	}
	public function generateOrderNumber($id)
		{
			return 'NBBO' . str_pad($id, 4, 0, STR_PAD_LEFT);
		}
}
?>
