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
		
		$serviceId = $this->uri->segment(2);
		$datahader['allTharapist'] = $this->Services->getAllTharapist();
		$datahader['serviceName'] = $this->Services->getServicename($serviceId);

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

	public function post_add_appointment(){
		
		
		$selected_timeslot  = $this->input->post('selected_timeslot');

		list($startTime, $endTime) = explode("-", $selected_timeslot);

		$user_id=$this->session->userdata('id');
		$alluser = $this->Header->getAlluserData($user_id);
		$first_name = '';
		$last_name = '';
		$contact = '';
		foreach($alluser as $userRow){
			$first_name = $userRow['first_name'];
			$last_name = $userRow['last_name'];
			$contact = $userRow['contact'];
		}
		$schedule_date  = date("Y-m-d", strtotime($this->input->post('schedule_date')));
		
		//echo $schedule_date;exit;
		/*$explodeTime = explode("-", $selected_timeslot);
			echo $startTime = $explodeTime[0]; 
			echo $endTime = $explodeTime[1]; */
		
        extract($_POST);
        $data = array(
			'therapist_id' =>$therapist_name,
			'user_id' =>$user_id,
			'customer_number' => $contact,
			'customer_name' => $first_name.' '.$last_name,
			'services' => $service_id,
			'start_date' => $schedule_date,
			'start_time' => $startTime,
			'end_date' => $schedule_date,
			'end_time' => $endTime,
			'amount' => $service_price,
		);  
			$insert = $this->Main->insert('nbb_dashboard',$data); 
            if($insert == true)
            {
                return redirect('appointmentList');
            }
               
    }
	public function appointmentList(){
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		
		$user_id = $this->session->userdata('id');
		$data['appoinmentDetails'] = $this->Services->getallappoinment($user_id);

		$this->load->view('front/header',$datahader);
        $this->load->view('front/appointment_booingtable',$data);
		$this->load->view('front/footer');
	}
	public function update_appointmentStatus()
	{
		$status_appointtmentid = $_GET['appoinment_id'];
		/*$status_appointtmentid = $this->input->post('status_appoinmentid');
		$appointtmentStatus = $this->input->post('status');*/

		$this->db->where('id' , $status_appointtmentid);
		$this->db->update('nbb_dashboard', array('status'=> 3));

		redirect('appointmentList');

	}
	public function service_payment(){
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		
		$user_id = $this->session->userdata('id');
		$serviceId = $this->uri->segment(2);
		$data['serviceOrderDetails'] = $this->Services->getallserviceOrderDetails($serviceId,$user_id);

		$this->load->view('front/header',$datahader);
        $this->load->view('front/service_bookingPayment',$data);
		$this->load->view('front/footer');
	}
	public function buy_service(){
		$service_id = $this->input->post('service_id');
		$timePrice = $this->input->post('timePrice');
		/*$service_price = $this->input->post('service_price');
		$package_times_price = $this->input->post('package_times_price');*/
		$user_id = $this->session->userdata('id');

		if($timePrice == 1){
			$service_price = $this->input->post('service_price');
		}elseif($timePrice == 10){
			$service_price = $this->input->post('package_times_price');
		}
		$orderdata = array(
			'user_id' => $user_id,
			'service_id' => $service_id,
			'times_packages' => $timePrice,
			'service_price' => $service_price,
			'status' => 1,
		); 
	 
		$result2 = $this->db->insert('nbb_order_service',$orderdata);  
		if($result2){
			redirect('servicePayment/'.$service_id);
		}
		
	}
	public function paymentGatewayService(){
		$orderserviceId = $this->uri->segment(2);
		$user_id = $this->session->userdata('id');

		$orderdata = array(
			'payment_status' => 1,
			'status' => 2,
		); 
	 
		$result = $this->Main->update('id',$orderserviceId, $orderdata,'nbb_order_service');
		if($result){
			redirect('thanksPaymentService/'.$orderserviceId);
		}
		
	}
	public function thanksPaymentService(){
		$datahader['allchild_category'] = $this->Header->getAllchild_category();
		$datahader['allProduct_category'] = $this->Header->getAllProduct_category();
		$datahader['allcourse_category'] = $this->Header->getAllCourse_category();
		
		$user_id = $this->session->userdata('id');
		$orderserviceId = $this->uri->segment(2);
		$data['serviceOrderDetails'] = $this->Services->getServiceOrderData($orderserviceId,$user_id);

		$this->load->view('front/header',$datahader);
        $this->load->view('front/thanksPaymentService',$data);
		$this->load->view('front/footer');
	}
}
?>
