<?php  
    
class ApiController extends CI_Controller
{ 
  var $responseCode = 200;
  var $error = 400;
  var $url = 'http://ngelbrowandbeauty.testbizzm.com/';
  
    public function __construct() {
        parent::__construct();
		$this->load->helper('string');
	 
    } 
    public function signin(){

        $data = array(
           'email' => $this->input->post('email'),
           'password' => md5($this->input->post('password')),
         ); 
        
        $this->db->select('id, first_name,password, last_name, email,contact, cus_state,cus_country,cus_city,cus_zipcode,address,cus_gender,profile_picture');
        $this->db->from('nbb_customer');
        $this->db->where(array('email'=>$this->input->post('email'), 'password'=>md5($this->input->post('password'))));
        $result  = $this->db->get();
        $row = $result->num_rows();
         
        $profile= $result->result_array();  
        for($i = 0 ; $i<count($profile); $i++){
            $profile[$i]['profile_picture'] = $this->url.'/uploads/customer_image/'.$profile[$i]['profile_picture'];
        } 
        if($row){
          echo json_encode([
            'responsecode'=>$this->responseCode,
            'message'=>'Sign Success',
             
            'data'=>$profile,
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

        $this->db->select('id, first_name, last_name, email,contact, cus_state,cus_country,cus_city,cus_zipcode,address,cus_gender,profile_picture');
        $this->db->from('nbb_customer');
        $this->db->where('email' ,$email);
        $result  = $this->db->get();
        
        $profile= $result->result_array();  
        for($i = 0 ; $i<count($profile); $i++){
            $profile[$i]['profile_picture'] = $this->url.'/uploads/customer_image/'.$profile[$i]['profile_picture'];
        } 
        
        echo json_encode([
          'responsecode'=>$this->responseCode,
          'message'=>'Success',
          'data'=> $profile,
        ]);

      }
      exit(); 
  }
  ///UPLOAD PROFILE IMAGE
    public function upload_image()
    {   
        $uid = $this->input->post('userid');
        
        $this->db->select('*');
        $this->db->from('nbb_customer');
        $this->db->where('id',$uid);
        $result = $this->db->get();
        $row = $result->num_rows();
        
        if($row){
                $this->load->helper('file');
                $this->load->library('upload');
        
                $config['upload_path'] = 'uploads/customer_image';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config); 
               
                $file_name;
                
                if ($this->upload->do_upload('image'))
                {
                     $file_info = $this->upload->data();
                    $file_name = $file_info['file_name'];
          
                    $this->db->where('id',$uid);
                    $this->db->update('nbb_customer',
                        array('profile_picture'=>$file_name)
                        );
                   
                    
                    $data = array('upload_data' => $this->upload->data()); 
                    echo json_encode([
                        'responsecode'=>$this->responseCode,
                        'message'=>'Image Uploaded',
                        
                    ]); 
                   
                }
                else
                { 
                    $error = array('error' => $this->upload->display_errors());  
                    echo json_encode([
                        'responsecode'=>$this->error,
                        'message'=>'image uploading error',
                        'data'=>$result->result_array(),
                    ]);  
                }
                
        } else {
                echo json_encode([
                    'responsecode'=>$this->error,
                    'message'=>'Record Not found',
                ]);    
        } 
      
    }
  //DASHBOARD//
    public function getDashboard()
    {
       
        $this->db->select('id, nbb_coupons.id as emp_id, nbb_coupons.banner_icon as offer_image, nbb_coupons.description as offer_name, discount');
        $this->db->from('nbb_coupons');
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
        $this->db->select('nbb_product.id as product_id,name, nbb_product_image.*');
        $this->db->from('nbb_product');
        $this->db->join('nbb_product_image', 'nbb_product_image.product_id = nbb_product.id');
        $products = $this->db->get()->result_array();

        for($i=0 ; $i<count($products); $i++){
            if( $products[$i]['image'] == 'null'){
                 $products[$i]['image'] =  'no image found';
            }else{
                $products[$i]['image'] = $this->url.'uploads/product_img/'.$products[$i]['image'];
            }
        }

        //service
		$this->db->select('nbb_child_category.*,nbb_child_category.id as c_id'); 
		$this->db->select('nbb_sub_child_category.*,nbb_sub_child_category.id as sub_child_id');
        $this->db->from('nbb_child_category');  
		$this->db->join('nbb_sub_child_category','nbb_sub_child_category.child_category  = nbb_child_category.id','LEFT');
        $this->db->where('nbb_child_category.parent_category_id',1);
        $result = $this->db->get();
        $rows = $result->num_rows();
        $main = $result->result_array();

		
        
        //$category = $result->result_array();

		if($rows){
            for($i=0 ; $i<count($main); $i++){
					$this->db->select('nbb_sub_child_category.*');
					$this->db->from('nbb_sub_child_category');
					$this->db->where('nbb_sub_child_category.child_category',$main[$i]['c_id']);
					$result = $this->db->get(); 
				$main[$i]['product_cat_image'] = $this->url.'uploads/service_img/'.$main[$i]['product_cat_image'];
              
					if($main[$i]['c_id'] == $main[$i]['sub_child_id']){
						$main[$i]['subchild_cat_image'] = $this->url.'uploads/service_img/'.$main[$i]['subchild_cat_image'];
						$main[$i]['child'] = $result->result_array();
					}   
                }    
		}
        
        /*$this->db->select('id,service_name,service_icon,service_price');
        $this->db->from('nbb_service');
        $services = $this->db->get()->result_array();

        for($i=0 ; $i<count($services); $i++){
            if( $services[$i]['service_icon'] == 'null'){
                 $services[$i]['service_icon'] = 'no image found';    
            }else {
                $services[$i]['service_icon'] = $this->url.'uploads/service_img/'.$services[$i]['service_icon'];   
            }
            
        }*/
	
            
        //course
        $this->db->select('id, course_name,course_image,course_fees');
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
            /*'offer'=>$offers,
            'products' => $products ,*/
            'services' => $main,
            //'course' => $course ,
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
            $profile[$i]['profile_picture'] = $this->url.'uploads/customer_image/'.$profile[$i]['profile_picture'];
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
        
        $this->db->select('id as service_id ,parent_category_id,category_name,product_cat_image as service_cat_image');  
        $this->db->from('nbb_child_category');
        $this->db->where('parent_category_id',1);
        $result = $this->db->get();
        $rows = $result->num_rows(); 
        $services = $result->result_array();
        
        if($rows){
            for($i=0 ; $i<count($services); $i++){
                $services[$i]['service_cat_image'] = $this->url.'uploads/service_img/'.$services[$i]['service_cat_image'];
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
	public function get_subchild_category()
    {
		$this->db->select('nbb_child_category.*,nbb_child_category.id as c_id'); 
		$this->db->select('nbb_sub_child_category.*');
        $this->db->from('nbb_child_category');  
		$this->db->join('nbb_sub_child_category','nbb_sub_child_category.child_category  = nbb_child_category.id','LEFT');
        $this->db->where('nbb_child_category.parent_category_id',1);
        $result = $this->db->get();
        $rows = $result->num_rows();
        $main = $result->result_array();
        
        
       /* print "<pre>";
        print_r($main);
        exit();*/
        if($rows){
            for($i=0 ; $i<count($main); $i++){
                $main[$i]['subchild_cat_image'] = $this->url.'uploads/service_img/'.$main[$i]['subchild_cat_image'];
					
                    $cid = $main[$i]['id'];
                }    
            
            
            echo json_encode([
                    'responsecode'=>$this->responseCode, 
                    'message'=>'success',
                    'data'=>$main,
                    
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
        if($id == ''){
            $id = 2;
        } 
        
        //$this->db->select('nbb_product.id as pid, nbb_product_image.image, name'); 
        $this->db->select('id , nbb_child_category.parent_category_id as cateogry_id, category_name,product_cat_image');
        $this->db->from('nbb_child_category');   
        // $this->db->join('nbb_product','nbb_product.categorie_id = nbb_child_category.parent_category_id');
        // $this->db->join('nbb_product_image','nbb_product_image.product_id = nbb_product.id');
        $this->db->where('parent_category_id', 2);
        $result = $this->db->get();
        $rows = $result->num_rows();  
        
        $product = $result->result_array();
         for($i=0 ; $i<count($product); $i++){
            if($product[$i]['product_cat_image'] == 'null'){
                $product[$i]['product_cat_image'] = 'no image found';
            }
            else {
                $product[$i]['product_cat_image'] = $this->url.'uploads/product_img/'.$product[$i]['product_cat_image'];    
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
    //===PRODUCT LIST ======//
    //   public function get_product_list()
    // {
    //     $id =  $this->input->get('categoryid');
    //     if($id == ''){
    //         $id = 10;
    //     }
          
    //     $this->db->select('nbb_product.id as id ,nbb_product.status as prod_status,categorie_id , name,discountPercentage, discounted_price,price,available_stock,rating,description');
    //     $this->db->select('nbb_product_image.image as image, nbb_product_image.status as imgstatus, name');
    //     $this->db->from('nbb_product');
    //     $this->db->join('nbb_product_image','nbb_product_image.product_id = nbb_product.id');
    //     $this->db->where(array('nbb_product.categorie_id',2,'nbb_product.product_category_id', $id));
        
    //     $this->db->where('nbb_product.status',1);
    //     $result = $this->db->get();
    //     $rows = $result->num_rows();


    //     $product = $result->result_array();
    //      for($i=0 ; $i<count($product); $i++){
    //         if($product[$i]['image'] == 'null'){
    //             $product[$i]['image'] = 'no image found';
    //         }
    //         else {
             
    //                 $product[$i]['image'] = $this->url.'uploads/product_img/'.$product[$i]['image'];
                
                
    //         }

    //     }
    //     if($rows){
    //         echo json_encode([
    //                 'responsecode'=>$this->responseCode,
    //                 'message'=>'success',
    //                 'data'=>$product,
    //             ]);
    //     } else {
    //         echo json_encode([
    //                 'responsecode'=>$this->error,
    //                 'message'=>'Not Found',

    //             ]);
    //     }
    // }
    
    public function get_product_list()
    {
        $id =  $this->input->get('categoryid');
        if($id == ''){
            $id = 10;
        }

      /* $this->db->select('nbb_product.id as id ,nbb_product.status as prod_status,categorie_id , name,discountPercentage, discounted_price,price,available_stock,rating,description');
        $this->db->select('nbb_product_image.image as image, nbb_product_image.status as imgstatus, name');
        $this->db->from('nbb_product');
        $this->db->join('nbb_product_image','nbb_product_image.product_id = nbb_product.id');
        $this->db->where(array('nbb_product.categorie_id'=>2,'nbb_product.product_category_id'=> $id));
        
        $this->db->where('nbb_product.status',1);*/
		
		$all_product_sql = "SELECT nbb_product.*, (SELECT nbb_product_image.image 
		FROM nbb_product_image WHERE nbb_product_image.product_id = nbb_product.id LIMIT 1) as p_image 
		FROM nbb_product 
		WHERE nbb_product.categorie_id = 2 AND nbb_product.product_category_id = '".$id."' AND nbb_product.status = 1";
		$result = $this->db->query($all_product_sql);
		
        //$result = $this->db->get();
         $rows = $result->num_rows();


        $product = $result->result_array();
         for($i=0 ; $i<count($product); $i++){
            if($product[$i]['p_image'] == 'null'){
                $product[$i]['p_image'] = 'no image found';
            }
            else {
             
                    $product[$i]['p_image'] = $this->url.'uploads/product_img/'.$product[$i]['p_image'];
                
                
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
        if($id == ''){
            $id = 1;    
        }
        
       
        $this->db->select('id,service_name,service_icon,description,discount_price, discount_percent, rating'); 
        $this->db->from('nbb_service'); 
        $this->db->where('service_category',$id);
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
        
        
        $cid = 3;
        
        $this->db->select('course_name,course_image,course_fees,description'); 
        $this->db->from('nbb_course');  
        $this->db->where(array('main_category_id'=>$cid,'id'=>$id));
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
  ///GET TIME SLOTS///
    public function get_time_slot()
    {
      $tid = $this->input->get('therapistid');
      $date = $this->input->get('date'); 
        $id = 7;
        
       $this->db->select('nbb_dashboard.id as timeslot_id ,start_time, end_time');
        
    
      $this->db->from('nbb_dashboard');
      $this->db->join('nbb_employees','nbb_employees.id = nbb_dashboard.user_id');
      $this->db->where('nbb_dashboard.start_date',$date);
      $this->db->where('nbb_dashboard.therapist_id',$tid); 
      $this->db->where('nbb_employees.designation',7);
       
      $result = $this->db->get() ;  
      $row = $result->num_rows();
    
      $time_slot = $result->result_array();
       
      for ($i=0; $i < count($time_slot) ; $i++) { 
        
        $time_slot[$i]['start_time'] = date('h:i A',strtotime($time_slot[$i]['start_time']));
        $time_slot[$i]['end_time'] = date('h:i A',strtotime($time_slot[$i]['end_time']));
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
///GET THERAPIST LIST///

  public function get_therapist() 
  { 
     
      
      
    $id = $this->input->get('userid');
    $date = $this->input->get('date');
    $time = $this->input->get('time');
    
    $this->db->select('nbb_dashboard.id as id ,therapist_id');
    $this->db->select('nbb_employees.first_name, nbb_employees.last_name, nbb_employees.employee_photo, nbb_employees.mob_no, nbb_employees.email'); 
    
    $this->db->from('nbb_dashboard');
    $this->db->join('nbb_employees','nbb_employees.id = nbb_dashboard.therapist_id');
    $this->db->where(array('start_date'=>$date,'nbb_employees.designation'=>7));
     
    $result = $this->db->get() ;   
    
    $row = $result->num_rows(); 
    $record = $result->result_array(); 
    
    for($i = 0 ; $i < count($record); $i++){
        $record[$i]['employee_photo'] = $this->url.'employee_img/'.$record[$i]['employee_photo'];
    }
    if($row){
        echo json_encode([
            'responsecode'=>$this->responseCode,
            'message'=>'Therapist List',
            'data'=>$record,
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
            
            $this->db->select('*');
            $this->db->from('nbb_user_cart');
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
      
     $this->db->select('nbb_wishlist.*,nbb_customer.id as customer_id,nbb_product.id as pid,product_category_id, name,image,stock,available_stock,weight,price');
     $this->db->from('nbb_wishlist'); 
     
     $this->db->join('nbb_product','nbb_product.id = nbb_wishlist.product_id');
     $this->db->join('nbb_product_image','nbb_product_image.product_id = nbb_product.id');
     $this->db->join('nbb_customer','nbb_customer.id = nbb_wishlist.userId');
     $this->db->where('userId',$uid);
     
     $result = $this->db->get();
     $rows = $result->num_rows();

     $total = $result->result_array();
     $list = $result->result_array();
       
     for($i=0 ; $i< count($total); $i++){
        if($list[$i]['image'] != 'null'){
             $list[$i]['image'] =  $this->url.'uploads/product_img/'.$list[$i]['image'];
        }
        else {
             $list[$i]['image'] = 'not found'; 
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
            $deleted = $this->db->delete();
            if($deleted){
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
         else {
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
          $oid = rand(1,999);
            
          $quantity = $this->input->post('quantity');
          $total_price = $this->input->post('total_price');
          $product_price = $this->input->post('product_price');
          
          $this->db->select('*');
          $this->db->from('nbb_user_cart');
          $this->db->where(array('user_id'=>$uid,'product_id'=>$pid));
          $result = $this->db->get();
          $row = $result->num_rows();
          
           
        if($row){
            echo json_encode([
                'responseCode'=>$this->error,
                'message'=>'Cannot add ! This Product Is Already Added',
        ]);
        
        } else {
          $this->db->insert('nbb_order_main',array(
            'id'=>$oid,
            'user_id'=>$uid,
            'type_flag'=>'C',
          ));

          $this->db->insert('nbb_order_product', array(
            'order_id'=> $oid,
            'product_id'=> $pid,
            'user_id'=>$uid,
            'total_quantity'=> $quantity,
            'total_price'=> $total_price,
            'product_price'=>$product_price,
          ));
          
            $this->db->insert('nbb_user_cart', array(
                'user_order_id'=>$oid,
              'user_id'=>$uid,
              'product_id'=>$pid,
              'product_qty'=>$quantity,
          ));
          echo json_encode([
            'responseCode'=>$this->responseCode,
            'message'=>'Product Added To cart',
          ]); 
      }

    }
//GET SHIPPING CART LIST///
  public function get_product_cart() 
  {
      
    $uid = $this->input->get('userid');
     
   
    $this->db->select('nbb_user_cart.product_id as cart_id,nbb_user_cart.user_id as user_id, product_qty'); 
    $this->db->select('nbb_product.id as product_id ,name,available_stock,price,discountPercentage,discounted_price,rating');
    $this->db->select('nbb_product_image.product_id as img_id,nbb_product_image.image');
    $this->db->from('nbb_user_cart');
    $this->db->join('nbb_product','nbb_product.id  = nbb_user_cart.product_id');
    $this->db->join('nbb_product_image','nbb_product_image.product_id = nbb_user_cart.product_id');
	$this->db->where('user_id',$uid);
	
    $result = $this->db->get();  
    $row = $result->num_rows();  
    
    $product = $result->result_array(); 
     
    for($i = 0 ; $i<count($product); $i++){
        $product[$i]['image'] = $this->url.'uploads/product_img/'.$product[$i]['image'];
    }
    
    if($row){
        echo json_encode([
            'responsecode'=>$this->responseCode,
            'message'=>'Product Cart List',
            'data'=>$product,
        ]);
    } else {
        echo json_encode([
            'responsecode'=>$this->error,
            'message'=>'Record Not Found',
      ]);
    }
    
  }
  
  public function get_offers_list()
  {
      $uid = $this->input->get('userid');
      
      $this->db->select('id,nbb_coupons.banner_icon as offer_image, discount');
      $this->db->from('nbb_coupons');
      $result = $this->db->get();
      $rows = $result->num_rows();
      
      $offer = $result->result_array();
      for($i = 0; $i<count($offer); $i++){
         $offer[$i]['offer_image'] = $this->url.'uploads/coupon_img/'.$offer[$i]['offer_image'];
      }
      
      if($rows){
            echo json_encode([
                'responsecode'=>$this->responseCode,
                'message'=>'Offers',
                'data'=>$offer,
                ]);
      } else {
            echo json_encode([
                'responsecode'=>$this->error,
                'message'=>'Record Not Found',
            ]);  
      }
  }
  
   
  public function get_product_details()
  {
       $uid = $this->input->get('productid');
      
       $this->db->select('nbb_product.*');
       $this->db->select('nbb_product_image.product_id as image_id,nbb_product_image.id as iid ,nbb_product_image.*');
       $this->db->from('nbb_product');
       $this->db->join('nbb_product_image','nbb_product_image.product_id = nbb_product.id');
       $this->db->where(array('nbb_product.id'=>$uid,'nbb_product.categorie_id'=>2));
       $result = $this->db->get();
       $rows = $result->num_rows();
       
       $product = $result->result_array();
       
       for($i = 0 ; $i < count($product); $i++){
           $product[$i]['image'] = $this->url.'/uploads/product_img/'.$product[$i]['image'];
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
                'message'=>'Record Not Found',
            ]);  
      }
  }
  public function get_services_details()
  {
      $uid = $this->input->get('serviceid');
      
        $this->db->select('*'); 
        $this->db->from('nbb_service'); 
        $this->db->where(array('main_category_id'=>1,'id'=>$uid));
        $result = $this->db->get();
        $rows = $result->num_rows();  
        
        $services = $result->result_array();
        for($i=0 ; $i<count($services); $i++){
            $services[$i]['service_icon'] = $this->url.'uploads/service_img/'.$services[$i]['service_icon'];
        }
        
        
        if($rows){
            echo json_encode([
                'responsecode'=>$this->responseCode,
                'message'=>'Services',
                'data'=>$services,
                ]);
        } else {
            echo json_encode([
                'responsecode'=>$this->error,
                'message'=>'Record Not Found',
            ]);  
        }
  }
  public function get_course_details(){
      $cid = $this->input->get('courseid');
      
        $this->db->select('*'); 
        $this->db->from('nbb_course');  
        $this->db->where(array('main_category_id'=>3,'id'=>$cid));
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
   
  public function global_search()
  {
      $key = $this->input->get('search_key');
       
      $this->db->select('nbb_product.*');
      $this->db->select('nbb_product_image.product_id as image_id,nbb_product_image.id as iid ,nbb_product_image.*');
      $this->db->from('nbb_product');
      $this->db->join('nbb_product_image','nbb_product_image.product_id = nbb_product.id');  
      
      $this->db->like('nbb_product.name',$key,'before');
      $this->db->or_like('nbb_product.name',$key,'after');
      $this->db->or_like('nbb_product.name',$key,'none');
      $this->db->or_like('nbb_product.name',$key,'both');
       
      $result = $this->db->get();
      //$rows = $result->num_rows(); 
    
      $product = $result->result_array();
       
      for($i = 0 ; $i < count($product); $i++){
          $product[$i]['image'] = $this->url.'/uploads/product_img/'.$product[$i]['image'];
      }
       
      ///
        // $this->db->select('nbb_service.*'); 
        // $this->db->from('nbb_service');  
        // $this->db->like('service_name',$key, 'before');
        // $this->db->or_like('service_name',$key, 'after');
        // $this->db->or_like('service_name',$key, 'none');
        // $this->db->or_like('service_name',$key, 'both');
         
        // $result = $this->db->get();
        // //$rows = $result->num_rows();  
        
        // $services = $result->result_array();
        // for($i=0 ; $i<count($services); $i++){
        //     $services[$i]['service_icon'] = $this->url.'uploads/service_img/'.$services[$i]['service_icon'];
        // }
        // ///
        // $this->db->select('nbb_course.*'); 
        // $this->db->from('nbb_course');   
        
        // $this->db->like('course_name',$key,'before');
        // $this->db->or_like('course_name',$key,'after');
        // $this->db->or_like('course_name',$key,'none');
        // $this->db->or_like('course_name',$key,'both');
        
        // $result = $this->db->get();
        // //$rows = $result->num_rows(); 
        
        // $course = $result->result_array();
        // for($i = 0; $i< count($course); $i++){
        //     $course[$i]['course_image'] = $this->url.'/uploads/course_image/'.$course[$i]['course_image'];
        // }
        
         $data = $product;
        // $data = $services;
        // $data = $course;
        
       
       if($data){
           echo json_encode([
             'responsecode'=>$this->responseCode,
             'message'=>'success',
             'data'=>$data
        ]);
      } 
      else {
           echo json_encode([
               'responsecode'=>$this->responseCode,
            'data'=>'Not found',  
        ]);
      } 
       
  }
 
}
 
