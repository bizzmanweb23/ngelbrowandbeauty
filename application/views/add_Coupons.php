<div class="content-wrapper"  style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupons</h1>
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
                <form id="add_coupon" action="<?= base_url('admin/OfferAndPackages/post_add_coupon')?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6"> 
							<div class="form-group ">
								<label for="coupon_code" class="col-sm-6 control-label">Coupon Code <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code" value="">
				
								</div>
							</div>
						</div> 
						<div class="col-md-6">
							<div class="form-group ">
								<label for="discount" class="col-sm-6 control-label">Discount <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="number" class="form-control" name="discount" placeholder="Discount" value="">
								</div>
							</div>
						</div> 
					</div> 
					
					<div class="col-md-12"> 
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">Description <i class="required">*</i></label>
							<div class="col-md-12">
								<textarea id="description" name="description" rows="5" cols="80" style="width: 100%;"></textarea>
							</div>
						</div>  
					</div>   
					<div class="row">    
						<div class="col-md-6">    
							<div class="form-group ">
								<label for="start_date" class="col-sm-6 control-label">Start Date <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control" name="start_date" placeholder="Start Date" value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">    
							<div class="form-group ">
								<label for="expiry_date" class="col-sm-6 control-label">Expiry Date <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control" name="expiry_date" placeholder="Expiry Date" value="">
								</div>
							</div>
						</div>
					
					</div>  
					<div class="row">
						<div class="col-md-6">    
							<div class="form-group ">
								<label for="loyalty_points" class="col-sm-6 control-label">Loyalty Points <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="number" class="form-control" name="loyalty_points" placeholder="Loyalty Points" value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Status <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<select  class="form-control" name="status" placeholder="Select Status" >
										<option value="" hidden>Select Status</option>
										<option value="0">Ended</option>
										<option value="1">On going </option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">                
							<div class="form-group ">
								<label for="image" class="col-sm-6 control-label">Coupon Icon</label>
								<div class="col-sm-12">
									<div id="image"></div>
									<input type="file" name="couponFiles">
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
