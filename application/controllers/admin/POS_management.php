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
		$data['services_data'] = $this->ServiceCategory->getAllServices();
        $this->layout->view('add_posSheet',$data);
	}

	public function post_add_orderproduct()
	{
		$customer_phone = $this->input->post('customer_number');
		$customer_fname = $this->input->post('customer_fname');
		$customer_lname = $this->input->post('customer_lname');
		$customer_address = $this->input->post('customer_address');
		$saler_id = $this->input->post('saler_id');
		$stock = '';
		$cal_stock = '';
		$mulserviceId = $_POST['serviceID'];

			$data = array(
				'customer_phone' => $customer_phone,
				'customer_firstname' => $customer_fname,
				'customer_lastname' => $customer_lname,
				'customer_address' => $customer_address,
				'saler_id'			=> $saler_id,
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
				
				if($mulproductid != ''){
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
		
						$orderProductDate = $this->POS->orderProductlistingdata($orderId);
				
						foreach($orderProductDate as $orderProductrow){	
							$product_id = $orderProductrow['product_id'];	
							$alltotal_quantity = $orderProductrow['total_quantity'];	
		
						$producttotalPrice = $this->POS->getproductDetails($product_id);
						$available_stock = $producttotalPrice['available_stock'];
						$cal_stock = $producttotalPrice['available_stock'] - $alltotal_quantity;
		
						$this->db->where('id' , $product_id);
						$this->db->update('nbb_product', array('available_stock'=>$cal_stock));
							
						}
						
					}
				}
					

			if($mulserviceId != ''){
			
				for($i=0;$i < count($mulserviceId);$i++){
					$allmulserviceId = $mulserviceId[$i];
					
					$orderdata = array(
						'order_id' 			=> $orderId,
						'customer_number' 	=> $customer_phone,
						'first_name' 		=> $customer_fname,
						'last_name' 		=> $customer_lname,
						'customer_address' 	=> $customer_address,
						'sales_executive'	=> $saler_id,
						'service_id' 		=> $allmulserviceId,
						'price' 			=> $this->input->post('sirvece_price')[$i],
						'status'			=> 1
					); 
					$result2 = $this->db->insert('nbb_posservice_order',$orderdata); 
					
				}
			
			}
       

		if($result2 == true)
		{
		//$order_product_data = $this->OrderManagement->orderProductlistingdata($orderId);
		$data["productlistingdata"]=$this->OrderManagement->orderProductlistingdata($orderId);
		$data["producttotalPrice"]=$this->OrderManagement->getProducttotalPrice($orderId);
		$data["servicedata"]=$this->OrderManagement->orderservicedata($orderId);
		$data["servicetotalPrice"]=$this->OrderManagement->getservicetotalPrice($orderId);
		$data["customer_address"]= $customer_address;
		$data["customer_fname"]= $customer_fname;
		$data["customer_lname"]= $customer_lname;
		$data["customer_phone"]= $customer_phone;
		$data["order_number"]= $order_number;

		$mpdf = new \Mpdf\Mpdf();
		$html=$this->load->view('GeneratePOSbill',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('billSheet"'.$customer_fname.'_'.$customer_lname.'".pdf','D');

			return redirect('admin/OrderManagement/all_OrderProduct');
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
		
		$product_sql  = "SELECT nbb_product.price,nbb_product.discounted_price,nbb_product.available_stock
			FROM nbb_product
			WHERE nbb_product.id = '".$id."'"; 
			$product_query = $this->db->query($product_sql);
			$product_data = $product_query->result_array();
			$p_price = '';
			$discounted_price = '';
			$price = '';
			$dataArr = array();
			foreach($product_data as $row){
				$discounted_price = $row['discounted_price'];
				$price = $row['price'];
				$available_stock = $row['available_stock'];

				if($discounted_price != 0){
					$p_price = $discounted_price;
				}else if($price != 0){
					$p_price = $price;
				}

				$dataArr []= array(
					'available_stock' 		=> $available_stock,
					'p_price' 		=> $p_price,
				);
			}
		echo json_encode($dataArr);

	}

	public function generateOrderNumber($id)
	{
		return 'NBB' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}
}
?>
