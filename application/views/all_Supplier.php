<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supplier Management</h1>
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
                <a href="<?=base_url('admin/procurementManagement/add_Supplier')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add supplier </button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
							<div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
                  <tr>
					        <th>Supplier Code</th>
                  <th>Supplier Name</th>
                  <th>Email</th>
                  <th>Supplier Address</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($all_Supplier as $supplierRow): ?>
                      <tr>
                        <td><?= $supplierRow['supplier_code']?></td>
                        <td><?= $supplierRow['supplier_name']?></td>
                        <td><?= $supplierRow['email']?></td>
                        <td><?= $supplierRow['supplier_address']?></td>
                        <td>

													<a href="<?= base_url('admin/ProcurementManagement/deleteSupplier/'. $supplierRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
													<a href="<?= base_url('admin/ProcurementManagement/sendEmailSupplier/'. $supplierRow['id'])?>" class="btn btn-default" title="Email" style="color:#b8860b"><i class="fa fa-envelope" aria-hidden="true"></i></a>
													

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

