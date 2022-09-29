<?php

class ApiController extends CI_Controller
{
  var $responseCode = 200;
  var $error = 400;
  var $url = 'http://localhost/ngelbrowandbeauty/';

    public function __construct() {
        parent::__construct();
		$this->load->helper('string');
		//$this->db2 = $this->load->database('database2', TRUE);
    }
   public function signin(){

        $data = array(
           'email' => $this->input->post('email'),
           'password' => md5($this->input->post('password')),
         );

        $this->db->select('id, first_name, last_name, email,contact, cus_state,cus_country,cus_city,cus_zipcode,address,cus_gender');
        $this->db->from('nbb_customer');
        $this->db->where(array('email'=>$this->input->post('email'), 'password'=>md5($this->input->post('password'))));
        $result  = $this->db->get();
        $row = $result->num_rows();

        if($row){
          echo json_encode([
            'responsecode'=>$this->responseCode,
            'message'=>'Sign Success',
            'url'=>$this->url.'profile_img',
            'data'=>$result->result_array() ,
          ]);
        }
        else
        {
          echo json_encode([
            'responsecode'=>$this->error,
            'message'=>'Invalid Credentials',

          ]);
        }
  }

  public function signup(){
      $input = $this->input->post();
      $email = $this->input->post('email');

      $this->db->select('*');
      $this->db->from('nbb_customer');
      $this->db->where('email' ,$this->input->post('email'));
      $query = $this->db->get();
      $num = $query->num_rows();

      //rows
      if($num){

        echo json_encode([
          'responsecode'=>$this->error,
          'message'=>'Email is Already in use',
        ]);

      }
      else
      {
        $inputArray = ([

          'first_name'=>$input['firstname'],
          'last_name'=>$input['lastname'],
          'email'=>$input['email'],
          'contact'=>$input['phone'],
          'password' => md5($this->input->post('password')),
        ]);

        $saved = $this->db->insert('nbb_customer' , $inputArray);

        $this->db->select('id, first_name, last_name, email,contact, cus_state,cus_country,cus_city,cus_zipcode,address,cus_gender');
        $this->db->from('nbb_customer');
        $this->db->where('email' ,$email);
        $result  = $this->db->get()->result_array();

        echo json_encode([
          'responsecode'=>$this->responseCode,
          'message'=>'Success',
          'data'=> $result,
        ]);

      }
      exit();
  }
  //DASHBOARD//
  public function getDashboard()
    {
        //offer
        $this->db->select('id,emp_id, offer_name,offer_image, discount');
        $this->db->from('nbb_offers');
        $offers = $this->db->get()->result_array();

        for($i=0 ; $i<count($offers); $i++){
            if($offers[$i]['offer_image'] == 'null'){
                $offers[$i]['offer_image'] = 'no image found';
            }
            else {
                $offers[$i]['offer_image'] = $this->url.'uploads/offer_img/'.$offers[$i]['offer_image'];
            }

        }

        //product
        $this->db->select('id, emp_id,name,product_image');
        $this->db->from('nbb_product');
        $products = $this->db->get()->result_array();

        for($i=0 ; $i<count($products); $i++){
            if( $products[$i]['product_image'] == 'null'){
                 $products[$i]['product_image'] =  'no image found';
            }else{
                $products[$i]['product_image'] = $this->url.'uploads/product_img/'.$products[$i]['product_image'];
            }
        }

        //service

        $this->db->select('id, emp_id,service_name,service_icon,service_price');
        $this->db->from('nbb_service');
        $services = $this->db->get()->result_array();

        for($i=0 ; $i<count($services); $i++){
            if( $services[$i]['service_icon'] == 'null'){
                 $services[$i]['service_icon'] = 'no image found';
            }else {
                $services[$i]['service_icon'] = $this->url.'uploads/service_img/'.$services[$i]['service_icon'];
            }

        }
        //course
        $this->db->select('id, emp_id,course_name,course_image,course_fees');
        $this->db->from('nbb_course');
        $course = $this->db->get()->result_array();

        for($i=0 ; $i<count($course); $i++){
            if($course[$i]['course_image'] == 'null'){
                $course[$i]['course_image'] = 'no image found';
            }
            else
            {
                $course[$i]['course_image'] = $this->url.'uploads/course_image/'.$course[$i]['course_image'];
            }
        }

        echo json_encode([
            'responsecode' => $this->responseCode,
            'message' => 'Success',
            'offers' => $offers ,
            'products' => $products ,
            'services' => $services ,
            'course' => $course ,
        ]);

    }

