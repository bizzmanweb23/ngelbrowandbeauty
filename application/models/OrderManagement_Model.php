<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class OrderManagement_Model extends CI_Model
{
	public function __construct()
	{
		// Call the CI_Model constructor
		//$this->load->library('m_pdf');
		parent::__construct();

	}
	function getAllProductimg(){

		$product_image_query = $this->db->query("SELECT DISTINCT nbb_product.*,
		(SELECT nbb_product_image.image 
		FROM nbb_product_image 
		WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) AS image 
		FROM nbb_product");

        return $product_image_query->result_array();
    }	
	function getAllProduct()
	{
		$this->db->select('nbb_product.*');
		$this->db->from('nbb_product');
		$where = array(
			'nbb_product.status' => '1'
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getAllemployees()
	{
		$this->db->select('nbb_employees.*');
		$this->db->from('nbb_employees');
		return $this->db->get()->result_array();
	}
	function orderProductlistingdata($order_id = '')
	{
		$order_product_sql  = "SELECT nbb_order_product.*, 
				nbb_product.sku,
				nbb_product.name AS product_name,
				nbb_product.weight AS product_weight
				FROM nbb_order_product 
				LEFT JOIN nbb_product ON nbb_product.id = nbb_order_product.product_id 
				WHERE nbb_order_product.order_id = $order_id"; 
		$order_product_query = $this->db->query($order_product_sql);
		$filterOrderProduct = $order_product_query->result_array();
		return $filterOrderProduct;

		/*$this->db->select('nbb_product.*');
		$this->db->from('nbb_product');
		return $this->db->get()->result_array();*/
	}
	function orderservicedata($order_id = ''){
		$servicet_sql  = "SELECT nbb_posservice_order.*, 
				nbb_service.service_name
				FROM nbb_posservice_order 
				LEFT JOIN nbb_service ON nbb_service.id = nbb_posservice_order.service_id 
				WHERE nbb_posservice_order.order_id = $order_id"; 
		$servicet_query = $this->db->query($servicet_sql);
		$filterservice = $servicet_query->result_array();
		return $filterservice;
	}
	/*function getAvailableStockByID($id){
        $this->db->select('nbb_product.available_stock');
        $this->db->from('nbb_product');
        $this->db->where('nbb_product.id',$id);
        $result= $this->db->get()->row();
        return $result;
    }*/
	function getAllDailySales()
	{
		
		$order_main_sql  = "SELECT nbb_order_main.*,
		nbb_payment_type.payment_name,
		nbb_customer.id,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_shipping_address.shipping_contactno,
		nbb_shipping_address.shipping_address,
		nbb_shipping_address.shipping_hse_blk_no,
		nbb_shipping_address.shippingunit_no,
		nbb_shipping_address.shipping_street,
		nbb_shipping_address.shipping_postalcode
		FROM nbb_order_main 
		LEFT JOIN nbb_customer ON nbb_customer.id = nbb_order_main.user_id 
		LEFT JOIN nbb_shipping_address ON nbb_shipping_address.user_id = nbb_customer.id
		LEFT JOIN nbb_payment_type ON nbb_payment_type.id = nbb_order_main.payment_method 
		WHERE nbb_order_main.type_flag = 'O' AND DATE_FORMAT(nbb_order_main.create_date, '%Y-%m-%d')=  CURDATE()"; 
		$order_main_query = $this->db->query($order_main_sql);
		return $filterOrderProduct = $order_main_query->result_array();
		
	}

	function searchGetDailySalesData($dailySales_date=''){

		$sql_order_main = "SELECT nbb_order_main.*, DATE_FORMAT(nbb_order_main.create_date, '%Y-%m-%d') Date,
		nbb_payment_type.payment_name,
		nbb_customer.id,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_customer.email,
		nbb_shipping_address.shipping_contactno,
		nbb_shipping_address.shipping_address,
		nbb_shipping_address.shipping_hse_blk_no,
		nbb_shipping_address.shippingunit_no,
		nbb_shipping_address.shipping_street,
		nbb_shipping_address.shipping_postalcode
		FROM nbb_order_main 
		LEFT JOIN nbb_customer ON nbb_customer.id = nbb_order_main.user_id 
		LEFT JOIN nbb_shipping_address ON nbb_shipping_address.user_id = nbb_customer.id
		LEFT JOIN nbb_payment_type ON nbb_payment_type.id = nbb_order_main.payment_method 
		WHERE nbb_order_main.type_flag = 'O' AND DATE_FORMAT(nbb_order_main.create_date, '%Y-%m-%d') = '$dailySales_date'";
		
		$order_main_query = $this->db->query($sql_order_main); 
		return $result_order_main = $order_main_query->result_array();	

	}
	function searchGetFromToSalesSalesData($dailySales_date='',$toSalesDate = ''){

		$sql_order_main = "SELECT nbb_order_main.*, DATE_FORMAT(nbb_order_main.create_date, '%Y-%m-%d') Date,
		nbb_payment_type.payment_name,
		nbb_customer.id,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_customer.email,
		nbb_shipping_address.shipping_contactno,
		nbb_shipping_address.shipping_address,
		nbb_shipping_address.shipping_hse_blk_no,
		nbb_shipping_address.shippingunit_no,
		nbb_shipping_address.shipping_street,
		nbb_shipping_address.shipping_postalcode
		FROM nbb_order_main 
		LEFT JOIN nbb_customer ON nbb_customer.id = nbb_order_main.user_id 
		LEFT JOIN nbb_shipping_address ON nbb_shipping_address.user_id = nbb_customer.id
		LEFT JOIN nbb_payment_type ON nbb_payment_type.id = nbb_order_main.payment_method 
		WHERE nbb_order_main.type_flag = 'O' AND DATE_FORMAT(nbb_order_main.create_date, '%Y-%m-%d') >= '$dailySales_date' AND DATE_FORMAT(nbb_order_main.create_date, '%Y-%m-%d')<='$toSalesDate'";
		
		$order_main_query = $this->db->query($sql_order_main); 
		return $result_order_main = $order_main_query->result_array();	

	}

	function getAllOrderProduct()
	{
		
		$this->db->select('nbb_order_main.*,
		nbb_payment_type.payment_name,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_employees.first_name as e_first_name,
		nbb_employees.last_name as e_last_name,
		nbb_delivery_details.delivery_status,
		nbb_delivery_status.status_name as order_status');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_payment_type', 'nbb_payment_type.id = nbb_order_main.payment_method', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_order_main.saler_id', 'LEFT');
		$this->db->join('nbb_delivery_details', 'nbb_delivery_details.order_id = nbb_order_main.id', 'LEFT');
		$this->db->join('nbb_delivery_status', 'nbb_delivery_status.id = nbb_delivery_details.delivery_status', 'LEFT');
		$where = array(
			'nbb_order_main.type_flag' => 'O'
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getAllCurrentOrder()
	{
		$this->db->select('nbb_order_main.*,
		nbb_payment_type.payment_name,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_employees.first_name as e_first_name,
		nbb_employees.last_name as e_last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_payment_type', 'nbb_payment_type.id = nbb_order_main.payment_method', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_order_main.saler_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 1
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getAllComplatedOrder()
	{
		$this->db->select('nbb_order_main.*,
		nbb_payment_type.payment_name,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_employees.first_name as e_first_name,
		nbb_employees.last_name as e_last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_payment_type', 'nbb_payment_type.id = nbb_order_main.payment_method', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_order_main.saler_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 2
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getAllCanceledOrder()
	{
		$this->db->select('nbb_order_main.*,
		nbb_payment_type.payment_name,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_payment_type', 'nbb_payment_type.id = nbb_order_main.payment_method', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 3
		);
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getAllCartProduct()
	{
		$this->db->select('nbb_order_main.*,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->where('nbb_order_main.type_flag', 'C');
		return $this->db->get()->result_array();
	}
	function getCustomerOrderStatus(){
        $this->db->select('*');
        $this->db->from('nbb_delivery_status');
        return $this->db->get()->result_array();
    }
	function getAllWishlist()
	{
		
		$this->db->select('nbb_wishlist.*,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_product.name AS p_name,
		nbb_product.price');
		$this->db->from('nbb_wishlist');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_wishlist.userId', 'LEFT');
		$this->db->join('nbb_product', 'nbb_product.id = nbb_wishlist.product_id', 'LEFT');
		/*$where = array(
			'nbb_order_main.type_flag' => 'O'
		  );
		$this->db->where($where);*/
		return $this->db->get()->result_array();
	}
	function getAllOrderDetails($order_id,$product_id)
	{
		$this->db->select('nbb_order_product.*,
		nbb_order_product.id as pid,
		nbb_order_main.order_number,
		nbb_order_main.user_id,
		nbb_order_main.order_status,
		nbb_order_main.customer_firstname,
		nbb_order_main.customer_lastname,
		nbb_order_main.customer_email,
		nbb_order_main.customer_phone,
		nbb_order_main.customer_postcode,
		nbb_order_main.delivery_date,
		nbb_order_main.type_flag,
		nbb_order_main.payment_method,
		nbb_product.name AS product_name,
		nbb_product.short_description,
		nbb_payments.payment_file,
		nbb_payments.payment_gross,
		nbb_customer.*,
		nbb_billing_address.*,
		nbb_shipping_address.*,
		nbb_delivery_details.*');
		$this->db->from('nbb_order_product');
		$this->db->join('nbb_order_main', 'nbb_order_main.id = nbb_order_product.order_id', 'LEFT');
		$this->db->join('nbb_product', 'nbb_product.id = nbb_order_product.product_id', 'LEFT');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_billing_address', 'nbb_billing_address.user_id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_shipping_address', 'nbb_shipping_address.user_id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_delivery_details', 'nbb_delivery_details.order_id = nbb_order_main.id', 'LEFT');
		$this->db->join('nbb_payments', 'nbb_payments.order_id = nbb_order_main.id', 'LEFT');
		$where = array(
			'nbb_order_main.type_flag' => 'O',
			'nbb_order_main.id'   => $order_id,
			'nbb_order_product.id'   => $product_id
		  );
		$this->db->where($where);
		$order_product_query = $this->db->get()->result_array();
		$data = array();			

		foreach( $order_product_query as $row){				

			$data = array(
				'order_id' 				=> $order_id,
				'id' 					=> $row['pid'],
				'order_code' 			=> $row['order_number'],
				'product_name' 			=> $row['product_name'],
				'short_description' 	=> $row['short_description'],
				'product_id' 			=> $row['product_id'],
				'total_quantity' 		=> $row['total_quantity'],
				'total_price' 			=> $row['total_price'],
				'product_price' 		=> $row['product_price'],
				'create_date'       	=> $row['create_date'],
				'order_status'			=> $row['order_status'],
				'customer_firstname'	=> $row['customer_firstname'],
				'customer_lastname' 	=> $row['customer_lastname'],
				'customer_email' 		=> $row['customer_email'],
				'customer_phone' 		=> $row['customer_phone'],
				'customer_postcode' 	=> $row['customer_postcode'],
				'type_flag' 			=> $row['type_flag'],
				'payment_method' 		=> $row['payment_method'],
				'delivery_date' 		=> $row['delivery_date'],
				'create_date' 			=> $row['create_date'],
				'first_name'			=> $row['first_name'],
				'last_name'				=> $row['last_name'],
				'user_dob'				=> $row['dob'],
				'user_age'				=> $row['age'],
				'user_email'			=> $row['email'],
				'user_contact'			=> $row['contact'],
				'user_address'			=> $row['address'],
				'profile_picture'		=> $row['profile_picture'],
				'billing_firstname' 	=> $row['billing_firstname'],
				'billing_lastname' 		=> $row['billing_lastname'],
				'billing_contactno' 	=> $row['billing_contactno'],
				'billing_address' 		=> $row['billing_address'],
				'billing_postal_code' 	=> $row['billing_postal_code'],
				'billing_hse_blk_no' 	=> $row['billing_hse_blk_no'],
				'billing_unit_no' 		=> $row['billing_unit_no'],
				'billing_country'       => $row['billing_country'],
				'billing_street'       => $row['billing_street'],
				'shipping_firstname' 	=> $row['shipping_firstname'],
				'shipping_lastname' 	=> $row['shipping_lastname'],
				'shipping_contactno' 	=> $row['shipping_contactno'],
				'shipping_address' 		=> $row['shipping_address'],
				'shipping_hse_blk_no' 	=> $row['shipping_hse_blk_no'],
				'shippingunit_no' 		=> $row['shippingunit_no'],
				'shipping_street' 		=> $row['shipping_street'],
				'shipping_postalcode'	=> $row['shipping_postalcode'],
				'courier' 				=> $row['courier'],
				'courier_price' 		=> $row['courier_price'],
				'tacking_number' 		=> $row['tacking_number'],
				'traking_link' 			=> $row['traking_link'],
				'tacking_details' 		=> $row['tacking_details'],
				'date_booked' 			=> $row['date_booked'],
				'delivery_status'       => $row['delivery_status'],
				'payment_file'       	=> $row['payment_file'],
				'payment_gross'       	=> $row['payment_gross'],
			);	

		}
		return $data;
	}
	function insertOrder($data)
    {
        $insert = $this->db->insert('nbb_order_main',$data); 
        return true;
    }
	function insertOrderproduct($data)
    {
        $insert = $this->db->insert('nbb_order_product',$data); 
        return true;
    }
	function insertdelivery($data)
    {
        $insert = $this->db->insert('nbb_delivery_details',$data); 
        return true;
    }
	function getDelivery_details()
	{
		
        $this->db->select('nbb_delivery_details.*,
		nbb_order_main.order_number,
		nbb_delivery_status.status_name,
		nbb_customer.first_name,
		nbb_customer.last_name,
		nbb_employees.first_name as deliveryBoyfirst_name,
		nbb_employees.last_name as deliveryBoylast_name,
		nbb_shipping_address.shipping_address,
		nbb_shipping_address.shipping_country,
		nbb_shipping_address.shipping_postalcode,
		nbb_shipping_address.shipping_hse_blk_no,
		nbb_shipping_address.shippingunit_no,
		nbb_shipping_address.shipping_street');
        $this->db->from('nbb_delivery_details');
		$this->db->join('nbb_order_main', 'nbb_order_main.id = nbb_delivery_details.order_id', 'LEFT');
		$this->db->join('nbb_delivery_status', 'nbb_delivery_status.id = nbb_delivery_details.delivery_status', 'LEFT');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_delivery_details.courier', 'LEFT');
		$this->db->join('nbb_shipping_address', 'nbb_shipping_address.user_id = nbb_order_main.user_id', 'LEFT');
        return $this->db->get()->result_array();
    }
	function getAllDeliveryDetailsEdit($id)
	{
		$this->db->select('*');
		$this->db->from('nbb_delivery_details');
		$this->db->where('order_id',$id);
		return $this->db->get()->result_array();
	}
	function getDeliveryPartner()
	{
		$this->db->select('nbb_employees.id,
		nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_employees');
		$this->db->where('designation','11');
		return $this->db->get()->result_array();
	}
	function showInvoiceDetails($id)
	{
		$this->db->select('nbb_order_product.*,nbb_product.name AS product_name,nbb_order_main.order_number');
		$this->db->from('nbb_order_product');
		$this->db->join('nbb_product', 'nbb_product.id = nbb_order_product.product_id', 'LEFT');
		$this->db->join('nbb_order_main', 'nbb_order_main.id = nbb_order_product.order_id', 'LEFT');
		$this->db->where('nbb_order_product.order_id',$id);
		return $this->db->get()->result_array();
	}
	function getEveryCustomerOrderProduct($id)
	{
		$this->db->select('nbb_order_main.*,
		nbb_employees.first_name AS e_first_name,
		nbb_employees.last_name AS e_last_name,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_order_main.saler_id', 'LEFT');
		$where = array(
			'nbb_order_main.type_flag' => 'O',
			'nbb_order_main.user_id'   => $id
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getEveryCustomerCurrentOrder($id)
	{
		$this->db->select('nbb_order_main.*,
		nbb_employees.first_name AS e_first_name,
		nbb_employees.last_name AS e_last_name,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_order_main.saler_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 1,
			'nbb_order_main.user_id'   => $id
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getEveryCustomerComplatedOrder($id)
	{
		$this->db->select('nbb_order_main.*,
		nbb_employees.first_name AS e_first_name,
		nbb_employees.last_name AS e_last_name,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_order_main.saler_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 2,
			'nbb_order_main.user_id'   => $id
		  );
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getEveryCustomerCanceledOrder($id)
	{
		$this->db->select('nbb_order_main.*,
		nbb_employees.first_name AS e_first_name,
		nbb_employees.last_name AS e_last_name,
		nbb_customer.first_name,
		nbb_customer.last_name');
		$this->db->from('nbb_order_main');
		$this->db->join('nbb_customer', 'nbb_customer.id = nbb_order_main.user_id', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_order_main.saler_id', 'LEFT');
		$where = array(
			'type_flag' => 'O',
			'order_status'   => 3,
			'nbb_order_main.user_id'   => $id
		);
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
	function getpdfAllcustomerData($id){
        $this->db->select('nbb_order_main.*');
        $this->db->from('nbb_order_main');
        $this->db->where('nbb_order_main.id',$id);
        $customer_result = $this->db->get()->result_array();
		$data = array();
		foreach($customer_result as $row){				

			$data = array(
				'id' 				=> $id,
				'order_number' 		=> $row['order_number'],
				'user_id' 	=> $row['user_id'],
				'create_date' => $row['create_date'],
			);	

		}
		return $data;
    }
	
	function getshippingData($id){

		$this->db->select('nbb_shipping_address.*');
        $this->db->from('nbb_shipping_address');
        $this->db->where('nbb_shipping_address.user_id',$id);
        $customer_result = $this->db->get()->result_array();
		$data = array();
		foreach($customer_result as $row){				

			$data = array(
				'shipping_firstname' 		=> $row['shipping_firstname'],
				'shipping_lastname' 		=> $row['shipping_lastname'],
				'shipping_contactno' 		=> $row['shipping_contactno'],
				'shipping_address' 		=> $row['shipping_address'],
				'shipping_country' 		=> $row['shipping_country'],
				'shipping_hse_blk_no' 		=> $row['shipping_hse_blk_no'],
				'shippingunit_no' 		=> $row['shippingunit_no'],
				'shipping_street' 		=> $row['shipping_street'],
				'shipping_postalcode' 		=> $row['shipping_postalcode'],
				
			);	

		}
		return $data;
	}
	function getbillingData($id){

		$this->db->select('nbb_billing_address.*');
        $this->db->from('nbb_billing_address');
        $this->db->where('nbb_billing_address.user_id',$id);
        $customer_result = $this->db->get()->result_array();
		$data = array();
		foreach($customer_result as $row){				

			$data = array(
				'billing_firstname' 		=> $row['billing_firstname'],
				'billing_lastname' 		=> $row['billing_lastname'],
				'billing_contactno' 		=> $row['billing_contactno'],
				'billing_country' 		=> $row['billing_country'],
				'billing_address' 		=> $row['billing_address'],
				'billing_postal_code' 		=> $row['billing_postal_code'],
				'billing_hse_blk_no' 		=> $row['billing_hse_blk_no'],
				'billing_unit_no' 		=> $row['billing_unit_no'],
				'billing_street' 		=> $row['billing_street'],
				
			);	

		}
		return $data;
	}
	function getProducttotalPrice($order_id){

		$orderTotal_sql = "SELECT SUM(nbb_order_product.total_price) AS total_price
			FROM nbb_order_product
			WHERE nbb_order_product.order_id = '".$order_id."'";
		$orderTotal_query = $this->db->query($orderTotal_sql); 
		$orderTotal_result = $orderTotal_query->result_array();	
		$data = array();			

		foreach($orderTotal_result as $row){	
			$data = array(
				'total_price' 		=> $row['total_price'],
			);	
			
		}
		return $data;
	}
	function getservicetotalPrice($order_id){

		$orderTotal_sql = "SELECT SUM(nbb_posservice_order.price) AS total_ServicePrice
			FROM nbb_posservice_order
			WHERE nbb_posservice_order.order_id = '".$order_id."'";
		$orderTotal_query = $this->db->query($orderTotal_sql); 
		$orderTotal_result = $orderTotal_query->result_array();	
		$data = array();			

		foreach($orderTotal_result as $row){	
			$data = array(
				'total_ServicePrice' 	=> $row['total_ServicePrice'],
			);	
			
		}
		return $data;
	}
}
