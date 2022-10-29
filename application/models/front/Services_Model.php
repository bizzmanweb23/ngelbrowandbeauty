<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Services_Model extends CI_Model
{
	function getAllTharapist(){
		$this->db->select('nbb_employees.*');
		$this->db->from('nbb_employees');
		$this->db->where('nbb_employees.designation', '7'); 
		return $result = $this->db->get()->result_array();
	}
	function getBookingAvailable($date,$therapist)
    {
      $this->db->select('*');
      $this->db->from('nbb_dashboard');
      $this->db->where('nbb_dashboard.start_date',$date);
      $this->db->where('nbb_dashboard.therapist_id',$therapist);
      return $this->db->get()->result_array();
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
	function getServicename($id){

		$this->db->select('nbb_service.id as service_id,
		nbb_service.service_name,
		nbb_service.service_price');
		$this->db->from('nbb_service');
		$where = array(
				'nbb_service.id'   => $id
				);
		$this->db->where($where);
		$service_query = $this->db->get()->result_array();
			$data = array();			

			foreach($service_query as $row){				

				$data = array(
					'service_id' 		=> $row['service_id'],
					'service_name' 		=> $row['service_name'],
					'service_price' 	=> $row['service_price'],
				);	
			}
			return $data;
	}
	function getchild_categoryName($id){
		$this->db->select('nbb_child_category.category_name');
		$this->db->from('nbb_child_category');
		$where = array(
			'nbb_child_category.id'   => $id,
			);
		$this->db->where($where);
		$category_query = $this->db->get()->result_array();
		$data = array();			

			foreach($category_query as $row){				

				$data = array(
					'category_name' 		=> $row['category_name'],
				);	
			}
			return $data;
	}
	function getallappoinment($user_id){

		$this->db->select('nbb_dashboard.*,
		nbb_service.service_name,
		nbb_service.service_price,
		nbb_employees.first_name,
		nbb_employees.last_name');
		$this->db->from('nbb_dashboard');
		$this->db->where('nbb_dashboard.user_id',$user_id);
		$this->db->join('nbb_service', 'nbb_service.id = nbb_dashboard.services', 'LEFT');
		$this->db->join('nbb_employees', 'nbb_employees.id = nbb_dashboard.therapist_id', 'LEFT');
		return $this->db->get()->result_array();
	}
	function getallserviceOrderDetails($serviceId,$user_id){
		$this->db->select('nbb_order_service.*,
		nbb_service.service_name');
		$this->db->from('nbb_order_service');
		$where = array(
			'nbb_order_service.user_id'   => $user_id,
			'nbb_order_service.service_id'   => $serviceId,
			'nbb_order_service.payment_status'   => 0,
			'nbb_order_service.status'   => 1,
			);
		$this->db->where($where);
		$this->db->join('nbb_service', 'nbb_service.id = nbb_order_service.service_id', 'LEFT');
		$service_query = $this->db->get()->result_array();
		//print_r($service_query);
		$data = array();			

			foreach($service_query as $row){				

				$data = array(
					'order_service_id' => $row['id'],
					'service_name' 		=> $row['service_name'],
					'service_price' 		=> $row['service_price'],
					'times_packages' 		=> $row['times_packages'],
				);	
			}
			return $data;
	}
	function getServiceOrderData($orderserviceId,$user_id){
		$this->db->select('nbb_order_service.*,
		nbb_service.service_name');
		$this->db->from('nbb_order_service');
		$where = array(
			'nbb_order_service.user_id'   => $user_id,
			'nbb_order_service.id'   => $orderserviceId,
			'nbb_order_service.payment_status'   => 1,
			'nbb_order_service.status'   => 2,
			);
		$this->db->where($where);
		$this->db->join('nbb_service', 'nbb_service.id = nbb_order_service.service_id', 'LEFT');
		$service_query = $this->db->get()->result_array();
		//print_r($service_query);
		$data = array();			

			foreach($service_query as $row){				

				$data = array(
					'order_service_id' => $row['id'],
					'service_name' 		=> $row['service_name'],
					'service_id' 		=> $row['service_id'],
					'service_price' 		=> $row['service_price'],
					'times_packages' 		=> $row['times_packages'],
				);	
			}
			return $data;
	}
}
?>
