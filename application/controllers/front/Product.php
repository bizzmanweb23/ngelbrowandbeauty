<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->library('session');
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	
	public function products(){ 
		$catId = $this->uri->segment(2);
		//echo $serviceId;exit;
		$products_rownum = '';
		$data['allproducts'] = $this->Product->getAllproductList($catId);
		$allproductrow_num = $this->Product->getAllproductrow_num($catId);
		//echo $allproductrow_num;
		$showing_limit = 3;
		$total_pages = ceil($allproductrow_num / $showing_limit); 
		
		$data['total_pages'] = $total_pages;

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();

		$this->load->view('front/header',$datahader);
        $this->load->view('front/product_list',$data);
		$this->load->view('front/footer');
		 
    } 
	public function productDetailsView(){
		$pId = $this->uri->segment(2);
		//echo $serviceId;exit;
		$data['productDetails'] = $this->Product->getproductDetails($pId);

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		
		$this->load->view('front/header',$datahader);
        $this->load->view('front/single_product', $data);
		$this->load->view('front/footer');
	}
	public function cartListView(){
		$pId = $this->uri->segment(2);
		//echo $serviceId;exit;
		$user_id = $this->session->userdata('id'); 
		$data['cartproductDetails'] = $this->Product->getcartProductDetails($user_id);
		$data['producttotalPrice'] = $this->Product->getcartProducttotalPrice($user_id);

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		
		$this->load->view('front/header',$datahader);
        $this->load->view('front/cartList', $data);
		$this->load->view('front/footer');
	}
	public function post_add_tocart(){

		$user_id = $this->session->userdata('id');  
        $select_exist_quote_qry = $this->db->query("SELECT nbb_order_main.id FROM nbb_order_main WHERE nbb_order_main.type_flag ='C' and nbb_order_main.user_id = '$user_id' LIMIT 1");
		//echo 'text';
        $order_id ="";
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');

       	if($select_exist_quote_qry->num_rows() >0){
        	foreach ($select_exist_quote_qry->result() as $select_exist_quote_result) {
        		$order_id = $select_exist_quote_result->id;
        	}
			$orderdata = array(
				'order_id' => $order_id,
				'product_id' => $product_id,
				'total_quantity' => $quantity,
				'total_price' => $this->input->post('totalPrice'),
				'product_price' => $this->input->post('product_price'),
			); 
			$result2 = $this->db->insert('nbb_order_product',$orderdata);  
        }else{
			$data = array(
				'user_id' => $user_id,
				'delivery_date' => $this->input->post('delivery_date'),
				'order_status'  => 1,
				'type_flag' =>  'C'
			); 
			$result = $this->OrderManagement->insertOrder($data);  
			$orderId = $this->db->insert_id();

			$order_number = $this->generateOrderNumber($orderId);			
			$this->db->where('id' , $orderId);
			$this->db->update('nbb_order_main', array('order_number'=>$order_number));

			$orderdata = array(
				'order_id' => $orderId,
				'product_id' => $product_id,
				'total_quantity' => $quantity,
				'total_price' => $this->input->post('totalPrice'),
				'product_price' => $this->input->post('product_price'),
			); 
			$result2 = $this->db->insert('nbb_order_product',$orderdata);  
		}
		/*
		$producttotalPrice = $this->Product->getproductDetails($product_id);
		$available_stock = $producttotalPrice['available_stock'];
		$cal_stock = $producttotalPrice['available_stock'] - $quantity;

		$this->db->where('id' , $product_id);
		$this->db->update('nbb_product', array('available_stock'=>$cal_stock));*/


		redirect('cartList');

	}
	public function deleteorderProduct()
    {
        
		$Id = $this->uri->segment(2);
		$result=$this->Main->delete('id',$Id,'nbb_order_product');
		redirect('cartList');
            
    }
	public function productCheckOut(){
		$pId = $this->uri->segment(2);
		//echo $serviceId;exit;
		$user_id = $this->session->userdata('id'); 
		$data['cartproductDetails'] = $this->Product->getcartProductDetails($user_id);
		$data['producttotalPrice'] = $this->Product->getcartProducttotalPrice($user_id);
		$data['shippingAddress'] = $this->Home->getShipping_address($user_id);

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		
		$this->load->view('front/header',$datahader);
        $this->load->view('front/currentOrder', $data);
		$this->load->view('front/footer');
	}
	
	public function productcompleteorder(){

		//$Id = $this->uri->segment(2);
		$Id = $this->input->post('order_id');
		$total_price = $this->input->post('total_price');
		$referral_balance = 0;

		$order_number = $this->generateOrderNumber($Id);
		$mainorderdata = array(
			'type_flag'=> 'O',
			'order_system' => 'application',
			'order_number' => $order_number
		); 
		$this->db->where('id' , $Id);
		$this->db->update('nbb_order_main', $mainorderdata);

		$user_id = $this->session->userdata('id');  

		$paymentdata = array(
			'user_id' => $user_id,
			'order_id' => $Id,
			'payment_gross' => $total_price,
			'status' => 1,
		); 
		$result2 = $this->db->insert('nbb_payments',$paymentdata);  
		$paymentId = $this->db->insert_id();
		if($result2 ==true)
			{
				$this->load->library('upload');
				if($_FILES['payment_file']['name'] != '')
				{

					$_FILES['file']['name']       = $_FILES['payment_file']['name'];
					$_FILES['file']['type']       = $_FILES['payment_file']['type'];
					$_FILES['file']['tmp_name']   = $_FILES['payment_file']['tmp_name'];
					$_FILES['file']['error']      = $_FILES['payment_file']['error'];
					$_FILES['file']['size']       = $_FILES['payment_file']['size'];

					// File upload configuration
					$uploadPath = 'uploads/payment_image/';
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
						$uploadImgData['payment_file'] = $imageData['file_name'];
					}
					$update=$this->Main->update('id',$paymentId, $uploadImgData,'nbb_payments');         
				} 
			}

        $referred_by_qry = $this->db->query("SELECT nbb_customer.id,nbb_customer.referred_by 
		FROM nbb_customer 
		WHERE nbb_customer.id = '".$user_id."'");
		$referred_by_data = $referred_by_qry->result_array();

		$referred_by = '';			
		foreach($referred_by_data as $row){	
			$referred_by = $row['referred_by'];	
		}

		$referred_userid_qry = $this->db->query("SELECT nbb_customer.id
		FROM nbb_customer 
		WHERE nbb_customer.referreduser_id  = '".$referred_by."'");
		$referred_userid_data = $referred_userid_qry->result_array();

		$referred_uid = '';			
		foreach($referred_userid_data as $userrow){	
			$referred_uid = $userrow['id'];	
			 
		}

		
		if($referred_uid != ''){

			$credit_wallet_query = $this->db->query("SELECT nbb_credit_wallet.* FROM nbb_credit_wallet WHERE nbb_credit_wallet.user_id = '".$referred_uid."'");
			$credit_wallet_rownum = $credit_wallet_query->num_rows();
			$credit_wallet_data = $credit_wallet_query->result_array();
			$referral_val = 0;
			foreach($credit_wallet_data as $credit_walletrow){	
				$referral_val = $credit_walletrow['referral_balance'];	
				 
			}

			if($total_price > '680' && $total_price < '2000'){
				$referral_balance = ($total_price * 10) / 100;
			}elseif($total_price > '2000' && $total_price < '3500'){
				$referral_balance = ($total_price * 20) / 100;
			}elseif($total_price > '3500' && $total_price < '5000'){
				$referral_balance = ($total_price * 30) / 100;
			}elseif($total_price > '5000'){
				$referral_balance = ($total_price * 40) / 100;
			}
			$totalRefval = $referral_val + $referral_balance;
			$orderdata = array(
				'user_id' => $referred_uid,
				'referral_balance' => $totalRefval
			); 
			if($credit_wallet_rownum > 0){

				$this->db->where('user_id', $referred_uid);
				$this->db->update('nbb_credit_wallet', $orderdata);
			}else{
				$this->db->insert('nbb_credit_wallet', $orderdata);
			}
			
		}
		$orderProductDate = $this->Product->orderProductlistingdata($Id);
		
		foreach($orderProductDate as $orderProductrow){	
			$product_id = $orderProductrow['product_id'];	
			$alltotal_quantity = $orderProductrow['total_quantity'];	

		$producttotalPrice = $this->Product->getproductDetails($product_id);
		$available_stock = $producttotalPrice['available_stock'];
		$cal_stock = $producttotalPrice['available_stock'] - $alltotal_quantity;

		$this->db->where('id' , $product_id);
		$this->db->update('nbb_product', array('available_stock'=>$cal_stock));
			 
		}
		
		$data = array(
			'total_price' 	=> $total_price,
			'order_number' => $order_number,
			'shipping_address' => $this->Product->getshipping_address($user_id)
		);

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		$this->load->view('front/header',$datahader);
        $this->load->view('front/order_confirmation', $data);
		$this->load->view('front/footer');

	}

	public function post_add_wishList(){

		$user_id = $this->session->userdata('id');  
        $productId = $this->input->post('productId');
        
			$orderdata = array(
				'userId' => $user_id,
				'product_id' => $productId,
			); 
			//print_r($orderdata);exit;

			$wishlist_query = $this->db->query("SELECT nbb_wishlist.* 
			FROM nbb_wishlist 
			WHERE nbb_wishlist.userId = '".$user_id."' AND nbb_wishlist.product_id = '".$productId."'");
			$wishlist_rownum = $wishlist_query->num_rows();
			$wishlist_data = $wishlist_query->result_array();
			$wishlistID = '';
			foreach($wishlist_data as $wishlist_datarow){	
				$wishlistID = $wishlist_datarow['id'];	
				 
			}
			if($wishlist_rownum > 0){

				$this->db->where('id', $wishlistID);
				$this->db->update('nbb_wishlist', $orderdata);
			}else{
				$this->db->insert('nbb_wishlist', $orderdata);
			}
		
	}
	public function wishList(){ 
		$user_id=$this->session->userdata('id');
		$data['wishlistData'] = $this->Header->getAllWishlistData($user_id);
		
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		
		$this->load->view('front/header',$datahader);
        $this->load->view('front/wishlist', $data);
		$this->load->view('front/footer');
		 
    }
	public function post_add_wishlisttocart(){
		$user_id = $this->session->userdata('id'); 
		$product_id = $_GET['product_id'];
		$price = $_GET['price'];
        $select_exist_quote_qry = $this->db->query("SELECT nbb_order_main.id FROM nbb_order_main WHERE nbb_order_main.type_flag ='C' and nbb_order_main.user_id = '$user_id' LIMIT 1");
        $order_id ="";

        if($select_exist_quote_qry->num_rows() >0){
        	foreach ($select_exist_quote_qry->result() as $select_exist_quote_result) {
        		$order_id = $select_exist_quote_result->id;
        	}
			$orderdata = array(
				'order_id' => $order_id,
				'product_id' => $product_id,
				'total_quantity' => 1,
				'total_price' => $price,
				'product_price' => $price,
			); 
		 
			$result2 = $this->db->insert('nbb_order_product',$orderdata);  
        }else{
			$data = array(
				'user_id' => $user_id,
				//'delivery_date' => $this->input->post('delivery_date'),
				'order_status'  => 1,
				'type_flag' =>  'C'
			); 
	
			$result = $this->OrderManagement->insertOrder($data);  
			$orderId = $this->db->insert_id();

			$order_number = $this->generateOrderNumber($orderId);			
			$this->db->where('id' , $orderId);
			$this->db->update('nbb_order_main', array('order_number'=>$order_number));

			$orderdata = array(
				'order_id' => $orderId,
				'product_id' => $product_id,
				'total_quantity' => 1,
				'total_price' => $price,
				'product_price' => $price,
			); 
			
			$result2 = $this->db->insert('nbb_order_product',$orderdata);  

		}
		redirect('cartList');
	}
	public function deletewishlist()
    {
        
		$Id = $_GET['wishlist_id'];
		$result=$this->Main->delete('id',$Id,'nbb_wishlist');
		redirect('wishList');
            
    }
	public function orderlist(){ 
		
		$user_id=$this->session->userdata('id');
		$data['allorders'] = $this->Product->getAllorderlist($user_id);

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();

		$this->load->view('front/header',$datahader);
        $this->load->view('front/orderlist',$data);
		$this->load->view('front/footer');
		 
    } 
	public function orderSummary(){ 
		$user_id=$this->session->userdata('id');
		$orderId = $this->uri->segment(2);
		$data['orderDateNumber'] = $this->Product->getAllorderDateNumber($orderId);
		$data['orderProductDate'] = $this->Product->orderProductlistingdata($orderId);
		$data['producttotalPrice'] = $this->Product->getProducttotalPrice($orderId);
		$data['orderDeliveryDetails'] = $this->Product->getDelivery_details($orderId);
		$data['billingAddress'] = $this->Product->getBilling_address($user_id);
		$data['shippingAddress'] = $this->Product->getorderShipping_address($user_id);

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		
		$this->load->view('front/header',$datahader);
        $this->load->view('front/order_summary',$data);
		$this->load->view('front/footer');	 
    }
	public function showInvoice()
    {
		$order_Id = $_GET['order_Id'];
        $data["invoiceData"]=$this->OrderManagement->showInvoiceDetails($order_Id);

		$mpdf = new \Mpdf\Mpdf();
		
		$html=$this->load->view('GeneratePdfView',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
		$mpdf->Output('invoice_"'.$order_Id.'".pdf','D');
		/*$html=$this->load->view('GeneratePdfView',$data,true);
		$this->m_pdf->pdf->WriteHTML($html);
		//download it D save F.
		$this->m_pdf->pdf->Output('invoice_"'.$order_Id.'".pdf','D');*/
    }
	function get_product_filter(){
		$catId = $_POST['catId'];
		$fromPriceRange = $_POST['fromPriceRange'];
		$toPriceRange = $_POST['toPriceRange'];
		$page_num = '';

		$filter_productlist = $this->Product->productlistFilterdata($catId,$fromPriceRange,$toPriceRange,$page_num);
		$pagination_productdetails = $this->Product->paginationproductlistingdata($catId,$page_num);
		$data = array(
			'allproducts' 	=> $filter_productlist,	
			'pagination_productdetails'		=> $pagination_productdetails		
		);
		 
			$this->load->view('front/searchFilterData', $data);
	}
	public function pagination_product_filter()
	{
		$catId = $_POST['categoryId'];
		$fromPriceRange = 0;
		$toPriceRange = 0;
		$page_num = $_POST['page']; 

		$filter_productlist = $this->Product->productlistFilterdata($catId,$fromPriceRange,$toPriceRange,$page_num);
		$pagination_productdetails = $this->Product->paginationproductlistingdata($catId,$page_num);
		
		$data = array(
			'allproducts' 	=> $filter_productlist,	
			'pagination_productdetails'		=> $pagination_productdetails		
		);

		$this->load->view('front/searchFilterData', $data);
	
	}
	public function generateOrderNumber($id)
	{
		return 'NBB' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}
}
?>
