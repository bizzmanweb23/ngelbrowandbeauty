<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Payroll Management</h1>
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
                <form id="add_category" action="<?= base_url('admin/Pay_Structure/post_add_cpf')?>" method="post" enctype="multipart/form-data">
                <div class="row">
					<div class="col-md-6">             
						<div class="form-group ">
							<label for="name" class="col-sm-6 control-label">Year <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select name = "getyear" class="form-control getyear">
									<option value = "">Select Year</option>
									<?php  $lasttenYear = (int)date("Y")- 35;
										$curyear = (int)date("Y");
										for($i=$lasttenYear; $i<= $curyear; $i++){ ?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>  
									<?php } ?>
								</select>
							</div>
						</div>
                	</div>
                  <div class="col-md-6">             
						<div class="form-group ">
								<label for="name" class="col-sm-6 control-label">CPF Ammount <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="cpf_ammount" placeholder="CPF Ammount" value="">
								</div>
						</div>
                	</div>
                </div>
                                                       
                <div class="row">
									<div class="col-md-6">                       
										<div class="form-group ">
											<label for="status" class="col-sm-6 control-label">Status 
											<i class="required">*</i>
											</label>
											<div class="col-sm-12">
												<select  class="form-control chosen chosen-select" name="status">
													<option value="" hidden>Select Status</option>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												</select>
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
