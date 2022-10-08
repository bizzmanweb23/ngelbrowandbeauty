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
		$customer_phone = $this->input->post('customer_number');
		$customer_fname = $this->input->post('customer_fname');
		$customer_lname = $this->input->post('customer_lname');
		$customer_address = $this->input->post('customer_address');
		

        $data = array(
            'customer_phone' => $customer_phone,
			'customer_firstname' => $customer_fname,
            'customer_lastname' => $customer_lname,
			'customer_address' => $customer_address,
			'order_status'  => 1,
			'type_flag' =>  'O',
			'order_system' => 'POS'
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
			//$order_product_data = $this->OrderManagement->orderProductlistingdata($orderId);
		$data["productlistingdata"]=$this->OrderManagement->orderProductlistingdata($orderId);
		$data["producttotalPrice"]=$this->OrderManagement->getProducttotalPrice($orderId);
		$data["customer_address"]= $customer_address;
		$data["customer_fname"]= $customer_fname;
		$data["customer_lname"]= $customer_lname;
		$data["customer_phone"]= $customer_phone;
		$data["order_number"]= $order_number;
			/*$contain ='<div class="invoice-box">
				<table cellpadding="0" cellspacing="0">
				<tr class="top_rw">
				   <td colspan="3">
					  <h2 style="margin-bottom: 0px;"> N`gel brow & Beauty Invoice</h2>
					  <span style=""> Order Number: '.$order_number.' Date: '.$now.' </span>
				   </td>
					<td  style="width:30%; margin-right: 10px;">
						<!--PaytmMall Order Id: 6580083283-->
				   </td>
				</tr>
					<tr class="top">
						<td colspan="4">
							<table>
								<tr>
									<td>
									<b>N`gel Brow & Beauty </b> <br>
									5 HARPER ROAD , #02-01 <br>SINGAPORE 369673
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr class="information">
						  <td colspan="4">
							<table>
								<tr>
									<td> <b> Billing Address:</b><br>
									'.$customer_fname.' '.$customer_lname.'<br>'.$customer_address.'<br>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="4">
						<table cellspacing="0px" cellpadding="2px">
							<tr class="heading">
								<td style="width:15%; text-align:left;">
									PRODUCT SKU
								</td>
								<td style="width:25%; text-align:left;">
									ITEM
								</td>
								<td style="width:10%; text-align:left;">
									QTY.
								</td>
								<td style="width:10%; text-align:left;">
									PRICE
								</td>
								<td style="width:15%; text-align:left;">
								TOTAL AMOUNT
								</td>
							</tr>';
								$order_product_data = $this->OrderManagement->orderProductlistingdata($orderId);
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
						$contain .='<tr class="item">
									<td style="width:15%;text-align:left;">'
									.$sku.	
									'</td>
									<td style="width:25%;text-align:left;">'
										.$pName.
									'</td>
									<td style="width:10%; text-align:left;">'
										.$total_quantity.
									'</td>
									<td style="width:10%; text-align:left;">'
										.$product_price.	
									'</td>
									<td style="width:15%; text-align:left;">'
										.$total_price.
									'</td>
								</tr>';
							}
			$contain .='</table>
						</td>
					</tr>
					<tr class="total">';
					$total_priceval = $this->OrderManagement->getProducttotalPrice($orderId);
					$total_price = $total_priceval['total_price'];
			$contain .= '<td colspan="4" align="right">  Grand Total :  <b> '.$total_price.' </b> </td>
					</tr>
					<tr class="total">
						  <td colspan="4" align="right">  GST :  <b> </b> </td>
					</tr>
					<tr>
					   <td colspan="4">
						 <table cellspacing="0px" cellpadding="2px">
							<tr>
								<td width="50%">
								<b> Declaration: </b> <br>
		We declare that this invoice shows the actual price of the goods
		described above and that all particulars are true and correct. The
		goods sold are intended for end user consumption and not for resale.
								</td>
								<td>
								 * This is a computer generated invoice and does not
								  require a physical signature
								</td>
							</tr>
						 </table>
					   </td>
					</tr>
				</table>
			</div>
		<style>
			.top_rw{ background-color:#f4f4f4; }
			.td_w{ }
			button{ padding:5px 10px; font-size:14px;}
			.invoice-box {
				max-width: 890px;
				margin: auto;
				padding:10px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, .15);
				font-size: 14px;
				line-height: 24px;
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				color: #555;
			}
			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-bottom: solid 1px #ccc;
			}
			.invoice-box table td {
				padding: 5px;
				vertical-align:middle;
			}
			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}
			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}
			.invoice-box table tr.information table td {
				padding-bottom: 50px;
			}
			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
				font-size:12px;
			}
			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.item td{
				border-bottom: 1px solid #eee;
			}
			.invoice-box table tr.item.last td {
				border-bottom: none;
			}
			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}  
		</style>';*/
		//echo $contain;exit;

		if($result2 == true)
		{
			$mpdf = new \Mpdf\Mpdf();
			$html=$this->load->view('GeneratePOSbill',$data,true);
			$mpdf->WriteHTML($html);
			$mpdf->Output('billSheet"'.$customer_fname.'_'.$customer_lname.'".pdf','D');
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
		
		$nbb_customer_sql  = "SELECT nbb_customer.id,
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
				$customer_id = $row['id'];
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$shipping_address = $row['shipping_address'];
	
				
					$dataArr []= array(
						'customer_id' 		=> $customer_id,
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
