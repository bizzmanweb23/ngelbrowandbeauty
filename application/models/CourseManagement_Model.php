<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class CourseManagement_Model extends CI_Model
{
	function getAllCourses()
    {
      $this->db->select('nbb_course.*,
	  nbb_child_category.category_name,
	  nbb_parentcategory.name as parentcategory_name');
      $this->db->from('nbb_course');
	  $this->db->join('nbb_child_category','nbb_child_category.id = nbb_course.category_id');
	  $this->db->join('nbb_parentcategory','nbb_parentcategory.id = nbb_course.main_category_id');
      return $this->db->get()->result_array();
    }
	function getEditAllCourses($id){
		$this->db->select('nbb_course.*,nbb_parentcategory.name AS parentcategory_name');
		$this->db->from('nbb_course');
		$this->db->join('nbb_parentcategory', 'nbb_parentcategory.id = nbb_course.main_category_id', 'LEFT');
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
					'parentcategory_name' => $row['parentcategory_name'],
					'category_id' 		=> $row['category_id'],
					'description' 		=> $row['description'],
					'durations' 		=> $row['durations'],
					'course_fees' 		=> $row['course_fees'],
					'foc_items' 		=> $row['foc_items'],
					'type_of_cert' 		=> $row['type_of_cert'],
					'trainer_id' 		=> $row['trainer_id'],
					'free_lesson' 		=> $row['free_lesson'],
					'recomandation_fill' => $row['recomandation_fill'],
					
				);	

			}
			return $data;
	}
	function getpdfAllCourses($id){
		$this->db->select('nbb_course.*,
		nbb_child_category.category_name,
		nbb_employees.first_name as e_first_name,
		nbb_employees.last_name as e_last_name,
		nbb_parentcategory.name AS parentcategory_name');
		$this->db->from('nbb_course');
		$this->db->join('nbb_employees','nbb_employees.id = nbb_course.trainer_id', 'LEFT');
		$this->db->join('nbb_child_category','nbb_child_category.id = nbb_course.category_id', 'LEFT');
		$this->db->join('nbb_parentcategory', 'nbb_parentcategory.id = nbb_course.main_category_id', 'LEFT');
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
					'category_name' 	=> $row['category_name'],
					'parentcategory_name' => $row['parentcategory_name'],
					'e_first_name' 		=> $row['e_first_name'],
					'e_last_name' 		=> $row['e_last_name'],
					'category_id' 		=> $row['category_id'],
					'description' 		=> $row['description'],
					'durations' 		=> $row['durations'],
					'course_fees' 		=> $row['course_fees'],
					'foc_items' 		=> $row['foc_items'],
					'type_of_cert' 		=> $row['type_of_cert'],
					'free_lesson' 		=> $row['free_lesson'],
					'recomandation_fill' => $row['recomandation_fill'],
					'trainer_id' 		=> $row['trainer_id'],
				);	

			}
			return $data;
	}
	function getAllChildCategory()
	{
		$this->db->select('nbb_child_category.category_name as child_category_name,nbb_child_category.id');
		$this->db->from('nbb_child_category');
		$this->db->where('nbb_child_category.parent_category_id','3');
		return $this->db->get()->result_array();
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
					'hse_blk_no' 		=> $register_studentRow['hse_blk_no'],
					'unit_no' 			=> $register_studentRow['unit_no'],
					'building_streetName'=> $register_studentRow['building_streetName'],
					'address' 		=> $register_studentRow['address'],
					'pin_code' 		=> $register_studentRow['pin_code'],
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
