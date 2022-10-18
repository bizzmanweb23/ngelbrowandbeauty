<div class="content-wrapper"  style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Package Management</h1>
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
                <form id="add_package" action="<?= base_url('admin/OfferAndPackages/post_add_package')?>" method="post" enctype="multipart/form-data">
                <div class="row">
					<div class="col-md-12">   
						<div class="form-group ">
							<label for="package_name" class="col-sm-6 control-label">Package Name <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="package_name" id="package_name" placeholder="Package Name Max Length : 100." value="">
							</div>
						</div>      
					</div>
                </div>  

				<div class="row">
					<div class="col-md-6"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> Category
							<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select class="form-control main_category" name="main_category">
									<option>Select Main Category</option>
									<?php foreach($category as $category_row): ?>
									<option value="<?= $category_row['id']?>"><?= $category_row['name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div> 
					</div>
					
					<div class="col-md-6"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> Sub-Category<i class="required">*</i></label>
							<div class="col-sm-12">
								<select class="form-control service_category" name="service_category" required>
									<option>Select Main Category First</option>
								
								</select>
							</div>
						</div> 
                 	</div>

				</div>
                
                <div class="row">
                  	<div class="col-md-12">   
						<div class="form-group ">
							<label for="package_detail" class="col-sm-6 control-label"> Detail <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<textarea class="form-control" name="package_detail" placeholder="Enter Package Detail" rows="5" cols="80" class="" style="width: 100%;"></textarea>
							</div>
						</div>     
                	</div> 
                </div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_price" class="col-sm-6 control-label"> Price <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="package_price" id="package_price" placeholder="Package Price" value="">
							</div>
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_credits" class="col-sm-6 control-label"> Credits<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="package_credits" id="package_credits" placeholder="Package Credits" value="">
							</div>
						</div>  
					</div>
				</div>   
				<div class="row">
					<div class="col-md-12">
						<div class="form-group ">
							<label for="package_status" class="col-sm-6 control-label">Package Products <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select multiple class="selectpicker selectService form-control" data-live-search="true" name="productName[]" required>
									<option value="" disabled> Select Services </option>
                                    <?php foreach($serviceName as $serviceNameRow): ?>
                                    <option value="<?= $serviceNameRow['id']?>"><?= $serviceNameRow['service_name']?></option>
                                	<?php endforeach; ?>  
                                </select>
							</div>
						</div> 
					</div>
				</div> 
				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_price" class="col-sm-6 control-label"> No of Session <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="no_ofSession" placeholder="No of Session" value="">
							</div>
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_credits" class="col-sm-6 control-label"> FOC Items<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="foc_items" placeholder="FOC Items" value="">
							</div>
						</div>  
					</div>
				</div>   
				<div class="row">
					<div class="col-md-6">                
						<div class="form-group ">
							<label for="image" class="col-sm-6 control-label">Package Image<i class="required">*</i></label>
							<div class="col-sm-12">
								<div id="image"></div>
								<input type="file" name="packageFiles" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_status" class="col-sm-6 control-label">Status <i class="required">*</i></label>
							<div class="col-sm-12">
								<select  class="form-control" name="status" id="status" data-placeholder="Select Status" >
									<option value="" hidden>Select Status</option>
									<option value="0">Ended</option>
									<option value="1">On going </option>
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
 <!--<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
	$('.selectService').selectpicker(
		{  
			liveSearchPlaceholder: 'Search service',
			noneSelectedText: 'Select Services'
		}
	);
	/*$(".chosen-select").chosen({
	no_results_text: "Oops, nothing found!"
	});*/
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
	});
	

</script>
