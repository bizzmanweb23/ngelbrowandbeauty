<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Service</h1>
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
                <form id="add_promotion" action="<?= base_url('admin/ServiceCategoryCtl/post_add_service')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  	<div class="col-md-12">   
						<div class="form-group ">
							<label for="service_name" class="col-sm-6 control-label">Service Name <i class="required">*</i>
							</label>
							<div class="col-sm-12">
									<input type="text" class="form-control" name="service_name" id="service_name" placeholder="Service Name Max Length : 150." value="">
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
								<select class="form-control chosen chosen-select-deselect main_category" name="main_category">
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
								<select class="form-control service_category" name="service_category" required>
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
					<div class="form-group ">
							<label for="Description" class="col-sm-2 control-label">Description</label>
							<div class="col-md-12">
									<textarea id="description" name="description" rows="5" cols="80" style = "width: 100%;"></textarea>
							</div>
					</div>  
                </div>         
                 
                <div class="row">   
					<div class="col-md-4">      
						<div class="form-group">
							<label for="service_price" class="col-sm-6 control-label">lowest_price<i class="required">*</i></label>
								<div class="col-sm-12">
									<input type="number" class="form-control" name="lowest_price" placeholder="Lowest Price Max Length : 30." value="">
								</div>
						</div>        
					</div>     
					<div class="col-md-4">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Highest price<i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="service_price" id="service_price" placeholder="Highest price Max Length : 30." value="" required>
							</div>
						</div>        
					</div> 
					<div class="col-md-4">                       
						<div class="form-group ">
							<label for="duration" class="col-sm-6 control-label">Duration 
							</label>
							<div class="col-sm-12">
									<input type="Number" class="form-control" name="duration" id="duration" placeholder="Duration (Use only Number)" value="">
							</div>
						</div>
					</div>
                </div>   
				<div class="row">       
					<div class="col-md-6">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Package Session<i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="package_session" placeholder="Package Session (Use only Number)" value="">
							</div>
						</div>        
					</div> 
					<div class="col-md-6">      
						<div class="form-group ">
							<label for="service_price" class="col-sm-6 control-label">Package Price<i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="package_times_price" placeholder="Package Price (Use only Number)" value="">
							</div>
						</div>        
					</div> 
                </div>   
				<div class="row">
					<div class="col-md-6 discountAmount">      
						<div class="form-group">
							<div class="col-md-12">
								<label for="Discount" class="control-label">Discount Percentage:</label>
							</div>
							<div class="col-md-12">
								<input type="text" class="form-control discountPercentage" name="discountPercentage" placeholder="Enter Discount" value="">
							</div>
						</div>        
					</div> 
					<div class="col-md-6 discountAmount">      
						<div class="form-group">
							<label for="Discount" class="col-md-6 control-label">Discounted Price:</label>
							<div class="col-sm-12">
								<input type="text" class="form-control discounted_price" name="discounted_price" value="" readonly>
							</div>
						</div>        
					</div> 
				</div>
               	<div class="row">
                 	<div class="col-md-6">
						<div class="form-group ">
								<label for="therapist_commission" class="col-sm-6 control-label">Therapist Commission 
								</label>
								<div class="col-sm-12">
										<select  class="form-control chosen chosen-select" name="therapist_commission" id="therapist_commission" data-placeholder="Select Therapist Commission" >
												<option value="" selected hidden>Select Commission Type</option>
												<option value="fixed">Fixed</option>
												<option value="percentage">Percentage</option>
												</select>
										<small class="info help-block">
										</small>
								</div>
						</div>                                
                	</div> 
					<div class="col-md-6">                              
						<div class="form-group ">
							<label for="amount" class="col-sm-6 control-label">Commission Amount
							</label>
							<div class="col-sm-12">
									<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="">
							</div>
						</div>
					</div>  
                </div> 
                <div class="row">
                  	<div class="col-md-6">
						<div class="form-group ">
							<label for="priority" class="col-sm-6 control-label">Priority </label>
							<div class="col-sm-12">
								<!--<input type="text" class="form-control" name="priority" id="priority" placeholder="Priority" value="">-->
								<select class="form-control" id="priority" name="priority">
									<option value="" selected hidden>Set Priority</option>
										<option value="1">High</option>
										<option value="2">Important</option>
										<option value="3">Normal</option>
										<option value="4">Low</option>
								</select>
							</div>
						</div>
                  	</div>
                  <div class="col-md-6">                              
					<div class="form-group ">
						<label for="status" class="col-sm-6 control-label">Status <i class="required">*</i></label>
						<div class="col-sm-12">
							<select class="form-control" name="status" id="status" data-placeholder="Select Status" >
								<option value="" hidden>Select Status</option>
								<option value="0">Inactive</option>
								<option value="1">Active</option>
							</select>
								
						</div>
					</div>
                  </div> 
                  </div>   
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label for="image" class="col-sm-6 control-label">Service Icon 
								</label>
								<div class="col-sm-12">
									<div id="image"></div>
									<input type="file" name="files[]" multiple required="" class="form-control">
								</div>
							</div>
						</div> 
						<div class="col-md-6">
							<div class="form-group ">
								<label for="image" class="col-sm-6 control-label">Rating </label>
									<div class="col-sm-12">
										<div id="image"></div>
											<input type="text" class="form-control" name="rating" id="rating" placeholder="Enter Rating" value="">
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
					$('.service_category').html(response);
				}
			}); 
		});
		$('.service_category').on('change', function(){
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
		$('.discountPercentage').on('keyup', function(){
			var discountPercentage = $(this).val();
			var service_price = $('#service_price').val();
			//alert(product_price);
			var pricePercentage = (service_price * discountPercentage)/100;
			var discountPrice = service_price - pricePercentage;

			
			$(".discounted_price").val(discountPrice); 
		});
	});
 </script>
