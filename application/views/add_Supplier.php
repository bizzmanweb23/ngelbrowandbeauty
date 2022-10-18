<div class="content-wrapper"  style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier Management</h1>
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
                <form id="add_package" action="<?= base_url('admin/procurementManagement/post_add_Supplier')?>" method="post" enctype="multipart/form-data">
                <div class="row">
					<div class="col-md-6">   
						<div class="form-group ">
							<label for="package_name" class="col-sm-6 control-label">Supplier Code <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="supplier_code" placeholder="Enter Supplier Code" value="">
							</div>
						</div>      
					</div>
					<div class="col-md-6">   
						<div class="form-group ">
							<label for="package_detail" class="col-sm-6 control-label">Supplier Name<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="supplier_name" placeholder="Enter Supplier Name" value="">
							</div>
						</div>     
                	</div> 
                </div>  
                
                <div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_price" class="col-sm-6 control-label">Contact No.<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="contact_no" placeholder="Enter Contact No" value="">
							</div>
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_price" class="col-sm-6 control-label">Email<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="email" class="form-control" name="email" placeholder="Enter email" value="">
							</div>
						</div> 
					</div>
                </div>
   
				<div class="row">
					<div class="col-md-12">
						<div class="form-group ">
							<label for="package_credits" class="col-sm-6 control-label">Address<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<textarea name="supplier_address" rows="5" cols="80" class="" style="width: 100%;"></textarea>
							</div>
						</div>  
					</div>
				</div>    
				<div class="row">
					<div class="col-md-12">
						<div class="form-group ">
							<label for="package_status" class="col-sm-6 control-label">Status <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select  class="form-control" name="status" data-placeholder="Select Status" >
									<option value="" hidden>Status</option>
									<option value="0">Inactive</option>
									<option value="1">Active</option>
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
