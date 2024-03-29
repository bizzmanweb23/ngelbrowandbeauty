<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Category Management</h1>
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
			<?php foreach($category as $customerRow){ ?>
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_category" action="<?= base_url('admin/ServiceCategoryCtl/post_edit_servicecategory')?>" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" name="servicecategory_id" id="servicecategory_id" value="<?= $customerRow['id'];?>">
                <div class="row">
                  <div class="col-md-6">             
					<div class="form-group ">
						<label for="name" class="col-sm-6 control-label">Parent Category <i class="required">*</i>
						</label>
						<div class="col-sm-12">
							<select  class="form-control chosen chosen-select-deselect" name="parent_category">
								<option hidden>Select Parent Category</option>
									<?php foreach($parentCategory as $parentCategoryRow): ?>
									<option value="<?= $parentCategoryRow['id']?>" <?php if($parentCategoryRow['id'] == $customerRow['parent_category_id']){echo "Selected";}?>><?= $parentCategoryRow['name']?></option>
									<?php endforeach; ?> 
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">             
					<div class="form-group ">
						<label for="name" class="col-sm-6 control-label">Category Name <i class="required">*</i>
						</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" name="name" id="name" placeholder="Name Max Length : 100." value="<?= $customerRow['category_name'];?>">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<label for="category" class="col-md-12 control-label">Category Detail<i class="required">*</i></label>
				<div class="col-md-12">
							<textarea id="details" name="details" rows="5" cols="80" placeholder=" Max Length : 255." style = "width: 100%;"><?= $customerRow['category_details'];?></textarea>
				</div>
            </div>                                       
			<div class="row"> 
			<div class="col-md-6">
											<div class="form-group ">
												<label for="image" class="col-sm-6 control-label">Category Image
												</label>
													<div class="col-sm-12">
															<div id="image"></div>
															<input type="file" name="product_cat_image">
															<small class="info help-block">
															</small>
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
										<option value="0" <?php if($customerRow['status'] == 0){echo "Selected";}?>>Inactive</option>
										<option value="1" <?php if($customerRow['status'] == 1){echo "Selected";}?>>Active</option>
									</select>
								<small class="info help-block">
								</small>
						</div>
					</div>
				</div>  
			</div> 
                  <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
              </form>
              </div>
              <!-- /.card-body -->
			  		<?php } ?>
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
