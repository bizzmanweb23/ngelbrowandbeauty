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
		//$this->load->view('all_course',$data);
    }
	public function add_Course(){

        $data['id'] = $this->session->userdata('id');
		$data['category'] = $this->ServiceCategory->getAllParentCategory();
		$data['trainer_name'] = $this->CourseManagement->getAllTrainer_name();
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
			'foc_items' => $this->input->post('foc_items'),
			'trainer_id' => $this->input->post('trainer_id')
		);

			$insert = $this->Main->insert('nbb_course',$data); 

			$insert_id = $this->db->insert_id();
				$this->load->library('upload');
				if($_FILES['course_image']['name'] != '')
				{
	
					$_FILES['file']['name']       = $_FILES['course_image']['name'];
					$_FILES['file']['type']       = $_FILES['course_image']['type'];
					$_FILES['file']['tmp_name']   = $_FILES['course_image']['tmp_name'];
					$_FILES['file']['error']      = $_FILES['course_image']['error'];
					$_FILES['file']['size']       = $_FILES['course_image']['size'];
	
					// File upload configuration
					$uploadPath = 'uploads/course_image/';
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
						$uploadImgData['course_image'] = $imageData['file_name'];
					}
					$update=$this->Main->update('id',$insert_id, $uploadImgData,'nbb_course');         
				} 

			if($insert ==  true || $update == true){
				$this->session->set_flashdata('status','Course updated successfully! <a href="'. site_url("admin/courseManagement/all_courses") . '" title="Back to course list">Back to list</a>');
				redirect('admin/courseManagement/add_Course');
			}	
	}
	public function editCourse(){
		$data['id'] = $this->session->userdata('id');
		$id = $this->uri->segment(4);
		$data['all_courses']=$this->CourseManagement->getEditAllCourses($id);
		$data['category'] = $this->ServiceCategory->getAllParentCategory();
		$data['trainer_name'] = $this->CourseManagement->getAllTrainer_name();
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
			'foc_items' => $this->input->post('foc_items'),
			'trainer_id' => $this->input->post('trainer_id')
		);

		$result=$this->Main->update('id',$course_id, $data,'nbb_course'); 

		$this->load->library('upload');
		if($_FILES['course_image']['name'] != '')
		{

			$_FILES['file']['name']       = $_FILES['course_image']['name'];
			$_FILES['file']['type']       = $_FILES['course_image']['type'];
			$_FILES['file']['tmp_name']   = $_FILES['course_image']['tmp_name'];
			$_FILES['file']['error']      = $_FILES['course_image']['error'];
			$_FILES['file']['size']       = $_FILES['course_image']['size'];

			// File upload configuration
			$uploadPath = 'uploads/course_image/';
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
				$uploadImgData['course_image'] = $imageData['file_name'];
			}
			$update=$this->Main->update('id',$course_id, $uploadImgData,'nbb_course');         
		} 
			if($result ==  true || $update == true){
				$this->session->set_flashdata('status','Course updated successfully! <a href="'. site_url("admin/courseManagement/all_courses") . '" title="Back to course list">Back to list</a>');
				redirect('admin/courseManagement/editCourse/'.$course_id);
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
	public function all_studentRegistrationForm(){

        $data['id'] = $this->session->userdata('id');
		$data['Student_registration'] = $this->CourseManagement->getAllStudent_registration();
        $this->layout->view('all_studentRegistrationFrm',$data);
    }
	public function add_studentRegistrationForm(){

        $data['id'] = $this->session->userdata('id');
		$data['all_courses']=$this->CourseManagement->getAllCourses();
        $this->layout->view('student_registration_form',$data);
    }
	public function edit_studentRegistrationForm(){

        $data['id'] = $this->session->userdata('id');
		$studentId = $this->uri->segment(4);
		$data['all_courses'] = $this->CourseManagement->getAllCourses();
		$data['Student_registration'] = $this->CourseManagement->getEditStudent_registration($studentId);
        $this->layout->view('edit_studentRegistrationForm',$data);
    }
	public function post_add_student(){

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $this->input->post('dob'),
			'email' => $this->input->post('email'),
			'mobile_number' => $this->input->post('mobile_number'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'pin_code' => $this->input->post('pin_code'),
			'state' => hash('sha512', $this->input->post('state')),
			'country' => $this->input->post('country'),
			'last_university' => $this->input->post('last_university'),
			'course_id' => $this->input->post('course_id'),
			'terms_conditons' => $this->input->post('terms_conditons'),
			'status' => '1');

				$insert = $this->Main->insert('nbb_register_student',$data); 
				$insert_id = $this->db->insert_id();

			$stu_number = $this->generateStudentNumber($insert_id);			
			$this->db->where('id' , $insert_id);
			$this->db->update('nbb_register_student', array('student_code'=>$stu_number));

				$this->load->library('upload');
				if($_FILES['stu_picture']['name'] != '')
				{
	
					$_FILES['file']['name']       = $_FILES['stu_picture']['name'];
					$_FILES['file']['type']       = $_FILES['stu_picture']['type'];
					$_FILES['file']['tmp_name']   = $_FILES['stu_picture']['tmp_name'];
					$_FILES['file']['error']      = $_FILES['stu_picture']['error'];
					$_FILES['file']['size']       = $_FILES['stu_picture']['size'];
	
					// File upload configuration
					$uploadPath = 'uploads/student_img/';
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
						$uploadImgData['photo'] = $imageData['file_name'];
					}
					$update=$this->Main->update('id',$insert_id, $uploadImgData,'nbb_register_student');         
				} 

			if($insert == true || $update == true){
				$this->session->set_flashdata('status','Student register successfully! <a href="'. site_url("studentRegistrationForm") . '" title="Back to Student list">Back to list</a>');
				redirect('admin/courseManagement/add_studentRegistrationForm');
			}	
					
	}

	public function post_edit_student(){

		$student_id = $this->input->post('student_id');
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'dob' => $this->input->post('dob'),
			'email' => $this->input->post('email'),
			'mobile_number' => $this->input->post('mobile_number'),
			'gender' => $this->input->post('gender'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'pin_code' => $this->input->post('pin_code'),
			'state' => hash('sha512', $this->input->post('state')),
			'country' => $this->input->post('country'),
			'last_university' => $this->input->post('last_university'),
			'course_id' => $this->input->post('course_id'),
			'terms_conditons' => $this->input->post('terms_conditons'),
			'status' => '1');

				$insert =$this->Main->update('id',$student_id, $data,'nbb_register_student');     
				$this->load->library('upload');
				if($_FILES['stu_picture']['name'] != '')
				{
	
					$_FILES['file']['name']       = $_FILES['stu_picture']['name'];
					$_FILES['file']['type']       = $_FILES['stu_picture']['type'];
					$_FILES['file']['tmp_name']   = $_FILES['stu_picture']['tmp_name'];
					$_FILES['file']['error']      = $_FILES['stu_picture']['error'];
					$_FILES['file']['size']       = $_FILES['stu_picture']['size'];
	
					// File upload configuration
					$uploadPath = 'uploads/student_img/';
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
						$uploadImgData['photo'] = $imageData['file_name'];
					}
					$update=$this->Main->update('id',$student_id, $uploadImgData,'nbb_register_student');         
				} 

			if($insert == true || $update == true){
				$this->session->set_flashdata('status','Student register successfully! <a href="'. site_url("studentRegistrationForm") . '" title="Back to Student list">Back to list</a>');
				redirect('admin/courseManagement/edit_studentRegistrationForm/'.$student_id);
			}	
					
	}
	public function deleteStudent()
    {
	  	            
		$student_id =$this->uri->segment(4);
		$get_studentID = $this->CourseManagement->getEditStudent_registration($student_id);
		
			$photo = $get_studentID['student_photo'];
			
		//echo $photo;exit;
			//$files = glob('./uploads/student_img/'.$photo); 
			$files = base_url().'uploads/student_img/'.$photo; 
			//echo $files;die;
			
				if(file_exists($files)){
				unlink($files);
				}
				   

		$result=$this->Main->delete('id',$student_id,'nbb_register_student');
		if($result==true)
		{
			redirect('studentRegistrationForm');
		}
	   
		
	}

	public function generateStudentNumber($id)
	{
		return 'NBBS' . str_pad($id, 4, 0, STR_PAD_LEFT);
	}

	/*public function test_link(){

        $this->layout->view('test_link');
		//$this->load->view('all_course',$data);
    }*/
}
?>
