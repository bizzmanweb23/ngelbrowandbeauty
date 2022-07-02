<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {

		parent::__construct();
		//$this->load->library('m_pdf');
		//$this->db2 = $this->load->database('database2', TRUE);
	}
	public function all_home(){

        //$data['all_courses']=$this->CourseManagement->getAllCourses();
		$this->load->view('front/header');
        $this->load->view('front/home');
		$this->load->view('front/footer');
		//$this->load->view('all_course',$data);
    }
}
?>
