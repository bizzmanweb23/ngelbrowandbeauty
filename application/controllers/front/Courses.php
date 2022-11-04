<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->library('session');
		
	}

	public function allcourses(){

		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		

		$results['allcourse'] = $this->Course->getAllCourse();

		$this->load->view('front/header',$datahader);
        $this->load->view('front/courses',$results);
		$this->load->view('front/footer');

    }
	public function course_details(){

		// @$session = $this->session->get_userdata($user);
		// $id  =  $session['id'];
			$id =  $this->uri->segment(2);

			$result['courseData'] = $this->Course->getAllCourseDetails($id);
			$result['allhere_about_us'] = $this->Course->getAllhere_about_us();

			$datahader['allchild_category'] = $this->Header->getAllchild_category();
			$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
			$datahader['allcourse_category'] = $this->Header->getAllCourse_category();

			$this->load->view('front/header',$datahader);
			$this->load->view('front/courseDetails', $result);
			$this->load->view('front/footer');
	}
	public function enroll_course(){

			$id =  $this->uri->segment(2);

			$result['courseData'] = $this->Course->getAllCourseEnroll($id);
			$result['allhere_about_us'] = $this->Course->getAllhere_about_us();

			$datahader['allchild_category'] = $this->Header->getAllchild_category();
			$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
			$datahader['allcourse_category'] = $this->Header->getAllCourse_category();

			$this->load->view('front/header',$datahader);
			$this->load->view('front/enroll_course', $result);
			$this->load->view('front/footer');
	}

	public function post_add_student(){

		$data = array(
			'first_name' 	=> $this->input->post('full_name'),
			'dob' 			=> $this->input->post('dob'),
			'email' 		=> $this->input->post('email'),
			'mobile_number' => $this->input->post('mobile_number'),
			'gender' 		=> $this->input->post('gender'),
			'id_card' 		=> $this->input->post('id_card'),
			'address' 		=> $this->input->post('address'),
			'course_id' 	=> $this->input->post('course_id'),
			'class_time' 	=> $this->input->post('class_time'),
			'sources_id' 	=> $this->input->post('sources_id'),
			'status' 		=> '1');

				$insert = $this->Main->insert('nbb_register_student',$data); 
				$insert_id = $this->db->insert_id();
				if($insert_id){
					$stu_number = $this->generateStudentNumber($insert_id);			
					$this->db->where('id' , $insert_id);
					$this->db->update('nbb_register_student', array('student_code'=>$stu_number));

				}
			
			if($insert == true){
				$data = array('success' => true, 'msg'=> '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Your form was successfully submitted .</div>');
			}else {
				$data = array('success' => true, 'msg'=> '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Form submition faild.</div>');
			}	
			echo json_encode($data);		
	}
	public function generateStudentNumber($id)
	{
		return 'NBBS' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}
}
?>
