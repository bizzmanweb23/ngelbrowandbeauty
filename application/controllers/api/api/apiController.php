<?php

class apiController extends CI_Controller
{

  var $responseCode = 200;
  var $error = 404;

  public function signin(){

        $data = array(
           'email' => $this->input->post('email'),
           'password' => hash('sha512', $this->input->post('password')),
         );

        $check = $this->Auth->login($data);

        $this->db->select('first_name,last_name,email,mob_no,employee_photo,gender');
        $this->db->from('nbb_employees');
        $this->db->where('email' ,$this->input->post('email'));
        $result  = $this->db->get()->result_array();

        if($check != true){
          echo json_encode([
            'responsecode'=>$this->responseCode,
            'message'=>'Sign Success',
            'data'=>$result ,
          ]);
        }
        else
        {
          echo json_encode([
            'responsecode'=>$this->error,
            'message'=>'Invalid Credentials',
            'data'=>$result ,
          ]);
        }
  }

  public function signup(){
      $input = $this->input->post();
      $inputArray = ([
        'first_name'=>$input['firstname'],
        'last_name'=>$input['lastname'],
        'email'=>$input['email'],
        'mob_no'=>$input['phone'],
        'password' => hash('sha512', $this->input->post('password')),
      ]);

      $saved = $this->db->insert('nbb_employees' , $inputArray);

      $this->db->select('first_name,last_name,email,mob_no,employee_photo,gender');
      $this->db->from('nbb_employees');
      $this->db->where('email' ,$this->input->post('email'));
      $result  = $this->db->get()->result_array();

      if($saved){
        echo json_encode([
          'responsecode'=>$this->responseCode,
          'message'=>'Success',
          'data'=> $result,
        ]);
      } else {
        echo json_encode([
          'responsecode'=>$this->error,
          'message'=>'Cant Register',
        ]);
      }

  }

  public function getDashboard()
  {
    $id = $this->input->get('userid');

    //offer
    $this->db->select('emp_id,offer_name,offer_image,discount');
    $this->db->from('nbb_offers');
    $this->db->where('emp_id',$id);
    $offers = $this->db->get()->result_array();
    //product
    $this->db->select('emp_id,name,product_image');
    $this->db->from('nbb_product');
    $this->db->where('emp_id',$id);
    $products = $this->db->get()->result_array();
    //service
    $this->db->select('emp_id,service_name,service_icon');
    $this->db->from('nbb_service');
    $this->db->where('emp_id',$id);
    $services = $this->db->get()->result_array();
    //course
    $this->db->select('emp_id,course_name,course_image');
    $this->db->from('nbb_course');
    $this->db->where('emp_id',$id);
    $course = $this->db->get()->result_array();

    if(1){
      echo json_encode([
        'responsecode'=>$this->responseCode,
        'message'=>'Success',
        'offers'=>$offers,
        'products'=>$products,
        'services'=>$services,
        'course'=>$course,
      ]);
    }
    else
    {
      echo json_encode([
        'responsecode'=>$this->error,
      ]);
    }

  }

  public function edit_profile()
  {
    $id = $this->input->post('userid');

    $this->db->select('*');
    $this->db->from('nbb_employees');
    $this->db->where('id', $id);
    $result  = $this->db->get()->result_array();


    if(!$result){
      echo json_encode([
        'responsecode'=>$this->responseCode,
        'message'=>'Profile Updated Successfully',
        'data'=>$result,
      ]);
    }
    else
    {
      echo json_encode([
        'responsecode'=>$this->error,
      ]);
    }

  }

  public function get_shipping_address()
  {
    $id = $this->input->get('userid');

    $this->db->select('*');
    $this->db->from('nbb_employees');
    $this->db->where('id',$id);
    $result  = $this->db->get()->result_array();

    if(count($result)>0){
      echo json_encode([
        'responsecode'=>$this->responseCode,
        'message'=>'success',
        'data'=>$result,
      ]);
    }
    else
    {
      echo json_encode([
        'responsecode'=>$this->error,
      ]);
    }

  }

  public function add_shipping_address()
  {
    $id = $this->input->post('userid');


    $firstname = $this->input->post('firstname');
    $lastname = $this->input->post('lastname');
    $email = $this->input->post('email');
    $phone = $this->input->post('mobile');
    $country = $this->input->post('country');
    $state = $this->input->post('state');
    $city = $this->input->post('city');
    $address = $this->input->post('address');
    $zipcode = $this->input->post('zipcode');

    $this->db->set('user_id',$id);
    $this->db->set('shipping_firstname',$firstname) ;
    $this->db->set('shipping_lastname',$lastname) ;
    $this->db->set('shipping_contactno',$phone) ;
    $this->db->set('shipping_email',$email) ;
    $this->db->set('shipping_postalcode',$zipcode) ;
    $this->db->set('shipping_country',$country) ;
    $this->db->set('shipping_state',$state) ;
    $this->db->set('shipping_city',$city) ;
    $this->db->set('shipping_address',$address) ;
    $this->db->where('user_id',$id);
    $result = $this->db->update('nbb_shipping_address');

    if($result){
      echo json_encode([
        'responsecode'=>$this->responseCode,
        'message'=>'Shipping address Added Successfully',

      ]);
      }
      else
      {
        echo json_encode([
          'responsecode'=>$this->error,
        ]);
      }

  }



}
