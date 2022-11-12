<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductManagement extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library('Zend');
		$this->load->library('Csvimport');
		//$this->db2 = $this->load->database('database2', TRUE);

	}
	public function all_productcategory()
    {
       
       $data['productCategory'] = $this->ProductManagement->getAllProductCategory();

       $this->layout->view('all_productCategory',$data); 
    }
	public function add_productCategory(){
        if(empty($this->session->has_userdata('id'))){
         redirect('admin');
       }
        $data['name'] = $this->session->userdata('name');
        
        $this->layout->view('add_productCategory',$data);
    }
	public function post_add_productCategory(){
		
		$data = array(
			'name' => $this->input->post('name'),
			'status' => $this->input->post('status'));

		if(!empty($data))
		{
			$insert = $this->ProductManagement->insert_productCategory($data); 
			if($insert==true)
			{
				redirect('productcategory');
			}
			else
			{
				$errorUploadType = 'Some problem occurred, please try again.';
			}                   
		}      
					  
	}
	public function editproductCategory(){
		if(empty($this->session->has_userdata('id'))){
		  redirect('admin');
		}
		$CategoryId = $this->uri->segment(4);
		$data['productCategoryDataEdit'] = $this->ProductManagement->getProductCategoryData($CategoryId);
		$this->layout->view('edit_productCategory',$data);
   	}
   public function post_edit_productCategory(){

		if(empty($this->session->has_userdata('id'))){
		redirect('admin');
		}
		
		$categoryid = $this->input->post('categoryid');
		$data = array(
			'name' => $this->input->post('name'),
			'status' => $this->input->post('status'));

		  $result=$this->Main->update('id',$categoryid, $data,'nbb_product_category');
		  if($result==true)
			{
				redirect('admin/productManagement/editproductCategory/'. $categoryid);
			}
		  else
			{
				$errorUploadType = 'Some problem occurred, please try again.';
			}  
	} 
	public function deleteProductCategory()
    {
       if($this->session->has_userdata('id')!=false)
       {
           $categoryId=$this->uri->segment(4);
           $result=$this->Main->delete('id',$categoryId,'nbb_product_category');
           if($result==true)
           {
               redirect('productcategory');
           }
           else
           {
               redirect('productcategory');
           }
       }
    }
	public function all_product()
    {
       
       $data['product'] = $this->ProductManagement->getAllProduct();
       $this->layout->view('all_product',$data); 
    }
	public function add_product(){
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
			}
		   $data['name'] = $this->session->userdata('name');
		   //$data['category'] = $this->ProductManagement->getAllProductCategory();
		   $data['category'] = $this->ServiceCategory->getAllParentCategory();
		   $data['all_Supplier']=$this->ProcurementManagement->getAllsupplier();
		   
		   $this->layout->view('add_product',$data);
	}
	public function post_add_product()
	{
	  $errorUploadType = "";
	  $statusMsg = "";

		$product_data = array(
			'supplier_id' => $this->input->post('supplier_name'),
			'categorie_id' => $this->input->post('main_category'),
			'product_category_id' => $this->input->post('product_category'),
			'sku' => $this->input->post('product_sku'),
			'name' => $this->input->post('product_name'),
			'product_code' => $this->input->post('product_code'),
			'description' => $this->input->post('description'),
			'short_description' => $this->input->post('shortDescription'),
			'tags' => $this->input->post('product_tag'),
			'weight' => $this->input->post('product_weight'),
			'lowest_price' => $this->input->post('lowest_price'),
			'price' => $this->input->post('product_price'),
			'stock' => $this->input->post('stock'),
			'available_stock' => $this->input->post('stock'),
			'mfg_date' => $this->input->post('mfg_date'),
			'expiry_date' => $this->input->post('expiry_date'),
			'brand_name' => $this->input->post('brand_name'),
			'colour' => $this->input->post('colour'),
			'types' => $this->input->post('types'),
			'discountPercentage' => $this->input->post('discountPercentage'),
			'discounted_price' => $this->input->post('discounted_price'),
			'rating' => $this->input->post('rating'),
			'curlness' => $this->input->post('curlness'),
			'thickness' => $this->input->post('thickness'),
			'light_medical_beauty' => $this->input->post('light_medical_beauty'),
			'status' =>$this->input->post('status')
			);
			$result = $this->db->insert('nbb_product',$product_data); 
			$insert_id = $this->db->insert_id();
			
			$this->load->library('upload');
			$image = array();
			$ImageCount = count($_FILES['productfiles']['name']);
   
	  for($i = 0; $i < $ImageCount; $i++){
            $_FILES['file']['name']       = $_FILES['productfiles']['name'][$i];
            $_FILES['file']['type']       = $_FILES['productfiles']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['productfiles']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['productfiles']['error'][$i];
            $_FILES['file']['size']       = $_FILES['productfiles']['size'][$i];

            // File upload configuration
            $uploadPath = 'uploads/product_img/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
					$imageData = $this->upload->data();
					$uploadImgData[$i]['image'] = $imageData['file_name'];
					$uploadImgData[$i]['product_id'] = $insert_id;
            }
        }
         if(!empty($uploadImgData)){
            // Insert files data into the database
            $insertImg = $this->ProductManagement->insertproduct($uploadImgData);              
        }
		if($uploadImgData ==true || $result == true)
			{
				redirect('product'); 
				//redirect('admin/ProductManagement/add_product');
			}  
		        
		
  	}
	public function editProduct(){
		if(empty($this->session->has_userdata('id'))){
			redirect('admin');
		}
		   	$data['name'] = $this->session->userdata('name');
		   	//$data['category'] = $this->ProductManagement->getAllProductCategory();
			$data['category'] = $this->ServiceCategory->getAllParentCategory();
			$data['ChildCategory'] = $this->ProductManagement->getAllChildCategory();
		   	$productId = $this->uri->segment(4);
			$data['productDataEdit'] = $this->ProductManagement->getProductDataEdit($productId);
			$data['all_Supplier']=$this->ProcurementManagement->getAllsupplier();
		   	$this->layout->view('edit_product',$data);
	}
	public function post_edit_product()
	{
	  	$product_id = $this->input->post('product_id');
			$product_data = array(
			'product_category_id' => $this->input->post('product_category'),
			'sku' => $this->input->post('product_sku'),
			'name' => $this->input->post('product_name'),
			'product_code' => $this->input->post('product_code'),
			'description' => $this->input->post('description'),
			'short_description' => $this->input->post('shortDescription'),
			'tags' => $this->input->post('product_tag'),
			'weight' => $this->input->post('product_weight'),
			'lowest_price' => $this->input->post('lowest_price'),
			'price' => $this->input->post('product_price'),
			'stock' => $this->input->post('stock'),
			'mfg_date' => $this->input->post('mfg_date'),
			'expiry_date' => $this->input->post('expiry_date'),
			'supplier_id' => $this->input->post('supplier_name'),
			'brand_name' => $this->input->post('brand_name'),
			'colour' => $this->input->post('colour'),
			'types' => $this->input->post('types'),
			'discountPercentage' => $this->input->post('discountPercentage'),
			'discounted_price' => $this->input->post('discounted_price'),
			'rating' => $this->input->post('rating'),
			'curlness' => $this->input->post('curlness'),
			'thickness' => $this->input->post('thickness'),
			'light_medical_beauty' => $this->input->post('light_medical_beauty'),
			'status' =>$this->input->post('status')
			);
			$result=$this->Main->update('id',$product_id, $product_data,'nbb_product');
			
			$this->load->library('upload');
			$image = array();
			$ImageCount = count($_FILES['productfiles']['name']);
   
	  for($i = 0; $i < $ImageCount; $i++){
            $_FILES['file']['name']       = $_FILES['productfiles']['name'][$i];
            $_FILES['file']['type']       = $_FILES['productfiles']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['productfiles']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['productfiles']['error'][$i];
            $_FILES['file']['size']       = $_FILES['productfiles']['size'][$i];

            // File upload configuration
            $uploadPath = 'uploads/product_img/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
					$imageData = $this->upload->data();
					$uploadImgData[$i]['image'] = $imageData['file_name'];
					$uploadImgData[$i]['product_id'] = $product_id;
            }
        }
         if(!empty($uploadImgData)){
            // Insert files data into the database
            $insertImg = $this->ProductManagement->insertproduct($uploadImgData);              
        }
		
		if($insertImg==true || $result == true)
			{
				redirect('product');
			}  
		
  	}

	public function bulk_import(){
		$data['name'] = $this->session->userdata('name');
		//$data['category'] = $this->ProductManagement->getAllProductCategory();
		$data['allcategory'] = $this->ProductManagement->getAllChildCategory();
		
		$this->layout->view('bulk_import',$data);
	}
	public function import_csv() {
        
        //Check file is uploaded in tmp folder
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            //validate whether uploaded file is a csv file
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileArr = explode('.', $_FILES['file']['name']);
            $ext = end($fileArr);
            if (($ext == 'csv') && in_array($mime, $csvMimes)) {
                $file = $_FILES['file']['tmp_name'];
                $csvData = $this->csvimport->get_array($file);
                $headerArr = array("product_name", "sku", "main_category_id", "sub_category_id","weight","price","mfg_date","expiry_date","available_stock");
                if (!empty($csvData)) {
                    //Validate CSV headers
                    $csvHeaders = array_keys($csvData[0]);
                    $headerMatched = 1;
                    foreach ($headerArr as $header) {
                        if (!in_array(trim($header), $csvHeaders)) {
                            $headerMatched = 0;
                        }
                    }
                    if ($headerMatched == 0) {
                        $this->session->set_flashdata("error_msg", "CSV headers are not matched.");
                        redirect('leads');
                    } else {
                        foreach ($csvData as $row) {
                            $product_data = array(
								'name' 			=> $row['product_name'],
								'sku' 			=> $row['sku'],
								'categorie_id' 	=> $row['main_category_id'],
								'product_category_id' => $row['sub_category_id'],
								'weight' 		=> $row['weight'],
								'price' 		=> $row['price'],
								'mfg_date' 		=> $row['mfg_date'],
								'expiry_date' 	=> $row['expiry_date'],
								'available_stock' => $row['available_stock'],
								'status'   =>  '1',
							);
                            $table_name = "nbb_product";
                            $this->Main->insert($table_name, $product_data);
                        }
                        $this->session->set_flashdata("success_msg", "CSV File imported successfully.");
                        redirect('product');
                    }
                }
            } else {
                $this->session->set_flashdata("error_msg", "Please select CSV file only.");
                redirect('product');
            }
        } else {
            $this->session->set_flashdata("error_msg", "Please select a CSV file to upload.");
            redirect('product');
        }
    }

	public function updateStack_status()
	  	{
		  if(empty($this->session->has_userdata('id'))){
			  redirect('admin');
		  }
	  
		  $product_detailsId = $this->input->post('product_detailsId');
		  $data = array(
			  'available_stock' => $this->input->post('product_stock'),
			  'stock' => $this->input->post('product_stock')
		  );  
		  
		  $result=$this->Main->update('id',$product_detailsId, $data,'nbb_product');
		  if($result == true)
		  {
			  return redirect('admin/productManagement/all_product');
		  }
		  else
		  {
			  $errorUploadType = 'Some problem occurred, please try again.';
		  }      
	}
	public function select_Sub_Category()
	{
 
		$main_categoryID = $_GET['main_categoryID'];
		//echo $task_id;
		
		$main_category_sql = "SELECT nbb_child_category.* FROM nbb_child_category WHERE nbb_child_category.parent_category_id = ".$main_categoryID; 
		$main_category_query = $this->db->query($main_category_sql); 
		$main_category_result = $main_category_query->result_array();
		// Generate HTML of state options list 
		if($main_category_query->num_rows() > 0){ 
			echo '<option value="" hidden>Select Sub-Category</option>'; 
			foreach($main_category_result as $main_categoryRow){ 
				echo '<option value="'.$main_categoryRow['id'].'">'.$main_categoryRow['category_name'].'</option>'; 
			} 
		}else{ 
			echo '<option value="">Sub-Category Not Available</option>'; 
		} 
		
	}
	public function select_Sub_child_Category()
	{
 
		$subChild_categoryID = $_GET['child_categoryID'];
		//echo $task_id;
		
		$subChild_category_sql = "SELECT nbb_sub_child_category.* FROM nbb_sub_child_category WHERE nbb_sub_child_category.child_category = ".$subChild_categoryID; 
		$subChild_category_query = $this->db->query($subChild_category_sql); 
		$subChild_category_result = $subChild_category_query->result_array();
		// Generate HTML of state options list 
		if($subChild_category_query->num_rows() > 0){ 
			echo '<option value="" hidden>Select Sub-Category</option>'; 
			foreach($subChild_category_result as $subChild_categoryRow){ 
				echo '<option value="'.$subChild_categoryRow['id'].'">'.$subChild_categoryRow['sub_child_category'].'</option>'; 
			} 
		}else{ 
			echo '<option value="">Sub-Category Not Available</option>'; 
		} 
		
	}
	public function set_barcode()
	{
		$product_id = $_GET['product_id']; 
		$sku_code = $_GET['sku_code']; 
		$date_now = date("Y-m-d");
		//load library
		
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		
		$file = Zend_Barcode::draw('code128', 'image', array('text' => $sku_code), array());
  		$barcode_image = $sku_code.'_'.$date_now.'.png';
		$store_image = imagepng($file,FCPATH."uploads/barcode/".$barcode_image);

		$barcode_data = array('barcode' => $barcode_image);

		$update = $this->Main->update('id',$product_id, $barcode_data,'nbb_product');    
		if($update){
		  redirect('product');
		}
	}

	public function updateBarcode_snap(){
		//new filename
		//$product_id = $this->input->post('product_detailsId');
		$product_id = $this->uri->segment(4);
		$filename = 'pic_'.$product_id.'_'.date("Y/m/d"). '.jpeg';
		//echo $_FILES['webcam']['name'];exit;

		if(isset($_FILES['webcam']['tmp_name'])){
			move_uploaded_file($_FILES['webcam']['tmp_name'],'upload/barcode/'.$filename);
			//echo $filename;
			/*$barcode_data = array('barcode' => $filename);
			$update = $this->Main->update('id',$product_id, $barcode_data,'nbb_product');    

			if($update){
			redirect('product');
			}*/
		}
		/*$img = $_POST['barcode'];
		$product_id = $this->input->post('product_detailsId');
		$folderPath = "upload/barcode/";
	
		$image_parts = explode(";base64,", $img);
		$image_type_aux = explode("image/", $image_parts[0]);
		$image_type = $image_type_aux[1];
	
		$image_base64 = base64_decode($image_parts[1]);
		//echo $image_base64;exit;
		$fileName = uniqid() . '.png';
	
		$file = $folderPath . $fileName;
		$file_put_contents = file_put_contents($file, $image_base64);
		//echo $file_put_contents;exit;
		//move_uploaded_file($file, $image_base64);
		$barcode_data = array('barcode' => $fileName);
		$update = $this->Main->update('id',$product_id, $barcode_data,'nbb_product');    

    	print_r($file);	*/
	}
	public function deleteProduct()
	{
		 if($this->session->has_userdata('id')!=false)
		 {
			 $productId=$this->uri->segment(4);
			 $result=$this->Main->delete('id',$productId,'nbb_product');
			 $productimage = $this->ProductManagement->getAllProductImage($productId);
			 foreach($productimage as $productimageRow){
				$product_image = $productimageRow['image'];
				if(file_exists($product_image)){
					unlink(base_url("uploads/product_img/".$product_image));
				}
				$result2=$this->Main->delete('product_id',$productId,'nbb_product_image');
			 }
			 
			 if($result==true)
			 {
				 redirect('product');
			 }
			 else
			 {
				 redirect('product');
			 }
		 }
	}
	public function delete_productImage()
	{
		if($this->session->has_userdata('id')!=false)
		{
			$imageId = $_POST['id'];
			$product_image = $_POST['productimage'];
			$productId = $_POST['productId'];
			$result=$this->Main->delete('id',$imageId,'nbb_product_image');
			unlink(base_url("uploads/product_img/".$product_image));
			
		}
	}
}
?>
