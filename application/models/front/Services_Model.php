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
	function getpdfAllService($id){

		$this->db->select('nbb_service.service_name');
		$this->db->from('nbb_service');
		$where = array(
				'nbb_service.id'   => $id
				);
		$this->db->where($where);
		$service_query = $this->db->get()->result_array();
			$data = array();			

			foreach($service_query as $row){				

				$data = array(
					'service_name' 		=> $row['service_name'],
				);	
			}
			return $data;
	}
}
?>
