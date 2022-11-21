<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Category Management</h1>
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
                <form id="add_category" action="<?= base_url('admin/ServiceCategoryCtl/post_add_subChildCategory')?>" method="post" enctype="multipart/form-data">
                <div class="row">
					<div class="col-md-6">             
						<div class="form-group ">
							<label for="name" class="col-sm-6 control-label">Child Category <i class="required">*</i></label>
							<div class="col-sm-12">
								<select  class="form-control chosen chosen-select-deselect" name="child_category" required>
									<option hidden>Select Child Category</option>
										<?php foreach($ChildCategory as $ChildCategoryRow): ?>
										<option value="<?= $ChildCategoryRow['id']?>"><?= $ChildCategoryRow['category_name']?></option>
										<?php endforeach; ?> 
								</select>
							</div>
						</div>
					</div>
                  	<div class="col-md-6">             
						<div class="form-group">
							<label for="name" class="col-sm-6 control-label">Sub-Child Category Name <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="sub_child_category" placeholder="Sub-Child Category Name" value="" required>
							</div>
						</div>
                	</div>
                </div>
								 
                  <div class="form-group ">
                    <label for="category" class="col-md-12 control-label">Detail<i class="required">*</i></label>
                    	<div class="col-md-12">
                            <textarea id="details" name="details" rows="5" cols="80" placeholder="Enter Details..." style = "width:100%;" ></textarea>
                      </div>
                  </div>
                                                       
                  <div class="row"> 
										<div class="col-md-6">                       
											<div class="form-group">
												<label for="status" class="col-sm-6 control-label">Status <i class="required">*</i></label>
												<div class="col-sm-12">
													<select  class="form-control chosen chosen-select" name="status" id="status">
														<option value="" hidden>Select Status</option>
														<option value="0">Inactive</option>
														<option value="1">Active</option>
													</select>
												</div>
											</div>
                    </div> 
										<div class="col-md-6">
											<div class="form-group">
												<label for="image" class="col-sm-6 control-label">Image
												</label>
													<div class="col-sm-12">
															<input type="file" name="subchild_cat_image" class="form-control">
													</div>
											</div>
										</div>   
                  </div> 
                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
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
