<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct() {

		parent::__construct();
		$this->load->helper('string');
		//$this->db2 = $this->load->database('database2', TRUE);

	}

	public function index()
	{
		$this->load->view('login');
	}

	public function post_login()
        {
 
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('login');
        }
        else
        {   
            $data = array(
               'email' => $this->input->post('email'),
               'password' => hash('sha512', $this->input->post('password')),
 
             );
   
            $check = $this->Auth->login($data);
            
            if($check == true){
 
                 $user = array(
                 'id' => $check->id,
                 'unique_id' => $check->id,
                 'email' => $check->email,
                );
       
            $this->session->set_userdata($user);
 
             redirect('dashboard') ; 
            }
            
            $this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');  
            //redirect('Welcome');  
              
 
          	$this->load->view('login');
        }
         
    }

    public function dashboard(){

        $data_duration =  $this->Auth->getAllDuration();
        if(!empty($data_duration)){
            $therapist_id = $data_duration[0]['therapist_id'];
            $start_date = $data_duration[0]['start_date']; 
            $end_date = $data_duration[0]['end_date']; 
            $move_to_last = $data_duration[0]['move_to_last'];
        
                
            if(strtotime($start_date) <= strtotime(date('Y-m-d'))  && strtotime($end_date) >= strtotime(date('Y-m-d'))){
                if($move_to_last == 2){  //Move to First
                    $orderAsc = $this->Auth->checkOrderAsc("SELECT * FROM nbb_employees ORDER BY order_id ASC");
                    $order_id = $orderAsc[0]['order_id'];
                    $data=array(
                        'order_id'=> $order_id - 1,
                        'date'=> date("Y-m-d"),
                    );
                    $this->Main->update('id',$therapist_id, $data,'nbb_employees');
    
                }else{
                    $orderDesc = $this->Auth->checkOrderAsc("SELECT * FROM nbb_employees ORDER BY order_id DESC");
                    $order_id = $orderDesc[0]['order_id'];
                    $data=array(
                        'order_id'=> $order_id + 1,
                        'date'=> date("Y-m-d"),
                    );
                    $this->Main->update('id',$therapist_id, $data,'nbb_employees');
                }
            }else{
                $orderAsc = $this->Auth->checkOrderAsc("SELECT * FROM nbb_employees  ORDER BY order_id ASC");
                $orderDesc = $this->Auth->checkOrderAsc("SELECT * FROM nbb_employees  ORDER BY order_id DESC");
    
                $therapist_id = $orderAsc[0]['id'];
                $date = $orderAsc[0]['date'];
                $order_id = $orderDesc[0]['order_id'];
    
                if(date('Y-m-d',strtotime($date)) != date('Y-m-d')){
                    $data=array(
                        'order_id'=> $order_id + 1,
                        'date'=> date("Y-m-d"),
                    );
                    $this->Main->update('id',$therapist_id, $data,'nbb_employees');
                }
            }
                
        }else{
        
        }
    
        $therapy= $this->Auth->getAllTherapistH();
        // echo '<pre>',
        //print_r($therapy);
        foreach($therapy as $a => $thera){      
            $name =  $thera['first_name']; 
            $id = $thera['id'];
    
    
            $data=array(
                'date'=> date("Y-m-d"),
            );
            $this->Main->update('id',$id, $data,'nbb_employees');
    
            $data1[] = 
                [
                    'id' =>$id,
                    'title'=> $name,
                ];    
            }  
            $data1[] = 
                [
                    'id' =>0,
                    'title'=> 'No Preference',
                ];
            $event = $this->Auth->getAllEvent();
            $data2 = array();
            foreach($event as $events){
				$color = null;
                $resourceId = $events['therapist_id'];  
                $name = $events['customer_name'];
                $start = $events['start_date'];
                $startTime = $events['start_time'];
                $end = $events['end_date'];
                $endTime = $events['end_time'];
				$ev_status = $events['status'];
				$color = $events['therapist_color'];

				/*if($ev_status == 1){
					$color = '#A020F0';
				}
				elseif($ev_status == 2){
					$color = '#008000';
				}
				elseif($ev_status == 3){
					$color = '#FF0000';
				}
				else{
					$color = '#FFA500';
				}*/

                $data2[] = 
                [
                    'resourceId' =>$resourceId,
                    'title'=> $name,
                    'start' =>$start.'T'.$startTime,
                    'end'=>$end.'T'.$endTime,
					'color' => $color,
                ];    
            }    //$data['therapy']= $therapy;
            $data['service'] = $this->Auth->getAllServices();
            $data['therapist'] = $this->Auth->getAllTherapistH();
            $data['duration'] = $this->Auth->getAllDuration();
			$data['todayAppointment'] = $this->ServiceCategory->getAllTodayAppointment();
            $data['cal'] = json_encode($data1);
            $data['event'] = json_encode($data2);
            $this->layout->view('dashboard',$data);
        }
        
        public function showTherapistAttandance(){
            
            $therapist_id = $_GET['therapist_id'];
            $date = date("Y-m-d");
            
            $attendance_time_sql  = "SELECT nbb_employees_attendance.* FROM nbb_employees_attendance WHERE DATE_FORMAT(nbb_employees_attendance.login, '%Y-%m-%d') = '$date' AND nbb_employees_attendance.emp_id = $therapist_id"; 
            
            $attendance_time_query = $this->db->query($attendance_time_sql);
            $check_therapist_rownum = $attendance_time_query->num_rows();
            echo $check_therapist_rownum;
        }
        public function postAppointment(){
            
            extract($_POST);
            if($thera_id==0){
                $data = [];
                $all =$this->Auth->getAllTherapistH();
                foreach($all as $alls){
                    $therapist_id=$alls['user_id'];
                    $checkEvent = $this->Auth->checkEvent($therapist_id,$start_date,$start_time,$end_time);
                    if($checkEvent>0){
         
                    }
                    else{
                        $data = array(
                            'customer_number' => $customer_num,
                            'customer_name' => $name,
                            'therapist_id' => $therapist_id,
                            'services' => implode(',',$service),
                            'amount' => $amount,
                            'start_date' => $start_date,
                            'start_time' => $start_time,
                            'end_date' => $end_date,
                            'end_time' => $end_time,
                            'created_by' => $this->session->userdata('id'));
                            break;
                    }
                }
            }
            else{
                
            
                $data = array(
                    'customer_number' => $customer_num,
                    'customer_name' => $name,
                    'therapist_id' => $thera_id,
                    'services' => implode(',',$service),
                    'amount' => $amount,
                    'start_date' => $start_date,
                    'start_time' => $start_time,
                    'end_date' => $end_date,
                    'end_time' => $end_time,
                    'created_by' => $this->session->userdata('id'));
                    
            }
            if(!empty($data)){
                $insert = $this->Auth->dashboard($data); 
                    echo json_encode($insert);
            } else{
                echo json_encode(0);
            }
            
        }
        public function checkTherapist(){
    
        //$therapist_id =	$this->db->post('therapist_id');
         extract($_POST);   
         $data=array(
            'start_date' => $start_date,
            'end_date' => $end_date,
            'therapist_id' => $therapist_id,
            'move_to_last' => $move_to_last,
            'date' => date('Y-m-d')
         );
    
         $check_therapist_query = $this->db->query("SELECT * FROM nbb_check_therapist");
            $check_therapist_rownum = $check_therapist_query->num_rows();
            
            if($check_therapist_rownum > 0){
                $this->db->where('id', '1');
                $insert = $this->db->update('nbb_check_therapist', $data);
            }else{
                $insert = $this->Auth->insertDur($data);
            }
         
         if($insert == true){
             redirect('dashboard');
         }
    
        }
        public function getServiceByID(){
            $sId =$this->input->get('id');
            // print_r($sId);
            // die;
            $totalPrice = 0;
            $totalDuration =0;
            foreach($sId as $val){
                $data=$this->Auth->getServiceByID($val);
				if($data->discount_price != 0 ){
					$totalPrice += $data->discount_price;
				}else{
					$totalPrice += $data->service_price;
				}
                
                $totalDuration += $data->duration;
            }
            $data1['totalPrice']=$totalPrice;
            $data1['totalDuration']=$totalDuration;
            echo json_encode($data1);
            
        }
        

    public function find(){
        $selectDate = $_GET['findDate'];
        $data['list'] = $this->Auth->findList($selectDate);
        echo json_encode($data);
     }

     public function sign_up(){
        extract($_POST);
        $data = array(
            'branch_id' => $branch_name,
            'employee_name' => $name,
            'email' => $email,
            'password' => hash('sha512', $this->input->post('password')),
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s")); 
            $insert = $this->Auth->signUp($data); 
            if($insert == true)
            {
                return redirect('users');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }   
    }
    
    /*public function getServiceByID(){
        $sId =$this->input->get('id');
        // print_r($sId);
        // die;
        $totalPrice = 0;
        $totalDuration =0;
        foreach($sId as $val){
            $data=$this->Auth->getServiceByID($val);
            $totalPrice += $data->service_price;
            $totalDuration += $data->duration;
        }
        $data1['totalPrice']=$totalPrice;
        $data1['totalDuration']=$totalDuration;
        echo json_encode($data1);
    }*/
    public function bookingSlot()
    {
        $therapistId = $_GET['therapistId']; 
        $totalDuration = $_GET['duration']; 
        $date = $_GET['date']; 
        $data=$this->Auth->getBookingAvailable( $date,  $therapistId);
        //$serviceId = $_GET['serviceId'];
        //$data1=$this->Auth->getServiceByID($serviceId[0]);
       
        $data2 = $this->Auth->getTimeSlot($totalDuration,'9:00', '19:00');
        $data3=[];
        $data3['bookslot']=$data;
        $data3['availabletimelist']=$data2;
        echo json_encode($data3);
    }

    public function editAppointment(){
            if(empty($this->session->has_userdata('id'))){
              redirect('admin');
            }
            $data['appointmentId'] = $this->uri->segment(4);
            $this->layout->view('appointment-edit',$data);
    }
    
    public function post_edit_appointment(){
        if(empty($this->session->has_userdata('id'))){
            redirect('admin');
        }
		$appointmentId=$this->uri->segment(4);
		extract($_POST);
		$data=array('customer_number' => $customer_number,
					'customer_name' => $customer_name,
					'total_amount' => $amount,
					'appointment_date' => $date,
					'instructions' => $instructions,
					'feedback' => $feedback);
		$clean_data=$this->security->xss_clean($data);
		$result=$this->Main->update('id',$appointmentId, $data,'appointment');
		if($result==true)
		{
			redirect('appointment');
		}
		else
		{
			redirect('appointment');
		}
    }
   
   	public function feedback()
    {
    	if($this->session->has_userdata('branch_id')){
			$data['feedback'] = $this->Auth->getAllFeedback($this->session->userdata('branch_id'));
		}
		else
		{
		$data['feedback'] = $this->Auth->getAllFeedback();
		}
       	$this->layout->view('feedback',$data);
    }

    public function add_feedback(){
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      	}
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $data['user'] = $this->Auth->getAllUser();
       $this->layout->view('add_feedback',$data);
    }

    public function post_add_feedback(){
        extract($_POST);
        $data = array(
            'user_id' => $user_id,
            'branch_id' => $branch,
            'rate' => $rate,
            'comment' => $comment,
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s"));
            $insert = $this->Auth->storeFeedback($data); 
            if($insert == true)
            {
                return redirect('feedback');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }   
    }
   
    public function deleteFeedback()
    {
        if($this->session->has_userdata('id')!=false)
        {
            $feedbackId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$feedbackId,'feedback');
            if($result==true)
            {
                redirect('feedback');
            }
            else
            {
                redirect('feedback');
            }
        }
    }

    public function customer()
    {
       $data['customer'] = $this->Auth->getAllCustomer();
       $this->layout->view('customers',$data); 
    }

	public function viewPastTransaction()
    {
       $customerId = $this->uri->segment(4);
       $data['orderProduct'] = $this->OrderManagement->getEveryCustomerOrderProduct($customerId);
	   $data['AllCurrentOrder'] = $this->OrderManagement->getEveryCustomerCurrentOrder($customerId);
	   $data['AllComplatedOrder'] = $this->OrderManagement->getEveryCustomerComplatedOrder($customerId);
	   $data['AllCanceledOrder'] = $this->OrderManagement->getEveryCustomerCanceledOrder($customerId);
       $this->layout->view('all_orderProduct',$data); 
    }
    public function getCustomerByID(){
        $data=$this->Auth->getCustomerByID($this->input->get('contact'));
        echo json_encode($data);
    }
	public function all_CreditWallet()
    {
		$customerId = $this->uri->segment(4);
       	$data['creditWallet'] = $this->Auth->getCreditWallet($customerId);
       	$this->layout->view('all_CreditWallet',$data); 
    }
	public function all_ExpenseWallet()
    {
		$customerId = $this->uri->segment(4);
       	$data['expenseWallet'] = $this->Auth->getExpenseWallet($customerId);
       	$this->layout->view('all_ExpenseWallet',$data); 
    }
	function all_paymenthistory(){
		$customerId = $this->uri->segment(4);
       	$data['paymenthistory'] = $this->Auth->getpaymenthistory($customerId);
       	$this->layout->view('all_paymenthistory',$data); 
	}
	function all_referredby(){
		$customerId = $this->uri->segment(4);
       	$data['customerUser'] = $this->Auth->getreferredby($customerId);
       	$this->layout->view('all_referredby',$data); 
	}
	

    public function logout(){
	    $this->session->sess_destroy();
	    redirect('admin');
   }    
  
}

