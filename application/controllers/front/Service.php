<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->library('session');
		//$this->load->library('m_pdf');
	}
	function appointment()
	{
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();

		$datahader['allTharapist'] = $this->Services->getAllTharapist();

		$this->load->view('front/header',$datahader);
        $this->load->view('front/appoinment_booking');
		$this->load->view('front/footer');
		
	}
	public function bookingSlot()
     {
        $therapistId = $_GET['therapistId']; 
        $date = date("Y-m-d", strtotime($_GET['date'])); 

        $data=$this->Services->getBookingAvailable($date, $therapistId);
       
        $data2 = $this->Services->getTimeSlot('30','10:00', '20:00');
        $data3=[];
        $data3['bookslot']=$data;
        $data3['availabletimelist']=$data2;
        echo json_encode($data3);
     }
}
?>
