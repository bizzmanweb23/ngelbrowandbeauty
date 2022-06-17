<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Category Management</h1>
			<?php /* $message = $this->session->set_flashdata('status');
				if (isset($message)) {
			?>
			<div class="alert alert-success">
				<?= $this->session->set_flashdata('status'); ?>
			</div>
			<?php } */ ?>
			
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
                <form id="add_category" action="<?= base_url('admin/ServiceCategoryCtl/post_edit_ParentCategory')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="category_id" value="<?= $ParentCategoryEdit['id']; ?>">
                <div class="row">
                  	<div class="col-md-6">             
						<div class="form-group ">
							<label for="name" class="col-sm-6 control-label">Category Name <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="name" placeholder="Name Max Length : 100." value="<?= $ParentCategoryEdit['c_name']; ?>">
							</div>
						</div>
                	</div>
                </div>
                <div class="form-group ">
                    <label for="category" class="col-md-12 control-label">Category Detail<i class="required">*</i></label>
					<div class="col-md-12">
						<textarea name="details" rows="5" cols="80" placeholder=" Max Length : 255." style = "width: 50%;" ><?= $ParentCategoryEdit['details']; ?></textarea>
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