  public function edit_profile()
  {
    $id = $this->input->get('userid');

    $this->db->select('id, first_name, last_name, email,contact, cus_state,cus_country,cus_city,cus_zipcode,address,cus_gender,profile_picture');
    $this->db->from('nbb_customer');
    $this->db->where('id', $id);
    $result  = $this->db->get();
    $rows = $result->num_rows();

    $profile = $result->result_array();

    for($i=0 ; $i<count($profile); $i++){
        if($profile[$i]['profile_picture'] == 'null'){
            $profile[$i]['profile_picture'] = 'no image found';
        }
        else{
            $profile[$i]['profile_picture'] = $this->url.'uploads/profile_img/'.$profile[$i]['profile_picture'];
        }

    }

    if($rows){
      echo json_encode([
        'responsecode'=>$this->responseCode,
        'message'=>'Success',
        'data'=>$profile,
      ]);
    }
    else
    {
      echo json_encode([
        'responsecode'=>$this->error,
        'message'=>'Record Not found',
      ]);
    }

  }
//===UPDATE PROFILE===//
    public function update_profile()
    {

        $id = $this->input->post('userid');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $phone = $this->input->post('contact');
        $password = md5($this->input->post('password'));
        $country = $this->input->post('country');
        $state = $this->input->post('state');
        $city = $this->input->post('city');
        $address = $this->input->post('address');
        $zipcode = $this->input->post('zipcode');
        $gender = $this->input->post('gender');

        $this->db->select('*');
        $this->db->from('nbb_customer');
        $this->db->where('id',$id);
        $result  = $this->db->get();
        $rows = $result->num_rows();


        if($rows){
            $data = array(
              'first_name'=>$firstname,
              'last_name'=>$lastname,
              'email'=>$email,
              'password'=>$password,
              'contact'=>$phone,
              'cus_country'=>$country,
              'cus_state'=>$state,
              'cus_city'=>$city,
              'cus_zipcode'=>$zipcode,
              'address'=>$address,
              'cus_gender'=>$gender,
            );
            $this->db->where('id',$id);
            $this->db->update('nbb_customer',$data);

            $this->db->select('id, first_name, last_name, email,contact, cus_state,cus_country,cus_city,cus_zipcode,address,cus_gender');
            $this->db->from('nbb_customer');
            $this->db->where('id', $id);
            $result  = $this->db->get();

            echo json_encode([
                'responsecode'=>$this->responseCode,
                'message'=>'Profile updated Successfully',
                'data'=>$result->result_array(),
            ]);

        } else {

            echo json_encode([
                'responsecode'=>$this->error,
                'message'=>'Account Not Found',
            ]);
        }

    }
//=====SERVICES CATEGORY======//
    public function get_service_category()
    {
        $id =  $this->input->get('serviceid');

        $this->db->select('id,service_name,service_icon,description,discount_price, discount_percent, rating');
        $this->db->from('nbb_service');
        $this->db->where('main_category_id',1);
        $result = $this->db->get();
        $rows = $result->num_rows();

        $services = $result->result_array();

        if($rows){
            for($i=0 ; $i<count($services); $i++){
                $services[$i]['service_icon'] = $this->url.'uploads/service_img/'.$services[$i]['service_icon'];
            }

            echo json_encode([
                    'responsecode'=>$this->responseCode,
                    'message'=>'success',
                    'data'=>$services,
                ]);
        } else {
            echo json_encode([
                    'responsecode'=>$this->error,
                    'message'=>'Not Found',

                ]);
        }
    }
//======PRODUCT CATEGORY======//
    public function get_product_category()
    {
        $id = $this->input->get('productid');

        $this->db->select(' id,name,product_image,available_stock,price,discount_price,discount_percent,rating,short_description');
        $this->db->from('nbb_product');

        $this->db->where('categorie_id', 2);
        $result = $this->db->get();
        $rows = $result->num_rows();

        $product = $result->result_array();
         for($i=0 ; $i<count($product); $i++){
            if($product[$i]['product_image'] == 'null'){
                $product[$i]['product_image'] = 'no image found';
            }
            else {
                $product[$i]['product_image'] = $this->url.'uploads/product_img/'.$product[$i]['product_image'];
            }

        }
        if($rows){
            echo json_encode([
                    'responsecode'=>$this->responseCode,
                    'message'=>'success',
                    'data'=>$product,
                ]);
        } else {
            echo json_encode([
                    'responsecode'=>$this->error,
                    'message'=>'Not Found',

                ]);
        }
    }

//=====SERVICES LIST=====//
    public function get_service_list()
    {
        $id =  $this->input->get('serviceid');

        $this->db->select('id,service_name,service_icon,description,discount_price, discount_percent, rating');
        $this->db->from('nbb_service');
        $this->db->where('main_category_id',$id);
        $result = $this->db->get()->result_array();


        for($i=0 ; $i<count($result); $i++){
            $result[$i]['service_icon'] = $this->url.'uploads/service_img/'.$result[$i]['service_icon'];
        }


        echo json_encode([
                'responsecode'=>$this->responseCode,
                'message'=>'success',
                'data'=>$result,
            ]);

    }
//===PRODUCT LIST ======//
    public function get_product_list()
    {
        $id =  $this->input->get('userid');

        $this->db->select('id , emp_id as user_id, product_category_id, name, product_image, available_stock,weight,price,rating,discount_price,discount_percent');
        $this->db->from('nbb_product');
         $this->db->where('id',$id);

        $result = $this->db->get();
        $rows = $result->num_rows();

        $product = $result->result_array();
        for($i=0 ; $i<count($product); $i++){
            $product[$i]['product_image'] = $this->url.'uploads/product_img/'.$product[$i]['product_image'];
        }

        if($rows){
            echo json_encode([
                    'responsecode'=>$this->responseCode,
                    'message'=>'success',
                    'data'=>$product,
                ]);
        } else {
            echo json_encode([
                    'responsecode'=>$this->error,
                    'message'=>'Not Found',

                ]);
        }
    }
//======GET COURSE LIST======//
    public function get_course_category()
    {
        $this->db->select('*');
        $this->db->from('nbb_course');
        $this->db->where('main_category_id',3);
        $result = $this->db->get();
        $rows = $result->num_rows();

        $course_category = $result->result_array();
        for($i = 0; $i< count($course_category); $i++){
            $course_category[$i]['course_image'] = $this->url.'/uploads/course_image/'.$course_category[$i]['course_image'];
        }
        if($rows){
            echo json_encode([
                    'responsecode'=>$this->responseCode,
                    'message'=>'Course Category',
                    'data'=>$course_category,
                ]);
        } else {
            echo json_encode([
                    'responsecode'=>$this->error,
                    'message'=>'Not Found',

                ]);
        }
    }
    public function get_course()
    {
        $id = $this->input->get('courseid');


        $this->db->select('*');
        $this->db->from('nbb_course');
        $this->db->where('id',$id);
        $result = $this->db->get();
        $rows = $result->num_rows();

        $course = $result->result_array();
        for($i = 0; $i< count($course); $i++){
            $course[$i]['course_image'] = $this->url.'/uploads/course_image/'.$course[$i]['course_image'];
        }

        if($rows){
            echo json_encode([
                    'responsecode'=>$this->responseCode,
                    'message'=>'Course List',
                    'data'=>$course,
                ]);
        } else {
            echo json_encode([
                    'responsecode'=>$this->error,
                    'message'=>'Not Found',

                ]);
        }
    }
//==========GET SHIPPING ADDRESS===========//
  public function get_shipping_address()
  {
    $id = $this->input->get('userid');

    $this->db->select('*');
    $this->db->from('nbb_shipping_address');
    $this->db->where('user_id',$id);
    $result  = $this->db->get();
    $rows = $result->num_rows();

    if($rows){
      echo json_encode([
        'responsecode'=>$this->responseCode,
        'message'=>'success',
        'data'=>$result->result_array(),
      ]);
    }
    else
    {
      echo json_encode([
        'responsecode'=>$this->error,
        'message'=>'Not Found',
      ]);
    }

  }
//=====ADD SHIPPING ADDRESS=====//
  public function add_shipping_address()
  {
    $id = $this->input->post('userid');

    $firstname = $this->input->post('firstname');
    $lastname = $this->input->post('lastname');
    $email = $this->input->post('email');
    $phone = $this->input->post('mobile');
    $country = $this->input->post('country');
    $state = $this->input->post('state_area_province');
    $city = $this->input->post('city');
    $address = $this->input->post('address');
    $street = $this->input->post('street');
    $zipcode = $this->input->post('zipcode');


    $data = array(
      'user_id'=>$id,
      'shipping_firstname'=>$firstname,
      'shipping_lastname'=>$lastname,
      'shipping_contactno'=>$phone,
      'shipping_email'=>$email,
      'shipping_postalcode'=>$zipcode,
      'shipping_country'=>$country,
      'shipping_state'=>$state,
      'shipping_city'=>$city,
      'shipping_street'=>$street,
      'shipping_address'=>$address,
    );

    $result = $this->db->insert('nbb_shipping_address', $data);
    if($result){
        $this->db->select('*');
        $this->db->from('nbb_shipping_address');
        $this->db->where('user_id',$id);
        $shp  = $this->db->get();
        echo json_encode([
            'responsecode'=>$this->responseCode,
            'message'=>'Shipping address Added Successfully',
            'data'=>$shp->result_array(),
            ]);
    }   else{
          echo json_encode([
            'responsecode'=>$this->error,
            'message'=>'try again',
            'data'=>$data,
            ]);
    }

  }
///==========EDIT SHIPPING ADDRESS==========///
 public function update_shipping_address()
  {
    $id = $this->input->post('shipping_address_id');
    $uid = $this->input->post('userid');

    $this->db->select('*');
    $this->db->from('nbb_shipping_address');
    $this->db->where(array('user_id'=>$uid,'id'=>$id));
    $result  = $this->db->get();
    $rows = $result->num_rows();

    if($rows){
        $upd_fields = array(
            'user_id'=>$uid ,
            'shipping_firstname'=>$this->input->post('firstname'),
            'shipping_lastname'=>$this->input->post('lastname'),
            'shipping_email'=>$this->input->post('email'),
            'shipping_contactno'=>$this->input->post('mobile'),
            'shipping_city'=>$this->input->post('city'),
            'shipping_state'=>$this->input->post('state_area_province'),
            'shipping_postalcode'=>$this->input->post('zipcode'),
            'shipping_country'=>$this->input->post('country'),
            'shipping_address'=>$this->input->post('address'),
            'shipping_street'=>$this->input->post('street'),
        );
        $this->db->where('id',$id);
        $this->db->update('nbb_shipping_address',$upd_fields);
        ///get update data///

        $this->db->select('*');
        $this->db->from('nbb_shipping_address');
        $this->db->where('user_id',$uid);
        $data  = $this->db->get();

      echo json_encode([
        'responsecode'=>$this->responseCode,
        'message'=>'success',
        'data'=>$data->result_array(),
      ]);
    }
    else
    {
      echo json_encode([
        'responsecode'=>$this->error,
        'message'=>'Not Found',
      ]);
    }

  }

///GET THERAPIST LIST///

public function get_therapist()
  {

    $id = $this->input->get('userid');

    $this->db->select('*');
    $this->db->from('nbb_employees');
    $this->db->where(array('designation'=>7,'id'=>$id));

    $result = $this->db->get();
    $row = $result->num_rows();

    if($row){
        echo json_encode([
            'responsecode'=>$this->error,
            'message'=>'Therapist List',
            'data'=>$result->result_array(),
        ]);
    } else {
        echo json_encode([
            'responsecode'=>$this->error,
            'message'=>'Record Not Found',
      ]);
    }

  }
//GET SHIPPING CART LIST///
public function get_product_cart()
  {

    $id = $this->input->get('userid');

    $this->db->select('*');
    $this->db->from('nbb_order_main');
    $this->db->where(array('type_flag'=>'C','id'=>$id));

    $result = $this->db->get();
    $row = $result->num_rows();

    if($row){
        echo json_encode([
            'responsecode'=>$this->error,
            'message'=>'Product Cart List',
            'data'=>$result->result_array(),
        ]);
    } else {
        echo json_encode([
            'responsecode'=>$this->error,
            'message'=>'Record Not Found',
      ]);
    }

  }
///===GET COURSE LIST===///

public function get_course_list()
  {

    $this->db->select('id, course_name, course_image,description');
    $this->db->from(' nbb_course');
    $result = $this->db->get();
    $row = $result->num_rows();

    $list = $result->result_array();
    for($i=0; $i<count($list); $i++)
    {
        $list[$i]['course_image'] = $this->url.'uploads/course_image/'.$list[$i]['course_image'];
    }
    if($row){
        echo json_encode([
            'responsecode'=>$this->responseCode,
            'message'=>'Course List',
            'data'=>$list,
        ]);
    } else {
        echo json_encode([
            'responsecode'=>$this->error,
            'message'=>'Not Found',
      ]);
    }

  }
///=====REMOVE ADDRESS======///
  public  function remove_address()
    {
        $uid = $this->input->get('userid');
        $sid = $this->input->get('shipping_address_id');

        $this->db->select('id, shipping_firstname,shipping_lastname,shipping_email,shipping_contactno,shipping_city,shipping_state, shipping_postalcode,shipping_country');
        $this->db->from('nbb_shipping_address');
        $this->db->where(array('id'=>$sid,'user_id'=>$uid));
        $result = $this->db->get();

        $rows = $result->num_rows();
        if($rows){
            $this->db->select();
            $this->db->from('nbb_shipping_address');
            $this->db->where('id', $sid);
            $this->db->delete();

            echo json_encode([
                'responsecode'=>$this->responseCode,
                'message'=>'Shipping Address Deleted',
            ]);
        } else {
            echo json_encode([
                'responsecode'=>$this->error,
                'message'=>'Cannot Delete No Record Found',
            ]);
        }
    }
///=====SET DEFAULT ADDRESS======///
    public function set_default_address()
    {
        $id = $this->input->post('userid');

        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $phone = $this->input->post('mobile');
        $country = $this->input->post('country');
        $state = $this->input->post('state_area_province');
        $city = $this->input->post('city');
        $address = $this->input->post('address');
        $zipcode = $this->input->post('zipcode');

        $data = array(
            'user_id' => $id,
            'shipping_firstname' => $firstname,
            'shipping_lastname' => $lastname,
            'shipping_contactno' => $phone,
            'shipping_email' => $email,
            'shipping_postalcode' => $zipcode,
            'shipping_country' => $country,
            'shipping_state' => $state,
            'shipping_city' => $city,
            'shipping_address' => $address,
        );

        $result = $this->db->insert('nbb_shipping_address', $data);
        if ($result) {
            echo json_encode([
                'responsecode' => $this->responseCode,
                'message' => 'Default Address Set Successfully',
                'data' => $data,
            ]);
        } else {
            echo json_encode([
                'responsecode' => $this->error,
                'message' => 'try again',
                'data' => $data,
            ]);
        }
    }

///==========REMOVE CART LIST============///
    public function remove_cart_list()
    {
        $id = $this->input->get('productid');

        $this->db->select('*');
        $this->db->from('nbb_order_product');
        $this->db->where('product_id', $id);
        $result = $this->db->get();
        $row = $result->num_rows();

        if($row) {
            $this->db->select('*');
            $this->db->from('nbb_order_product');
            $this->db->where('product_id', $id);
            $this->db->delete();

            echo json_encode([
                'responsecode' => $this->responseCode,
                'message' => 'Remove successfully',

            ]);
        } else {
            echo json_encode([
                'responsecode' => $this->error,
                'message' => 'No Record Found',

            ]);
        }
    }

//GET COUNTRY LIST
    public function get_country()
    {
        $this->db->select('id,country_name');
        $this->db->from('nbb_countries');
        $data = $this->db->get();

        echo json_encode([
            'responseCode'=>$this->responseCode,
            'message'=>'Countries',
            'countries'=>$data->result_array(),
        ]);
    }

