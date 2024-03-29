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
              
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/productManagement/post_add_product')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  	<div class="col-md-6">   
						<div class="form-group ">
							<label for="service_name" class="col-sm-6 control-label">Product Name <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_name" placeholder="Product Name Max Length : 150." value="" required>
							</div>
						</div>
                	</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="image" class="col-sm-6 control-label">Product SKU </label>
							<div class="col-sm-12">
							<input type="text" class="form-control" name="product_sku" placeholder="Product SKU Max Length : 50." required value="">
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
								<select class="form-control chosen chosen-select-deselect main_category" name="main_category" required>
									<option>Select Main Category</option>
									<?php foreach($category as $category_row): ?>
									<option value="<?= $category_row['id']?>"><?= $category_row['name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div> 
                 	</div>
					
                 	<div class="col-md-4"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> Sub-Category<i class="required">*</i></label>
							<div class="col-sm-12">
								<select class="form-control chosen chosen-select-deselect product_category" name="product_category" required>
									<option>Select Main Category First</option>
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
								</select>
							</div>
						</div> 
					</div>
                </div> 
                   
				
				<div class="row">
					<div class="col-md-6"> 
						<div class="form-group ">
							<label for="Description" class="col-md-6 control-label">Short Description</label>
							<div class="col-md-12">
								<textarea id="shortDescription" name="shortDescription" rows="5" cols="80" style = "width: 100%;"></textarea>
							</div>
						</div>				
					</div>
					<div class="col-md-6"> 
						<div class="form-group ">
							<label for="Description" class="col-sm-2 control-label">Description</label>
							<div class="col-md-12">
								<textarea id="description" name="description" rows="5" cols="80" style = "width: 100%;"></textarea>
							</div>
						</div>  
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">      
						<div class="form-group ">
							<label for="lowest_price" class="col-sm-6 control-label">Lowest price<i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="text" class="form-control lowest_price" name="lowest_price" placeholder="Enter Lowest Price" value="">
							</div>
						</div>        
					</div>
					<div class="col-md-3">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Product Price<i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="text" class="form-control product_price" name="product_price" placeholder="Enter Product Price" value="" required>
							</div>
						</div>        
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">                       
						<div class="form-group ">
							<label for="stock" class="col-sm-6 control-label">Types <i class="required">*</i></label>
							<div class="col-sm-12">
								<select  class="form-control chosen chosen-select types" name="types" data-placeholder="Select Types" >
									<option value="" hidden>Select Types</option>
									<option value="1">Discounted</option>
									<option value="2">Non discounted product</option>
								</select>
							</div>
						</div>
					</div> 
					<div class="col-md-3 discountAmount" style="display: none;">      
						<div class="form-group">
							<div class="col-md-12">
								<label for="Discount" class="control-label">Discount Percentage:</label>
							</div>
							<div class="col-md-12">
								<input type="text" class="form-control discountPercentage" name="discountPercentage" placeholder="Enter Discount" value="">
							</div>
						</div>        
					</div> 
					<div class="col-md-3 discountAmount" style="display: none;">      
						<div class="form-group">
							<label for="Discount" class="col-md-6 control-label">Discounted Price:</label>
							<div class="col-sm-12">
								<input type="text" class="form-control discounted_price" name="discounted_price" value="" readonly>
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
								<input type="text" class="form-control" name="brand_name" placeholder="Enter Brand Name" value="" required>
							</div>
						</div>        
					</div>       
					<div class="col-md-4">      
						<div class="form-group ">
							<label for="service_price" class="col-md-12 control-label">UOM (Volume - ML / Length - MM) <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_weight" required placeholder="Enter Product Price" value="">
							</div>
						</div>        
					</div> 
					<div class="col-md-4">                       
						<div class="form-group ">
							<label for="stock" class="col-sm-6 control-label">Stock <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="stock" required placeholder="Numder Of Product Available In Store" value="">
							</div>
						</div>
					</div>
                </div>   

				<div class="row">       
					
					<div class="col-md-6">      
						<div class="form-group">
							<label for="service_price" class="col-sm-6 control-label">Colour
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="colour" required placeholder="Enter colour" value="">
							</div>
						</div>        
					</div> 
					<!--<div class="col-md-4">      
						<div class="form-group">
							<label for="service_price" class="col-sm-6 control-label">Rating
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="rating" placeholder="Enter rating" value="">
							</div>
						</div>        
					</div>-->
					<div class="col-md-6">
						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" name="light_medical_beauty" value="1">
							<label for="customCheckbox"> Light Medical Beauty Product</label>        
						</div>                      
					</div> 
					
                </div> 
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Curlness </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="curlness" placeholder="Enter curlness" value="">
							</div>
						</div>                                
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Thickness </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="thickness" placeholder="Enter thickness" value="">
							</div>
						</div>                                
					</div>
				</div> 

               	<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Tag </label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="product_tag" id="product_tag" placeholder="Product tag Max Length : 50." value="">
							</div>
						</div>                                
					</div> 
					<div class="col-md-6">                              
						<div class="form-group ">
							<label for="status" class="col-sm-6 control-label">Supplier Name 
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select class="form-control chosen chosen-select-deselect" name="supplier_name" required>
									<option value="" hidden>Select Supplier Name</option>
									<?php foreach($all_Supplier as $Supplier_row): ?>
									<option value="<?= $Supplier_row['id']?>"><?= $Supplier_row['supplier_name']?>(<?= $Supplier_row['supplier_code']?>)</option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
                  	</div>  
                </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="therapist_commission" class="col-sm-6 control-label">Manufacturing Date <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="date" class="form-control" name="mfg_date" required placeholder="Manufacturing Date" value="">
							</div>
						</div>                                
					</div> 
					<div class="col-md-6">                              
						<div class="form-group ">
							<label for="status" class="col-sm-6 control-label">Expiry Date <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="date" class="form-control" name="expiry_date" required placeholder="Expiry Date" value="">
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
								<input type="file" name="productfiles[]" multiple required="" class="form-control">
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
									<option value="" hidden>Select Status</option>
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
								
							</div>
						</div>
                  	</div>  
                 	
                </div>                             
                      
                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
              </form>
              </div>
              <!-- /.card-body -->
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


 <script>
	$(document).ready(function(){
		$('.main_category').on('change', function(){
			var main_categoryID = $(this).val();
			//alert(main_categoryID);
			
			$.ajax({
				type:'GET',
				url:'<?= base_url("admin/ProductManagement/select_Sub_Category")?>',
				data: {main_categoryID:main_categoryID},
				success:function(response){
					$('.product_category').html(response);
				}
			}); 
			
		});
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

	$(".types").change(function(){
		if(this.value == '1') {
			$(".discountAmount").show();

		}
		if(this.value == '2') {
			$(".discountAmount").hide(); 
		}
		});

		$('.discountPercentage').on('keyup', function(){
			var discountPercentage = $(this).val();
			var product_price = $('.product_price').val();
			//alert(product_price);
			var pricePercentage = (product_price * discountPercentage)/100;
			var discountPrice = product_price - pricePercentage;

			//alert(discountPrice);
			$(".discounted_price").val(discountPrice); 
		});
	});
 </script>
