<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comissionController extends CI_Controller {
	public function comission()
	{
		 print "<pre>";
		 print_r($this->input->post());
		 exit();
	}

	public function worksmanCommission(){
		$id =  $this->input->post('data');
		$this->db->select('*');
		$this->db->from('nbb_job_type');
		$this->db->where('id', $id);
		$data = $this->db->get();
		$result['data'] = $data->result_array();

		echo json_encode($result);
	}

	public function empCommission()
	{
		$id = $this->input->post('data');
		$this->db->select('*');
		$this->db->from('nbb_employees emp');
		$this->db->join('nbb_employee_salary s','s.emp_id =  emp.id');
		$this->db->join('nbb_emp_designation dsg' , 'dsg.id = emp.designation');
		$this->db->join('nbb_commission c', 'c.emp_id = emp.id');
		$this->db->join('nbb_employees_attendance att','att.emp_id = emp.id');
		$this->db->join('nbb_cpf','nbb_cpf.emp_id = emp.id');
		$this->db->join('nbb_roles','nbb_roles.emp_id = emp.id');
		$this->db->where('emp.id',$id);
		$data = $this->db->get()->result();
		echo json_encode($data);

	}

	public function attendance_sum()
	{
		$id = $this->input->post('data');
		$this->db->select('*');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_employees_attendance','nbb_employees_attendance.emp_id = nbb_employees.id');
	 	$this->db->where('nbb_employees.id',$id);
		$data = $this->db->get()->result();
		echo json_encode($data);
	}

	public function get_cpf(){
		$id = $this->input->post('data');
		$this->db->select('*');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_cpf','nbb_cpf.emp_id = nbb_employees.id');
		$this->db->where('nbb_employees.id',$id);
		$data = $this->db->get()->result();
		echo json_encode($data);
	}
	public function empDate()
	{

		$id = $this->input->post('data');
		$this->db->select('*');
		$this->db->from('nbb_employees emp');
		$this->db->join('nbb_employee_salary s','s.emp_id =  emp.id');
		$this->db->join('nbb_emp_designation dsg' , 'dsg.id = emp.designation');
		$this->db->join('nbb_job_type type', 'type.id = emp.job_type');
		$this->db->join('nbb_commission c', 'c.emp_id = emp.id');
	 	$this->db->where('emp.id',$id);
		$data = $this->db->get();
		$result['data'] = $data->result_array(); 
		echo json_encode($result);

	}
}
?>
