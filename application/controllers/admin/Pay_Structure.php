<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay_Structure extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	public function allPay_Structure(){

		//$data['allpay_structure'] = $this->PayStructure->getAllpay_structure();
		$data['commission_structure_a'] = $this->PayStructure->getAllcommission_structure_a();
		$data['commission_structure_b'] = $this->PayStructure->getAllcommission_structure_b();
		$data['commission_structure_c'] = $this->PayStructure->getAllcommission_structure_c();
		$data['commission_c_partnership'] = $this->PayStructure->getAllcommission_c_partnership();
		$data['manual_fee'] = $this->PayStructure->getAllmanual_fee();
		$this->layout->view('all_empPayStructure',$data); 
	}
	public function add_PayStructure(){
		$data['name'] = $this->session->userdata('name');
       	$this->layout->view('add_empPayStructure',$data); 
	}
	public function post_add_empPay_Structure(){

		$data = array(
			'year' => $this->input->post('getyear'),
			'dearness_allowance' => $this->input->post('dearness_allowance'),
			'Provident_fund' => $this->input->post('Provident_fund'),
			'ESI' => $this->input->post('employees_state_insurance'),
			'medical_leave_entitlement' => $this->input->post('medical_leave_entitlement'),
			'medical_allowance' => $this->input->post('medical_allowance'));

			$insert = $this->PayStructure->storeEmpPay_structure($data); 
			if($insert){
				redirect('admin/pay_Structure/allPay_Structure');
			}
	}
	public function edit_empPay_Structure(){
		$pay_structureId = $this->uri->segment(4);
		$data['allpay_structure'] = $this->PayStructure->getEditpay_structure($pay_structureId);
		$this->layout->view('edit_empPayStructure',$data); 
	}
	public function deleteEmpPay_Structurey()
	{
	   if($this->session->has_userdata('id')!=false)
	   {
		   $emppayId=$this->uri->segment(4);
		   $result=$this->Main->delete('id',$emppayId,'nbb_pay_structure');
		   if($result==true)
		   {
			   redirect('admin/pay_Structure/allPay_Structure');
		   }
	   }
	}

	public function post_add_manual_fee(){

		$data = array(
			'type_of_fee' => $this->input->post('type_of_fee'),
			'amount' => $this->input->post('amount'));

			$insert = $this->Main->insert('nbb_manual_fee',$data); 
			if($insert){
				redirect('admin/pay_Structure/allPay_Structure');
			}
	}
	public function edit_manual_fee(){
		$manual_feeId = $this->uri->segment(4);
		$data['allpay_structure'] = $this->PayStructure->getEditmanual_fee($manual_feeId);
		$this->layout->view('edit_manual_fee',$data); 
	}
	public function post_edit_manual_fee(){
		$fee_id = $this->input->post('fee_id');
		$data = array(
			'type_of_fee' => $this->input->post('type_of_fee'),
			'amount' => $this->input->post('amount'));

			$result = $this->Main->update('id',$fee_id, $data,'nbb_manual_fee');
			if($result){
				$this->session->set_flashdata('status','Fees Add successfully! <a href="'.site_url("admin/pay_Structure/allPay_Structure") .'">Back to list</a>');
				redirect('admin/pay_Structure/edit_manual_fee/'.$fee_id);
			}
	}
	public function deletemanual_fee(){
		if($this->session->has_userdata('id')!=false)
		{
			$manualfeeId=$this->uri->segment(4);
			$result=$this->Main->delete('id',$manualfeeId,'nbb_manual_fee');
			if($result==true)
			{
				redirect('admin/pay_Structure/allPay_Structure');
			}
		}
	}
	public function post_add_commission_structure_a(){

		$data = array(
			'fee_type' => $this->input->post('fee_type'),
			'amount' => $this->input->post('amount'));

			$insert = $this->Main->insert('nbb_commission_structure_a',$data); 
			if($insert){
				redirect('admin/pay_Structure/allPay_Structure');
			}
	}
	public function edit_commission_structure_a(){
		$commission_feeId = $this->uri->segment(4);
		$data['allpay_structure'] = $this->PayStructure->getEditcommission_structure_a($commission_feeId);
		$this->layout->view('edit_commission_structure_a',$data); 
	}
	public function post_edit_commission_structure_a(){
		$fee_id = $this->input->post('fee_id');
		$data = array(
			'type_of_fee' => $this->input->post('type_of_fee'),
			'amount' => $this->input->post('amount'));

			$result = $this->Main->update('id',$fee_id, $data,'nbb_commission_structure_a');
			if($result){
				$this->session->set_flashdata('status','Fees Add successfully! <a href="'.site_url("admin/pay_Structure/allPay_Structure") .'">Back to list</a>');
				redirect('admin/pay_Structure/edit_commission_structure_a/'.$fee_id);
			}
	}
	public function deletecommission_structure_a(){
		if($this->session->has_userdata('id')!=false)
		{
			$manualfeeId=$this->uri->segment(4);
			$result=$this->Main->delete('id',$manualfeeId,'nbb_commission_structure_a');
			if($result==true)
			{
				redirect('admin/pay_Structure/allPay_Structure');
			}
		}
	}
	public function post_add_commission_structure_b(){

		$data = array(
			'fee_Type' => $this->input->post('fee_type'),
			'amount' => $this->input->post('amount'));

			$insert = $this->Main->insert('nbb_commission_structure_b',$data); 
			if($insert){
				redirect('admin/pay_Structure/allPay_Structure');
			}
	}
	public function edit_commission_structure_b(){
		$commission_feeId = $this->uri->segment(4);
		$data['allpay_structure'] = $this->PayStructure->getEditcommission_structure_b($commission_feeId);
		$this->layout->view('edit_commission_structure_b',$data); 
	}
	public function post_edit_commission_structure_b(){
		$fee_id = $this->input->post('fee_id');
		$data = array(
			'fee_Type' => $this->input->post('fee_type'),
			'amount' => $this->input->post('amount'));

			$result = $this->Main->update('id',$fee_id, $data,'nbb_commission_structure_b');
			if($result){
				$this->session->set_flashdata('status','Fees Add successfully! <a href="'.site_url("admin/pay_Structure/allPay_Structure") .'">Back to list</a>');
				redirect('admin/pay_Structure/edit_commission_structure_b/'.$fee_id);
			}
	}
	public function deletecommission_structure_b(){
		if($this->session->has_userdata('id')!=false)
		{
			$manualfeeId=$this->uri->segment(4);
			$result=$this->Main->delete('id',$manualfeeId,'nbb_commission_structure_b');
			if($result==true)
			{
				redirect('admin/pay_Structure/allPay_Structure');
			}
		}
	}
	public function post_add_commission_structure_c(){

		$data = array(
			'type_of_fee' => $this->input->post('fee_type'),
			'amount' => $this->input->post('amount'));

			$insert = $this->Main->insert('nbb_commission_structure_c',$data); 
			if($insert){
				redirect('admin/pay_Structure/allPay_Structure');
			}
	}
	public function edit_commission_structure_c(){
		$commission_feeId = $this->uri->segment(4);
		$data['allcommission_structure'] = $this->PayStructure->getEditcommission_structure_c($commission_feeId);
		$this->layout->view('edit_commission_structure_c',$data); 
	}
	public function post_edit_commission_structure_c(){
		$fee_id = $this->input->post('fee_id');
		$data = array(
			'type_of_fee' => $this->input->post('type_of_fee'),
			'amount' => $this->input->post('amount'));

			$result = $this->Main->update('id',$fee_id, $data,'nbb_commission_structure_c');
			if($result){
				$this->session->set_flashdata('status','Fees Add successfully! <a href="'.site_url("admin/pay_Structure/allPay_Structure") .'">Back to list</a>');
				redirect('admin/pay_Structure/edit_commission_structure_c/'.$fee_id);
			}
	}
	public function deletecommission_structure_c(){
		if($this->session->has_userdata('id')!=false)
		{
			$manualfeeId=$this->uri->segment(4);
			$result=$this->Main->delete('id',$manualfeeId,'nbb_commission_structure_c');
			if($result==true)
			{
				redirect('admin/pay_Structure/allPay_Structure');
			}
		}
	}
	public function post_add_commission_c_partnership(){

		$data = array(
			'type_of_fee' => $this->input->post('fee_type'),
			'amount' => $this->input->post('amount'));

			$insert = $this->Main->insert('nbb_commission_c_partnership',$data); 
			if($insert){
				redirect('admin/pay_Structure/allPay_Structure');
			}
	}
	public function edit_commission_c_partnership(){
		$commission_feeId = $this->uri->segment(4);
		$data['allcommission_structure'] = $this->PayStructure->getEditcommission_c_partnership($commission_feeId);
		$this->layout->view('edit_commission_c_partnership',$data); 
	}
	public function post_edit_commission_c_partnership(){
		$fee_id = $this->input->post('fee_id');
		$data = array(
			'type_of_fee' => $this->input->post('type_of_fee'),
			'amount' => $this->input->post('amount'));

			$result = $this->Main->update('id',$fee_id, $data,'nbb_commission_c_partnership');
			if($result){
				$this->session->set_flashdata('status','Fees Add successfully! <a href="'.site_url("admin/pay_Structure/allPay_Structure") .'">Back to list</a>');
				redirect('admin/pay_Structure/edit_commission_structure_c/'.$fee_id);
			}
	}
	public function deletecommission_c_partnership(){
		if($this->session->has_userdata('id')!=false)
		{
			$manualfeeId=$this->uri->segment(4);
			$result=$this->Main->delete('id',$manualfeeId,'nbb_commission_c_partnership');
			if($result==true)
			{
				redirect('admin/pay_Structure/allPay_Structure');
			}
		}
	}
	/*public function searchPay_Structure(){

		$payStructureID = $_GET['payStructureID'];

		if($payStructureID == 2){
			$manual_fee_sql = "SELECT nbb_manual_fee.*
				FROM nbb_manual_fee";
			$manual_fee_query = $this->db->query($manual_fee_sql);
			$result_manual_fee = $manual_fee_query->result_array();	
			foreach($result_manual_fee as $manual_feeRow){

				$manual_id = $manual_feeRow['id'];
				$type_of_fee = $manual_feeRow['type_of_fee'];
				$manual_amount = $manual_feeRow['amount'];

				echo $manual_feeCheckbox ='<input type="checkbox" id="manual_id" name="manual_id" value="'.$manual_id.'"><label for="vehicle1">"'.$type_of_fee($manual_amount).'"</label><br>';
			}


		}

		
	}*/
}
?>
