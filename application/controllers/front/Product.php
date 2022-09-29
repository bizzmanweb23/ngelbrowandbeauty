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
		$serviceId = $this->uri->segment(2);
		//echo $serviceId;exit;
		$data['allproducts'] = $this->Header->getAllproductList($serviceId);

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

        if($select_exist_quote_qry->num_rows() >0){
        	foreach ($select_exist_quote_qry->result() as $select_exist_quote_result) {
        		$order_id = $select_exist_quote_result->id;
        	}
			$orderdata = array(
				'order_id' => $order_id,
				'product_id' => $this->input->post('product_id'),
				'total_quantity' => $this->input->post('quantity'),
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
				'product_id' => $this->input->post('product_id'),
				'total_quantity' => $this->input->post('quantity'),
				'total_price' => $this->input->post('totalPrice'),
				'product_price' => $this->input->post('product_price'),
			); 
			
			$result2 = $this->db->insert('nbb_order_product',$orderdata);  

		}
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
        $this->load->view('front/orderlist', $data);
		$this->load->view('front/footer');
	}
	public function productcompleteorder(){

		//$Id = $this->uri->segment(2);
		$Id = $this->input->post('order_id');
		$total_price = $this->input->post('total_price');
		$this->db->where('id' , $Id);
		$this->db->update('nbb_order_main', array('type_flag'=> 'O'));

		$user_id = $this->session->userdata('id');  
        $referred_by_qry = $this->db->query("SELECT nbb_customer.id,nbb_customer.referred_by 
		FROM nbb_customer 
		WHERE nbb_customer.id = '".$user_id."'");
		$referred_by_data = $referred_by_qry->result_array();

		$referred_by = '';			
		foreach($referred_by_data as $row){	
			$referred_by = $row['referred_by'];	
			//echo 'test';
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
		/*echo $product_id = $this->input->post('product_id');
		echo $price = $this->input->post('price');exit;*/
        $select_exist_quote_qry = $this->db->query("SELECT nbb_order_main.id FROM nbb_order_main WHERE nbb_order_main.type_flag ='C' and nbb_order_main.user_id = '$user_id' LIMIT 1");
		//echo 'text';
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
	public function generateOrderNumber($id)
	{
		return 'NBB' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}
}
?>