    //GET COUNTRY LIST//
    public function get_state_list()
    {
        $id = $this->input->get('userid');

        $this->db->select('id,cus_state');
        $this->db->from('nbb_customer');
        $this->db->where('id',$id);
        $data = $this->db->get();
        $rows = $data->num_rows();

        if($rows)
        {
            echo json_encode([
                'responsecode'=>$this->responseCode,
                'message'=>'State',
                'data'=>$data->result_array(),
            ]);
        }
        else
        {
            echo json_encode([
                'responsecode' => $this->error,
                'message' => 'No Record Found',

            ]);
        }
    }
///GET CITY LIST///
 public function get_city_list()
    {
        $id = $this->input->get('userid');

        $this->db->select('id,cus_city');
        $this->db->from('nbb_customer');
        $this->db->where('id',$id);
        $data = $this->db->get();
        $rows = $data->num_rows();

        if($rows)
        {
            echo json_encode([
                'responsecode'=>$this->responseCode,
                'message'=>'City',
                'data'=>$data->result_array(),
            ]);
        }
        else
        {
            echo json_encode([
                'responsecode' => $this->error,
                'message' => 'No Record Found',

            ]);
        }
    }
///==========WISHLIST==========///
public function get_whishlist()
{
     $uid = $this->input->get('userid');
     $pid = $this->input->get('productid');

     $this->db->select('nbb_wishlist.*,nbb_customer.id as customer_id,nbb_product.id as product_id,product_category_id, name,product_image,stock,available_stock,weight,price');
     $this->db->from('nbb_wishlist');
     $this->db->join('nbb_product','nbb_product.id = nbb_wishlist.product_id');
     $this->db->join('nbb_customer','nbb_customer.id = nbb_wishlist.userId');
     $this->db->where('userId',$uid);
     $result = $this->db->get();
     $rows = $result->num_rows();

     $total = $result->result_array();
     $list = $result->result_array();

     for($i=0 ; $i< count($total); $i++){
        if($list[$i]['product_image'] != 'null'){
             $list[$i]['product_image'] =  $this->url.'uploads/product_img/'.$list[$i]['product_image'];
        }
        else {
             $list[$i]['product_image'] = 'not found';
        }

     }

     if($rows){
        echo json_encode([
            'responseCode'=>$this->responseCode,
            'message'=>'Whishlist',
            'data'=>$list,
        ]);
     }else {
         echo json_encode([
            'responseCode'=>$this->error,
             'message'=>'No Record Found',
         ]);
     }
}
///REMOVE WISHLIST//
public function remove_whishlist()
    {

        $uid = $this->input->get('userid');
        $pid = $this->input->get('productid');

        $this->db->select('*');
        $this->db->from('nbb_wishlist');
        $this->db->where(array('userId'=>$uid,'product_id'=>$pid));
        $result = $this->db->get();
        $rows = $result->num_rows();

        if($rows){
            $this->db->from('nbb_wishlist');
            $this->db->where('product_id',$pid);
            $this->db->delete();
            echo json_encode([
                'responseCode'=>$this->responseCode,
                'message'=>'Whishlist Deleted',
            ]);
        }else {
            echo json_encode([
                'responseCode'=>$this->error,
                'message'=>'No Record Found',
            ]);
        }
    }
    public function add_wishlist()
    {
        $uid = $this->input->post('userid');
        $pid = $this->input->post('productid');

        $this->db->select('*');
        $this->db->from('nbb_wishlist');
        $this->db->where(array('userId'=>$uid,'product_id'=>$pid));
        $result = $this->db->get();
        $rows = $result->num_rows();

        $input = array(
            'userId'=>$uid,
            'product_id'=>$pid,
            );


        if($rows){
            echo json_encode([
                'responseCode'=>$this->error,
                'message'=>'Already Exists',

            ]);
        } else {
            $this->db->insert('nbb_wishlist',$input);
            echo json_encode([
                'responseCode'=>$this->responseCode,
                'message'=>'Wish list added successfully',

            ]);
        }
    }
///GET TIME SLOTS///
    public function get_time_slot()
    {
      $uid = $this->input->get('therapist');
      $sid = $this->input->get('serviceid');

      $this->db->select('*');
      $this->db->from('nbb_therapists');
      $this->db->where(array('id'=>$uid,'service_id'=>$sid));
      $result = $this->db->get();
      $row = $result->num_rows();

      $time_slot = $result->result_array();
      for ($i=0; $i < count($time_slot) ; $i++) {
        $time_slot[$i]['image'] = $this->url.'uploads/service_img/'.$time_slot[$i]['image'];
      }
      if($row){
          echo json_encode([
              'responseCode'=>$this->responseCode,
              'message'=>'Time Slots',
              'data'=>$time_slot,
          ]);
      }
      else
      {
        echo json_encode([
            'responseCode'=>$this->error,
            'message'=>'No Record Found',
        ]);
      }
    }
///GET BOOKINGS///

