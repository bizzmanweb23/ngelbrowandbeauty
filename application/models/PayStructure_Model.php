<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class PayStructure_Model extends CI_Model
{
	public function __construct()
	{
		// Call the CI_Model constructor
		//$this->load->library('m_pdf');
		parent::__construct();

	}
	function getAllpay_structure(){
		$this->db->select('nbb_pay_structure.*');
		$this->db->from('nbb_pay_structure');
		return $this->db->get()->result_array();
	}
	function getAllcommission_structure_a(){
		$this->db->select('nbb_commission_structure_a.*');
		$this->db->from('nbb_commission_structure_a');
		return $this->db->get()->result_array();
	}
	function getAllcommission_structure_b(){
		$this->db->select('nbb_commission_structure_b.*');
		$this->db->from('nbb_commission_structure_b');
		return $this->db->get()->result_array();
	}
	function getAllcommission_structure_c(){
		$this->db->select('nbb_commission_structure_c.*');
		$this->db->from('nbb_commission_structure_c');
		return $this->db->get()->result_array();
	}
	function getAllcommission_c_partnership(){
		$this->db->select('nbb_commission_c_partnership.*');
		$this->db->from('nbb_commission_c_partnership');
		return $this->db->get()->result_array();
	}
	function getAllmanual_fee(){
		$this->db->select('nbb_manual_fee.*');
		$this->db->from('nbb_manual_fee');
		return $this->db->get()->result_array();
	}
	function storeEmpPay_structure($data)
    {
        $insert = $this->db->insert('nbb_pay_structure',$data); 
        return true;
    }
	function getLastpay_structure(){
		$this->db->select('nbb_pay_structure.*');
		$this->db->from('nbb_pay_structure');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		//return $this->db->get()->result_array();
		$pay_structure_query = $this->db->get()->result_array();
		$pay_structure_data = array();

		foreach( $pay_structure_query as $row){				

			$pay_structure_data = array(
				'id' 					=> $row['id'],
				'dearness_Allowance' 	=> $row['dearness_Allowance'],
				'provident_Fund' 		=> $row['provident_Fund'],
				'ESI' 					=> $row['ESI'],
				'medical_Allowance' 	=> $row['medical_Allowance'],
				'medical_leave_entitlement' 	=> $row['medical_leave_entitlement'],
				
			);	

		}
		return $pay_structure_data;
	}
	/*function getEditpay_structure($pay_structureId){
		$this->db->select('nbb_pay_structure.*');
		$this->db->from('nbb_pay_structure');
		 $this->db->where('id',$pay_structureId);
		//return $this->db->get()->result_array();
		$pay_structure_query = $this->db->get()->result_array();
		$pay_structure_data = array();

		foreach( $pay_structure_query as $row){				

			$pay_structure_data = array(
				'id' 					=> $row['id'],
				'dearness_Allowance' 	=> $row['dearness_Allowance'],
				'provident_Fund' 		=> $row['provident_Fund'],
				'ESI' 					=> $row['ESI'],
				'medical_Allowance' 	=> $row['medical_Allowance'],
				
			);	

		}
		return $pay_structure_data;
	}*/
	function getEditmanual_fee($pay_structureId){
		$this->db->select('nbb_manual_fee.*');
		$this->db->from('nbb_manual_fee');
		$this->db->where('nbb_manual_fee.id',$pay_structureId);
		
		$pay_structure_query = $this->db->get()->result_array();
		$pay_structure_data = array();

		foreach($pay_structure_query as $row){				

			$pay_structure_data = array(
				'id' 			=> $pay_structureId,
				'type_of_fee' 	=> $row['type_of_fee'],
				'amount' 		=> $row['amount'],
				'status' 		=> $row['status'],	
			);	

		}
		return $pay_structure_data;
	}
	function getEditcommission_structure_a($commission_feeId){
		$this->db->select('nbb_commission_structure_a.*');
		$this->db->from('nbb_commission_structure_a');
		$this->db->where('nbb_commission_structure_a.id',$commission_feeId);
		
		$commission_structure_query = $this->db->get()->result_array();
		$pay_structure_data = array();

		foreach($commission_structure_query as $row){				

			$pay_structure_data = array(
				'id' 			=> $commission_feeId,
				'from_range' 	=> $row['from_range'],
				'to_range' 		=> $row['to_range'],
				'amount' 		=> $row['amount'],
			);	

		}
		return $pay_structure_data;
	}
	function getEditcommission_structure_b($commission_feeId){
		$this->db->select('nbb_commission_structure_b.*');
		$this->db->from('nbb_commission_structure_b');
		$this->db->where('nbb_commission_structure_b.id',$commission_feeId);
		
		$commission_structure_query = $this->db->get()->result_array();
		$pay_structure_data = array();

		foreach($commission_structure_query as $row){				

			$pay_structure_data = array(
				'id' 			=> $commission_feeId,
				'fee_Type' 	=> $row['fee_Type'],
				'amount' 		=> $row['amount'],
			);	

		}
		return $pay_structure_data;
	}
	function getEditcommission_structure_c($commission_feeId){

		$this->db->select('nbb_commission_structure_c.*');
		$this->db->from('nbb_commission_structure_c');
		$this->db->where('nbb_commission_structure_c.id',$commission_feeId);
		
		$commission_structure_query = $this->db->get()->result_array();
		$pay_structure_data = array();

		foreach($commission_structure_query as $row){				

			$pay_structure_data = array(
				'id' 			=> $commission_feeId,
				'type_of_fee' 	=> $row['type_of_fee'],
				'amount' 		=> $row['amount'],
			);	

		}
		return $pay_structure_data;
	}
	function getEditcommission_c_partnership($commission_feeId){

		$this->db->select('nbb_commission_c_partnership.*');
		$this->db->from('nbb_commission_c_partnership');
		$this->db->where('nbb_commission_c_partnership.id',$commission_feeId);
		
		$commission_structure_query = $this->db->get()->result_array();
		$pay_structure_data = array();

		foreach($commission_structure_query as $row){				

			$pay_structure_data = array(
				'id' 			=> $commission_feeId,
				'type_of_fee' 	=> $row['type_of_fee'],
				'amount' 		=> $row['amount'],
			);	

		}
		return $pay_structure_data;
	}
	function getAllcpf(){
		$this->db->select('nbb_cpf.*');
		$this->db->from('nbb_cpf');
		return $this->db->get()->result_array();
	}
	function getEditCpf($Id){

		$this->db->select('nbb_cpf.*');
		$this->db->from('nbb_cpf');
		$this->db->where('nbb_cpf.id',$Id);
		
		$nbb_cpf_query = $this->db->get()->result_array();
		$cpf_data = array();

		foreach($nbb_cpf_query as $row){				

			$cpf_data = array(
				'id' 	=> $Id,
				'age' 	=> $row['age'],
				'year' 	=> $row['year'],
				'salary_from' 	=> $row['salary_from'],
				'salary_to' 	=> $row['salary_to'],
				//'employer_cpf' 	=> $row['employer_cpf'],
				'emp_cpf' 	=> $row['emp_cpf'],
				'status' 	=> $row['status'],
			);	

		}
		return $cpf_data;
	}
}

?>
