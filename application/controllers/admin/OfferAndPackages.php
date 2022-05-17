<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OfferAndPackages extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('M_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	public function package_list(){

		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		$data['name'] = $this->session->userdata('name');
		$data['productPackages'] = $this->OfferAndPackages->getOfferAndPackages();
	  
       	$this->layout->view('all_packageList',$data); 
	}
	public function add_packageproduct()
    {
		$data['name'] = $this->session->userdata('name');
		$data['productName'] = $this->ProductManagement->getAllProductName();
       	$this->layout->view('add_Packages',$data); 
    }
	public function post_add_package(){

		$data = array(
			'package_name' => $this->input->post('package_name'),
			'package_detail' => $this->input->post('package_detail'),
			'package_price' => $this->input->post('package_price'),
			'package_credits' => $this->input->post('package_credits'),
			'status' => $this->input->post('status'));

			$insert = $this->Main->insert('nbb_packages',$data); 
			$insert_id = $this->db->insert_id();

		$productName = $this->input->post('productName');
		
		$total = count($productName);
		if($productName){
			for($i=0; $i<$total; $i++ ){
				$productName_data = array( 
					'package_id'    =>  $insert_id, 
					'product_id'=>  $productName[$i]
				);
				$insert2 = $this->Main->insert('nbb_packages_product',$productName_data);
			}
		}
		if($insert || $insert2){
			redirect('admin/offerAndPackages/package_list');
		}
	}
	public function fetchMultiProduct(){

		$package_id = $_GET['package_id'];
		
		$nbb_packages_sql  = "SELECT nbb_packages_product.*,nbb_product.name AS p_name FROM nbb_packages_product LEFT JOIN nbb_product ON nbb_product.id = nbb_packages_product.product_id WHERE nbb_packages_product.package_id =  $package_id"; 
		$nbb_packages_query = $this->db->query($nbb_packages_sql);
		$nbb_packages_query->result_array();
		foreach($nbb_packages_query as $packages_row){
			$package_productName = "<td>'".$packages_row['p_name']."'</td>";
		}
		
		echo $package_productName;
	}
}

?>
