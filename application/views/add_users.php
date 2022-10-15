<div class="content-wrapper"  style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Management</h1>
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
                <form id="add_package" action="<?= base_url('admin/UserManagement/post_add_user')?>" method="post" enctype="multipart/form-data">
                <div class="row">
					<div class="col-md-6">   
						<div class="form-group ">
							<label for="first_name" class="col-sm-6 control-label"> Name <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" name="first_name" placeholder="Enter Full Name" value="" required>
							</div>
						</div>      
					</div>
					<div class="col-md-6">   
						<div class="form-group ">
							<label for="role" class="col-sm-6 control-label">Designation <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<select class="form-control" name="role_id" required>
                                    <?php foreach($allRoles as $rolesRow): ?>
                                    <option value="<?= $rolesRow['id']?>"><?= $rolesRow['role_name']?></option>
                                	<?php endforeach; ?>  
                                </select>
							</div>
						</div>     
                	</div> 
                </div>  

				<div class="row">
					<div class="col-md-6">
						<div class="form-group ">
							<label for="email" class="col-sm-6 control-label">Email <i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="email" class="form-control" name="email" autocomplete="off" placeholder="Email" value="" required>
							</div>
						</div> 
					</div>
					<div class="col-md-6">
						<div class="form-group ">
							<label for="package_credits" class="col-sm-6 control-label">Password<i class="required">*</i>
							</label>
							<div class="col-sm-12">
								<input type="password" class="form-control" autocomplete="off" name="password" placeholder="Enter Password" value="" required>
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
 <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script>
	$(".chosen-select").chosen({
	no_results_text: "Oops, nothing found!"
	})
</script>
