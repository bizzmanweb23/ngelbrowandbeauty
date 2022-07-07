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
					'category_id' 		=> $row['category_id'],
					'description' 		=> $row['description'],
					'durations' 		=> $row['durations'],
					'course_fees' 		=> $row['course_fees'],
					'foc_items' 		=> $row['foc_items'],
					'type_of_cert' 		=> $row['type_of_cert'],
					'trainer_id' 		=> $row['trainer_id'],
				);	

			}
			return $data;
	}
	function getAllStudent_registration()
    {
      $this->db->select('nbb_register_student.*');
      $this->db->from('nbb_register_student');
      return $this->db->get()->result_array();
    }
	function getEditStudent_registration($id){
		$this->db->select('nbb_register_student.*,nbb_course.course_name');
		$this->db->from('nbb_register_student');
		$this->db->join('nbb_course', 'nbb_course.id = nbb_register_student.course_id', 'LEFT');
		$where = array(
				'nbb_register_student.id'   => $id
				);
		$this->db->where($where);
		$register_student_query = $this->db->get()->result_array();
			$data = array();			

			foreach($register_student_query as $register_studentRow){				

				$data = array(
					'id' 				=> $id,
					'student_photo' 		=> $register_studentRow['photo'],
					'student_code' 		=> $register_studentRow['student_code'],
					'first_name' 		=> $register_studentRow['first_name'],
					'last_name' 		=> $register_studentRow['last_name'],
					'dob' 		=> $register_studentRow['dob'],
					'email' 		=> $register_studentRow['email'],
					'mobile_number' 		=> $register_studentRow['mobile_number'],
					'gender' 		=> $register_studentRow['gender'],
					'address' 		=> $register_studentRow['address'],
					'city' 		=> $register_studentRow['city'],
					'pin_code' 		=> $register_studentRow['pin_code'],
					'state' 		=> $register_studentRow['state'],
					'country' 		=> $register_studentRow['country'],
					'last_university' 		=> $register_studentRow['last_university'],
					'course_name' 		=> $register_studentRow['course_name'],
					'course_id' 		=> $register_studentRow['course_id'],
					'status' 		=> $register_studentRow['status'],

				);	

			}
			return $data;
	}
	function getAllTrainer_name(){
		$this->db->select('nbb_employees.id,nbb_employees.first_name,nbb_employees.last_name');
      	$this->db->from('nbb_employees');
		  $where = array(
			'nbb_employees.designation'   => '8'
			);
		$this->db->where($where);
      	return $this->db->get()->result_array();
	}
}
?>
