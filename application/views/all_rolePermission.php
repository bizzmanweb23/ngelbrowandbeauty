<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Role Management</h1>
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
								<div class="card-header">
									<form action="<?= base_url('admin/userManagement/add_post_RolePermission')?>" method="post" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group ">
													<select class="form-control" name="role_name">
														<option hidden> Select Designation </option>
														<?php foreach($allRoles as $allRolesRow): ?>
														<option value="<?= $allRolesRow['id']?>"><?= $allRolesRow['role_name']?></option>
														<?php endforeach; ?>  
													</select>
												</div>    
											</div>
											<div class="col-md-6">
												<div class="form-group ">
													<select multiple class="chosen-select form-control" data-live-search="true" name="menuname[]" style="height: 45px !important;">
															<?php foreach($allPermission as $permissionRow): ?>
															<option value="<?= $permissionRow['id']?>"><?= $permissionRow['menuname']?></option>
															<?php endforeach; ?>  
													</select>
												</div>    
											</div>
											<div class="col-md-3">
												<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
											</div>
										</div>
									</form>
              	</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead style="background-color: #fff; color:#b8860b">
                  <tr>
                    <th>Role Name</th>
										<th>Permission Name</th>
										<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($rolePermission as $rolePermissionRow): ?>
                      <tr>
                        <td><?= $rolePermissionRow['role_name']?></td>
												<td><?= $rolePermissionRow['menuname']?></td>
												<td><a href="<?= base_url('admin/userManagement/deleteRolePermission/'. $rolePermissionRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
								
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
