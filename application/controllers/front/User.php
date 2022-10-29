<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->library('session');
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	function wallet()
	{
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		
		$user_id=$this->session->userdata('id');
		$data['expense_wallet'] = $this->Header->getAllexpense_wallet($user_id);
		$data['credit_wallet'] = $this->Header->getAllexpense_wallet($user_id);

		$this->load->view('front/header',$datahader);
        $this->load->view('front/wallet',$data);
		$this->load->view('front/footer');
		
	}
}
?>
