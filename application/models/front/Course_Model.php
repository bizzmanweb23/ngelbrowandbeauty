<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Course_Model extends CI_Model
{
	function getAllCourse(){
		$this->db->select('nbb_course.*');
		$this->db->from('nbb_course');
		return $this->db->get()->result_array();
	}
	function getAllhere_about_us(){
		$this->db->select('nbb_here_about_us.*');
		$this->db->from('nbb_here_about_us');
		return $this->db->get()->result_array();
	}
	function getAllCourseEnroll($id){
		$this->db->select('nbb_course.*');
		$this->db->from('nbb_course');
		$this->db->where('nbb_course.id',$id);
		//return $this->db->get()->result_array();

		$course_query = $this->db->get()->result_array();
			$data = array();			

			foreach($course_query as $row){				

				$data = array(
					'id' 				=> $id,
					'course_name' 		=> $row['course_name'],
					'main_category_id' 	=> $row['main_category_id'],
					'category_id' 		=> $row['category_id'],
					'description' 		=> $row['description'],
					'durations' 		=> $row['durations'],
					'course_fees' 		=> $row['course_fees'],
					'class_time' 		=> $row['class_time'],
					'foc_items' 		=> $row['foc_items'],
					'type_of_cert' 		=> $row['type_of_cert'],
					'trainer_id' 		=> $row['trainer_id'],
				);	

			}
			return $data;

	}
}

?>
