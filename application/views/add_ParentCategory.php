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
                <form id="add_category" action="<?= base_url('admin/ServiceCategoryCtl/post_add_ParentCategory')?>" method="post" enctype="multipart/form-data">
                <div class="row">
                  	<div class="col-md-6">             
						<div class="form-group ">
							<label for="name" class="col-sm-6 control-label">Category Name <i class="required">*</i></label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="name" placeholder="Category Name" value="" required>
							</div>
						</div>
                	</div>
                </div>
                <div class="form-group ">
                    <label for="category" class="col-md-12 control-label">Category Detail<i class="required">*</i></label>
                    	<div class="col-md-12">
                            <textarea name="details" rows="5" cols="80" placeholder="Category Detail" style = "width: 50%;" ></textarea>
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
