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
  ////verify opt
  public function verify_otp()
  {
      $userid = $this->input->post('userid');
      $otp = $this->input->post('otp');
      
      $this->db->select('*');
      $this->db->from('nbb_customer');
      $this->db->where(array('id'=>$userid, 'otp'=>$otp));
      $result  = $this->db->get();
      $row = $result->num_rows();
      
      
       if($row){
        
        echo json_encode([
          'responsecode'=>$this->responseCode,
          'message'=>'Otp Verified Successfully', 
        
        ]);
        
      }else {
        
        echo json_encode([
          'responsecode'=>$this->error,
          'message'=>'Not Found',
          
        ]);
        
      }
  }
  //get otp
  public function get_otp()
  {
      
      $userid = $this->input->get('userid');
      $email = $this->input->get('email');
      
      $this->db->select('*');
      $this->db->from('nbb_customer');
      $this->db->where('id' ,$userid);
      $result  = $this->db->get();
      $e = $result->result_array();
     $email =  $e[0]['email'];
      
      $row =  $result->num_rows();  
      
    if($row){
          
//         $ref_number = 'NBB'.random_string('alnum',5);
// 		$otp_number = random_string('alnum',4); 
		$otp = rand(1111,9999);
		
		$inputArray = ([ 
          
          'otp' => $otp,
        ]);
        $this->db->where('id',$userid);
        $saved = $this->db->update('nbb_customer' , $inputArray);  
		
		mail($email,'Otp',$otp);
        
        echo json_encode([
          'responsecode'=>$this->responseCode,
          'message'=>'Success',
          'opt'=>$otp,
          
        ]); 
       
        
    }else {
        
        echo json_encode([
          'responsecode'=>$this->error,
          'message'=>'failed',
          
        ]);
        
    }
      
  }
  public function forgot_password()
  {
      $email = $this->input->post('email');
      $userid = $this->input->post('userid');
      
      $this->db->select('*');
      $this->db->from('nbb_customer');
      $this->db->where('email',$email);
      $result  = $this->db->get();
      $row = $result->num_rows();
      
      $uid = $result->result_array()[0]['id'];
        
      if($row){
          
        $otp = rand(1111,9999);
		
		$inputArray = ([  
          'otp' => $otp,
        ]);
        
        $this->db->where('email',$email);
        $saved = $this->db->update('nbb_customer' , $inputArray);  
		
		mail($email,'Otp',$otp);
		
        echo json_encode([
          'responsecode'=>$this->responseCode,
          'message'=>'Success', 
          'userid'=>$uid,
          'otp'=>$otp,
        
        ]);
        
      }else {
        
        echo json_encode([
          'responsecode'=>$this->error,
          'message'=>'Email Not Found',
          
        ]);
        
      }
  }
  public function reset_password()
  {
      $p1 = $this->input->post('newPassword');
      $p2 = $this->input->post('confirmPassword');
      
      $email = $this->input->post('email');
      $userid = $this->input->post('userid');
      
      $this->db->select('*');
      $this->db->from('nbb_customer');
      $this->db->where(array('id'=>$userid,'email'=>$email));
      $result  = $this->db->get();
      $emailrow = $result->num_rows();
        
      if($emailrow){
         if($p1 == $p2){
            $inputArray = ([  
              'password' => md5($this->input->post('newPassword')),
            ]);
            
           $this->db->where(array('id'=>$userid,'email'=>$email));
            $saved = $this->db->update('nbb_customer' , $inputArray);
            
            if($saved){
                echo json_encode([
                'responsecode'=>$this->responseCode,
                'message'=>'Password Updated successfully!',
              
                ]);
            }
            
          } else {
              echo json_encode([ 
              'message'=>'Password does not match',
              
            ]);
          }  
      } else {
           echo json_encode([ 
               'responsecode'=>$this->error,
              'message'=>'Email Not found',
              
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

        //service
		$this->db->select('nbb_child_category.id as p_id,category_name,product_cat_image');  
        $this->db->from('nbb_child_category');  
        $this->db->where('nbb_child_category.parent_category_id',1);
        $result = $this->db->get();
        $rows = $result->num_rows();
        $main = $result->result_array();

		
        
        //$category = $result->result_array();

		if($rows){
            for($i=0 ; $i<count($main); $i++){ 
					
				$main[$i]['product_cat_image'] = $this->url.'uploads/service_img/'.$main[$i]['product_cat_image'];
               
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
            'offer'=>$offers,
            'products' => $product ,
            'services' => $main,
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
		$gender = $this->input->post('gender'); 
        $shipping_country = $this->input->post('shipping_country');
        $shipping_hse_blk_no = $this->input->post('shipping_hse_blk_no');
        $shippingunit_no = $this->input->post('shippingunit_no');
        $shipping_address = $this->input->post('shipping_address');
		$shipping_street = $this->input->post('shipping_street');
        $shipping_postalcode = $this->input->post('shipping_postalcode');
        
        
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
              /*'cus_country'=>$country,
              'cus_state'=>$state,
              'cus_city'=>$city,
              'cus_zipcode'=>$zipcode,
              'address'=>$address,  */
              'gender'=>$gender,
            ); 
            $this->db->where('id',$id);
            $this->db->update('nbb_customer',$data); 

			$shipping_data = array(
				'user_id' => $id,
				'shipping_address' => $shipping_address,
				'shipping_country' => $shipping_country,
				'shipping_hse_blk_no' => $shipping_hse_blk_no,
				'shippingunit_no' => $shippingunit_no,
				'shipping_street' => $shipping_street,
				'shipping_postalcode' => $shipping_postalcode
			);
			$shipping_address_query = $this->db->query("SELECT * FROM nbb_shipping_address WHERE nbb_shipping_address.user_id = '".$id."'");
			$shipping_address_rownum = $shipping_address_query->num_rows();
			//$shipping_address_array = $shipping_address_query->result_array();
			if($shipping_address_rownum > 0){
				$this->Main->update('user_id',$id, $shipping_data,'nbb_shipping_address');  
			}else{
				$this->db->insert('nbb_shipping_address', $shipping_data);
			}
            
            $this->db->select('nbb_customer.id,
			 nbb_customer.first_name, 
			 nbb_customer.last_name, 
			 nbb_customer.email,
			 nbb_customer.contact, 
			 nbb_customer.gender,
			 nbb_shipping_address.shipping_address,
			 nbb_shipping_address.shipping_country,
			 nbb_shipping_address.shipping_hse_blk_no,
			 nbb_shipping_address.shippingunit_no,
			 nbb_shipping_address.shipping_street,
			 nbb_shipping_address.shipping_postalcode');
            $this->db->from('nbb_customer');
			$this->db->join('nbb_shipping_address','nbb_shipping_address.user_id = nbb_customer.id');
            $this->db->where('nbb_customer.id', $id);
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
	//=====upload_image======//
	public function upload_image()
    {   
        $uid = $this->input->post('userid');
        
        $this->db->select('*');
        $this->db->from('nbb_customer');
        $this->db->where('id',$uid);
        $result = $this->db->get();
        $row = $result->num_rows();
        
        if($row){
			$this->load->library('upload');
			if($_FILES['profile_picture']['name'] != '')
			{

				$_FILES['file']['name']       = $_FILES['profile_picture']['name'];
				$_FILES['file']['type']       = $_FILES['profile_picture']['type'];
				$_FILES['file']['tmp_name']   = $_FILES['profile_picture']['tmp_name'];
				$_FILES['file']['error']      = $_FILES['profile_picture']['error'];
				$_FILES['file']['size']       = $_FILES['profile_picture']['size'];

				// File upload configuration
				$uploadPath = 'uploads/profile_img/';
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
					$uploadImgData['profile_picture'] = $imageData['file_name'];
				}
				$update = $this->Main->update('id',$uid, $uploadImgData,'nbb_customer');    

				echo json_encode([
					'responsecode'=>$this->responseCode,
					'message'=>'Image Uploaded',
					
				]);      
			}else
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
	public function get_child_category()
    {
        $cid = $this->input->get('catid'); 
		$this->db->select('nbb_sub_child_category.*');
        $this->db->from('nbb_sub_child_category');   
        $this->db->where('nbb_sub_child_category.child_category',$cid);
        $result = $this->db->get();
        $rows = $result->num_rows();
        $main = $result->result_array();
        
        
      
        
        if($rows){
            for($i=0 ; $i<count($main); $i++){
                $main[$i]['subchild_cat_image'] = $this->url.'uploads/service_img/'.$main[$i]['subchild_cat_image']; 
                    
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
        
       
        $this->db->select('id,service_name,service_icon,description,discount_price, discount_percent, rating,service_price as price,package_times_price,package_session'); 
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
	$shipping_address_query = $this->db->query("SELECT * FROM nbb_shipping_address WHERE nbb_shipping_address.user_id = '".$id."'");
	$shipping_address_rownum = $shipping_address_query->num_rows();
    $data = array(
      		'user_id'=>$id,
		  	'shipping_firstname'=>$this->input->post('firstname'),
		  	'shipping_lastname'=>$this->input->post('lastname'), 
		  	'shipping_contactno'=>$this->input->post('mobile'),  
		  	'shipping_hse_blk_no'=>$this->input->post('house_block_no'),
		  	'shipping_postalcode'=>$this->input->post('zipcode'),
		  	'shipping_country'=>$this->input->post('country'),
			'shipping_address'=>$this->input->post('address'),
		  	'shipping_street'=>$this->input->post('street'),
		  	'shippingunit_no' => $this->input->post('shippingunit_no'),
    );
    
   
		if($shipping_address_rownum > 0){
			$this->db->where('user_id',$id);
       		$result = $this->db->update('nbb_shipping_address',$data);
		}else{
			$result = $this->db->insert('nbb_shipping_address', $data);
		}

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
    $this->db->where('user_id',$uid);
    $result  = $this->db->get();
    $rows = $result->num_rows();

    if($rows){
        $upd_fields = array(
            'user_id'=>$uid ,
            'shipping_firstname'=>$this->input->post('firstname'),
            'shipping_lastname'=>$this->input->post('lastname'), 
            'shipping_contactno'=>$this->input->post('mobile'),  
            'shipping_hse_blk_no'=>$this->input->post('house_block_no'),
            'shipping_postalcode'=>$this->input->post('zipcode'),
            'shipping_country'=>$this->input->post('country'),
            'shipping_address'=>$this->input->post('address'),
            'shipping_street'=>$this->input->post('street'),
			'shippingunit_no' => $this->input->post('shippingunit_no'),
        );
        $this->db->where('user_id',$uid);
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
        
        $this->db->select('id, user_id, created_at, shipping_firstname, shipping_lastname, shipping_contactno, shipping_address, shipping_country, shipping_hse_blk_no, shippingunit_no, shipping_street, shipping_postalcode');
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
        
        $shipping_firstname = $this->input->post('firstname');
        $shipping_lastname = $this->input->post('lastname');
        $shipping_contactno = $this->input->post('mobile');
		$shipping_country = $this->input->post('shipping_country');
        $shipping_hse_blk_no = $this->input->post('shipping_hse_blk_no');
        $shippingunit_no = $this->input->post('shippingunit_no');
        $shipping_address = $this->input->post('shipping_address');
		$shipping_street = $this->input->post('shipping_street');
        $shipping_postalcode = $this->input->post('shipping_postalcode');

		$shipping_data = array(
			'user_id' => $id,
			'shipping_firstname' => $shipping_firstname,
			'shipping_lastname' => $shipping_lastname,
			'shipping_contactno' => $shipping_contactno,
			'shipping_address' => $shipping_address,
			'shipping_country' => $shipping_country,
			'shipping_hse_blk_no' => $shipping_hse_blk_no,
			'shippingunit_no' => $shippingunit_no,
			'shipping_street' => $shipping_street,
			'shipping_postalcode' => $shipping_postalcode
		);
		$shipping_address_query = $this->db->query("SELECT * FROM nbb_shipping_address WHERE nbb_shipping_address.user_id = '".$id."'");
		$shipping_address_rownum = $shipping_address_query->num_rows();
		if($shipping_address_rownum > 0){
			$result = $this->Main->update('user_id',$id, $shipping_data,'nbb_shipping_address');  
		}else{
			$result = $this->db->insert('nbb_shipping_address', $shipping_data);
		}
        if ($result) {
            echo json_encode([
                'responsecode' => $this->responseCode,
                'message' => 'Default Address Set Successfully',
                'data' => $shipping_data,
            ]);
        } else {
            echo json_encode([
                'responsecode' => $this->error,
                'message' => 'try again',
                'data' => $shipping_data,
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
     
   
   $this->db->select('nbb_order_product.product_id as cart_id,
	nbb_order_product.total_quantity,
	nbb_order_product.total_price,
	nbb_order_product.product_price,
	nbb_order_main.user_id,
	nbb_order_main.order_number, 
	nbb_order_main.type_flag'); 
    $this->db->select('nbb_product.id as product_id ,name,available_stock,price,discountPercentage,discounted_price,rating');
    $this->db->select('nbb_product_image.product_id as img_id,nbb_product_image.image');
    $this->db->from('nbb_order_product');
    $this->db->join('nbb_product','nbb_product.id  = nbb_order_product.product_id');
	$this->db->join('nbb_order_main','nbb_order_main.id  = nbb_order_product.order_id');
    $this->db->join('nbb_product_image','nbb_product_image.product_id = nbb_order_product.product_id');
	$where = array(
		'nbb_order_main.type_flag' => 'C',
		'nbb_order_main.order_status'   => 1,
		'nbb_order_main.user_id'  => $uid
	  );
	$this->db->where($where);
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
               'responsecode'=>$this->error,
                'message'=>'Not Found',
                'data'=>array(),  
        ]);
      } 
       
  }
 
}
 
