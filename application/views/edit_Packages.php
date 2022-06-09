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
			  <?php foreach($productPackages as $productPackagesRow){ ?>
                <form id="add_package" action="<?= base_url('admin/OfferAndPackages/post_update_package')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="package_id" value="<?= $productPackagesRow['id']?>">
                <div class="row">
					<div class="col-md-12">   
						<div class="form-group ">
							<label for="package_name" class="col-sm-6 control-label">Package Name <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="package_name" id="package_name" value="<?= $productPackagesRow['package_name']?>">
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
								<input type="text" class="form-control" name="package_detail" id="package_detail" placeholder="Package Detail Max Length : 100." value="<?= $productPackagesRow['package_detail']?>">
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
								<input type="number" class="form-control" name="package_price" id="package_price" placeholder="Package Price" value="<?= $productPackagesRow['package_price']?>">
							</div>
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_credits" class="col-sm-6 control-label">Package Credits<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="number" class="form-control" name="package_credits" id="package_credits" placeholder="Package Credits" value="<?= $productPackagesRow['package_credits']?>">
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
								<select class="chosen-select form-control" data-live-search="true" name="productName[]" style="height: 45px !important;" required multiple>
									<?php foreach($AllPackageProductName as $AllPackageProductNameRow): ?>
                                    <option value="<?= $AllPackageProductNameRow['id']?>" selected><?= $AllPackageProductNameRow['p_name']?></option>
                                	<?php endforeach; ?>  
                                    <?php foreach($productName as $productNameRow): ?>
                                    <option value="<?= $productNameRow['id']?>"><?= $productNameRow['p_name']?></option>
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
									<option value="0" <?php if($productPackagesRow['status'] == '0'){?> selected <?php } ?>>Ended</option>
									<option value="1" <?php if($productPackagesRow['status'] == '1'){?> selected <?php } ?>>On going</option>
								</select>
							</div>
						</div> 
					</div>
				</div> 

                      <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
              </form>
			  <?php } ?>
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
