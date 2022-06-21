<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	public function all_courses(){

        $data['all_courses']=$this->CourseManagement->getAllCourses();
        $this->layout->view('all_course',$data);
    }
	public function add_Course(){

        $data['id'] = $this->session->userdata('id');
		$data['category'] = $this->ServiceCategory->getAllParentCategory();
        $this->layout->view('add_Course',$data);
    }
	public function post_add_course(){

		$data = array(
			'course_name' => $this->input->post('course_name'),
			'category_id' => $this->input->post('category_id'),
			'durations' => $this->input->post('durations'),
			'course_fees' => $this->input->post('course_fees'),
			'description' => $this->input->post('description'),
			'type_of_cert' => $this->input->post('type_of_cert'),
			'foc_items' => $this->input->post('foc_items')
		);

			$insert = $this->Main->insert('nbb_course',$data); 
			if($insert ==  true){
				redirect('admin/courseManagement/all_courses');
			}	
	}
	public function editCourse(){
		$data['id'] = $this->session->userdata('id');
		$id = $this->uri->segment(4);
		$data['all_courses']=$this->CourseManagement->getEditAllCourses($id);
		$data['category'] = $this->ServiceCategory->getAllParentCategory();
        $this->layout->view('edit_Course',$data);
	}
	public function post_edit_course(){

		$course_id = $this->input->post('course_id');

		$data = array(
			'course_name' => $this->input->post('course_name'),
			'category_id' => $this->input->post('category_id'),
			'durations' => $this->input->post('durations'),
			'course_fees' => $this->input->post('course_fees'),
			'description' => $this->input->post('description'),
			'type_of_cert' => $this->input->post('type_of_cert'),
			'foc_items' => $this->input->post('foc_items')
		);

		$result=$this->Main->update('id',$course_id, $data,'nbb_course'); 
			if($result ==  true){
				redirect('admin/courseManagement/all_courses/'.$course_id);
			}	
	}

	public function deleteCourse(){
		
		if($this->session->has_userdata('id')!=false)
	   	{
		   $courseId = $this->uri->segment(4);
		   $result = $this->Main->delete('id',$courseId,'nbb_course');
		   if($result==true)
		   {
			   redirect('admin/courseManagement/all_courses');
		   }
	  	}
	}
}
?>
