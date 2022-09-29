<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Wishlist</h1>
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
            
              </div>
              <!-- /.card-header -->
              <div class="card-body">
							<div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered supplier_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
					<th>Customer Name</th>
					<th>Product</th>
					<th>Price</th>
					<th>Created At</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($Wishlist as $WishlistRow): ?>
                      <tr>
                        <td><?= $WishlistRow['first_name'].' '.$WishlistRow['last_name'] ?></td>
                        <td><?= $WishlistRow['p_name']?></td>
                        <td><?= $WishlistRow['price']?></td>
                        <td><?= $WishlistRow['create_at']?></td>
                        <!--<td>

							<a href="<?= base_url('admin/ProcurementManagement/edit_Supplier/'.$supplierRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>
							<a href="<?= base_url('admin/ProcurementManagement/deleteSupplier/'. $supplierRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
							<a href="<?= base_url('admin/ProcurementManagement/sendEmailSupplier/'. $supplierRow['id'])?>" class="btn btn-default" title="Email" style="color:#61d3d4"><i class="fa fa-envelope" aria-hidden="true"></i></a>

						</td>-->
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

