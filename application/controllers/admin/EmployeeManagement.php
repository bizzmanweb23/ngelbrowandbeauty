<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();

		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	public function all_employees()
    {
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$this->layout->view('all_employees',$data); 
	}
	public function add_employeeDetails()
    {
       
		$data['name'] = $this->session->userdata('name');
		$data['empjobType'] = $this->EmployeeManagement->getAllemp_jobType();
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
		$data['allRoles']=$this->UserManagement->getAllRoles();
       	$this->layout->view('add_EmployeeDetails',$data); 

    }
	public function post_add_emp_details(){

	
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'date_of_birth' => $this->input->post('dob'),
			'age' => $this->input->post('age'),
			'husband_name' => $this->input->post('husband_name'),
			'gender' => $this->input->post('gender'),
			'mob_no' => $this->input->post('mobile_number'),
			'email' => $this->input->post('email'),
			'password' => hash('sha512', $this->input->post('password')),
			'aadhaar_number' => $this->input->post('aadhar_number'),
			'pan_number' => $this->input->post('pan_number'),
			'job_type_id' => $this->input->post('jobtype'),
			'date_of_joining' => $this->input->post('date_of_joining'),
			'designation' => $this->input->post('designation'),
			'therapist_color' => $this->input->post('therapist_color'),
			'payStructure' => $this->input->post('payStructure'),
			'willing_to_relocate' => $this->input->post('relocate'),
			'basicSalary' => $this->input->post('basicSalary'),
			'status' => '1');

				$insert = $this->EmployeeManagement->storeEmployee($data); 
				$insert_id = $this->db->insert_id();

			$emp_number = $this->generateEmpNumber($insert_id);			
			$this->db->where('id' , $insert_id);
			$this->db->update('nbb_employees', array('emp_number'=>$emp_number));

			if($insert_id){
				$address_data = array(
					'emp_id' => $insert_id,
					'address1' => $this->input->post('address1'),
					'country' => $this->input->post('country'),
					'unit_no' => $this->input->post('unit_no'),
					'building_street' => $this->input->post('building_street'),
					'hse_blk_no' => $this->input->post('hse_blk_no'),
					'postalcode' => $this->input->post('postalcode'));
		
					$insert2 = $this->EmployeeManagement->storeEmployeeaddress($address_data);
			}

				$this->load->library('upload');
				if($_FILES['emp_picture']['name'] != '')
				{
	
					$_FILES['file']['name']       = $_FILES['emp_picture']['name'];
					$_FILES['file']['type']       = $_FILES['emp_picture']['type'];
					$_FILES['file']['tmp_name']   = $_FILES['emp_picture']['tmp_name'];
					$_FILES['file']['error']      = $_FILES['emp_picture']['error'];
					$_FILES['file']['size']       = $_FILES['emp_picture']['size'];
	
					// File upload configuration
					$uploadPath = 'uploads/emplyee_img/';
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
						$uploadImgData['employee_photo'] = $imageData['file_name'];
					}
					$update=$this->Main->update('id',$insert_id, $uploadImgData,'nbb_employees');         
				} 

				// Use for qualification
				$qualification = $this->input->post('qualification');
				$institute_university = $this->input->post('institute_university');
				$year_of_passing = $this->input->post('year_of_passing');
				$marks = $this->input->post('marks');
				 
				$total = count($qualification);
				if($qualification){
					for($i=0; $i<$total; $i++ ){
						$qualification_data = array( 
							'emp_id'    =>  $insert_id, 
							'qualification'=>  $qualification[$i],
							'institute_university'=>  $institute_university[$i],
							'year_of_passing'=> $year_of_passing[$i],
							'marks'=>  $marks[$i]
						);
						$insert3 = $this->EmployeeManagement->storeEducationQualification($qualification_data);
					}
				}
				//Use for work experience
				$company_name = $this->input->post('company_name');
				$work = $this->input->post('work');
				$form_date = $this->input->post('form_date');
				$to_date = $this->input->post('to_date');
				 
				$company_nametotal = count($company_name);
				if($company_name){
					for($i=0; $i<$company_nametotal; $i++ ){
						$experience_data = array( 
							'emp_id'    =>  $insert_id, 
							'company_name'=>  $company_name[$i],
							'work_role'=>  $work[$i],
							'form_date'=> $form_date[$i],
							'to_date'=>  $to_date[$i]
						);
						$insert4 = $this->EmployeeManagement->storeWorkExperience($experience_data);
					}
				}
			redirect('employees');		
	}
	public function generateEmpNumber($id)
	{
		return 'NBB' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}
	public function viewEmployeeDetails(){
		$data['name'] = $this->session->userdata('name');
		$data['empjobType'] = $this->EmployeeManagement->getAllemp_jobType();
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
		$empId = $this->uri->segment(4);
		$data['emp_Details'] = $this->EmployeeManagement->getAllemp_Details($empId);
       	$this->layout->view('view_EmployeeDetails',$data); 
	}
	public function post_edit_empaddress(){

		$emp_id = $this->input->post('emp_id');
			$address_data = array(
				'address1' => $this->input->post('address1'),
				'country' => $this->input->post('country'),
				'unit_no' => $this->input->post('unit_no'),
				'building_street' => $this->input->post('building_street'),
				'hse_blk_no' => $this->input->post('hse_blk_no'),
				'postalcode' => $this->input->post('postalcode'));
	
			$update=$this->Main->update('emp_id',$emp_id, $address_data,'nbb_employee_address');   
			if($update){
				redirect('admin/EmployeeManagement/viewEmployeeDetails/'.$emp_id);
			}			
	}
	public function post_edit_PersonalDeatils(){

		$emp_id = $this->input->post('emp_id');
		$emp_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'date_of_birth' => $this->input->post('date_of_birth'),
			'age' => $this->input->post('age'),
			'husband_name' => $this->input->post('husband_name'),
			'gender' => $this->input->post('gender'),
			'mob_no' => $this->input->post('mob_no'),
			'email' => $this->input->post('email'),
			'aadhaar_number' => $this->input->post('aadhaar_number'),
			'pan_number' => $this->input->post('pan_number'),
			'job_type_id' => $this->input->post('jobtype'),
			'date_of_joining' => $this->input->post('date_of_joining'),
			'designation' => $this->input->post('designation'),
			'therapist_color' => $this->input->post('therapist_color'),
			'payStructure' => $this->input->post('payStructure'),
			'basicSalary' => $this->input->post('basicSalary'),
			);
			$update = $this->Main->update('id',$emp_id, $emp_data,'nbb_employees');   

			if($this->input->post('password') != ''){
				$pass_data = array(
					'password' => hash('sha512', $this->input->post('password')),
				);
				$update_pass = $this->Main->update('id',$emp_id, $pass_data,'nbb_employees');   
			}

			if($update == true || $update_pass == true){
				redirect('admin/EmployeeManagement/viewEmployeeDetails/'.$emp_id);
			}			
	}
	public function empArchive(){
		$empId = $this->uri->segment(4);		
		$this->db->where('id' , $empId);
		$this->db->update('nbb_employees', array('status'=> '0'));

		redirect('employees');
	}
	public function all_ArchiveEmployees()
    {
		$data['allemployees'] = $this->EmployeeManagement->getAllArchiveEmployees();
		$this->layout->view('all_employees',$data); 
	}
	
	/*public function add_Designation()
    {
       
		$data['name'] = $this->session->userdata('name');
       	$this->layout->view('add_Designation',$data); 

    }*/
	public function allEmployeeSalary(){

		$data['employeeSalary'] = $this->EmployeeManagement->getAllEmployeeCommissionSalary();
		//$data['EmployeeFultimeSalary'] = $this->EmployeeManagement->getAllEmployeeFultimeSalary();
		//$data['EmployeepartnershipSalary'] = $this->EmployeeManagement->getAllEmployeepartnershipSalary();
		$this->layout->view('all_employeeSalary',$data); 
	}
	public function add_employeeSalary(){
		$data['name'] = $this->session->userdata('name');
		$data['lastpay_structure'] = $this->PayStructure->getLastpay_structure();
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
		$data['commission_structure_a'] = $this->PayStructure->getAllcommission_structure_a();
		/*$data['commission_structure_b'] = $this->PayStructure->getAllcommission_structure_b();
		$data['commission_structure_c'] = $this->PayStructure->getAllcommission_structure_c();*/
		$data['commission_c_partnership'] = $this->PayStructure->getAllcommission_c_partnership();
		$data['manual_fee'] = $this->PayStructure->getAllmanual_fee();
       	$this->layout->view('add_EmpSalary',$data); 
	}
	public function showCommissionPay()
	{
		$salary_Date = $_POST['salary_Date'];
		$employee_Name = $_POST['employee_Name'];

		$CommissionPay = $this->EmployeeManagement->getshowCommissionPay($salary_Date,$employee_Name);
		
	}
	public function showfulltimePay()
	{
		$salary_Date = $_POST['salary_Date'];
		$employee_Name = $_POST['employee_Name'];
		
		$fulltimePay = $this->EmployeeManagement->getshowfulltimePay($salary_Date,$employee_Name);
		
	}
	public function post_add_employeeSalary(){

		$salaryDate = $this->input->post('fullTimesalaryDate');
		$employeeName = $this->input->post('fullTimeemployeeName');
		$designation = $this->input->post('designation');
		$basic_salary = $this->input->post('basic_salary');
		$cpf = $this->input->post('cpf');
		$sales_Amount = $this->input->post('fullTimesales_Amount');
		$commission_Pay = $this->input->post('fullTimecommission_Pay');
		$attendance_hours = $this->input->post('attendance_hours');
		$perfectAttendance = $this->input->post('fullTimePerfectAttendance');
		$service_amount = $this->input->post('service_amount');
		$service_bonus = $this->input->post('service_bonus');
		$sales_bonus = $this->input->post('sales_bonus');
		$total_earnings = $this->input->post('total_earnings');

		$data = array(
			'year' => $salaryDate,
			'emp_id' => $employeeName,
			'dept_id' => $designation,
			'basic_pay' => $basic_salary,
			'cpf' => $cpf,
			'sales_Amount' => $sales_Amount,
			'commission_Pay' => $commission_Pay,
			'attendance_hours' => $attendance_hours,
			'perfectAttendance' => $perfectAttendance,
			'service_amount' => $service_amount,
			'service_bonus' => $service_bonus,
			'sales_bonus' => $sales_bonus,
			'total_earnings' => $total_earnings,
			'status' => '1');

			$insert = $this->EmployeeManagement->storeEmployeesalary($data); 
			if($insert){
				redirect('admin/employeeManagement/allEmployeeSalary');
			}
	}
	public function edit_employeeSalary(){
		$data['name'] = $this->session->userdata('name');
		$data['lastpay_structure'] = $this->PayStructure->getLastpay_structure();
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
		$data['commission_structure_a'] = $this->PayStructure->getAllcommission_structure_a();
		$data['commission_structure_b'] = $this->PayStructure->getAllcommission_structure_b();
		$data['commission_structure_c'] = $this->PayStructure->getAllcommission_structure_c();
		$data['commission_c_partnership'] = $this->PayStructure->getAllcommission_c_partnership();
		$data['manual_fee'] = $this->PayStructure->getAllmanual_fee();
		$id = $this->uri->segment(4);	
		$data['empSalary'] = $this->EmployeeManagement->geteditEmployeeSalary($id);
       	$this->layout->view('edit_EmpSalary',$data); 
	}
	public function post_edit_employeeSalary(){
		
		$empSalaryid = $this->input->post('empSalaryid');
		$salaryDate = $this->input->post('fullTimesalaryDate');
		$employeeName = $this->input->post('fullTimeemployeeName');
		$designation = $this->input->post('designation');
		$basic_salary = $this->input->post('basic_salary');
		$cpf = $this->input->post('cpf');
		$sales_Amount = $this->input->post('fullTimesales_Amount');
		$commission_Pay = $this->input->post('fullTimecommission_Pay');
		$attendance_hours = $this->input->post('attendance_hours');
		$perfectAttendance = $this->input->post('fullTimePerfectAttendance');
		$service_amount = $this->input->post('service_amount');
		$service_bonus = $this->input->post('service_bonus');
		$sales_bonus = $this->input->post('sales_bonus');
		$total_earnings = $this->input->post('total_earnings');

		$data = array(
			'year' => $salaryDate,
			'emp_id' => $employeeName,
			'dept_id' => $designation,
			'basic_pay' => $basic_salary,
			'cpf' => $cpf,
			'sales_Amount' => $sales_Amount,
			'commission_Pay' => $commission_Pay,
			'attendance_hours' => $attendance_hours,
			'perfectAttendance' => $perfectAttendance,
			'service_amount' => $service_amount,
			'service_bonus' => $service_bonus,
			'sales_bonus' => $sales_bonus,
			'total_earnings' => $total_earnings,
			'status' => '1');

			$update = $this->Main->update('id',$empSalaryid, $data,'nbb_employee_salary');    
			if($update){
				redirect('admin/employeeManagement/edit_employeeSalary/'.$empSalaryid);
			}
	}
	public function post_add_fullTimeSalary(){
		$data = array(
			'emp_id' => $this->input->post('fullTimeemployeeName'),
			'dept_id' => $this->input->post('fullTimeempDesignation'),
			'basic_pay' => $this->input->post('fullTimeBasicSalary'),
			'commissionPay' => $this->input->post('fullTimecommission_Pay'),
			'perfectAttendance' => $this->input->post('fullTimePerfectAttendance'),
			'total_earning' => $this->input->post('fullTimetotal_earning'),
			'job_type' => 'FullTime Staff',
			'status' => '1');

			$insert = $this->Main->insert('nbb_employee_salary',$data); 
			if($insert){
				redirect('admin/employeeManagement/allEmployeeSalary');
			}
	}
	public function all_PartnerShare(){

		$data['employeeSalary'] = $this->EmployeeManagement->getAllEmployeepartnershipSalary();
		//$data['EmployeeFultimeSalary'] = $this->EmployeeManagement->getAllEmployeeFultimeSalary();
		//$data['EmployeepartnershipSalary'] = $this->EmployeeManagement->getAllEmployeepartnershipSalary();
		$this->layout->view('all_PartnerShare',$data); 
	}
	public function add_Partnership(){
		$data['name'] = $this->session->userdata('name');
		$data['lastpay_structure'] = $this->PayStructure->getLastpay_structure();
		$data['allemployees'] = $this->EmployeeManagement->getAllpartnership();
		$data['empDesignation'] = $this->EmployeeManagement->getAllemp_designation();
		$data['commission_structure_a'] = $this->PayStructure->getAllcommission_structure_a();
		
		$data['commission_c_partnership'] = $this->PayStructure->getAllcommission_c_partnership();
		$data['manual_fee'] = $this->PayStructure->getAllmanual_fee();
       	$this->layout->view('add_Partnership',$data); 
	}
	public function post_add_partnershipSalary(){
		$data = array(
			'year' 		=> $this->input->post('getyear'),
			'emp_id' 	=> $this->input->post('fullTimeemployeeName'),
			'service_profit' => $this->input->post('service_profit'),
			'product_Profit' => $this->input->post('product_Profit'),
			'total_earnings' => $this->input->post('total_earnings'),
			'status' => '1');

			$insert = $this->Main->insert('nbb_partnership',$data); 
			if($insert){
				redirect('admin/employeeManagement/all_PartnerShare');
			}
	}
	public function allLeaveList(){

		$data['name'] = $this->session->userdata('name');
		$data['employee_leave'] = $this->EmployeeManagement->getAllemp_leave();
		$this->layout->view('leaveManagement/all_LeaveList',$data); 

	}
	public function add_employeeleave(){
		$data['name'] = $this->session->userdata('name');
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
       	$this->layout->view('leaveManagement/add_LeaveList',$data); 
	}
	public function post_add_empLeave(){
		
		$datetime1 = new DateTime($this->input->post('leave_from'));
        $datetime2 = new DateTime($this->input->post('leave_to'));
		$diff       = date_diff($datetime1,$datetime2);
		$days       = $diff->format("%a")+1;
		/*$yearly_leave = 13;
		*/
		
		$data = array(
			'emp_id' 			=> $this->input->post('employeeName'),
			'leave_from' 		=> $datetime1->format('Y-m-d'),
			'leave_to' 			=> $datetime2->format('Y-m-d'),
			'total_leave_days' 	=> $days,
			'reason_for_leave' 	=> $this->input->post('reason_for_leave'));

			$insert = $this->EmployeeManagement->storeEmployeeleave($data); 
			if($insert){
				redirect('admin/employeeManagement/allLeaveList');
			}
	}
	public function edit_employeeLeave(){
		$data['name'] = $this->session->userdata('name');
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$id = $this->uri->segment(4);	
		$data['employee_leave'] = $this->EmployeeManagement->geteditEmployeeLeave($id);
       	$this->layout->view('leaveManagement/edit_EmpLeave',$data); 
	}
	public function post_edit_empLeave(){

		$leaveID = $this->input->post('leaveID');
		$datetime1 = new DateTime($this->input->post('leave_from'));
        $datetime2 = new DateTime($this->input->post('leave_to'));
		$diff       = date_diff($datetime1,$datetime2);
		$days       = $diff->format("%a")+1;
		
		$data = array(
			'emp_id' 			=> $this->input->post('employeeName'),
			'leave_from' 		=> $datetime1->format('Y-m-d H:i:s'),
			'leave_to' 			=> $datetime2->format('Y-m-d H:i:s'),
			'total_leave_days' 	=> $days,
			'reason_for_leave' 	=> $this->input->post('reason_for_leave'));

			$update = $this->Main->update('id',$leaveID, $data,'nbb_employee_leave');    
			if($update){
				redirect('admin/employeeManagement/edit_employeeLeave/'.$leaveID);
			}
	}
	public function all_holidaysList()
    {
		$data['name'] = $this->session->userdata('name');
		$data['emp_holidays'] = $this->EmployeeManagement->getAllholidaysList();
		$this->layout->view('all_holidaysList',$data); 
	}
	public function searchHolidayYearData(){

		$holidayYear = $_POST['holidayYear'];
	
		$data['emp_holidays'] = $this->EmployeeManagement->getSearchHolidayYearData($holidayYear);

		$this->load->view('yearly_holidaysList',$data); 
	}
	public function add_holidays(){
		$data['name'] = $this->session->userdata('name');
       	$this->layout->view('add_holidaysList',$data); 
	}
	public function deleteEmployeeLeave()
	{
	   if($this->session->has_userdata('id')!=false)
	   {
		   $empLeaveId=$this->uri->segment(4);
		   $result=$this->Main->delete('id',$empLeaveId,'nbb_employee_leave');
		   if($result==true)
		   {
			   redirect('admin/employeeManagement/allLeaveList');
		   }
	   }
	}
	public function update_Leavestatus()
	{
		$status_leaveid = $this->input->post('status_leaveid');
		$leavestatus = $this->input->post('status');

		$this->db->where('id' , $status_leaveid);
		$this->db->update('nbb_employee_leave', array('status'=>$leavestatus));

		redirect('admin/employeeManagement/allLeaveList');

	}
	public function allAttendance(){

		$data['name'] = $this->session->userdata('name');
		$data['allemployees'] = $this->EmployeeManagement->getAllemployees();
		$data['employee_Attendance'] = $this->EmployeeManagement->getAllemp_Attendance();
		$this->layout->view('all_Attendance',$data); 
	}
	public function exportEmpAttendance(){

	
		$employeeid =  $this->input->post('employeeName');
		$attandance_month =  $this->input->post('attandance_month');

		$full_month = date('F Y',strtotime($attandance_month));

		$pass_date = strtotime($attandance_month);
		$month = date('m',strtotime($attandance_month));
		$year = date('Y',strtotime($attandance_month));
		$total_days = cal_days_in_month(CAL_GREGORIAN, date('m', $pass_date), date('Y', $pass_date));
		//echo $total_days;exit;
		//$empname = $this->EmployeeManagement->getEmployeeNameDownload_attendance($employeeid);
		$empname = $this->EmployeeManagement->getAllemployees();
		//$emptime = $this->EmployeeManagement->getAllEmployeeAttendance();

		// get data 
		$empData = $this->EmployeeManagement->getDownload_attendance($employeeid,$attandance_month);

			
				
		$contain = '<!DOCTYPE html>
		<html lang="en">
		<head>
		<title>Attendance Records</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			table,th, td {
				border: 1px solid black;
			}
			
			table {
				
			border-collapse: collapse;
	
			}
			table td {
				border-width: 1px 1px 0 0;
				width: 30px;
				overflow: hidden;
				text-align: center;
			}
			
			.heading{
				background-color: #61d3d4;
				color: white;
				padding: 5px;
				text-align: left;
				border-radius: 10px;
				padding-left: 10px;
			}
			
		</style>
		</head>
		<body><div>
		<h1 class="heading" align="center">Employee Attendance '.$full_month.'</h1>
		<table>';
		foreach($empname as $nameRow){
			
			$full_name = $nameRow['first_name'].' '.$nameRow['last_name'];
			$empid = $nameRow['id'];
			$empAttendanceData['login'] = $empAttendanceData['logout'] = $empAttendanceData2 = [];
			$login = $logout = [];
			$empAttendances = $this->EmployeeManagement->getAllEmployeeAttendance($empid);

			foreach($empAttendances as $empAttendance){
				
				$login[] = date('Y-m-d',strtotime($empAttendance['login']));
				$logout[] = date('Y-m-d',strtotime($empAttendance['logout']));

				$empAttendanceData['login'] = [
					'in_date' => date('Y-m-d',strtotime($empAttendance['login'])),
					'in_time' => date('H:i',strtotime($empAttendance['login']))
				];

				$empAttendanceData['logout'] = [
					'out_date' => date('Y-m-d',strtotime($empAttendance['logout'])),
					'out_time' => date('H:i',strtotime($empAttendance['logout']))
				];

				$empAttendanceData2[] = $empAttendanceData;

			}
			$contain .= '<tr>
			<th colspan="32">Employee Name -: '.$full_name.'</th>';
		$contain .= '</tr>
			<tr>
				<td style="width: 40px;">Day</td>';
				$in = ''; $out = '';
				for($i = 1; $i <= $total_days; $i++) { 
					$date = date('Y-m-d',strtotime($year.'-'.$month.'-'.$i));
					$contain .= '<td>'.$i.'</td>';
					
					
					if(in_array($date,$login)){
						foreach($empAttendanceData2 as $att){
							if($att['login']['in_date'] == $date){
								$in .='<td>'.$att['login']['in_time'].'</td>';
							}
						}
					}else{
						$in .='<td></td>';
					}
					
					if(in_array($date,$logout)){
						foreach($empAttendanceData2 as $att){
							if($att['login']['in_date'] == $date){
								$out .='<td>'.$att['logout']['out_time'].'</td>';
							}
						}
					}else{
						$out .='<td></td>';
					}
				}
		$contain .= '</tr>
			<tr>
				<td>In</td>
				'.$in.'
			</tr>

			<tr>
				<td>Out</td>
				'.$out.'
			</tr>';
			}
		$contain .=  
			'</table>
		</div>';
		//echo $contain;

		/*$this->load->library('pdf');
		$file_name = 'AttendanceSheet_'.$full_month;
		$this->pdf->createPDF($contain, $file_name, true);*/
		
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($contain);
		//download it D save F.
		$mpdf->Output('Attendance_sheet"'.$full_month.'".pdf','D');


	}
	public function post_add_empHoliday(){
		
		$getyear = $this->input->post('getyear');
		$holidayDate = $this->input->post('holidayDate');
		$holidayDay = $this->input->post('holidayDay');
		$holidays = $this->input->post('holidays');
		
		$total = count($holidayDate);
		if($holidayDate){
			for($i=0; $i<$total; $i++ ){
				$holidays_data = array( 
					'year'    =>  $getyear, 
					'date'=>  $holidayDate[$i],
					'day'=>  $holidayDay[$i],
					'holidays'=> $holidays[$i]
				);
				$insert3 = $this->Main->insert('nbb_emp_holidays',$holidays_data);
			}
		}
		if($insert3){
			redirect('admin/employeeManagement/all_holidaysList');
		}
	}

	public function post_edit_empHoliday(){
		
		$setholidays_Id = $this->input->post('setholidays_Id');
		$holidayDate = $this->input->post('holidayDate');
		$holidayDay = $this->input->post('holidayDay');
		$holidayName = $this->input->post('holidayName');
			
			$holidays_data = array( 
				'date'=>  $holidayDate,
				'day'=>  $holidayDay,
				'holidays'=> $holidayName
			);
			$update = $this->Main->update('id',$setholidays_Id, $holidays_data,'nbb_emp_holidays');  
		
		if($update){
			redirect('admin/employeeManagement/all_holidaysList');
		}
	}
	public function download_empHoliday()
    {
		$getyear = $_POST['getyear'];
		if($getyear != ''){
			$data["empHoliday"]=$this->EmployeeManagement->getSearchHolidayYearData($getyear);

			$mpdf = new \Mpdf\Mpdf();
			
			$html=$this->load->view('GenerateHolidays',$data,true);
			$mpdf->WriteHTML($html);
			$mpdf->Output('GenerateHolidays_"'.$getyear.'".pdf','D');
			//$mpdf->Output();
		}
		
        
    }
	public function deleteEmployeeSalary()
	{
	   if($this->session->has_userdata('id')!=false)
	   {
		   $empSalaryId=$this->uri->segment(4);
		   $result=$this->Main->delete('id',$empSalaryId,'nbb_employee_salary');
		   if($result==true)
		   {
			   redirect('admin/employeeManagement/allEmployeeSalary');
		   }
	   }
	}
	public function deletePartnerSalary()
	{
	   if($this->session->has_userdata('id')!=false)
	   {
		   $empSalaryId=$this->uri->segment(4);
		   $result=$this->Main->delete('id',$empSalaryId,'nbb_partnership');
		   if($result==true)
		   {
			   redirect('admin/employeeManagement/all_PartnerShare');
		   }
	   }
	}
	public function deleteEmpHoliday()
	{
	   if($this->session->has_userdata('id')!=false)
	   {
		   $empHolidayId=$this->uri->segment(4);
		   $result=$this->Main->delete('id',$empHolidayId,'nbb_emp_holidays');
		   if($result==true)
		   {
			   redirect('admin/employeeManagement/all_holidaysList');
		   }
	   }
	}
	/*function mypdf(){


		$this->load->library('pdf');
	
	
		  $this->pdf->load_view('mypdf');
		  $this->pdf->render();
	
	
		  $this->pdf->stream("welcome.pdf");
	   }*/
	function mypdf()
    {
        $this->load->library('pdf');
        $html = $this->load->view('mypdf', [], true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
}
?>
