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
            
              	</div>
              <!-- /.card-header -->
              <div class="card-body">
				<div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
                  <tr>
					<th>Product Name</th>
					<th>Quantity</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($supplierOrderData as $supplierRow): ?>
                      <tr>
                        <td><?= $supplierRow['p_name']?></td>
                        <td><?= $supplierRow['quantity']?></td>
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

