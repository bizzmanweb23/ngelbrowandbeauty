<div class="content-wrapper"  style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier E-mail</h1>
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
                <form id="add_package" action="<?= base_url('admin/procurementManagement/post_add_SendMail')?>" method="post" enctype="multipart/form-data">
								<input type="hidden" class="form-control" name="supplier_code" value="<?= $SupplierData['supplier_code'] ?>">
								<input type="hidden" class="form-control" name="supplier_name" value="<?= $SupplierData['supplier_name'] ?>">
								<input type="hidden" class="form-control" name="email" value="<?= $SupplierData['email'] ?>">
								<input type="hidden" class="form-control" name="supplier_id" value="<?= $SupplierData['id'] ?>">
                <div class="row">
										<div class="col-md-12">   
											<div class="form-group ">
												<label for="package_name" class="col-sm-6 control-label">Subject <i class="required">*</i>
												</label>
												<div class="col-sm-12">
													<input type="text" class="form-control" name="mail_subject" placeholder="Enter Email Subject" value="">
												</div>
											</div>      
										</div>
													</div>  
						
									<div class="row">
										<div class="col-md-12">
											<div class="form-group ">
												<label for="package_credits" class="col-sm-6 control-label">Product Name & Quantity<i class="required">*</i>
												</label>
												<div class="col-sm-12">
													<textarea name="ProductNameQuantity" rows="5" cols="80" class="" style="width: 100%;" placeholder="Enter Product Name And Quantity"></textarea>
												</div>
											</div>  
										</div>
									</div>    

                      <input type="submit" class="btn btn-primary btn-custom" value="Send" style="width: 150px;">
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
