<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceCategory_Model extends CI_Model
{

    function findList($id,$selectDate){
         $this->db->select('*');
         $this->db->from('nbb_appointment');
         $this->db->where('appointment_date',$selectDate);
         $this->db->where('therapists',$id);
         //$this->db->join('therapists','therapists.id=appointment.therapists');
         //$this->db->join('customer','customer.id=appointment.customer_id');
         return $this->db->get()->result_array();
        //  print_r($this->db->last_query()); 
        //  die;  
    }

    function getBookingAvailable($date,$therapist)
    {
      $this->db->select('*');
      $this->db->from('nbb_appointment');
      $this->db->where('appointment_date',$date);
      $this->db->where('therapists',$therapist);
      return $this->db->get()->result_array();
    } 
    
    function storeAppointment($data)
    {
        $insert = $this->db->insert('nbb_appointment',$data); 
        return true;
    }
	function getAllAddon() 
    {
        $this->db->select('*');
        $this->db->from('nbb_add_ons');
        return $this->db->get()->result_array();
    }
	function getAllParentCategory()
    {
        $this->db->select('nbb_parentcategory.*');
        $this->db->from('nbb_parentcategory');
        return $this->db->get()->result_array();
    }
	function getAllParentCategoryEdit($id)
    {
		
        $this->db->select('nbb_parentcategory.*');
        $this->db->from('nbb_parentcategory');
		$this->db->where('id',$id);
       
		$parentcategory_query = $this->db->get()->result_array();
			$data = array();			

			foreach($parentcategory_query as $row){				

				$data = array(
					'id' 			=> $id,
					'c_name' 		=> $row['name'],
					'details' 		=> $row['details'],
				);	

			}
			return $data;
    }
    function getAllCategory()
    {
		//$db2 = $this->load->database('database2', TRUE);
        $this->db->select('nbb_child_category.*,nbb_parentcategory.name as parent_name');
        $this->db->from('nbb_child_category');
		$this->db->join('nbb_parentcategory','nbb_parentcategory.id = nbb_child_category.parent_category_id');

        return $this->db->get()->result_array();
    }
	function getAllCategoryEdit($id)
    {
		//$db2 = $this->load->database('database2', TRUE);
        $this->db->select('nbb_child_category.*');
        $this->db->from('nbb_child_category');
		$this->db->where('id',$id);

        return $this->db->get()->result_array();
    }
	function insert_category($data = array())
    {
        $insert = $this->db->insert_batch('nbb_category',$data); 
        return true;
    }

    function getAllTodayAppointment()
    {
		$now = date('Y-m-d');
        $this->db->select('nbb_dashboard.*, nbb_service.service_name,nbb_employees.first_name,nbb_employees.last_name');
        $this->db->from('nbb_dashboard');
        $this->db->join('nbb_service','nbb_service.id = nbb_dashboard.services');
        $this->db->join('nbb_employees','nbb_employees.id = nbb_dashboard.therapist_id');
		$this->db->where('nbb_dashboard.start_date',$now);
		$this->db->order_by("nbb_dashboard.start_date", "DESC");

        return $this->db->get()->result_array();
    }
	function getAllAppointment(){

		$this->db->select('nbb_dashboard.*, nbb_service.service_name,nbb_employees.first_name,nbb_employees.last_name');
        $this->db->from('nbb_dashboard');
        $this->db->join('nbb_service','nbb_service.id = nbb_dashboard.services');
        $this->db->join('nbb_employees','nbb_employees.id = nbb_dashboard.therapist_id');
		$this->db->order_by("nbb_dashboard.start_date", "DESC");
		return $this->db->get()->result_array();
	}
    function getAllServices()
    {
        $this->db->select('nbb_service.*,nbb_parentcategory.name as category_name');
        $this->db->from('nbb_service');
        $this->db->join('nbb_parentcategory','nbb_parentcategory.id = nbb_service.service_category');
        return $this->db->get()->result_array();
    }
	function getAllServicesPackages(){
		$this->db->select('nbb_service.*');
        $this->db->from('nbb_service');
        return $this->db->get()->result_array();
	}
	function getServiceDataEdit($id){
		$this->db->select('*');
		$this->db->from('nbb_service');
		$this->db->where('id',$id);
		return $this->db->get()->result_array();
	}
    function getServiceByID($id){
        $this->db->select('*');
        $this->db->from('nbb_service');
        $this->db->where('id',$id);
        $result= $this->db->get()->row();
        return $result;
    }
    function getCustomerByID($contact){
        $this->db->select('*');
        $this->db->from('nbb_customer');
        $this->db->where('contact',$contact);
        return $this->db->get()->result_array();
    }
   	function getAllTherapist()
    {
		$this->db->select('nbb_employees.*,nbb_emp_designation.designation_name');
		$this->db->from('nbb_employees');
		$this->db->join('nbb_emp_designation','nbb_emp_designation.id = nbb_employees.designation');
		$this->db->where('nbb_employees.status', '1');
		$this->db->where('nbb_employees.designation', '1');
		return $this->db->get()->result_array();

    }

    function insert_therapists($data = array())
    {
        $insert = $this->db->insert_batch('nbb_therapists',$data); 
        return true;
    }

    function insertService($data = array())
    {
        $insert = $this->db->insert_batch('nbb_service',$data); 
        return true;
    }
    
    function getTimeSlot($interval, $start_time, $end_time)
	{
		$start = new DateTime($start_time);
		$end = new DateTime($end_time);
		$startTime = $start->format('H:i');
		$endTime = $end->format('H:i');
		$i=0;
		$time = [];
		while(strtotime($startTime) <= strtotime($endTime)){
			$start = $startTime;
			$end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
			$startTime = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
			$i++;
			if(strtotime($startTime) <= strtotime($endTime)){
				$time[$i]['slot_start_time'] = $start;
				$time[$i]['slot_end_time'] = $end;
			}
		}
		return $time;
	}
	function getPackageServiceName($allService_id)
		{
			$this->db->select('nbb_service.service_name AS p_name,nbb_service.id');
			$this->db->from('nbb_service');
			$this->db->where('nbb_service.status',1);
			$this->db->where_not_in('nbb_service.id', $allService_id);
			return $this->db->get()->result_array();
		}
	function searchGetAppointmentData($appointment_date='',$therapistID= '',$serviceID = '',$statusID = ''){
		$where = "";
		if($appointment_date != ''){
			$where .=" AND nbb_dashboard.start_date = '".$appointment_date."'";
		}
		if($therapistID != ''){
			$where .=" AND nbb_dashboard.therapist_id = '".$therapistID."'";
		}
		if($serviceID != ''){
			$where .=" AND nbb_dashboard.services = '".$serviceID."'";
		}
		if($statusID != ''){
			$where .=" AND nbb_dashboard.status = '".$statusID."'";
		}

		$nbb_dashboard_sql = "SELECT nbb_dashboard.*, 
		nbb_service.service_name,
		nbb_employees.first_name,
		nbb_employees.last_name 
		FROM nbb_dashboard 
		LEFT JOIN nbb_service ON nbb_service.id = nbb_dashboard.services
		LEFT JOIN nbb_employees ON nbb_employees.id = nbb_dashboard.therapist_id
		WHERE 1 ".$where;
		$nbb_dashboard_query = $this->db->query($nbb_dashboard_sql);
		return $result_nbb_dashboard = $nbb_dashboard_query->result_array();	

	}

}
