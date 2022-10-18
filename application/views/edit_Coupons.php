<div class="content-wrapper"  style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Offer Management</h1>
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
				<?php foreach($editCoupons as $editCouponsRow){ ?>
                <form id="add_coupon" action="<?= base_url('admin/OfferAndPackages/post_edit_coupon')?>" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" name="coupon_id" value="<?= $editCouponsRow['id'] ?>">
					<div class="row">
						<div class="col-md-6"> 
							<div class="form-group ">
								<label for="coupon_code" class="col-sm-6 control-label">Coupon Code <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code" value="<?= $editCouponsRow['coupon_code'] ?>">
				
								</div>
							</div>
						</div> 
						<div class="col-md-6">
							<div class="form-group ">
								<label for="discount" class="col-sm-6 control-label">Discount <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="number" class="form-control" name="discount" placeholder="Discount" value="<?= $editCouponsRow['discount'] ?>">
								</div>
							</div>
						</div> 
					</div> 
					
					<div class="col-md-12"> 
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">Description <i class="required">*</i></label>
							<div class="col-md-12">
								<textarea id="description" name="description" rows="5" cols="80" style="width: 100%;"><?= $editCouponsRow['description'] ?></textarea>
							</div>
						</div>  
					</div>   
					<div class="row">    
						<div class="col-md-6">    
							<div class="form-group ">
								<label for="start_date" class="col-sm-6 control-label">Start Date <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control" name="start_date" placeholder="Start Date" value="<?= $editCouponsRow['start_date'] ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">    
							<div class="form-group ">
								<label for="expiry_date" class="col-sm-6 control-label">Expiry Date <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control" name="expiry_date" placeholder="Expiry Date" value="<?= $editCouponsRow['expiry_date'] ?>">
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
									<input type="number" class="form-control" name="loyalty_points" placeholder="Loyalty Points" value="<?= $editCouponsRow['coupon_loyalty_points'] ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Status <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<select  class="form-control" name="status" placeholder="Select Status" >
										<option value="" hidden></option>
										<option value="0" <?php if($editCouponsRow['status'] == 0){?>selected <?php } ?>>Ended</option>
										<option value="1" <?php if($editCouponsRow['status'] == 1){?>selected <?php } ?>>On going</option>
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
