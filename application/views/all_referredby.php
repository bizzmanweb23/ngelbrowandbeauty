<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Refered User</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px;height: 35rem;">
              <div class="card-header">
               <!-- <a href="<?=base_url('admin/welcome/add_customer')?>"><button type="button" class="btn btn-primary btn-custom" style="float: right;">Add Customer</button></a>  -->       
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                    <div class="site-table" style="overflow: auto; height: 350px ">            
                    <table class="table table-bordered" id = "customer_table">
                    <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                          <tr>
                            <th>Name</th>
														<th>Customer Code</th>
														<th>Created At</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                     <tbody>
                    <?php foreach($customerUser as $customerRow): ?>
                      <tr>
                        <td><?= $customerRow['first_name'].' '.$customerRow['last_name']?></td>
						<td><?= $customerRow['referreduser_id']?></td>
                        <td><?= $customerRow['created_at']?></td>
                        <td>
							<a href="<?= base_url('admin/welcome/editCustomer/'. $customerRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>
						</td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

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

