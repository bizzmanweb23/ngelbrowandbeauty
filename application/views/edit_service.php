<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Service</h1>
						
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
						<?php foreach($serviceDataEdit as $serviceData){  ?>
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/ServiceCategoryCtl/post_edit_service')?>" method="post" enctype="multipart/form-data">
								<input type="hidden" class="form-control" name="service_id" value="<?= $serviceData['id'];?>">
                <div class="row">
                  <div class="col-md-12">   
									<div class="form-group ">
											<label for="service_name" class="col-sm-6 control-label">Service Name <i class="required">*</i>
											</label>
											<div class="col-sm-12">
													<input type="text" class="form-control" name="service_name" id="service_name" placeholder="Service Name Max Length : 150." value="<?= $serviceData['service_name'];?>">
											</div>
									</div>
									</div>
									
                </div>

								<div class="row">
									<div class="col-md-6"> 
											<div class="form-group ">
												<label for="category" class="col-sm-6 control-label"> Main Category
												<i class="required">*</i>
												</label>
												<div class="col-sm-12">
													<input type="text" class="form-control main_category" name="main_category" value="<?= $serviceData['parentcategory_name'];?>" readonly>
												</div>
											</div> 
										</div>
										<div class="col-md-6"> 
											<div class="form-group ">
												<label for="category" class="col-sm-6 control-label"> Sub-Category<i class="required">*</i></label>
												<div class="col-sm-12">
													<select class="form-control chosen chosen-select-deselect service_category" name="service_category" required>
														<option value="" hidden>Select Sub-Category</option>
														<?php foreach($ChildCategory as $ChildCategoryRow): ?>
														<option value="<?= $ChildCategoryRow['id']?>"<?php if($serviceData['service_category'] == $ChildCategoryRow['id']){ echo "Selected";} ?>><?= $ChildCategoryRow['child_category_name']?></option>
														<?php endforeach; ?> 
													</select>
												</div>
											</div> 
                 	</div>
                </div> 

                <div class="row">
                	<div class="form-group ">
                      <label for="Description" class="col-sm-2 control-label">Description
                      </label>
                        <div class="col-md-12">
                            <textarea id="description" name="description" rows="5" cols="80" style = "width: 100%;"><?= $serviceData['description'];?></textarea>
                        </div>
                  </div>  
                </div>         
                 
                <div class="row">       
                 
									<div class="col-md-6">      
										<div class="form-group ">
												<label for="service_price" class="col-sm-6 control-label">Service Price<i class="required">*</i></label>
												<div class="col-sm-12">
														<input type="text" class="form-control" name="service_price" id="service_price" placeholder="Service Price Max Length : 50." value="<?= $serviceData['service_price'];?>">
												</div>
											</div>        
									</div> 
										
									<div class="col-md-6">                       
										<div class="form-group ">
												<label for="duration" class="col-sm-6 control-label">Duration </label>
												<div class="col-sm-12">
													<input type="Number" class="form-control" name="duration" id="duration" placeholder="Duration (Use only Number)" value="<?= $serviceData['duration']; ?>">
													
												</div>
										</div>
									</div>
                </div>   
								<div class="row">       
                 
									<div class="col-md-6">      
										<div class="form-group ">
												<label for="package_session" class="col-sm-6 control-label">Package Session<i class="required">*</i></label>
												<div class="col-sm-12">
														<input type="text" class="form-control" name="package_session" placeholder="Package Session" value="<?= $serviceData['package_session'];?>">
												</div>
											</div>        
										</div> 
										<div class="col-md-6">      
											<div class="form-group ">
												<label for="package_times_price" class="col-sm-6 control-label">Package Price<i class="required">*</i></label>
												<div class="col-sm-12">
														<input type="text" class="form-control" name="package_times_price" placeholder="Package x 10 times(Use only Number)" value = "<?= $serviceData['package_times_price'];?>">
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
												<input type="text" class="form-control discountPercentage" name="discountPercentage" placeholder="Enter Discount" value="<?= $serviceData['discount_percent']; ?>">
											</div>
										</div>        
									</div> 
									<div class="col-md-6 discountAmount">      
										<div class="form-group">
											<label for="Discount" class="col-md-6 control-label">Discounted Price:</label>
											<div class="col-sm-12">
												<input type="text" class="form-control discounted_price" name="discounted_price" value="<?= $serviceData['discount_price']; ?>" readonly>
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
                            <select  class="form-control chosen chosen-select" name="therapist_commission" id="therapist_commission">
																<option value="" selected hidden>Select Commission</option>
                                <option value="fixed" <?php if($serviceData['therapist_commission'] == 'fixed'){echo "Selected";} ?>>Fixed</option>
                                <option value="percentage" <?php if($serviceData['therapist_commission'] == 'percentage'){echo "Selected";} ?>>Percentage</option>
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
                      <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?= $serviceData['commission_amount'];?>">
                  </div>
                </div>
                </div>  
                </div> 
                <div class="row">
                  <div class="col-md-4">
                  <div class="form-group ">
                        <label for="priority" class="col-sm-6 control-label">Priority 
                        </label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" name="priority" id="priority" placeholder="Priority" value="<?= $serviceData['priority'];?>">
                          </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                  <div class="form-group ">
                        <label for="loyalty_points" class="col-sm-6 control-label">Loyalty Points
                        </label>
                          <div class="col-sm-12">
                              <input type="text" class="form-control" name="loyalty_points" id="loyalty_points" placeholder="Loyalty Points" value="<?= $serviceData['loyalty_points'];?>">
                              <small class="info help-block">
                              </small>
                          </div>
                  </div>
                  </div>
                  <div class="col-md-4">                              
                  <div class="form-group ">
                    <label for="status" class="col-sm-6 control-label">Status 
                    <i class="required">*</i>
                    </label>
                    <div class="col-sm-12">
                        <select  class="form-control chosen chosen-select" name="status" id="status">
												<option value="" selected hidden>Select Status</option>
                            <option value="0" <?php if($serviceData['status'] == 0){echo "Selected";} ?>>Inactive</option>
                            <option value="1" <?php if($serviceData['status'] == 1){echo "Selected";} ?>>Active</option>
                        </select>
                        <small class="info help-block">
                        </small>
                    </div>
                  </div>
                  </div> 
                  </div>   
									<div class="row">
										<div class="col-md-4">
											<div class="form-group ">
												<label for="image" class="col-sm-6 control-label">Service Icon 
												</label>
													<div class="col-sm-12">
															<div id="image"><img id="serviceimg" src="<?php echo site_url() ?>uploads/service_img/<?php echo $serviceData['service_icon'];?>" height="150" width="150"/></div>
															<input type="file" name="servicefiles" onchange="imgshow(this);">
													</div>
											</div>
										</div> 
										<div class="col-md-6">
												<div class="form-group ">
													<label for="image" class="col-sm-6 control-label">Rating </label>
														<div class="col-sm-12">
															<div id="image"></div>
																<input type="text" class="form-control" name="rating" id="rating" placeholder="Enter Rating" value="<?= $serviceData['rating'];?>">
															</div>
												</div>
											</div>  
									</div>
									                          
                      
                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
              </form>
              </div>
							<?php } ?>
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
   function imgshow(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#serviceimg')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

	$(document).ready(function(){
		
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
