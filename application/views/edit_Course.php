<div class="content-wrapper"  style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Management</h1>
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
                <form id="add_package" action="<?= base_url('admin/courseManagement/post_edit_course')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="course_id" value="<?= $all_courses['id']?>">
				<div class="row">
					<div class="col-md-12">   
						<div class="form-group ">
							<label for="package_name" class="col-sm-6 control-label">Course Name <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="course_name" placeholder="Enter Course Name" value="<?= $all_courses['course_name']?>">
							</div>
						</div>      
					</div>
					<!--<div class="col-md-6"> 
						<div class="form-group ">
							<label for="category" class="col-sm-6 control-label"> Category<i class="required">*</i></label>
							<div class="col-sm-12">
								<select  class="form-control chosen chosen-select-deselect" name="service_category">
									<option hidden>Select Course Category</option>
									<?php foreach($category as $categorys): ?>
									<option value="<?= $categorys['id']?>" <?php if($categorys['id'] == $all_courses['category_id']){?> selected <?php } ?>><?= $categorys['name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
						</div> 
                 	</div>-->
                </div>  
                
                <div class="row">
                  	<div class="col-md-6">   
						<div class="form-group ">
							<label for="package_detail" class="col-sm-6 control-label">Durations<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="durations" placeholder="Enter Duration" value="<?= $all_courses['durations']?>">
							</div>
						</div>     
                	</div> 
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_price" class="col-sm-6 control-label">Course Fees<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="course_fees" placeholder="Enter Course Fees" value="<?= $all_courses['course_fees']?>">
							</div>
						</div> 
					</div>
                </div>
   
				<div class="row">
					<div class="col-md-12">
						<div class="form-group ">
							<label for="package_credits" class="col-sm-6 control-label">Description<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<textarea name="description" rows="5" cols="80" class="" style="width: 100%;"><?= $all_courses['description']?></textarea>
							</div>
						</div>  
					</div>
				</div>  
				<div class="row">
					<div class="col-md-12">
						<div class="form-group ">
							<label for="package_status" class="col-sm-6 control-label">FOC Items <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="foc_items" placeholder="Enter foc Items" value="<?= $all_courses['foc_items']?>">
							</div>
						</div> 
					</div>
					<div class="col-md-12">
						<div class="form-group ">
							<label for="package_status" class="col-sm-6 control-label">Type Of Cert <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="type_of_cert" placeholder="Enter Type Of Cert" value="<?= $all_courses['type_of_cert']?>">
							</div>
						</div> 
					</div>
				</div> 
				<!--<div class="row">
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
				</div> -->

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
