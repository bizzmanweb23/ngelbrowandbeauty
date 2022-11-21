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
		$salaryDate = $this->input->post('salaryDate');
		$date =  date('Y',strtotime($salaryDate));
		//$date = date_format($salaryDate,"Y");

		$nbb_employees_sql  = "SELECT
			nbb_employees.first_name,
			nbb_employees.last_name,
			nbb_employees.basicSalary,
			nbb_employees.age,
			nbb_employees.designation,
			nbb_roles.role_name
			FROM nbb_employees
			LEFT JOIN nbb_roles ON nbb_roles.id = nbb_employees.designation 
			WHERE nbb_employees.id = '".$id."'"; 
			$nbb_employees_query = $this->db->query($nbb_employees_sql);
			$employees_data = $nbb_employees_query->result_array();
			$dataArr = array();
			$first_name = '';$last_name = '';$role_name = ''; $empbasicSalary = '';
			foreach($employees_data as $row){
	
				$role_name = $row['role_name'];
				$empbasicSalary = $row['basicSalary'];
				$empage = $row['age'];
	
				$nbb_cpf_sql  = "SELECT nbb_cpf.* 
				FROM nbb_cpf 
				WHERE nbb_cpf.year = '".$date."'"; 
				$nbb_cpf_query = $this->db->query($nbb_cpf_sql);
				$nbb_cpf_data = $nbb_cpf_query->result_array();

				foreach($nbb_cpf_data as $nbb_cpf_dataRow){
					$cpfage = $nbb_cpf_dataRow['start_age'];
					$salary_from = $nbb_cpf_dataRow['salary_from'];
					$salary_to = $nbb_cpf_dataRow['salary_to'];
					$emp_cpf = $nbb_cpf_dataRow['emp_cpf'];
					if($empage >= $cpfage && $empbasicSalary >= $salary_from){
						$total = round(($empbasicSalary * $emp_cpf) / 100);
					}else{
						$total = '0';
					}
				}
				
					$dataArr []= array(
						'role_name' 		=> $role_name,
						'CPFtotal' 		=> $total,
						'empbasicSalary' 		=> $empbasicSalary,
					);
	
				}
		echo json_encode($dataArr);
	}
	public function attendance_sum()
	{
		$id = $this->input->post('data');
		$salaryDate = $this->input->post('salaryDate');
		$employees_attendance_sql = "SELECT SUM(nbb_employees_attendance.work_hours) AS total_hours,
		DATE_FORMAT(nbb_employees_attendance.login, '%MM-%Y') as month
		FROM nbb_employees_attendance
		WHERE nbb_employees_attendance.emp_id = '".$id."' AND DATE_FORMAT(nbb_employees_attendance.login, '%Y-%m') = '".$salaryDate."'";
		$employees_attendance_query = $this->db->query($employees_attendance_sql);
		$employees_attendance_data = $employees_attendance_query->result_array();

		$dataArr = array();
		foreach($employees_attendance_data as $row){
				$total_hours = round($row['total_hours']);
				if($total_hours >= '208'){
					$attendance_bonus = 100;
				}else{
					$attendance_bonus = 0;
				}
			$dataArr []= array(
				'total_hours' 		=> $total_hours,
				'attendance_bonus' 		=> $attendance_bonus,
			);
		}
		echo json_encode($dataArr);
	}
	public function dashboard_sum()
	{
		$id = $this->input->post('data');
		$salaryDate = $this->input->post('salaryDate');
		$employees_dashboard_sql = "SELECT SUM(nbb_dashboard.amount) AS totalAmount,
		DATE_FORMAT(nbb_dashboard.start_date, '%MM-%Y') as month
		FROM nbb_dashboard
		WHERE nbb_dashboard.therapist_id = '".$id."' AND DATE_FORMAT(nbb_dashboard.start_date, '%Y-%m') = '".$salaryDate."'";
		
		$employees_dashboard_query = $this->db->query($employees_dashboard_sql);
		$employees_dashboard_data = $employees_dashboard_query->result_array();

		$dataArr = array();
		foreach($employees_dashboard_data as $row){
				$total_amount = round($row['totalAmount']);
				if($total_amount >= '99'){
					$service_bonus = ($total_amount * 5)/100;
				}else{
					$service_bonus = 0;
				}
			$dataArr []= array(
				'service_bonus' 		=> $service_bonus,
				'total_amount' 		=> $total_amount,
			);
		}

		echo json_encode($dataArr);
	}
	function getshowCommissionPay(){

		$id = $this->input->post('data');
		$salaryDate = $this->input->post('salaryDate');

		$order_product_sql  = "SELECT DATE_FORMAT(nbb_order_main.create_date, '%MM-%Y') as month,
		sum(nbb_order_product.total_price) as total,
		nbb_employees.basicSalary
		FROM nbb_order_product
		LEFT JOIN nbb_order_main ON nbb_order_main.id = nbb_order_product.order_id 
		LEFT JOIN nbb_employees ON nbb_employees.id = nbb_order_main.saler_id 
		WHERE nbb_employees.id = '".$id."' AND DATE_FORMAT(nbb_order_main.create_date, '%Y-%m') = '".$salaryDate."'"; 

		$order_product_query = $this->db->query($order_product_sql);
		$order_product_data = $order_product_query->result_array();
		$dataArr = array();
		foreach($order_product_data as $row){

			$total = $row['total'];

			if($total >= '10000'){
				$totalbonus = '200';
			}elseif($total >= '20000'){
				$totalbonus = '200';
			}else{
				$totalbonus = '0';
			}
			
			$commission_structure_sql  = "SELECT * FROM nbb_commission_structure_a"; 
			$commission_structure_query = $this->db->query($commission_structure_sql);
			$commission_structure_data = $commission_structure_query->result_array();
			foreach($commission_structure_data as $commission_structureRow){
				$from_range = $commission_structureRow['from_range'];
				$commission_amount = $commission_structureRow['amount'];

				if($total >= $from_range){
					$totalCommission = round(($commission_amount * $row['total']) / 100);
				}else{
					$totalCommission = '0';
				}
			}
				$dataArr []= array(
					'total'			=> $total,
					'commission' 	=> $totalCommission,
					'totalbonus'	=> $totalbonus,
					
				);

			}
			echo json_encode($dataArr);

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
	public function totalearnings(){
		$id = $this->input->post('data');
		$salaryDate = $this->input->post('salaryDate');
		$date =  date('Y',strtotime($salaryDate));
		$nbb_employees_sql  = "SELECT
			nbb_employees.first_name,
			nbb_employees.last_name,
			nbb_employees.basicSalary,
			nbb_employees.age,
			nbb_employees.designation,
			nbb_roles.role_name
			FROM nbb_employees
			LEFT JOIN nbb_roles ON nbb_roles.id = nbb_employees.designation 
			WHERE nbb_employees.id = '".$id."'"; 
			$nbb_employees_query = $this->db->query($nbb_employees_sql);
			$employees_data = $nbb_employees_query->result_array();
			$role_name =''; 
			$empbasicSalary = 0;
			$cpftotal = 0;
			$attendance_bonus = 0;
			$service_bonus = 0;
			$totalbonus = 0;
			$totalCommission = 0;
			foreach($employees_data as $row){
	
				$role_name = $row['role_name'];
				$empbasicSalary = $row['basicSalary'];
				$empage = $row['age'];
	
				$nbb_cpf_sql  = "SELECT nbb_cpf.* 
				FROM nbb_cpf 
				WHERE nbb_cpf.year = '".$date."'"; 
				$nbb_cpf_query = $this->db->query($nbb_cpf_sql);
				$nbb_cpf_data = $nbb_cpf_query->result_array();

				foreach($nbb_cpf_data as $nbb_cpf_dataRow){
					$cpfage = $nbb_cpf_dataRow['start_age'];
					$salary_from = $nbb_cpf_dataRow['salary_from'];
					$emp_cpf = $nbb_cpf_dataRow['emp_cpf'];
					if($empage >= $cpfage && $empbasicSalary >= $salary_from){
						$cpftotal = round(($empbasicSalary * $emp_cpf) / 100);
					}else{
						$cpftotal = '0';
					}
				}

			}
		//attandance
		$employees_attendance_sql = "SELECT SUM(nbb_employees_attendance.work_hours) AS total_hours,
		DATE_FORMAT(nbb_employees_attendance.login, '%MM-%Y') as month
		FROM nbb_employees_attendance
		WHERE nbb_employees_attendance.emp_id = '".$id."' AND DATE_FORMAT(nbb_employees_attendance.login, '%Y-%m') = '".$salaryDate."'";
		$employees_attendance_query = $this->db->query($employees_attendance_sql);
		$employees_attendance_data = $employees_attendance_query->result_array();

		foreach($employees_attendance_data as $row){
				$total_hours = round($row['total_hours']);
				if($total_hours >= '208'){
					$attendance_bonus = 100;
				}else{
					$attendance_bonus = 0;
				}
				
		}
		//service amount
		$employees_dashboard_sql = "SELECT SUM(nbb_dashboard.amount) AS totalAmount,
		DATE_FORMAT(nbb_dashboard.start_date, '%MM-%Y') as month
		FROM nbb_dashboard
		WHERE nbb_dashboard.therapist_id = '".$id."' AND DATE_FORMAT(nbb_dashboard.start_date, '%Y-%m') = '".$salaryDate."'";
		
		$employees_dashboard_query = $this->db->query($employees_dashboard_sql);
		$employees_dashboard_data = $employees_dashboard_query->result_array();

		foreach($employees_dashboard_data as $row){
				$total_amount = round($row['totalAmount']);
				if($total_amount >= '99'){
					$service_bonus = ($total_amount * 5)/100;
				}else{
					$service_bonus = 0;
				}
		}
		//Sales commision
		$order_product_sql  = "SELECT DATE_FORMAT(nbb_order_main.create_date, '%MM-%Y') as month,
		sum(nbb_order_product.total_price) as total,
		nbb_employees.basicSalary
		FROM nbb_order_product
		LEFT JOIN nbb_order_main ON nbb_order_main.id = nbb_order_product.order_id 
		LEFT JOIN nbb_employees ON nbb_employees.id = nbb_order_main.saler_id 
		WHERE nbb_employees.id = '".$id."' AND DATE_FORMAT(nbb_order_main.create_date, '%Y-%m') = '".$salaryDate."'"; 

		$order_product_query = $this->db->query($order_product_sql);
		$order_product_data = $order_product_query->result_array();
		
		foreach($order_product_data as $row){

			$commisiontotal = $row['total'];

			if($commisiontotal >= '10000'){
				$totalbonus = '200';
			}elseif($commisiontotal >= '20000'){
				$totalbonus = '200';
			}else{
				$totalbonus = '0';
			}
			
			$commission_structure_sql  = "SELECT * FROM nbb_commission_structure_a"; 
			$commission_structure_query = $this->db->query($commission_structure_sql);
			$commission_structure_data = $commission_structure_query->result_array();
			foreach($commission_structure_data as $commission_structureRow){
				$from_range = $commission_structureRow['from_range'];
				$commission_amount = $commission_structureRow['amount'];

				if($commisiontotal >= $from_range){
					$totalCommission = round(($commission_amount * $row['total']) / 100);
				}else{
					$totalCommission = '0';
				}
			}
			}
		
			$sum = $empbasicSalary + $cpftotal + $attendance_bonus + $service_bonus + $totalbonus + $totalCommission;
			echo $sum;
	}
	public function partnershipServiceCommission()
		{
			//$id = $this->input->post('data');
			$salaryDate = $this->input->post('salaryDate');
			$employees_dashboard_sql = "SELECT SUM(nbb_dashboard.amount) AS totalAmount,
			DATE_FORMAT(nbb_dashboard.start_date, '%Y') as month
			FROM nbb_dashboard
			WHERE DATE_FORMAT(nbb_dashboard.start_date, '%Y') = '".$salaryDate."'";
			
			$employees_dashboard_query = $this->db->query($employees_dashboard_sql);
			$employees_dashboard_data = $employees_dashboard_query->result_array();
	
			$dataArr = array();
			foreach($employees_dashboard_data as $row){
					$total_amount = round($row['totalAmount']);
					
					$service_bonus = ($total_amount * 20)/100;

				$dataArr []= array(
					'service_bonus' 	=> $service_bonus,
					'total_amount' 		=> $total_amount,
				);
			}
	
			echo json_encode($dataArr);
		}
	function parnershipCommissionPay(){

			//$id = $this->input->post('id');
			$salaryDate = $this->input->post('salaryDate');
	
			$order_product_sql  = "SELECT DATE_FORMAT(nbb_order_main.create_date, '%Y') as month,
			sum(nbb_order_product.total_price) as total
			FROM nbb_order_product
			LEFT JOIN nbb_order_main ON nbb_order_main.id = nbb_order_product.order_id 
			WHERE DATE_FORMAT(nbb_order_main.create_date, '%Y') = '".$salaryDate."'"; 
	
			$order_product_query = $this->db->query($order_product_sql);
			$order_product_data = $order_product_query->result_array();
			$CommissionArr = array();
			foreach($order_product_data as $row){
	
				$salestotal = round($row['total']);
				$salesCommission = ($salestotal * 10) / 100;
	
					$CommissionArr[] = array(
						'salestotal'			=> $salestotal,
						'salesCommission' 	=> $salesCommission
					);
	
				}
				echo json_encode($CommissionArr);
	
		}
	function parnershipTotalEarning(){
		$salaryDate = $this->input->post('salaryDate');
			$employees_dashboard_sql = "SELECT SUM(nbb_dashboard.amount) AS totalAmount,
			DATE_FORMAT(nbb_dashboard.start_date, '%Y') as month
			FROM nbb_dashboard
			WHERE DATE_FORMAT(nbb_dashboard.start_date, '%Y') = '".$salaryDate."'";
			
			$employees_dashboard_query = $this->db->query($employees_dashboard_sql);
			$employees_dashboard_data = $employees_dashboard_query->result_array();
	
			foreach($employees_dashboard_data as $row){
					$total_amount = round($row['totalAmount']);
					$service_bonus = ($total_amount * 20)/100;
			}
			
			$order_product_sql  = "SELECT DATE_FORMAT(nbb_order_main.create_date, '%Y') as month,
			sum(nbb_order_product.total_price) as total
			FROM nbb_order_product
			LEFT JOIN nbb_order_main ON nbb_order_main.id = nbb_order_product.order_id 
			WHERE DATE_FORMAT(nbb_order_main.create_date, '%Y') = '".$salaryDate."'"; 
	
			$order_product_query = $this->db->query($order_product_sql);
			$order_product_data = $order_product_query->result_array();
			$CommissionArr = array();
			foreach($order_product_data as $row){
	
				$salestotal = round($row['total']);
				$salesCommission = ($salestotal * 10) / 100;
	
				}
			$sum = $service_bonus + $salesCommission;
			echo $sum;
	}
}
?>
