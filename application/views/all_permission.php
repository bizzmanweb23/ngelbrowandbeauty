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
					<form action="<?= base_url('admin/userManagement/add_post_permission')?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group ">
									<input type="text" class="form-control" name="menuname" placeholder="Enter Menu Name" value="">
								</div>    
							</div>
							<div class="col-md-4">
								<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
							</div>
						</div>
					</form>
              	</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead style="background-color: #fff; color:#61d3d4">
                  <tr>
                    <th>Permission Name</th>
										<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($allPermission as $permissionRow): ?>
                      <tr>
                        <td><?= $permissionRow['menuname']?></td>
						<td><a href="<?= base_url('admin/userManagement/deletePermission/'. $permissionRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a></td>
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

