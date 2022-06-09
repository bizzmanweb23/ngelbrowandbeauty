<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users Detail</h1>
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
								<div class="row" >
									<div class="col-md-2">
										<a href="<?=base_url('admin/userManagement/add_adminUser')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom">Add User </button></a>
									</div>
									<div class="col-md-2">
										<a href="<?=base_url('admin/userManagement/all_roles')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom">Add Role </button></a>
									</div>
									<div class="col-md-2">
										<a href="<?=base_url('admin/userManagement/all_rolePermission')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom"> Assign Permission </button></a>
									</div>
								</div>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead style="background-color: #fff; color:#b8860b">
                  <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Role Name</th>
										<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($user as $users): ?>
                      <tr>
                        <td><?= $users['first_name']?></td>
                        <td><?= $users['email']?></td>
                        <td><?= $users['role_name']?></td>
												<td><a href="<?= base_url('admin/userManagement/deleteAdminUser/'. $users['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a></td>
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

