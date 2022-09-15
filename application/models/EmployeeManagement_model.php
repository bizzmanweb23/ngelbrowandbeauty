<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeManagement_model extends CI_Model
{
	public function __construct()
	{
		// Call the CI_Model constructor
		//$this->load->library('m_pdf');
		parent::__construct();

	}
	function getAllemployees(){
		$this->db->select('nbb_employees.*,
		nbb_roles.role_name AS designation_name,
		nbb_job_type.type_name as job_type');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_roles', 'nbb_roles.id = nbb_employees.designation', 'LEFT');
		$this->db->join('nbb_job_type', 'nbb_job_type.id = nbb_employees.job_type_id', 'LEFT');
		$this->db->where('nbb_employees.status', '1');
		return $this->db->get()->result_array();
	}
	function getAllArchiveEmployees(){
		$this->db->select('nbb_employees.*,
		nbb_roles.role_name AS designation_name');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_roles', 'nbb_roles.id = nbb_employees.designation', 'LEFT');
		$this->db->where('nbb_employees.status', '0');
		return $this->db->get()->result_array();
	}
	function getAllEmployeeAttendance($empid){
		$this->db->select('nbb_employees_attendance.emp_id,
		nbb_employees_attendance.login,
		nbb_employees_attendance.logout');
		$this->db->from('nbb_employees_attendance');
		$this->db->where('nbb_employees_attendance.emp_id', $empid);
		return $this->db->get()->result_array();
		
	}
	function getAllemp_designation(){
		
		$this->db->select('nbb_roles.*');
		$this->db->from('nbb_roles');
		return $this->db->get()->result_array();
	}
	function getAllemp_jobType(){
		
		$this->db->select('nbb_job_type.*');
		$this->db->from('nbb_job_type');
		return $this->db->get()->result_array();
		
	}
	function storeEmployee($data)
    {
        $insert = $this->db->insert('nbb_employees',$data); 
        return true;
    }
	function storeEmployeeaddress($data)
    {
        $insert = $this->db->insert('nbb_employee_address',$data); 
        return true;
    }
	function storeEmployeesalary($data)
    {
        $insert = $this->db->insert('nbb_employee_salary',$data); 
        return true;
    }
	function storeEducationQualification($data)
    {
        $insert = $this->db->insert('nbb_emp_education_qualification',$data); 
        return true;
    }
	function storeWorkExperience($data)
    {
        $insert = $this->db->insert('nbb_work_experience',$data); 
        return true;
    }
	function storeEmployeeleave($data)
    {
        $insert = $this->db->insert('nbb_employee_leave',$data); 
        return true;
    }
	function storeEmployeeAttendance($data)
    {
        $insert = $this->db->insert('nbb_employees_attendance',$data); 
        return true;
    }
	function getAllemp_Details($id){
		$this->db->select('nbb_employees.*,
		nbb_job_type.type_name as jobtype,
		nbb_roles.role_name,
		nbb_employee_address.full_address,
		nbb_employee_address.land_mark,
		nbb_employee_address.city,
		nbb_employee_address.pincode,
		nbb_employee_address.state');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_roles', 'nbb_roles.id = nbb_employees.designation', 'LEFT');
		$this->db->join('nbb_employee_address', 'nbb_employee_address.emp_id = nbb_employees.id', 'LEFT');
		$this->db->join('nbb_job_type', 'nbb_job_type.id = nbb_employees.job_type_id', 'LEFT');
		$this->db->where('nbb_employees.id', $id);
		//return $this->db->get()->result_array();
		$employees_query = $this->db->get()->result_array();
		$data = array();			

		foreach($employees_query as $row){	
			$data = array(
				'id' => $id,
				'emp_number' => $row['emp_number'],
				'first_name' => $row['first_name'],
				'last_name' => $row['last_name'],
				'designation_name' => $row['role_name'],
				'employee_photo' => $row['employee_photo'],
				'aadhaar_number' => $row['aadhaar_number'],
				'pan_number' => $row['pan_number'],
				'date_of_birth' => $row['date_of_birth'],
				'age' => $row['age'],
				'mob_no' => $row['mob_no'],
				'email' => $row['email'],
				'password' => $row['password'],
				'father_name' => $row['father_name'],
				'mother_name' => $row['mother_name'],
				'husband_name' => $row['husband_name'],
				'gender' => $row['gender'],
				'designation' => $row['designation'],
				'payStructure' => $row['payStructure'],
				'basicSalary' => $row['basicSalary'],
				'jobtype' => $row['jobtype'],
				'date_of_joining' => $row['date_of_joining'],
				'willing_to_relocate' => $row['willing_to_relocate'],
				'full_address' => $row['full_address'],
				'land_mark' => $row['land_mark'],
				'city' => $row['city'],
				'state' => $row['state'],
				'pincode' => $row['pincode'],
			);
		}
		return $data;
	}
	function getshowCommissionPay($salary_Date,$employee_Name){
		$order_product_sql  = "SELECT DATE_FORMAT(nbb_order_main.create_date, '%MM-%Y') as month,
		sum(nbb_order_product.total_price) as total,
		nbb_employees.first_name,
		nbb_employees.last_name,
		nbb_employees.jobtype,
		nbb_employees.basicSalary,
		nbb_roles.role_name,
		nbb_dashboard.amount as service_amount
		FROM nbb_order_product
		LEFT JOIN nbb_order_main ON nbb_order_main.id = nbb_order_product.order_id 
		LEFT JOIN nbb_employees ON nbb_employees.id = nbb_order_main.saler_id 
		LEFT JOIN nbb_roles ON nbb_roles.id = nbb_employees.designation 
		LEFT JOIN nbb_dashboard ON nbb_dashboard.therapist_id = nbb_order_main.saler_id 
		WHERE nbb_order_main.saler_id = '".$employee_Name."' AND DATE_FORMAT(nbb_order_main.create_date, '%Y-%m') = '".$salary_Date."'"; 
		$order_product_query = $this->db->query($order_product_sql);
		$order_product_data = $order_product_query->result_array();
		$dataArr = array();
		foreach($order_product_data as $row){

			//echo $total = $row['total'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$jobtype = $row['jobtype'];
			$role_name = $row['role_name'];
			$service_amount = $row['service_amount'];

			/*$splittedstring2 = explode(",", $service_amount);
				foreach ($splittedstring2 as $key => $value) {
					$service_sql2 = "SELECT nbb_manual_fee.type_of_fee FROM nbb_manual_fee WHERE nbb_manual_fee.id = '".$value."'";
					$service_query2 = $this->db->query($service_sql2);	
					foreach($service_query2->result_array() as $serviceRow2){
						
						echo  $service_name2 = $serviceRow2['service_name'];

					}
					if(count($splittedstring2) > 1){
						echo ',';
					}
				}*/

			
			/*$nbb_commission_structure_a_sql  = "SELECT * FROM nbb_commission_structure_a"; 
			$nbb_commission_structure_a_query = $this->db->query($nbb_commission_structure_a_sql);
			$commission_structure_a_data = $nbb_commission_structure_a_query->result_array();
			foreach($commission_structure_a_data as $commission_structure_aRow){

			}*/
			
			$nbb_commission_structure_a_sql  = "SELECT * FROM nbb_commission_structure_a"; 
			$nbb_commission_structure_a_query = $this->db->query($nbb_commission_structure_a_sql);
			$commission_structure_a_data = $nbb_commission_structure_a_query->result_array();
			foreach($commission_structure_a_data as $commission_structure_aRow){
				$from_range = $commission_structure_aRow['from_range'];
				$commission_amount = $commission_structure_aRow['amount'];
				if($row['total'] <= $from_range){
					$total = round(($commission_amount / $row['total']) * 100);
				}else
					$total = 'test';
				}
				
				/*if($row['service_amount'] <= $from_range){
					$total = round(($amount / $row['total']) * 100);
				}else
					$total = 'test';
				}*/

				$dataArr []= array(
					'sales_amount'		=> $row['total'],
					'commission' 		=> $total,
					'first_name' 		=> $first_name,
					'last_name'			=> $last_name,
					'jobtype' 			=> $jobtype,
					'role_name' 		=> $role_name
					
				);

			}
			echo json_encode($dataArr);

		}

		function getshowfulltimePay($salary_Date,$employee_Name){
			
			$order_product_sql  = "SELECT DATE_FORMAT(nbb_order_main.create_date, '%MM-%Y') as month,
			sum(nbb_order_product.total_price) as total,
			nbb_employees.first_name,
			nbb_employees.last_name,
			nbb_employees.jobtype,
			nbb_employees.basicSalary,
			nbb_employees.designation,
			nbb_roles.role_name,
			nbb_dashboard.amount as service_amount
			FROM nbb_order_product
			LEFT JOIN nbb_order_main ON nbb_order_main.id = nbb_order_product.order_id 
			LEFT JOIN nbb_employees ON nbb_employees.id = nbb_order_main.saler_id 
			LEFT JOIN nbb_roles ON nbb_roles.id = nbb_employees.designation 
			LEFT JOIN nbb_dashboard ON nbb_dashboard.therapist_id = nbb_order_main.saler_id 
			WHERE nbb_order_main.saler_id = '".$employee_Name."' AND DATE_FORMAT(nbb_order_main.create_date, '%Y-%m') = '".$salary_Date."'"; 
			$order_product_query = $this->db->query($order_product_sql);
			$order_product_data = $order_product_query->result_array();
			$dataArr = array();
			$first_name = '';$last_name = '';$jobtype = '';$role_name = '';$service_amount = '';$empbasicSalary = '';
			foreach($order_product_data as $row){
	
				//echo $total = $row['total'];
				$first_name = $row['first_name'];
				$last_name = $row['last_name'];
				$jobtype = $row['jobtype'];
				$role_name = $row['designation'];
				$service_amount = $row['service_amount'];
				$empbasicSalary = $row['basicSalary'];
	
				
				//if($salary_Date != '' && $employee_Name != ''){
				$commission_structure_b_sql  = "SELECT * FROM nbb_commission_structure_b"; 
				$commission_structure_b_query = $this->db->query($commission_structure_b_sql);
				$commission_structure_b_data = $commission_structure_b_query->result_array();
				foreach($commission_structure_b_data as $commission_structure_bRow){
					$fee_Type = $commission_structure_bRow['fee_Type'];
					$commission_amount = $commission_structure_bRow['amount'];
					if($row['total'] <= $fee_Type){
						$total = $commission_amount;
					}else{
						$total = 'test';
					}
				}
				
				$employees_attendance_sql = "SELECT nbb_employees_attendance.emp_id, SUM(nbb_employees_attendance.work_hours) as total_hours
					FROM nbb_employees_attendance    
					WHERE nbb_employees_attendance.emp_id = '".$employee_Name."' AND DATE_FORMAT(nbb_employees_attendance.login, '%Y-%m') = '".$salary_Date."'";

					$employees_attendance_query = $this->db->query($employees_attendance_sql);
					$employees_attendance_data = $employees_attendance_query->result_array();

					foreach($employees_attendance_data as $employees_attendanceRow){
						$total_hours = $employees_attendanceRow['total_hours'];
						$roundTotal_hours = round($total_hours);
						if($roundTotal_hours > 16){
							$attendanceTotal = 100;
						}else{
							$attendanceTotal = 'test';
						}
					}
					$fullTimetotal_earning = $empbasicSalary + $total + $attendanceTotal;
				//}
					$dataArr []= array(
						'sales_amount'		=> $row['total'],
						'commission' 		=> $total,
						'first_name' 		=> $first_name,
						'last_name'			=> $last_name,
						'role_name' 		=> $role_name,
						'attendanceTotal' 	=> $attendanceTotal,
						'roundTotal_hours'  => $roundTotal_hours,
						'basicSalary' 		=> $empbasicSalary,
						'fullTimetotal_ear' => $fullTimetotal_earning,
						
					);
	
				}
				echo json_encode($dataArr);
	}


	function getAllEmployeeCommissionSalary(){
		$this->db->select('nbb_employee_salary.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_employee_salary');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_salary.emp_id', 'LEFT');
		return $this->db->get()->result_array();
	}
	function getAllEmployeeFultimeSalary(){
		$this->db->select('nbb_employee_salary.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name,
		nbb_roles.role_name as designation_name');
		$this->db->from('nbb_employee_salary');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_salary.emp_id', 'LEFT');
		$this->db->join('nbb_roles', 'nbb_roles.id = nbb_employee_salary.dept_id', 'LEFT');
		$multiClause = array('nbb_employee_salary.job_type' => 'FullTime Staff');
		$this->db->where($multiClause);
		return $this->db->get()->result_array();
	}
	function getAllEmployeepartnershipSalary(){
		$this->db->select('nbb_employee_salary.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name,
		nbb_roles.role_name as designation_name');
		$this->db->from('nbb_employee_salary');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_salary.emp_id', 'LEFT');
		$this->db->join('nbb_roles', 'nbb_roles.id = nbb_employee_salary.dept_id', 'LEFT');
		$multiClause = array('nbb_employee_salary.job_type' => 2 );
		$this->db->where($multiClause);
		return $this->db->get()->result_array();
	}
	function geteditEmployeeSalary($id){
		$this->db->select('nbb_employee_salary.*');
		$this->db->from('nbb_employee_salary');
		$this->db->where('nbb_employee_salary.id', $id);
		return $this->db->get()->result_array();
	}
	function getAllemp_leave(){
		$this->db->select('nbb_employee_leave.*,nbb_employees.first_name,
		nbb_employees.last_name,nbb_employees.yearly_leave');
		$this->db->from('nbb_employee_leave');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_leave.emp_id', 'LEFT');
		return $this->db->get()->result_array();
	}
	function getAllemp_Attendance(){
		$this->db->select('nbb_employees_attendance.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_employees_attendance');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employees_attendance.emp_id', 'LEFT');
		return $this->db->get()->result_array();
	}
	function geteditEmployeeLeave($id){
		$this->db->select('nbb_employee_leave.*');
		$this->db->from('nbb_employee_leave');
		$this->db->where('nbb_employee_leave.id', $id);
		return $this->db->get()->result_array();
	}
	
	function getHrmsAllemp_leave($empid){
		$this->db->select('nbb_employee_leave.*,nbb_employees.first_name,
		nbb_employees.last_name,nbb_employees.yearly_leave');
		$this->db->from('nbb_employee_leave');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_leave.emp_id', 'LEFT');
		$this->db->where('nbb_employee_leave.emp_id', $empid);
		return $this->db->get()->result_array();
	}
	function getAllempAvailable_leave($id){
		$this->db->select('nbb_employees.available_leave');
		$this->db->from('nbb_employees');
		$this->db->where('nbb_employees.id', $id);
		$employees_query = $this->db->get()->result_array();
		$data = array();			

		foreach($employees_query as $row){	
			$data = array(
				'available_leave' => $row['available_leave'],
			);
		}
		return $data;
	}
	function getAllHrmsEmployees($empid){
		$this->db->select('nbb_employees.*,
		nbb_employee_address.full_address,
		nbb_employee_address.land_mark,nbb_employee_address.city,nbb_employee_address.state,nbb_employee_address.pincode');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_employee_address', 'nbb_employee_address.emp_id = nbb_employees.id', 'LEFT');
		$multiClause = array('nbb_employees.id' => $empid, 'nbb_employees.status' => 1 );
		$this->db->where($multiClause);
		return $this->db->get()->result_array();
	}
	function getAllHrmsEmployeeSalary($empid){
		$this->db->select('nbb_employee_salary.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name,
		nbb_emp_designation.designation_name');
		$this->db->from('nbb_employee_salary');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employee_salary.emp_id', 'LEFT');
		$this->db->join('nbb_emp_designation', 'nbb_emp_designation.id = nbb_employee_salary.dept_id', 'LEFT');
		$this->db->where('nbb_employee_salary.emp_id', $empid);
		return $this->db->get()->result_array();
	}
	function getHrmsEmployeeAttendance($empid){
		$this->db->select('nbb_employees_attendance.*,
		nbb_employees.emp_number,
		nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_employees_attendance');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_employees_attendance.emp_id', 'LEFT');
		$this->db->where('nbb_employees_attendance.emp_id', $empid);
		return $this->db->get()->result_array();
	}
	function getDownload_attendance($employeeid,$login_Time){
		$sql_emp_attendance = "SELECT nbb_employees_attendance.*,
			nbb_employees.emp_number,
			nbb_employees.first_name,
			nbb_employees.last_name
			FROM nbb_employees_attendance 
			LEFT JOIN nbb_employees ON nbb_employees.id = nbb_employees_attendance.emp_id
			WHERE nbb_employees_attendance.emp_id = '".$employeeid."' AND DATE_FORMAT(nbb_employees_attendance.login, '%Y-%m') = '".$login_Time."'";
		
		$query_emp_attendance = $this->db->query($sql_emp_attendance); 
		return $query_emp_attendance->result_array();	
	}
	
	function getEmployeeNameDownload_attendance($id){
		
		$this->db->select('nbb_employees.*');
		$this->db->from('nbb_employees');
		$this->db->where('nbb_employees.id', $id);
		//return $this->db->get()->result_array();
		$employees_query = $this->db->get()->result_array();
		$empname = '';			

		foreach($employees_query as $row){	
		
			$empname = $row['first_name'].'_'.$row['last_name'];		

		}
		return $empname;
	}
	function getAllholidaysList(){
		$year = date("Y"); 
		$this->db->select('nbb_emp_holidays.*');
		$this->db->from('nbb_emp_holidays');
		$this->db->where('nbb_emp_holidays.year', $year);
		return $this->db->get()->result_array();
		
	}
	function getSearchHolidayYearData($holidayYear){
		$this->db->select("nbb_emp_holidays.*");
		$this->db->from("nbb_emp_holidays");
		$this->db->like('nbb_emp_holidays.year', $holidayYear);
		return $this->db->get()->result_array();
	}
}
?>
