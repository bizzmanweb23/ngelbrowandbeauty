<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class POS_management extends CI_Controller {
	
	public function __construct() {

		parent::__construct();
		$this->load->helper('string');
		//$this->db2 = $this->load->database('database2', TRUE);

	}
	function create_pos(){
		$data['name'] = $this->session->userdata('name');
        $data['customer'] = $this->Auth->getAllCustomer();
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['product_data'] = $this->OrderManagement->getAllProduct();
        $this->layout->view('add_posSheet',$data);
	}

	public function post_add_orderproduct()
	{
		$customer_phone = $this->input->post('customer_id');
		$customer_fname = $this->input->post('customer_fname');
		$customer_lname = $this->input->post('customer_lname');
		$customer_address = $this->input->post('customer_address');

        $data = array(
            'customer_phone' => $customer_phone,
			'customer_firstname' => $customer_fname,
            'customer_lastname' => $customer_lname,
			'customer_address' => $customer_address,
			'order_status'  => 1,
			'type_flag' =>  'O'
		); 

			$result = $this->OrderManagement->insertOrder($data);  
			$orderId = $this->db->insert_id();

			$order_number = $this->generateOrderNumber($orderId);			
			$this->db->where('id' , $orderId);
			$this->db->update('nbb_order_main', array('order_number'=>$order_number));

			$mulproductid = $_POST['productID'];
			for($i=0;$i < count($mulproductid);$i++){
				$allproductID = $mulproductid[$i];
				
				$orderdata = array(
					'order_id' => $orderId,
					'product_id' => $allproductID,
					'total_quantity' => $this->input->post('quantity')[$i],
					'total_price' => $this->input->post('totalPrice')[$i],
					'product_price' => $this->input->post('product_price')[$i],
				); 
			 
				$result2 = $this->db->insert('nbb_order_product',$orderdata);  
			
			}
			$contain ='<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<title>Ngelbrowandbeauty</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				
			</head>
			<body>
			
			<div class="container">
			   <div class="col-md-12">
				  <div class="invoice">
					 <!-- begin invoice-company -->
					 <div class="invoice-company text-inverse f-w-600">
						<span class="pull-right hidden-print">
						</span>
					   Ngelbrowandbeauty
					 </div>
					 <!-- end invoice-company -->
					 <!-- begin invoice-header -->
					 <div class="invoice-header">
						<div class="invoice-from">
						   <small>from</small>
						   <address class="m-t-5 m-b-5">
							  <strong class="text-inverse">Ngelbrowandbeauty</strong><br>
							  Singapore<br>
							 7000091<br>
							  Phone: (123) 456-7890<br>
							  Fax: (123) 456-7890
						   </address>
						</div>
						
						<div class="invoice-date">
						   <small>Invoice </small>
						   <div class="date text-inverse m-t-5">September 30,2022</div>
						   <div class="invoice-detail">
							  #0000123DSS<br>
							  Services Product
						   </div>
						</div>
					 </div>
					 <!-- end invoice-header -->
					 <!-- begin invoice-content -->
					 <div class="invoice-content">
						<!-- begin table-responsive -->
						<div class="table-responsive">
						   <table class="table table-invoice">
							  <thead>
							  	<tr>
									<th class="text-left" width="20%">Order No.</th>
									<th class="text-left" width="20%">Product Name</th>
									<th class="text-left" width="20%">Amount</th>
									<th class="text-left" width="20%">Qunatity</th>
									<th class="text-left" width="20%">LINE TOTAL</th>
								</tr>
							  </thead>
							  <tbody>';
							  $order_product_sql = "SELECT nbb_order_product.*,nbb_product.sku,nbb_product.name
							  FROM nbb_order_product
							  LEFT JOIN nbb_product ON nbb_product.id = nbb_order_product.product_id
							  WHERE nbb_order_product.order_id = '".$orderId."'";
								$order_product_query = $this->db->query($order_product_sql);
								$order_product_data = $order_product_query->result_array();
								$sku = '';
									$pName = '';
									$total_quantity = '';
									$product_price = '';
									$total_price = '';
								foreach($order_product_data as $order_product_row){
									$sku = $order_product_row['sku'];
									$pName = $order_product_row['name'];
									$total_quantity = $order_product_row['total_quantity'];
									$product_price = $order_product_row['product_price'];
									$total_price = $order_product_row['total_price'];
									
						$contain .='<tr>
									<td width="20%">#'.$sku.'</td>
									<td width="20%"> '.$pName.'</td>
									<td width="20%">$'.$product_price.'</td>
									<td width="20%">'.$total_quantity.'</td>
									<td width="20%">$'.$total_price.'</td>
								</tr>';

								}
								 
					$contain .= '</tbody>
						   </table>
						</div>
						<div class="invoice-price">
						   <div class="invoice-price-left" style = "text-align: left;">
							  <div class="invoice-price-row">
								 <div class="sub-price">
									<small>Payment Mode</small>
									<span class="text-inverse">Cash</span>
								 </div>
								
							  </div>
						   </div>
						   <div class="invoice-price-right" style = "text-align: right;">';
						   	$order_total_sql = "SELECT SUM(nbb_order_product.`total_price`) as total_price
							FROM nbb_order_product 
							WHERE nbb_order_product.order_id = '".$orderId."'";
						   	$order_total_query = $this->db->query($order_total_sql);
							$order_total_data = $order_total_query->result_array();
							$total_price = '';
								foreach($order_total_data as $order_total_row){
									$total_price = $order_total_row['total_price'];
					$contain .= '<small>TOTAL</small> <span class="f-w-600">$'.$total_price.'</span>';
								}
					$contain .= '</div>
						</div>
						<!-- end invoice-price -->
					 </div>
					 <!-- end invoice-content -->
					 <!-- begin invoice-note -->
					 <div class="invoice-note">
						* Make all cheques payable to [ngelbrown&beauty]<br>
						* Payment is due within 30 days<br>
						* If you have any questions concerning this invoice, contact  [123456789]
					 </div>
					 <!-- end invoice-note -->
					 <!-- begin invoice-footer -->
					 <div class="invoice-footer">
						<p class="text-center m-b-5 f-w-600">
						   THANK YOU
						</p>
						<p class="text-center">
						   <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i>yourwebsite.com</span>
						   <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
						   <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> demo@mail.com</span>
						</p>
					 </div>
					 <!-- end invoice-footer -->
				  </div>
			   </div>
			</div>
			
			<style type="text/css">
			
				table {
					width: 100%;
				}
				
				th {
					text-align: left;
				}
				td {
					text-align: left;
				}
			.invoice-company {
				font-size: 20px
			}
			
			.invoice-header {
				margin: 0 -20px;
				background: #f0f3f4;
				padding: 20px
			}
			
			.invoice-date,
			.invoice-from,
			.invoice-to {
				display: table-cell;
				width: 1%
			}
			
			.invoice-from,
			.invoice-to {
				padding-right: 20px
			}
			
			.invoice-date .date,
			.invoice-from strong,
			.invoice-to strong {
				font-size: 16px;
				font-weight: 600
			}
			
			.invoice-date {
				text-align: right;
				padding-left: 20px
			}
			
			.invoice-price {
				background: #f0f3f4;
				display: table;
				width: 100%
			}
			
			.invoice-price .invoice-price-left,
			.invoice-price .invoice-price-right {
				display: table-cell;
				padding: 20px;
				font-size: 20px;
				font-weight: 600;
				width: 75%;
				position: relative;
				vertical-align: middle
			}
			
			.invoice-price .invoice-price-left .sub-price {
				display: table-cell;
				vertical-align: middle;
				padding: 0 20px
			}
			
			.invoice-price small {
				font-size: 12px;
				font-weight: 400;
				display: block
			}
			
			.invoice-price .invoice-price-row {
				display: table;
				float: left
			}
			
			.invoice-price .invoice-price-right {
				width: 25%;
				background: #2d353c;
				color: #fff;
				font-size: 28px;
				text-align: right;
				vertical-align: bottom;
				font-weight: 300
			}
			
			.invoice-price .invoice-price-right small {
				display: block;
				opacity: .6;
				position: absolute;
				top: 10px;
				left: 10px;
				font-size: 12px
			}
			
			.invoice-footer {
				border-top: 1px solid #ddd;
				padding-top: 10px;
				font-size: 10px
			}
			
			.invoice-note {
				color: #999;
				margin-top: 80px;
				font-size: 85%
			}
			
			.invoice>div:not(.invoice-footer) {
				margin-bottom: 20px
			}
			
			.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
				color: #2d353c;
				background: #fff;
				border-color: #d9dfe3;
			}
			</style>
			
			<script type="text/javascript">
			
			</script>
			</body>
			</html>';
			//echo $contain;exit;

			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($contain);
			$mpdf->Output('billSheet"'.$customer_fname.'_'.$customer_lname.'".pdf','D');

		if($result2 == true)
		{
			return redirect('admin/OrderManagement/all_OrderProduct');
		}
		else
		{
			$errorUploadType = 'Some problem occurred, please try again.';
		}   
    }

	public function customerdetails()
	{
		$id = $this->input->post('Id');
		
		$nbb_customer_sql  = "SELECT
			nbb_customer.first_name,
			nbb_customer.last_name,
			nbb_shipping_address.shipping_address
			FROM nbb_customer
			LEFT JOIN nbb_shipping_address ON nbb_shipping_address.user_id = nbb_customer.id 
			WHERE nbb_customer.contact = '".$id."'"; 
			$nbb_customer_query = $this->db->query($nbb_customer_sql);
			$nbb_customer_data = $nbb_customer_query->result_array();
			$dataArr = array();
			$first_name = '';$last_name = '';$role_name = '';
			foreach($nbb_customer_data as $row){
	
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$shipping_address = $row['shipping_address'];
	
				
					$dataArr []= array(
						'first_name' 		=> $first_name,
						'last_name' 		=> $last_name,
						'shipping_address' 	=> $shipping_address,
					);
	
				}
		echo json_encode($dataArr);

	}
	public function posProductPrice()
	{
		$id = $this->input->post('Id');
		
		$product_sql  = "SELECT nbb_product.price,nbb_product.discounted_price
			FROM nbb_product
			WHERE nbb_product.id = '".$id."'"; 
			$product_query = $this->db->query($product_sql);
			$product_data = $product_query->result_array();
			$p_price = '';
			$discounted_price = '';
			$price = '';
			foreach($product_data as $row){
				$discounted_price = $row['discounted_price'];
				$price = $row['price'];

				if($discounted_price != ''){
					$p_price = $discounted_price;
				}else if($price != ''){
					$p_price = $price;
				}
			}
		echo $p_price;

	}

	public function generateOrderNumber($id)
	{
		return 'NBB' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}
}
?>
