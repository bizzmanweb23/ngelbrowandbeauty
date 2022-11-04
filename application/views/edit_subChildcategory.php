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
                <form id="add_category" action="<?= base_url('admin/ServiceCategoryCtl/post_edit_subChildcategory')?>" method="post" enctype="multipart/form-data">
				<?php foreach($subchildcategory as $subchildcategoryRow){ ?>
					<input type = "hidden" name = "subChildcategory_id" value="<?= $subchildcategoryRow['id']; ?>">
                <div class="row">
					<div class="col-md-6">             
						<div class="form-group ">
							<label for="name" class="col-sm-6 control-label">Child Category <i class="required">*</i></label>
							<div class="col-sm-12">
								<select  class="form-control chosen chosen-select-deselect" name="child_category">
									<option hidden>Select Child Category</option>
									<?php foreach($ChildCategory as $ChildCategoryRow): ?>
									<option value="<?= $ChildCategoryRow['id'] ?>"<?php if($ChildCategoryRow['id'] == $subchildcategoryRow['child_category']){echo "Selected";}?>><?= $ChildCategoryRow['category_name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div>
					</div>
                  	<div class="col-md-6">             
						<div class="form-group">
							<label for="name" class="col-sm-6 control-label">Sub-Child Category Name <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="sub_child_category" placeholder="Name Max Length : 100." value="<?= $subchildcategoryRow['sub_child_category']; ?>">
							</div>
						</div>
                	</div>
                </div>
								 
				<div class="form-group ">
					<label for="category" class="col-md-12 control-label">Detail<i class="required">*</i></label>
					<div class="col-md-12">
						<textarea id="details" name="details" rows="5" cols="80" placeholder=" Max Length : 255." style = "width:100%;" ><?= $subchildcategoryRow['details']; ?></textarea>
					</div>
				</div>
                                                       
                  <div class="row"> 
					<div class="col-md-6">                       
						<div class="form-group ">
							<label for="status" class="col-sm-6 control-label">Status <i class="required">*</i></label>
							<div class="col-sm-12">
								<select  class="form-control chosen chosen-select" name="status">
									<option value="" hidden>Select Status</option>
									<option value="0" <?php if($subchildcategoryRow['status'] == 0){ ?> selected <?php } ?>>Inactive</option>
									<option value="1" <?php if($subchildcategoryRow['status'] == 1){ ?> selected <?php } ?>>Active</option>
								</select>
							</div>
						</div>
					</div> 
								   
                  </div> 
                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
				<?php } ?>
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
