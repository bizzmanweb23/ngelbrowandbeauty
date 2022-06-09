<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class CourseManagement_Model extends CI_Model
{
	function getAllCourses()
    {
      $this->db->select('*');
      $this->db->from('nbb_course');
      return $this->db->get()->result_array();
    }
	function getEditAllCourses($id){
		$this->db->select('nbb_course.*');
		$this->db->from('nbb_course');
		$where = array(
				'nbb_course.id'   => $id
				);
		$this->db->where($where);
		$course_query = $this->db->get()->result_array();
			$data = array();			

			foreach($course_query as $row){				

				$data = array(
					'id' 				=> $id,
					'course_name' 		=> $row['course_name'],
					'description' 		=> $row['description'],
					'durations' 		=> $row['durations'],
					'course_fees' 		=> $row['course_fees'],
					'foc_items' 		=> $row['foc_items'],
					'type_of_cert' 		=> $row['type_of_cert'],
				);	

			}
			return $data;
	}
}
?>
