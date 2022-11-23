<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px">
			<?php foreach($productDataEdit as $productData){ ?>
				
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/productManagement/post_edit_product')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="product_id" id="product_id" value="<?= $productData['id'] ?>">
                <div class="row">
                  	<div class="col-md-6">   
						<div class="form-group ">
							<label for="service_name" class="col-sm-6 control-label">Product Name <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name Max Length : 150." value="<?= $productData['name'] ?>" require>
							</div>
						</div>
                	</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="image" class="col-sm-6 control-label">Product SKU </label>
							<div class="col-sm-12">
							<input type="text" class="form-control" name="product_sku" id="product_sku" placeholder="Product SKU Max Length : 50." value="<?= $productData['sku'] ?>" require>
							</div>
						</div>
					</div>
                </div>
                
				<div class="row">
					<div class="col-md-4"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> Main Category
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control main_category" name="main_category" value="<?= $productData['parentcategory_name']?>" readonly>
							</div>
						</div> 
                 	</div>
					
                 	<div class="col-md-4"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> Sub-Category<i class="required">*</i></label>
							<div class="col-sm-12">
								<select class="form-control chosen chosen-select-deselect product_category" name="product_category" required>
									<option value="" hidden>Select Sub-Category</option>
									<?php foreach($ChildCategory as $ChildCategoryRow): ?>
									<option value="<?= $ChildCategoryRow['id']?>"<?php if($productData['product_category_id'] == $ChildCategoryRow['id']){ echo "Selected";} ?>><?= $ChildCategoryRow['child_category_name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div> 
                 	</div>
					<div class="col-md-4"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> Sub-Child-Category<i class="required">*</i></label>
							<div class="col-sm-12">
								<select class="form-control sub_child_category" name="sub_child_category">
									<option>Select Sub-Category First</option>
									<?php foreach($subChildCategory as $subChildCategoryRow): ?>
									<option value="<?= $subChildCategoryRow['id']?>"<?php if($productData['sub_child_category_id'] == $subChildCategoryRow['id']){ echo "Selected";} ?>><?= $subChildCategoryRow['sub_child_category']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div> 
					</div>
                </div> 

				<div class="row">
					<div class="col-md-6"> 
						<div class="form-group ">
							<label for="Description" class="col-md-12 control-label">Description</label>
							<div class="col-md-12">
								<textarea id="description" name="description" rows="5" cols="80" style="width: 100%"><?= $productData['description'] ?></textarea>
							</div>
                		</div>  			
					</div>
					<div class="col-md-6"> 
						<div class="form-group ">
							<label for="Description" class="col-md-12 control-label">Short Description</label>
							<div class="col-md-12">
								<textarea id="shortDescription" name="shortDescription" rows="5" cols="80" style="width: 100%"><?= $productData['short_description'] ?></textarea>
							</div>
						</div>  
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Lowest Price
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control lowest_price" name="lowest_price" placeholder="Enter Lowest Price" value="<?= $productData['lowest_price'] ?>">
							</div>
						</div>        
					</div>
					<div class="col-md-3">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Product Price
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control product_price" name="product_price" placeholder="Enter Product Price" value="<?= $productData['price'] ?>" required>
							</div>
						</div>        
					</div>
					</div> 
					<div class="row">
					<div class="col-md-3">                       
						<div class="form-group ">
							<label for="stock" class="col-sm-6 control-label">Types <i class="required">*</i></label>
							<div class="col-sm-12">
								<select  class="form-control chosen chosen-select types" name="types">
									<option value="" hidden>Select Types</option>
									<option value="1" <?php if($productData['types'] == '1'){?>selected <?php } ?>>Discounted</option>
									<option value="2" <?php if($productData['types'] == '2'){?>selected <?php } ?>>Non discounted product</option>
								</select>
							</div>
						</div>
					</div>
					<?php if($productData['types'] == '1'){?>
					<div class="col-md-3 discountpart">      
						<div class="form-group">
							<div class="col-md-12">
								<label for="Discount" class="control-label">Discount Percentage:</label>
							</div>
							<div class="col-md-12">
								<input type="text" class="form-control discountPercentage" name="discountPercentage" placeholder="Enter Discount" value="<?= $productData['discountPercentage'] ?>">
							</div>
						</div>        
					</div> 
					<div class="col-md-3 discountpart">      
						<div class="form-group">
							<label for="Discount" class="col-md-6 control-label">Discounted Price:</label>
							<div class="col-sm-12">
								<input type="text" class="form-control discounted_price" name="discounted_price" value="<?= $productData['discounted_price'] ?>" readonly>
							</div>
						</div>        
					</div> 
					<?php } ?>
					<div class="col-md-3 discountAmount" style="display: none;">      
						<div class="form-group">
							<div class="col-md-12">
								<label for="Discount" class="control-label">Discount Percentage:</label>
							</div>
							<div class="col-md-12">
								<input type="text" class="form-control discountPercentage" name="discountPercentage" placeholder="Enter Discount" value="<?= $productData['discountPercentage'] ?>">
							</div>
						</div>  
					</div>
					<div class="col-md-3 discountAmount" style="display: none;">      
						<div class="form-group">
							<label for="Discount" class="col-md-6 control-label">Discounted Price:</label>
							<div class="col-sm-12">
								<input type="text" class="form-control discounted_price" name="discounted_price" value="<?= $productData['discounted_price'] ?>" readonly>
							</div>
						</div>        
					</div>
				</div>

				<div class="row">       
					<div class="col-md-4">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Brand Name
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="brand_name" placeholder="Enter Brand Name" value="<?= $productData['brand_name'] ?>" required>
							</div>
						</div>        
					</div> 
					<div class="col-md-4">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Colour
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="colour" required placeholder="Enter colour" value="<?= $productData['colour'] ?>">
							</div>
						</div>        
					</div> 
					<div class="col-md-4">
						<div class="form-group form-check">
							<input type="checkbox" name="light_medical_beauty" value="1">
							<label for="customCheckbox"> Light Medical Beauty Product </label>        
						</div>                      
					</div> 
                </div>  
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Curlness </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="curlness" placeholder="Enter curlness" value="<?= $productData['curlness'] ?>">
							</div>
						</div>                                
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Thickness </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="thickness" placeholder="Enter thickness" value="<?= $productData['thickness'] ?>">
							</div>
						</div>                                
					</div>
				</div> 

                <div class="row">        
					<div class="col-md-6">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">UOM (Volume - ML / Length - MM)<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_weight" id="product_weight" placeholder="Product Weight Max Length : 50." value="<?= $productData['weight'] ?>">
							</div>
						</div>        
					</div>
					<div class="col-md-6">      
						<div class="form-group">
							<label for="service_price" class="col-sm-6 control-label">Rating
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="rating" placeholder="Enter rating" value="<?= $productData['rating'] ?>">
							</div>
						</div>        
					</div> 
                </div>   
               	<div class="row">
				   <div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Supplier Name<i class="required">*</i> </label>
							<div class="col-sm-12">
								<select class="form-control chosen chosen-select-deselect" name="supplier_name" required>
									<option value="" hidden>Select Supplier Name</option>
									<?php foreach($all_Supplier as $Supplier_row): ?>
									<option value="<?= $Supplier_row['id']?>"<?php if($productData['supplier_id'] == $Supplier_row['id']){ echo "Selected";} ?>><?= $Supplier_row['supplier_name']?>(<?= $Supplier_row['supplier_code']?>)</option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>                                
					</div>  
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Tag </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_tag" id="product_tag" placeholder="Product Tag Max Length : 50." value="<?= $productData['tags'] ?>">
							</div>
						</div>                                
					</div>  
                </div> 
               
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Manufacturing Date <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="date" class="form-control" name="mfg_date" id="mfg_date" placeholder="Manufacturing Date" value="<?= $productData['mfg_date'] ?>">
							</div>
						</div>                                
					</div> 
					<div class="col-md-6">                              
						<div class="form-group ">
							<label for="status" class="col-sm-6 control-label">Expiry Date <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="date" class="form-control" name="expiry_date" id="expiry_date" placeholder="Expiry Date" value="<?= $productData['expiry_date'] ?>">
								<small class="info help-block">
								</small>
							</div>
						</div>
                  	</div>  
                </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="image" class="col-sm-6 control-label">Product Image </label>
							<div class="col-sm-12">
								<div id="image"></div>
								<input type="file" name="productfiles[]" multiple>
								<small class="info help-block">
								</small>
							</div>
						</div>
					</div>
                  	<div class="col-md-6">                              
						<div class="form-group ">
							<label for="status" class="col-sm-6 control-label">Status 
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select  class="form-control chosen chosen-select" name="status" id="status" data-placeholder="Select Status" >
									<option value=""></option>
									<option value="0" <?php if($productData['status'] == 0){ echo "Selected";} ?>>Inactive</option>
									<option value="1" <?php if($productData['status'] == 1){ echo "Selected";} ?>>Active</option>
								</select>
								<small class="info help-block">
								</small>
							</div>
						</div>
                  	</div> 
                </div>                              
                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
              </form>
              </div>
			  <?php } ?>
              <!-- /.card-body -->
			  <div class = "row">
				<?php $productId = $this->uri->segment(4);
					$nbb_product_image_sql = $this->db->query("SELECT nbb_product_image.id,
					nbb_product_image.image AS product_image,
					nbb_product.name AS p_name
					FROM nbb_product_image 
					LEFT JOIN nbb_product ON nbb_product.id = nbb_product_image.product_id
					WHERE nbb_product_image.product_id = '".$productId."' ORDER BY nbb_product_image.id DESC");
					$image_id = ''; 
					$product_image = '';
					foreach($nbb_product_image_sql->result_array() as $product_image_row){
						$image_id = $product_image_row['id']; 
						$product_image = $product_image_row['product_image'];
				?>
						<div class = "col-md-3 text-center productimg_row_<?= $image_id; ?>" style="border: 1px solid #e3e3e3; padding:15px; box-shadow: -2px 14px 17px -8px rgba(135,135,135,0.75);
	-webkit-box-shadow: -2px 14px 17px -8px rgba(135,135,135,0.75);
	-moz-box-shadow: -2px 14px 17px -8px rgba(135,135,135,0.75);"> 
							<img src="<?= base_url('uploads/product_img/'.$product_image)?>" class = "img-fluid" style = "width: 200px;height: 200px; object-fit:cover;margin: 0 auto;" /> 

							<a class="remove-image deleteproductimgrow" data-image_id="<?php echo $image_id; ?>" data-product_image="<?php echo $product_image; ?>" href="javascript:void(0)" style="display: inline;position: absolute;right: 30px;font-size: 30px;color: red;">&#215;</a>
						</div>
					<?php } ?>
				</div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
 </div> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$('.product_category').on('change', function(){
			var child_categoryID = $(this).val();
			//alert(main_categoryID);
			
			$.ajax({
				type:'GET',
				url:'<?= base_url("admin/ProductManagement/select_Sub_child_Category")?>',
				data: {child_categoryID:child_categoryID},
				success:function(response){
					$('.sub_child_category').html(response);
				}
			}); 
		});
		$(".deleteproductimgrow").click(function() {
			var element = $(this);
			var imageID= $(this).data('image_id');

			var productimage= $(this).data('product_image');
		if(confirm("Are you sure you want to delete this?"))
		{
		 $.ajax({
		   type: "POST",
		   url: "<?php echo base_url(); ?>admin/ProductManagement/delete_productImage",
		   data: {id: imageID, productimage: productimage},
		   success: function(){
		 }
		});
			
			$(element).closest(".productimg_row_"+imageID).css('color','red'); 
			$(element).closest(".productimg_row_"+imageID).fadeOut(2000); 
			alert("Record deleted successfully");
		    
		}
		return false;
		});

		$(".types").change(function(){
			if(this.value == '1') {
				$(".discountAmount").show();
				$(".discountpart").hide();
			}
			if(this.value == '2') {
				$(".discountAmount").hide(); 
				$(".discountpart").hide();
			}
		});
		$('.discountPercentage').on('keyup', function(){
			var discountPercentage = $(this).val();
			var product_price = $('.product_price').val();
			//alert(product_price);
			var pricePercentage = (product_price * discountPercentage)/100;
			var discountPrice = product_price - pricePercentage;

			$(".discounted_price").val(discountPrice); 
		});

	});	
</script>