    public function get_booking_list()
    {
      $uid = $this->input->get('therapist');
      $pid = $this->input->get('phone');

      $this->db->select('*');
      $this->db->from('nbb_therapists');
      $this->db->where(array('id'=>$uid,'mobile'=>$pid));
      $result = $this->db->get();
      $row = $result->num_rows();

      $time_slot = $result->result_array();
      for ($i=0; $i < count($time_slot) ; $i++) {
        $time_slot[$i]['image'] = $this->url.'uploads/service_img/'.$time_slot[$i]['image'];
      }
      if($row){
          echo json_encode([
              'responseCode'=>$this->responseCode,
              'message'=>'Time Slots',
              'data'=>$time_slot,
          ]);
      }
      else
      {
        echo json_encode([
            'responseCode'=>$this->error,
            'message'=>'No Record Found',
        ]);
      }
    }
///ADD TO CART///
public function add_to_cart()
    {

      $uid = $this->input->post('userid');
      $pid = $this->input->post('productid');
      $oid = $this->input->post('orderid');

      $quantity = $this->input->post('quantity');
      $total_price = $this->input->post('total_price');
      $product_price = $this->input->post('product_price');

      $this->db->select('*');
      $this->db->from('nbb_order_main');
      $result = $this->db->get();
      $row = $result->num_rows();


      if($row){
          $this->db->insert('nbb_order_main',array(
            'user_id'=>$uid,
            'type_flag'=>'C',
          ));

          $this->db->insert('nbb_order_product', array(
            'order_id'=> $oid,
            'product_id'=> $pid,
            'total_quantity'=> $quantity,
            'total_price'=> $total_price,
            'product_price'=>$product_price,
          ));

          echo json_encode([
            'responseCode'=>$this->responseCode,
            'message'=>'Product Added To cart',
          ]);
      } else {
        echo json_encode([
          'responseCode'=>$this->error,
          'message'=>'Error occured',
        ]);
      }

    }
///GET ORDERS///
public function get_order()
{

    echo "get Orders";
}
}
