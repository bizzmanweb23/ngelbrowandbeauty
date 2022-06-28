<div class="content-wrapper"  style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Offer & Package Management</h1>
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
                  	<div class="col-md-12">   
						<div class="form-group ">
							<label for="package_detail" class="col-sm-6 control-label">Package Detail <i class="required">*</i>
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
							<label for="package_price" class="col-sm-6 control-label">Package Price <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="package_price" id="package_price" placeholder="Package Price" value="">
							</div>
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_credits" class="col-sm-6 control-label">Package Credits<i class="required">*</i>
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
								<select multiple class="chosen-select form-control" data-live-search="true" name="productName[]" style="height: 42px !important;" required>
                                    <?php foreach($serviceName as $serviceNameRow): ?>
                                    <option value="<?= $serviceNameRow['id']?>"><?= $serviceNameRow['service_name']?></option>
                                	<?php endforeach; ?>  
                                </select>
							</div>
						</div> 
					</div>
				</div> 
				<div class="row">
					<div class="col-md-12">
						<div class="form-group ">
							<label for="package_status" class="col-sm-6 control-label">Package Status <i class="required">*</i>
							</label>
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
 <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script>
	$(".chosen-select").chosen({
	no_results_text: "Oops, nothing found!"
	})
</script>
