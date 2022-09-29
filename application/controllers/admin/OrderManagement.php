<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('M_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}

	public function showInvoice()
    {
		$order_Id = $_GET['order_Id'];
        $data["invoiceData"]=$this->OrderManagement->showInvoiceDetails($order_Id);

		$mpdf = new \Mpdf\Mpdf();
		
		$html=$this->load->view('GeneratePdfView',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
		/*$html=$this->load->view('GeneratePdfView',$data,true);
		$this->m_pdf->pdf->WriteHTML($html);
		//download it D save F.
		$this->m_pdf->pdf->Output('invoice_"'.$order_Id.'".pdf','D');*/
    }
	public function all_OrderProduct()
    {
       $data['orderProduct'] = $this->OrderManagement->getAllOrderProduct();
	   $data['AllCurrentOrder'] = $this->OrderManagement->getAllCurrentOrder();
	   $data['AllComplatedOrder'] = $this->OrderManagement->getAllComplatedOrder();
	   $data['AllCanceledOrder'] = $this->OrderManagement->getAllCanceledOrder();
       $this->layout->view('all_orderProduct',$data); 
    }
	public function viewDailySales()
    {
       $data['orderProduct'] = $this->OrderManagement->getAllDailySales();
       $this->layout->view('all_DailySales',$data); 
    }
	public function searchDailySalesDate()
    {

       $dailySales_date = $_GET['dailySales_date'];
	   
		$data['orderProduct'] = $this->OrderManagement->searchGetDailySalesData($dailySales_date); 
      
       $this->load->view('dailySalesSearchFile',$data); 

    }
	public function searchFromToSalesDate()
    {

       $dailySales_date = $_GET['dailySales_date'];
	   $toSalesDate = $_GET['toSalesDate'];
	   
		$data['orderProduct'] = $this->OrderManagement->searchGetFromToSalesSalesData($dailySales_date,$toSalesDate); 
      
       $this->load->view('dailySalesSearchFile',$data); 

    }
	public function exportdailySales(){

		$dailySalesDate =  $this->input->post('dailySalesDate');
		$toSalesDate =  $this->input->post('toSalesDate');
		//$DailySalesData = $this->OrderManagement->searchGetDailySalesData($employeeid);
		$DailySalesData =  $this->OrderManagement->searchGetFromToSalesSalesData($dailySalesDate,$toSalesDate);

		$delimiter = ","; 
			$filename = "dailySales_". $dailySalesDate . ".csv"; 

			//$f = fopen("./uploads/Salesdata/".$filename, 'w'); 
			$f = fopen('php://memory', 'w');
			if ($f === false) {
				die('Cannot open the file ' . $filename);
			}

		$header_fields = array('Order Number', 'First Name', 'Last Name', 'Contact No.' ,'address','City','State','Postal code','Email','Payment Name','Order Date','Delivery Date'); 
			fputcsv($f, $header_fields, $delimiter); 

			$SalesData = array();

				foreach($DailySalesData as $orderRow){ 	
					$order_number = $orderRow['order_number'];
					$first_name = $orderRow['first_name'];
					$last_name = $orderRow['last_name'];
					$email = $orderRow['email'];
					$Date = $orderRow['Date'];
					$shipping_contactno = $orderRow['shipping_contactno'];
					$shipping_address = $orderRow['shipping_address'];
					$shipping_city = $orderRow['shipping_city'];
					$shipping_state = $orderRow['shipping_state'];
					$shipping_postalcode = $orderRow['shipping_postalcode'];
					$payment_name = $orderRow['payment_name'];
					$delivery_date = $orderRow['delivery_date'];
					
					$salesData = array($order_number, $first_name,$last_name, $shipping_contactno,$shipping_address,$shipping_city,$shipping_state,$shipping_postalcode,$email,$payment_name,$Date,$delivery_date); 
					//print_r($productData);
				fputcsv($f, $salesData, $delimiter); 
			} 


			rewind($f);
			header('Content-Type: application/csv; charset=UTF-8');
			header('Content-Disposition: attachment; filename="' . $filename . '";');
			fpassthru($f);

	}
	public function add_orderproduct()
    {
       
		$data['customer'] = $this->Auth->getAllCustomer();
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['product_data'] = $this->OrderManagement->getAllProduct();
       	$this->layout->view('addOrderproduct',$data); 

    }
	public function post_add_orderproduct()
	{

        $data = array(
            'user_id' => $this->input->post('customer_id'),
			'saler_id' => $this->input->post('saler_id'),
            'delivery_date' => $this->input->post('delivery_date'),
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
				
				$this->db->where('id' , $allproductID);
				$this->db->update('nbb_product', array('available_stock'=> $this->input->post('stock_now')[$i]));

			}

		if($result2 == true)
		{
			return redirect('admin/OrderManagement/all_OrderProduct');
		}
		else
		{
			$errorUploadType = 'Some problem occurred, please try again.';
		}   
    }
	
	public function fetchOrderproductData()
	{
		$order_id = $_GET['order_id'];
		//echo $order_id;exit;
		$allOrder_productdetails = $this->OrderManagement->orderProductlistingdata($order_id);
		$alldata = array(
		
			'allOrder_productdetails'		=> $allOrder_productdetails,	
		);

		$this->load->view('orderproduct_modal',$alldata); 
	}

	public function create_OrderProduct()
    {
	   $data['product_image'] = $this->OrderManagement->getAllProductimg();
	   $this->layout->view('createOrderProduct',$data);
    }
	public function all_CartProduct()
    {
       
       $data['cartProduct'] = $this->OrderManagement->getAllCartProduct();
       $this->layout->view('cartProduct',$data); 

    }
	public function viewProduct()
    {
       /*$data['cartProduct'] = $this->OrderManagement->getAllCartProduct();
       $this->layout->view('cartProduct',$data); */
	   	$productId = $this->uri->segment(4);
		$data['productData'] = $this->ProductManagement->getProductDataEdit($productId);
	   	$this->layout->view('addToCartProduct');
    }
	
	public function productAvailableStock()
    {
		$productID = $_POST['productID'];
       	$AvailableStock = $this->OrderManagement->getAvailableStockByID($productID);
		echo $AvailableStock;
       //$this->layout->view('all_productCategory',$data); 
    }
	public function viewOrderDetails()
    {
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		$data['name'] = $this->session->userdata('name');
		$data['deliveryPartner'] = $this->OrderManagement->getDeliveryPartner();
		$data['customer_order_status'] = $this->OrderManagement->getCustomerOrderStatus();
		$order_id = $this->uri->segment(4);
		$data['OrderDetails'] = $this->OrderManagement->getAllOrderDetails($order_id);

		$this->layout->view('viewOrderDetails_page',$data);
	}
	public function post_add_delivery()
	{

		$order_id = $this->input->post('order_id');
		$this->db->select('*');
		$this->db->where('order_id',$order_id);
		$query = $this->db->get('nbb_delivery_details');
		$delivery_details_num = $query->num_rows();

        $data = array(
			'order_id' => $order_id,
            'courier' => $this->input->post('courier_name'),
            'courier_price' => $this->input->post('courier_price'),
            'tacking_number' => $this->input->post('tacking_number'),
            'traking_link' => $this->input->post('traking_link'),
            'tacking_details' => $this->input->post('tacking_details'),
            'date_booked' => $this->input->post('date_booked'),
			'delivery_status' => $this->input->post('delivery_status'),
		);  
		if($delivery_details_num > 0){
			$result=$this->Main->update('order_id',$order_id, $data,'nbb_delivery_details');
		}else{

			$result = $this->OrderManagement->insertdelivery($data);
		}    
		if($result == true)
		{
			return redirect('admin/OrderManagement/viewOrderDetails/'.$order_id);
		}
		else
		{
			$errorUploadType = 'Some problem occurred, please try again.';
		}     
    }
	public function all_DeliveryDetails()
    {
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		$data['name'] = $this->session->userdata('name');
		$data['customer_order_status'] = $this->OrderManagement->getCustomerOrderStatus();
       	$data['delivery_details'] = $this->OrderManagement->getDelivery_details();
	  
       	$this->layout->view('all_Deliverydetails',$data); 
    }
	public function editDeliveryDetails()
	{
		if(empty($this->session->has_userdata('id'))){
		  redirect('admin');
		}
		$orderId = $this->uri->segment(4);
		$data['customer_order_status'] = $this->OrderManagement->getCustomerOrderStatus();
		$data['deliveryPartner'] = $this->OrderManagement->getDeliveryPartner();
		$data['deliveryDetails'] = $this->OrderManagement->getAllDeliveryDetailsEdit($orderId);
		$this->layout->view('assign_Deliverydetails',$data);
	}
	public function post_edit_DeliveryDetails()
	{
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		$order_id = $this->input->post('order_id');
		$this->db->select('*');
		$this->db->where('order_id',$order_id);
		$query = $this->db->get('nbb_delivery_details');
		$delivery_details_num = $query->num_rows();

        $data = array(
			'order_id' => $order_id,
            'courier' => $this->input->post('courier_name'),
            'courier_price' => $this->input->post('courier_price'),
            'tacking_number' => $this->input->post('tacking_number'),
            'traking_link' => $this->input->post('traking_link'),
            'tacking_details' => $this->input->post('tacking_details'),
            'date_booked' => $this->input->post('date_booked'),
			'delivery_status' => $this->input->post('delivery_status'),
		);  
		if($delivery_details_num > 0){
			$result=$this->Main->update('order_id',$order_id, $data,'nbb_delivery_details');
		}else{

			$result = $this->OrderManagement->insertdelivery($data);
		}    
		if($result == true)
		{
			return redirect('admin/OrderManagement/editDeliveryDetails/'.$order_id);
		}
		else
		{
			$errorUploadType = 'Some problem occurred, please try again.';
		}      
	}
	public function updatedelivery_status()
	{
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
	
		$delivery_detailsId = $this->input->post('delivery_detailsId');
        $data = array(
			'delivery_status' => $this->input->post('status_name'),
		);  
		
		$result=$this->Main->update('id',$delivery_detailsId, $data,'nbb_delivery_details');
		if($result == true)
		{
			return redirect('admin/OrderManagement/all_DeliveryDetails');
		}
		else
		{
			$errorUploadType = 'Some problem occurred, please try again.';
		}      
	}

	/*function sendsms($mobileno, $message){

		$this->load->helper('sendsms_helper');
		$message = urlencode($message);
		$sender = 'SEDEMO'; 
		$apikey = 'YOUR_API_KEY_HERE';
		$baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;
	
		$url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;    
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, false);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
	
		// Use file get contents when CURL is not installed on server.
		if(!$response){
			$response = file_get_contents($url);
		} 
	}*/
	
	public function showQuantityCheck(){
		
		$product_id = $_GET['product_id'];
		$available_stock = '';
		$available_stock_sql  = "SELECT nbb_product.available_stock 
		FROM nbb_product 
		WHERE nbb_product.id = ".$product_id; 
		
		$available_stock_query = $this->db->query($available_stock_sql);
		foreach($available_stock_query->result_array() as $available_stockRow){
			$available_stock =  $available_stockRow['available_stock'];
		}
		/*$srnCheck_rownum = $available_stock_query->num_rows();*/
		//return json_encode( $available_stock );
		echo $available_stock;

	}
	public function all_Wishlist()
    {
       $data['Wishlist'] = $this->OrderManagement->getAllWishlist();
       $this->layout->view('all_wishlistProduct',$data); 
    }

	public function generateOrderNumber($id)
	{
		return 'NBB' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}
}
?>
